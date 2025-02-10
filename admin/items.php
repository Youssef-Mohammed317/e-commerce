<?php
$mainNav = true;
  include('./init.php');
  $do = isset($_GET['do']) ? $_GET['do'] : 'view';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $from = isset($_GET['from']) ? $_GET['from'] : 'items';
  alertMessage();
  $countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia &amp; Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Cape Verde","Cayman Islands","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cruise Ship","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kuwait","Kyrgyz Republic","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Mauritania","Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Namibia","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre &amp; Miquelon","Samoa","San Marino","Satellite","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","South Africa","South Korea","Spain","Sri Lanka","St Kitts &amp; Nevis","St Lucia","St Vincent","St. Lucia","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad &amp; Tobago","Tunisia","Turkey","Turkmenistan","Turks &amp; Caicos","Uganda","Ukraine","United Arab Emirates","United Kingdom","Uruguay","Uzbekistan","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
  $categories = select('*', 'categories');
  $members = select('*', 'users');
  if (str_contains($do,'view')) {
    $items = [];
    if($do == 'view') {
      $items = select('*','items','','order by date desc');
    } elseif($do == 'viewApproved') {
      $items = select('*','items', 'where approved = 1','order by date desc');
    } elseif($do == 'viewPending') {
      $items = select('*','items', 'where approved = 0','order by date desc');
    } elseif($do == 'viewMemberItems'){
      $items = select('*','items','where member_id = '.$id,' order by date desc');
    } elseif($do == 'viewCategoryItems'){
      $items = select('*','items','where cat_id = '.$id,' order by date desc');
    } elseif($do == 'viewCommentItem'){
      $items = select('*','items','where item_id = ' . $id,'order by date desc');
    } elseif($do == 'viewItem'){
      $items = select('*' , 'items','where item_id = '.$id );
    }
    include('./include/templates/item/items.php');
  } else if($do == 'add'){
    include('./include/templates/item/addItem.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      if($_POST['submit'] == 'add') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $country = $_POST['country'];
        $status = $_POST['status'];
        $member = $_POST['member'];
        $category = $_POST['category'];
        $target_file = '';
        $formErrors = [];
        // image settings
        $allowed_types = ["image/jpeg", "image/png", "image/gif"];
        $uploads_dir = "../assets/imgs/";
        $max_file_size = 5 * 1024 * 1024; 

        if(strlen($name) < 3) {
          $formErrors[] = 'name must be at least 3 characters long';
        }
        if(strlen($description) < 10) {
          $formErrors[] = 'description must be more than 10 characters';
        }
        if($price < 1) {
          $formErrors[] = 'ordering must be at least 1 dollar';
        }
        $userStatus = select('status','users','where id = '.$member,'','LIMIT 1')['status'];
        if($userStatus == 0){
          go($from, 0, 'This User Is Not Approved');
          $formErrors[] = 'This User Is Not Approved';

        } else {
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
        }
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
            $approved = 1;
            $sql ='INSERT INTO items (name, image, description, status,country , price, member_id, cat_id, approved) VALUES (:name,:image, :description, :status, :country, :price, :member, :category,:approved)';
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
    echo '</div></div></div>';
  } else if($do == 'edit'){
    $item = select('*' , 'items','where item_id = '.$id ,'','LIMIT 1');
    include('./include/templates/item/editItem.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      if($_POST['submit'] == 'update') {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $country = $_POST['country'];
      $status = $_POST['status'];
      $member = $_POST['member'];
      $category = $_POST['category'];
      $target_file = '';
      $formErrors = [];
      // image settings
      $allowed_types = ["image/jpeg", "image/png", "image/gif"];
      $uploads_dir = "../assets/imgs/";
      $max_file_size = 5 * 1024 * 1024; 
      
      if(strlen($description) < 10 ) {
        $formErrors[] = 'name must be at least 3 characters';
      }
      if(strlen($description) < 10) {
        $formErrors[] = 'description must be at least 10 characters long';
      }
      if($price < 1) {
        $formErrors[] = 'ordering must be at least 1 dollar';
      }
      $userStatus = select('status','users','where id = '.$member,'','LIMIT 1')['status'];
      if($userStatus == 0){
        go($from, 0, 'This User Is Not Approved');
        $formErrors[] = 'This User Is Not Approved';
      }else{
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
          $imageItem = select('image','items','where item_id = '.$id,'','LIMIT 1')['image'];
          $sql = 'UPDATE items SET name = :name, image = :image, description = :description, status = :status, country = :country, price = :price, member_id = :member, cat_id = :category WHERE item_id = :id';
          $stmt = $db->prepare($sql);
          if($stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':description' => $description,
            ':status' => $status,
            ':country' => $country,
            ':price' => $price,
            ':member' => $member,
            ':category' => $category,
            'image' => $target_file ? $target_file : $imageItem,
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
      } else{
        go($from);
      }
    }
    echo '</div></div></div>';
  }elseif($do == 'checkDelete'){
    include('./include/templates/item/deleteItem.php');
  }
    else if($do == 'delete'){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($_POST['submit'] == 'delete'){
        $sql = 'DELETE FROM items WHERE item_id = :id';
        $stmt = $db->prepare($sql);
        if($stmt->execute([
          ':id' => $id
        ])) {
          go($from, 1 , 'Item Deleted successfully');
        } else {
          go($from,0, 'Failed to Delete Item');
        }
      }else{
        go($from, 0, 'Cancelled Successfully');
      }
    }

  } else if($do == 'change-approve'){
    $userStatus = select('status','users','where id = '.select('member_id','items','where item_id = '.$id,'','LIMIT 1')['member_id'],'','LIMIT 1')['status'];
    if($userStatus == 0){
      go($from, 0, 'This User Is Not Approved');
    }else{

      $approved = !select('approved','items','where item_id = '.$id,'','LIMIT 1')['approved'];
      $sql = 'UPDATE items SET approved = :approved WHERE item_id = :id';
      $stmt = $db->prepare($sql);
      if($stmt->execute([
        ':approved' => $approved,
        ':id' => $id
    ])) {
      go($from, 1 , 'Item Updated successfully');
    } else {
      go($from,0, 'Failed to Update Item');
    }
  }
  }
  include('./include/templates/main/footer.php');
