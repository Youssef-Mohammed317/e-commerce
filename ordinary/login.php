<?php
include('./init.php');
$from = 'dashboard';
include('./include/templates/login.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  if($_POST['submit'] == 'add') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    setcookie('email', $email, time() + 3600);
    $formErrors = [];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $formErrors['email'] = 'email is not valid';
    }
    if(strlen($password) < 6) {
      $formErrors['password'] = 'password must be at least 6 characters long';
    }
    $user = select('*','users','where email = "' . $email.'"','','LIMIT 1');
    if(!$user) {
      $formErrors['email'] = 'email is not valid';
    } else {
      if($user['password'] != sha1($password)) {
        $formErrors['password'] = 'password is not valid';
      }
    }
    if(count($formErrors) > 0){
      echo '<div class="mt-4 max-w-[460px]">';
      foreach($formErrors as $formError) { ?>
      <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
      <span class="font-medium">Error alert!: </span> <?php echo $formError; ?>
      </div>
      <?php } echo '</div></div></div></div>';
    } else {

      $_SESSION['userid'] = $user['id'];
      setcookie('email', $email, time() - 1000);
      if($_POST['remember'] == '1') {
        setcookie('rememberMe', $user['id'], time() + 3600 * 24 * 30 * 12);
      }
      go($from);
    }
  }
}
include('./include/templates/main/footer.php');