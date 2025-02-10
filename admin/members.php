<?php
  $mainNav = true;
  include('./init.php');
  $do = isset($_GET['do']) ? $_GET['do'] : 'view';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $from = isset($_GET['from']) ? $_GET['from'] : 'members';
  alertMessage();
  if (str_contains($do,'view')) {
  // View Members
  $members = [];
  if($do == 'view'){
    $members = array_merge( select('*','users','where rank != "admin" and status = 0'), 
    select('*','users','where rank != "admin" and status = 1'));
  } elseif ($do == 'viewApproved'){
    $members = select('*','users','where status = 1');
  } elseif ($do == 'viewPending'){
    $members = select('*','users','where status = 0');
  } elseif ($do == 'viewItemMember'){
    $members = select('*','users','where id = ' . $id);
  } elseif ($do == 'viewCommentMember'){
    $members = select('*','users','where id = '.$id);
  }
  // edit
  include('./include/templates/member/members.php');
  } else if ($do == 'edit') {
    // Edit Members
    $member = select('*','users','where id = '.$id,'','LIMIT 1');
    if($member){
      include('./include/templates/member/editMember.php');
      $formErrors = [];
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['submit'] == 'update') {
          $name = $_POST['name'];
          // image settings
          $allowed_types = ["image/jpeg", "image/png", "image/gif"];
          $uploads_dir = "../assets/imgs/";
          $max_file_size = 5 * 1024 * 1024; 
        
          $name = $_POST['name'];
          if(strlen($name) < 3) {
            $formErrors['name'] = 'name must be at least 3 characters long';
          }
          $email = $_POST['email'];
          if($email != $member['email']) {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $formErrors['email'] = 'email is not valid';
            } else {
              if(select('*','users',"where email = '$email'",'','LIMIT 1')) {
                $formErrors['email'] = 'Email exists';
              }
            }
          }
          $password = $member['password'];
          if($_POST['password'] != '') {
            if(strlen($_POST['password']) < 6) {
              $formErrors['password'] = 'password must be at least 6 characters long';
            }
            if($_POST['password'] != $_POST['password_confirmation']) {
              $formErrors['password_confirmation'] = 'passwords do not match';
            }
            $password = sha1($_POST['password']);
          }
          if(isset($_FILES['image'])){
            $target_file = select('image','users','where id = '.$id ,'', 'LIMIT 1')['image'];
          }else{
            $target_file = '';
          }
          if(isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
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
            $imge = select('image','users','where id ='.$id,'','LIMIT 1')['image'];
            if($target_file != $imge && !str_contains($imge,'default')){
              unlink($imge);
            }
            $sql = "UPDATE users SET name = '$name', email = '$email',image = '$target_file' , password = '$password', status = '1' WHERE id = $id"; 
            $stmt = $db->prepare($sql);
            if($stmt->execute()) {
              go($from, 1 , 'Member Updated successfully');
            } else {
              go($from,0, 'Failed to Update Member');
            }
          }
        } else {
          go($from);
        }
      }
    } else {
      go('logout');
    }
    echo '</div></div></div></div>';
  }else if($do == 'checkDelete'){
    include('./include/templates/member/deleteMember.php');
  } 
  else if ($do == 'delete'){
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      if($_POST['submit'] == 'delete') {
        $user = select('*','users',"where id = '$id'",'','LIMIT 1');
        if($user) {
          $imge = $user['image'];
          if($imge){
            unlink($imge);
          }
          $stmt = $db->prepare("DELETE FROM users WHERE id = '$id'");
          if($stmt->execute()) {
            go($from, 1 , 'Member Deleted successfully');
          } else {
            go($from,0, 'Failed to Delete member');
          }
        } else {
          go('logout');
        }
      }else{
        go($from, 0, 'Cancelled Successfully');
      }
    }

  } else if($do == 'add'){
    include('./include/templates/member/addMember.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      if($_POST['submit'] == 'add') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // image settings
        $allowed_types = ["image/jpeg", "image/png", "image/gif"];
        $uploads_dir = "../assets/imgs/";
        $max_file_size = 5 * 1024 * 1024; 
        
        $formErrors = [];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formErrors['email'] = 'email is not valid';
      } else {
        if(select('*','users',"where email = '$email'",'','LIMIT 1')) {
          $formErrors['email'] = 'Email exists';
        } else {
        }
      }
      if(strlen($password) < 6) {
        $formErrors['password'] = 'password must be at least 6 characters long';
      }
      if($password != $_POST['password_confirmation']) {
        $formErrors['password_confirmation'] = 'passwords do not match';
      }
      if(strlen($name) < 3) {
        $formErrors['name'] = 'name must be at least 3 characters long';
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
          $password =sha1($password);
          $sql = "INSERT INTO users (name, email, password, status, image) VALUES ('$name', '$email', '$password', '1' ,' $target_file')";
          $stmt = $db->prepare($sql); 
          if($stmt->execute()) {
            go($from, 1 , 'Member added successfully');
          } else {
            go($from,0, 'Failed to add member');
          }
        }
      } else {
        go($from);
      }
    }    
    echo '</div></div></div></div>';

  } else if($do == 'change-status'){
    // echo 10;
      $status = select('status','users','where id = '.$id,'','LIMIT 1')['status'];
      $sql = "UPDATE users SET status = !$status WHERE id = $id";
      $stmt = $db->prepare($sql);
      if($stmt->execute()) {
        go($from, 1 , 'Member Updated successfully');
      } else {
        go($from,0, 'Failed to Update Member');
      }
  }
  include('./include/templates/main/footer.php');
