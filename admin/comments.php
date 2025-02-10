<?php
$mainNav = true;
  include('./init.php');
  $do = isset($_GET['do']) ? $_GET['do'] : 'view';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $from = isset($_GET['from']) ? $_GET['from'] : 'comments';
  $items = select('*','items');
  $users = select('*','users');
  alertMessage();
  if (str_contains($do,'view')) {
    $comments = [];
    if($do == 'view') {
      $comments = select('*','comments','','order by date desc');
    } elseif($do == 'viewApproved') {
      $comments = select('*','comments', "where status = 1",'order by date desc');
    } elseif($do == 'viewPending') {
      $comments = select('*','comments', "where status = 0",'order by date desc');
    } elseif($do == 'viewMemberComments') {
      $comments = select('*','comments','where user_id = '.$id,'order by date desc');
    } elseif($do == 'viewItemComments') {
      $comments = select('*','comments','where item_id = '.$id,'order by date desc');
    } elseif($do == 'viewComment'){
      $comments = select('*','comments','where id = '.$id);
    }
    include('./include/templates/comment/comments.php');
  } else if($do == 'edit'){
    $comment = select('*','comments','where id = ' . $id ,'','LIMIT 1');
    include('./include/templates/comment/editComment.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      if($_POST['submit'] == 'update') {
        
      $status = $_POST['status'];
      $comment = $_POST['comment'];
      $user_id = $_POST['user_id'];
      $item_id = $_POST['item_id'];

      $formErrors = [];
      if(strlen($comment) < 3) {
        $formErrors[] = 'comment must be at least 3 characters long';
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
    }else{
        $sql = 'UPDATE comments SET comment = :comment, status = :status, user_id = :user_id, item_id = :item_id WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->execute([
          ':id' => $id,
          ':comment' => $comment,
          ':user_id' => $user_id,
          ':status' => $status,
          ':item_id' => $item_id,
        ]);
        if($stmt->execute()) {
          go($from, 1 , 'Comment updated successfully');
        } else {
          go($from, 0 , 'Failed to update comment');
        }
    }
    }
      else{
        go($from);
      }
    }
    echo '</div></div></div></div>';

  } elseif($do=='checkDelete'){
    include('./include/templates/comment/deleteComment.php');
  }else if($do == 'delete'){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($_POST['submit'] == 'delete'){
        $sql = 'DELETE FROM comments WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->execute([
          ':id' => $id
        ]);
        if($stmt->execute()) {
          go($from, 1 , 'Comment Deleted successfully');
        } else {
          go($from, 0 , 'Failed to Delete comment');
        }
      }else{
        go($from, 0, 'Cancelled Successfully');
      }
    }
  } else if($do == 'change-status'){
    $userStatus = select('status','users','where id = '.select('user_id','comments','where id = '.$id,'','LIMIT 1')['user_id'],'','LIMIT 1')['status'];
    if($userStatus == 0){
      go($from, 0, 'This User Is Not Approved');
    }else{

      $status = !select('status','comments','where id = ' . $id,'','LIMIT 1')['status'];
      $sql = 'UPDATE comments SET status = :status WHERE id = :id';
      $stmt = $db->prepare($sql);
      $stmt->execute([
        ':status' => $status,
        ':id' => $id
      ]);
      if($stmt->execute()) {
        go($from, 1 , 'Comment updated successfully');
      } else {
        go($from, 0 , 'Failed to update comment');
      };
    }
  }
  include('./include/templates/main/footer.php');
