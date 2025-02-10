<?php 
include('./init.php');
$from = 'dashboard';
include('./include/templates/register.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  if($_POST['submit'] == 'add') {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    
    $target_file = '';
    // image settings
    $allowed_types = ["image/jpeg", "image/png", "image/gif"];
    $uploads_dir = "../assets/imgs/";

    $max_file_size = 5 * 1024 * 1024; 
    setcookie('email', $email, time() + 3600);
    setcookie('name', $name, time() + 3600);
    $formErrors = [];
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $formErrors['email'] = 'email is not valid';
  } else {
    if(select('*','users',"where email = '$email'",'','LIMIT 1')) {
      $formErrors['email'] = 'Email exists';
    }
  }
  if(strlen($password) < 6) {
    $formErrors['password'] = 'password must be at least 6 characters long';
  }
  if($password != filter_var($_POST['password_confirmation'], FILTER_SANITIZE_STRING)) {
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
      $rank = 'ordinary';
      $status = 0;
      $sql = "INSERT INTO users (name, email, password, rank, status, image) VALUES ('$name', '$email', '$password', '$rank', '$status' ,'$target_file')";
      $stmt = $db->prepare($sql); 
      if($stmt->execute()) {
        $_SESSION['userid'] = $db->lastInsertId();
        setcookie('email', $email, time() - 1000);
        setcookie('name', $name, time() - 1000);
        if($_POST['remember'] == '1') {
          setcookie('rememberMe', $user['id'], time() + 3600 * 24 * 30 * 12);
        }
        go($from, 1 , 'Registration Done successfully');
      } else {
        go($from,0, 'Failed to Register');
      }
    }
  } else {
    go('login');
  }
}
include('./include/templates/main/footer.php');