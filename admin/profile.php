<?php
  $mainNav = true;
  include('./init.php');
  alertMessage();
    include('./include/templates/editProfile.php');
    $formErrors = [];
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      if($_POST['submit'] == 'update') {
      $name = $_POST['name'];
      $name =  $_POST['name'];
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
      if($_POST['password'] != '') {
        if(strlen($_POST['password']) < 6) {
          $formErrors[] = 'password must be at least 6 characters long';
        }
        if($_POST['password'] != $_POST['password_confirmation']) {
          $formErrors[] = 'passwords do not match';
        }
        $password = sha1($_POST['password']);
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
        // $imge = select('image','users','where id ='.$id,'','LIMIT 1')['image'];
        $sql = "UPDATE users SET name = '$name', email = '$email', password = '$password' WHERE rank = 'admin'";
        $stmt = $db->prepare($sql); 
        if($stmt->execute()) {
          go('dashboard', 1 , 'Profile Updated successfully');
        } else{
          go('dashboard',0, 'Failed to Update Profile');
      }
    }
      } else {
        go('dashboard');
      }
    }
  include('./include/templates/main/footer.php');
