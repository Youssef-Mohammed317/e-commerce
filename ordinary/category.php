<?php 
include('./init.php');

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $category = select('*','categories',"where id = $id and visibility = 1",'','LIMIT 1');
  $items = select('*','items','where cat_id = ' . $id ." and approved = 1");
  include('./include/templates/category/category.php');
}

include('./include/templates/main/footer.php');