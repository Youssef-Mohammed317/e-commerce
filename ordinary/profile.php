<?php
  include('./init.php');
    alertMessage();
    $do = isset($_GET['do']) ? $_GET['do'] : 'view';
    $id = '';
    if(isset($_GET['id'])){
      if($_GET['id'] == ''){
        go('dashboard',0,'Check URL');
      }else{
        if(select('*','users','where id='.$_GET['id'])){
          $id = $_GET['id'];
        }else{
          go('dashboard',0,'Check URL');
        }
      }
    }else{
      go('dashboard',0,'Check URL');
    }
    if($do == 'view') {
      $userData = select('*','users','where id = ' . $id,'','LIMIT 1');
      $items = [];
      if($user){
        if($user['id'] == $id){
          $items = select('*','items','where member_id = ' . $id,'order by date desc');
        } else {
          $items = select('*','items','where approved = 1 and member_id = ' . $id,'order by date desc');
        }
      } else{
        $items = select('*','items','where approved = 1 and member_id = ' . $id,'order by date desc');
      }
      include('./include/templates/profile.php');
    } elseif($do =='edit') {
      if($id == $user['id']){
        include('./include/templates/editProfile.php');
    
        // image settings
        $allowed_types = ["image/jpeg", "image/png", "image/gif"];
        $uploads_dir = "../assets/imgs/";
        $max_file_size = 1024 * 1024 * 5;
        $formErrors = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          if($_POST['submit'] == 'update') {
          $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
          $name = $_POST['name'];
          if(strlen($name) < 3) {
            $formErrors[] = 'name must be at least 3 characters long';
          }
          $email = $_POST['email'];
          if($email != $user['email']) {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $formErrors[] = 'email is not valid';
            }else{
              if(select('*','users',"where email = '$email'",'','limit 1')) {
                $formErrors[] = 'Email exists';
              }
            }
          }
          $password = $user['password'];
          if(filter_var($_POST['password'],FILTER_SANITIZE_STRING) != '') {
            if(strlen(filter_var($_POST['password'],FILTER_SANITIZE_STRING)) < 6) {
              $formErrors[] = 'password must be at least 6 characters long';
            }
            if(filter_var($_POST['password'],FILTER_SANITIZE_STRING) != filter_var($_POST['password_confirmation'],FILTER_SANITIZE_STRING)) {
              $formErrors[] = 'passwords do not match';
            }
            $password = sha1(filter_var($_POST['password'],FILTER_SANITIZE_STRING));
          }  
          if(isset($_FILES['image'])){
            // $target_file = select(select: 'image','users','where id ='.$user['id'],'','LIMIT 1')['image'];
            $target_file = $user['image'];
          } else {
            $target_file = '';
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
          }
          if(count($formErrors) > 0){
            echo '<div class="mt-4 max-w-[460px]">';
            foreach($formErrors as $formError) {
            ?>
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Error alert!: </span> <?php echo $formError; ?>
            </div>
            <?php 
            }
            echo '</div></div></div></div>';
          } else {
            // $imge = select('image','users','where id ='.$user['id'])['image'];
            $imge= $user['image'];
            $sql = "UPDATE users SET name = '$name', email = '$email', password = '$password', image = '$target_file' WHERE id = " .$user['id'];
            $stmt = $db->prepare($sql); 
            if($stmt->execute()) {
              if($imge != $target_file && !str_contains($imge,'default')){
                unlink($imge);
              }
              go('profile', 1 , 'Profile Updated successfully' ,'&id='.$user['id']);
            } else{
              go('profile',0, 'Failed to Update Profile','&id='.$user['id']);
            }
          }
          } else {
            go('profile','hid','','?id='.$user['id']);
          }
        }
      
      }else{
        go('dashboard',0,'Check URL');
      }
    }elseif($do == 'delete'){
      if(!$user){
        go('dashboard',0,'Check URL');
      }else{
        if($id == $user['id']){
          include('./include/templates/deleteProfile.php');
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($_POST['submit']=='delete'){
              $user = select('*','users','where id ='.$id,'','LIMIT 1');
              if($user){
                $imge = $user['image'];
                if($imge){
                  unlink($imge);
                }
                $sql = 'DELETE FROM users where id = '.$user['id'];
                $stmt = $db->prepare($sql);
              if($stmt->execute()){
                unset($_SESSION['userid']);
                go('dashboard',1,'Your Profile Is Deleted Successfully');
              }else{
                go('dashboard',0,'Something Wrong Try Again Later');
              }
          }else{
            go('dashboard',0,'Something Wrong Try Again Later');
          }
          }else{
            go('profile','12','','?id='.$id);
          }
        }
      }
    }
    }
  include('./include/templates/main/footer.php');
