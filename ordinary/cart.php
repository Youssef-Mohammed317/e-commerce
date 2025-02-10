<?php 
include('init.php');
if(!isset($_SESSION['userid'])){
  
  header('Location: login.php');
}
$do = isset($_GET['do']) ? $_GET['do'] : 'view';
$item_id = isset($_GET['item_id']) ? $_GET['item_id'] : '';
$from = isset($_GET['from']) ? $_GET['from'] : 'cart';
$id = isset($_GET['id']) ? $_GET['id'] : ''; // for edit and delete functionality
// do view or add or delete or edit
alertMessage();
if($do == 'view'){
  $cartItems = select('*' , 'cart','where user_id = '.$_SESSION['userid'],'','');
  include('include/templates/cart/cart.php');
}elseif($do == 'add'){
  if($item_id){
    $item = select('*' , 'items','where item_id = '.$item_id,'','LIMIT 1');
    if($item){
      $cart = select('*' , 'cart','where item_id = '.$item_id.' and user_id = '.$_SESSION['userid'],'','LIMIT 1');
      if($cart){
        $sql = 'UPDATE cart SET quantity = quantity + 1 WHERE item_id = '.$item_id.' and user_id = '.$_SESSION['userid'];
        $stmt = $db->prepare($sql);
        if($stmt->execute()){
          go($from,1,'Item added to cart successfully');
        }else{
          go($from,0,'Error adding item to cart');
        }
      } else {
        $sql = 'INSERT INTO cart (item_id, user_id, quantity) VALUES ('.$item_id.', '.$_SESSION['userid'].', 1)';
        $stmt = $db->prepare($sql);
        if($stmt->execute()){
          go($from,1,'Item added to cart successfully');
        }else{
          go($from,0,'Error adding item to cart');
        }
      }
    }else{
      go($from,0,'Item not found');
    }
  }

}elseif($do == 'checkDelete'){
  include('include/templates/cart/checkDelete.php');
}elseif($do == 'delete'){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['submit'] == 'delete'){
      $cart = select('*' , 'cart','where id = '.$id,'','LIMIT 1');
      if($cart){
        if($cart['user_id'] != $_SESSION['userid']){         
          go($from,0,'You are not allowed to delete this item');
        } else {
          $sql = 'DELETE FROM cart WHERE id = '.$id;
          $stmt = $db->prepare($sql);
          if($stmt->execute()){
            go($from,1,'Item deleted successfully');
          }else{
            go($from,0,'Error deleting item');
          }
        }
      }      
      
    }
    else{
      go($from,1,'Cancelled deleting item');
    }
  }
}elseif($do == 'edit'){
  // echo 'edit';
  $cart = select('*' , 'cart','where id = '.$id,'','LIMIT 1');
  if($cart){
    if($cart['user_id'] != $_SESSION['userid']){         
      go($from,0,'You are not allowed to edit this item');
    }else{
      $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
      $sql = 'UPDATE cart SET quantity = '.$quantity.' WHERE id = '.$id;
      $stmt = $db->prepare($sql);
      if($stmt->execute()){
        print_r(select('*' , 'cart','where id = '.$id,'','LIMIT 1'));
        go('cart',1,'Quantity updated successfully');
      }else{
        go('cart',0,'Error updating quantity');
      }
    }
  }

}