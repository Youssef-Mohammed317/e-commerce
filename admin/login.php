<?php
include('./init.php');
include('./include/templates/login.php');
$formErrors = [];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  if($_POST['submit'] == 'login') {
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $formErrors[] = 'email is not valid';
    }
    $password = $_POST['password'];
    if(strlen($password) < 6) {
      $formErrors[] = 'password must be at least 6 characters';
    } else {
      $password = sha1($password);
      $loginUser = select('*', 'users', "WHERE email = '$email' AND password = '$password'",'');
      if(count($loginUser) > 0) {
        print_r($loginUser);
        if($loginUser[0]['rank'] == 'admin') {
          $_SESSION['user_id'] = $loginUser[0]['id'];
          if($_POST['remember'] == '1') {
            setcookie('rememberMeAdmin', $loginUser[0]['id'], time() + 3600 * 24 * 30 * 12);
          }
          go('dashboard',1,'Login Successfully');
        } else {
          $_SESSION['userid'] = $loginUser[0]['id'];
          if($_POST['remember'] == '1') {
            setcookie('rememberMe', $loginUser[0]['id'], time() + 3600 * 24 * 30 * 12);
          }
          header('Location: ../ordinary/index.php');
        }
      } else {
        $formErrors[] = 'email or password is incorrect';
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
    } 
  } else {
    header('Location: ../ordinary/index.php');
  }
}

include('./include/templates/main/footer.php');
