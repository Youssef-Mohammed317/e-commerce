<?php 
  include('./init.php');
  $do = isset($_GET['do']) ? $_GET['do'] : 'view';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $from = 'items';
  alertMessage();
  $countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia &amp; Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Cape Verde","Cayman Islands","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cruise Ship","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kuwait","Kyrgyz Republic","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Mauritania","Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Namibia","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre &amp; Miquelon","Samoa","San Marino","Satellite","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","South Africa","South Korea","Spain","Sri Lanka","St Kitts &amp; Nevis","St Lucia","St Vincent","St. Lucia","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad &amp; Tobago","Tunisia","Turkey","Turkmenistan","Turks &amp; Caicos","Uganda","Ukraine","United Arab Emirates","United Kingdom","Uruguay","Uzbekistan","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
  $categories = select('*', 'categories' ,'where visibility = 1');
  if (str_contains($do,'view')) {
    $items = [];
    if($do == 'view') {
      if($user){
        $items = select('*','items','where member_id = '.$user['id'],' order by date desc');
        include('./include/templates/item/items.php');
      }else{
        go('dashboard',0,'Check URL');
      }
    } elseif ($do == 'viewItem'){
      if($id){
        if(select('*' , 'items','where item_id = '.$id ,'','LIMIT 1')){
          $item = select('*' , 'items','where approved = 1 and item_id = '.$id ,'','LIMIT 1');
          $allComments = select('*','comments' ,'where item_id='.$id);
          $comments =[];
          if($user){
            foreach($allComments as $comment){
              if($comment['status'] == 1 || $comment['user_id']==$user['id']){
                $comments[] = $comment;
              } 
            }
          } else {
            foreach($allComments as $comment){
              if($comment['status'] == 1){
                $comments[] = $comment;
                }
              }
          }
          if($item){
            include('./include/templates/item/viewItem.php');
          }else{
            go('dashboard',0,'Check URL');
          }
        }else{
          go('dashboard',0,'Check URL');
        }
      }else{
        go('dashboard',0,'Check URL');
      }
    }
  } else if($do == 'add'){
    if(!$user){
      go('dashboard',0,'You Must Be Logged In To Add Item');
    }  else{
      include('./include/templates/item/addItem.php');
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['submit'] == 'add') {
          $member = $user['id'];
          $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
          $description =filter_var($_POST['description'], FILTER_SANITIZE_STRING);
          $price =  filter_var($_POST['price'],FILTER_SANITIZE_NUMBER_INT);
          $country =filter_var($_POST['country'], FILTER_SANITIZE_STRING);
          $status =filter_var($_POST['status'], FILTER_SANITIZE_STRING);
          $category =filter_var($_POST['category'], FILTER_SANITIZE_STRING);
          $target_file = '';

          // image settings
          $allowed_types = ["image/jpeg", "image/png", "image/gif"];
          $uploads_dir = "../assets/imgs/";
          $max_file_size = 5 * 1024 * 1024; 
          
          $formErrors = [];
          if(strlen($name) < 3) {
            $formErrors[] = 'name must be at least 3 characters';
          }
          if(strlen($description) < 10) {
            $formErrors[] = 'description must be at least 10 characters long';
          }
          if($price < 1) {
            $formErrors[] = 'ordering must be at least 1 dollar';
          }
          if(isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
            // setcookie('image', $_FILES['image']['name'], time() + 3600);
            $file_tmp = $_FILES["image"]["tmp_name"];
            $file_size = $_FILES["image"]["size"];
            $file_type = mime_content_type($file_tmp); // Get file MIME type
            $extension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
            if (!getimagesize($file_tmp)) {
              $formErrors[] = 'The file is not an image.';
            }
            if (!in_array($file_type, $allowed_types)) {
              $formErrors[] = 'Only JPG, PNG, and GIF files are allowed.';
            }
            if ($file_size > $max_file_size) {
                $formErrors[] = 'The file is too large. Maximum size: 5MB';
            }
            $new_image_name = time() . '_' . rand(1000, 9999) . '.' . $extension;
            $target_file = $uploads_dir . $new_image_name;
            if(count($formErrors) == 0){
              if (!move_uploaded_file($file_tmp, $target_file)) {
                $formErrors[] = 'Error uploading the file.';
              }
            }
          } else {
            $formErrors[] = 'Please select an image file.';
          }
          if(count($formErrors) > 0){
            echo '<div class="mx-auto max-w-[500px]">';
            foreach($formErrors as $formError) {
              ?>
              <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Error alert!: </span> <?php echo $formError; ?>
              </div>
          <?php 
          }
          echo '</div></div></div></div>';
          } else {
            $approved = 0;
            $sql ='INSERT INTO items (name, description,image, status,country , price, member_id, cat_id, approved) VALUES (:name, :description,:image, :status, :country, :price, :member, :category,:approved)';
            $stmt = $db->prepare($sql);
            if($stmt->execute([
              ':name' => $name,
              ':description' => $description,
              ':status' => $status,
              ':country' => $country,
              ':price' => $price,
              ':member' => $member,
              ':category' => $category,
              ':approved' => $approved,
              ':image' => $target_file
            ])) {
              go($from, 1 , 'Item added successfully');
            
            } else {
              go($from,0, 'Failed to add Item');
            }
          }
        }
        else{
          go($from);
        }
      }
    }
    echo '</div></div></div>';
  } else if($do == 'edit'){
    if(!$user){
      go('dashboard',0,'You Must Be Logged In');
    }else{
      if($id == ''){
        go('dashboard', 0,'Check URL');
      }
      if(select('*' , 'items','where item_id = '.$id .' and member_id='.$user[0] ,'','LIMIT 1')){
        $item = select('*' , 'items','where item_id = '.$id .' and member_id='.$user[0] ,'','LIMIT 1');
        include('./include/templates/item/editItem.php');
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          if($_POST['submit'] == 'update') {
            $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
            $description =filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $price =  filter_var($_POST['price'],FILTER_SANITIZE_NUMBER_INT);
            $country =filter_var($_POST['country'], FILTER_SANITIZE_STRING);
            $status =filter_var($_POST['status'], FILTER_SANITIZE_STRING);
            $category =filter_var($_POST['category'], FILTER_SANITIZE_STRING);    
            $target_file = '';

            $formErrors = [];
            // image settings
            $allowed_types = ["image/jpeg", "image/png", "image/gif"];
            $uploads_dir = "../assets/imgs/";
            $max_file_size = 5 * 1024 * 1024; 
            if(strlen($name) < 3 ) {
              $formErrors[] = 'name must be at least 3characters';
            }
            if(strlen($description) < 10) {
              $formErrors[] = 'description must be at least 10 characters long';
            }
            if($price < 1) {
              $formErrors[] = 'ordering must be at least 1 dollar';
            }
            if(isset($_FILES['image']) && $_FILES['image']['size'] > 0 ) {
              // setcookie('image', $_FILES['image']['name'], time() + 3600);
              $file_tmp = $_FILES["image"]["tmp_name"];
              $file_size = $_FILES["image"]["size"];
              $file_type = mime_content_type($file_tmp); // Get file MIME type
              $extension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
              if (!getimagesize($file_tmp)) {
                $formErrors[] = 'The file is not an image.';
              }
              if (!in_array($file_type, $allowed_types)) {
                $formErrors[] = 'Only JPG, PNG, and GIF files are allowed.';
              }
              if ($file_size > $max_file_size) {
                $formErrors[] = 'The file is too large. Maximum size: 5MB';
              }
              $new_image_name = time() . '_' . rand(1000, 9999) . '.' . $extension;
              $target_file = $uploads_dir . $new_image_name;
              if(count($formErrors) == 0){
                if (!move_uploaded_file($file_tmp, $target_file)) {
                  $formErrors[] = 'Error uploading the file.';
                }
              }
            }
            if(count($formErrors) > 0){
              echo '<div class="mx-auto max-w-[500px]">';
              foreach($formErrors as $formError) {?>
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                  <span class="font-medium">Error alert!: </span> <?php echo $formError; ?>
                </div>
              <?php }
              echo '</div></div></div></div>';
              } else {
                $imageItem = select('image','items','where item_id = '.$id,'','LIMIT 1')['image'];
                $sql = 'UPDATE items SET name = :name, description = :description,image = :image ,status = :status, country = :country, price = :price, member_id = :member, cat_id = :category, approved = 0 WHERE item_id ='.$id;
                $stmt = $db->prepare($sql);
                if($stmt->execute([
                  ':name' => $name,
                  ':description' => $description,
                  ':status' => $status,
                  ':country' => $country,
                  ':price' => $price,
                  ':member' => $user['id'],
                  ':category' => $category,
                  ':image' => $target_file ? $target_file : $imageItem,
                  ])) {
                  if($target_file){
                    if($imageItem){
                      unlink($imageItem);
                    }
                  }
                  go($from, 1 , 'Item Updated successfully');
                } else {
                  go($from,0, 'Failed to Update Item');
                }
              }
            } else {
              go($from);
            }
        } 
      }else{
        go('dashboard', 0,'Check URL');
      }

    }
    echo '</div></div></div></div>';
  }else if($do=='checkDelete'){
    if(!$user){
      go('dashboard',0,'You Must Be Logged In');
    } else {
      if($id != ''){
        include('./include/templates/item/deleteItem.php');
      }else{
        go('dashboard',0,'Check URL');
      }
    }
  } 
  else if($do == 'delete'){
    if(!$user){
      go('dashboard',0,'You Must Be Logged In');
    } else {
      if($id != ''){
        if($_SERVER['REQUEST_METHOD']=='POST'){
          if($_POST['submit'] == 'delete'){
            if(select('*','items','where item_id = '.$id)){
              $sql = 'DELETE FROM items WHERE item_id = :id and member_id = :userid';
              $stmt = $db->prepare($sql);
            if($stmt->execute([
              ':id' => $id,
              ':userid' => $user[0]
              ])) {
                go($from, 1 , 'Item Deleted successfully');
              } else {
                go($from,0, 'Failed to Delete Item');
              }
            } else {
              go('dashboard',0,'Check URL');
            }
          } else {
            go($from,0,'Cancelled Successfully');
          }
          }
      }else{
        go('dashboard',0,'Check URL');
      }
  }
  }
  include('./include/templates/main/footer.php');
