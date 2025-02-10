<?php
  include('./init.php');
  $do = isset($_GET['do']) ? $_GET['do'] : go('dashboard',0,'Check URL');
  $itemid = isset($_GET['itemid']) ? $_GET['itemid'] : '';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $from = isset($_GET['from']) ? $_GET['from'] : 'comments';
  alertMessage();
  if($do== 'add'){
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
      if($user['id']){
        if($comment){
          $sql = 'INSERT INTO comments (comment, status, user_id, item_id) VALUES (:comment, :status, :user_id, :item_id)';
          $stmt = $db->prepare($sql);
          if($stmt->execute([
            ':comment' => $comment,
            ':status' => 0,
            ':user_id' => $user['id'],
            ':item_id' => $itemid
          ])) {
            go('back', 1 , 'Comment Added successfully');
          } else {
            go('back', 0 , 'Failed to add comment');
          }
        }
      } else {
        go('back', 0 , 'You must be logged in to add a comment');
      }
  }
  }elseif($do == 'edit'){
    if($user){
    $comment = select('*','comments','where id='.$id,'','limit 1');
    include('./include/templates/comment/editComment.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      if($_POST['submit'] == 'update'){
        $commentText = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
          if($commentText){
            if($comment['user_id'] == $user['id']){
              $sql = 'UPDATE comments SET comment = :comment, status = 0 where id ='.$id;
              $stmt = $db->prepare($sql);
              if($stmt->execute([
                ':comment' => $commentText,
                ])) {
                  go('items', 1 , 'Comment Updated successfully','&do=viewItem&id='.$comment['item_id']);
                } else {
                  go('items', 0 , 'Failed to Update comment','&do=viewItem&id='.$comment['item_id']);
                }
              
            } else {
              go('items',0,'This Is Not Your Comment','&do=viewItem&id='.$comment['item_id']);
            }
          } else {
            go('back',0,'This Is Not valid Comment');
          }
      } else {
        go('items','','','?do=viewItem&id='.$comment['item_id']);
      }
    }
  }else{
    go( 'back', 0 , 'You must be logged in to Edit Your comment');
  }
  }elseif($do == 'delete'){
    if(select('user_id','comments','where id='.$id,'','limit 1')['user_id'] == $user['id']){
      $sql = 'DELETE FROM comments WHERE id = :id';
      $stmt = $db->prepare($sql);
      if($stmt->execute([
        ':id' => $id,
      ])){
        go('back',1,'Comment Deleted Successfully');
      }else{
        go('back',0,'Failed To Delete Comment');
      }
    }else{
      go('back', 0 , 'You Can`t Delete Comments For Others');
    }
  }
  include('./include/templates/main/footer.php');
