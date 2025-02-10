<?php 

function go($from = 'dashboard', $status = null, $message = '',$do = '') {
  if($from == 'back'){
    if($status == 0 || $status == 1){
      header('Location: ' . $_SERVER['HTTP_REFERER'] . '&status=' . $status . '&message=' . $message);
    } else{
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
  } else {
    if($status == 0 || $status == 1){
      header('Location: ' . $from . '.php?status=' . $status . '&message=' . $message . $do);
    }else{
      header("Location: " . $from . ".php" . $do);
    }
  }
}

function select($select , $table, $where = '', $order = '', $limit = '') {
  // database settings
  global $db;
  $dsn = 'mysql:host=localhost;dbname=e-commerce';
  $username= 'root';
  $password= '';
  $db = null;
  try {
    $db = new PDO($dsn, $username, $password);
  } catch (PDOException $e) {
    echo $e->getMessage();
    die;
  }
  $sql = "SELECT $select FROM $table $where $order $limit";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  if(str_contains($limit,1)){
    if(count($result) > 0){
      $result = $result[0];
    }
  }
  return $result;
}

function alertMessage(){
  $status = isset($_GET['status']) ? $_GET['status'] : '';
  $message = isset($_GET['message']) ? $_GET['message'] : '';
  ?>
    <div class="alert <?php echo $status == 1 ? '' : 'hidden'; ?> p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
      <span class="font-medium">Info alert!</span> <?php echo $message; ?>
    </div> 
    <div class="alert <?php echo $status == 0 ? '' : 'hidden'; ?> danger p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
      <span class="font-medium">Danger alert!</span> <?php echo $message; ?>
    </div> 
    <script>
      setTimeout( function(){
        $('.alert').slideUp();
      }, 3000)
    </script>
  <?php
}