<?php
$mainNav = true;
  include('./init.php');
  $do = isset($_GET['do']) ? $_GET['do'] : 'view';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $from = isset($_GET['from']) ? $_GET['from'] : 'categories';
  alertMessage();
  if (str_contains($do,'view')) {
    $categories = [];
    if($do == 'view') {
      $categories = select('*','categories','','order by date desc');
    } elseif ($do == 'viewItemCategory') {
      $categories = select('*','categories','where id = ' . $id,'LIMIT 1');
    }
    include('./include/templates/category/categories.php');
  } elseif($do == 'add'){
    include('./include/templates/category/addCategory.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      if($_POST['submit'] == 'add') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $visibility = $_POST['visibility'];
        $formErrors = [];
        if(select('name','categories',"where name = '$name'",'','LIMIT 1')) {
          $formErrors[] = 'This Category exists';
        }
        if(strlen($name) < 3) {
          $formErrors[] = 'name must be at least 3 characters long';
        }
        if(strlen($description) < 10) {
          $formErrors[] = 'description must be at least 10 characters long';
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
          $sql ='INSERT INTO categories (name, description, visibility) VALUES (:name, :description, :visibility)';
          $stmt = $db->prepare($sql);
          if($stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':visibility' => $visibility,
          ])) {
            go($from, 1 , 'Category added successfully');

          } else {
            go($from,0, 'Failed to add Category');
          }
        }
      } else {
        go($from);
      }
    }
    echo '</div></div></div></div>';

  } else if ($do == 'edit') {
    $category = select('*','categories','where id = ' . $id,'','LIMIT 1');
    include('./include/templates/category/editCategory.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      if($_POST['submit'] == 'update') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $visibility = $_POST['visibility'];
        $formErrors = [];
        if(strlen($name) < 3) {
          $formErrors[] = 'name must be at least 3 characters long';
        }
        if(strlen($description) < 10) {
          $formErrors[] = 'description must be at least 10 characters long';
        }
        if(count($formErrors) > 0){
            echo '<div class="mt-4 max-w-[460px]">';
            foreach($formErrors as $formError) { ?>
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
              <span class="font-medium">Error alert!: </span> <?php echo $formError; ?>
            </div>
            <?php }
          echo '</div></div></div></div>';
        } else {
          $sql = 'UPDATE categories SET name = :name, description = :description, visibility = :visibility WHERE id = :id';
          $stmt = $db->prepare($sql);
          if($stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':visibility' => $visibility,
            ':id' => $id
          ])) {
            go($from, 1 , 'Category Updated successfully');
          } else {
            go($from,0, 'Failed to Update Category');
          }
        }
    } else {
      go($from);
      }
  }
  echo '</div></div></div></div>';

  }elseif($do=='checkDelete'){
    include('./include/templates/category/deleteCategory.php');
  } else if ($do == 'delete'){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($_POST['submit'] == 'delete') {
        $sql = 'DELETE FROM categories WHERE id = :id';
        $stmt = $db->prepare($sql);
        if($stmt->execute([
          ':id' => $id
        ])) {
          go($from, 1 , 'Category Deleted successfully');
        } else {
          go($from,0, 'Failed to Delete Category');
        }
      }else{
        go($from, 0, 'Cancelled Successfully');
      }
    }

  } else if($do == 'change-visibility'){
    $visibility = !select('visibility','categories','where id = ' . $id,'','LIMIT 1')['visibility'];
    $sql = 'UPDATE categories SET visibility = :visibility WHERE id = :id';
    $stmt = $db->prepare($sql);
    if($stmt->execute([
      ':visibility' => $visibility,
      ':id' => $id
    ])) {
      go($from, 1 , 'Category Visibility Updated successfully');
    } else {
      go($from,0, 'Failed to Update Category Visibility');
    }
  } 
  include('./include/templates/main/footer.php');
