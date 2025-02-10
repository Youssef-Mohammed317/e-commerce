<div class="container mx-auto mb-10 px-2">
  <div class="details flex items-center justify-center mt-10 mb-5">
    <h3 style="user-select: none;" class="show-details cursor-pointer hover:text-sky-600 text-3xl font-semibold text-gray-900 dark:text-white"><?php echo $category['name']; ?></h3>
  </div>

  <figure class="details hidden mb-4 rounded-lg flex flex-col items-center justify-center px-8 pb-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
    <blockquote class="max-w-2xl mx-auto text-gray-500 dark:text-gray-400">
      <div class="flex items-center justify-center pt-3">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Name:</h3>
        <p class="ms-3"><?php echo $cat['name'] ?></p>
      </div>
      <div class="flex items-center justify-center">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Description:</h3>
        <p class="ms-3"><?php echo $cat['description'] ?></p>
      </div>

      <div class="flex mt-2 items-center justify-center">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Comments:</h3>
        <a  class="hover:text-sky-600 ms-3 font-medium text-gray-500 dark:text-gray-400 hover:underline me-3">
          <?php echo $cat['allow_comment'] ? 'Allowed':'Not Allowed' ?>
        </a>
      </div>
      <div class="flex mt-2 items-center justify-center">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Advertisements:</h3>
        <a  class="hover:text-sky-600 ms-3 font-medium text-gray-500 dark:text-gray-400 hover:underline me-3">
          <?php echo $cat['allow_ads']?'Allowed':'Not Allowed' ?>
        </a>
      </div>
      <div class="flex items-center justify-center">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Total Category`s Items:</h3>
        <p class="ms-3"><?php echo count(select('item_id','items','where cat_id = '.$cat['id'])) ?></p>
      </div>
    </blockquote>
  </figure>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 content-between">
  <?php
  foreach($items as $item){ ?>
          <div class="card <?php echo $item['approved']?'':'not-approved-card' ?> mx-auto text-gray-500 dark:text-gray-400 w-full">
            <a href="profile.php?id=<?php echo $item['member_id'] ?>" class="right-5 top-5 show-profile px-4 py-2.5 text-sm font-medium text-center text-white bg-sky-600 rounded-lg hover:bg-sky-700">Show User Profile</a>
            <div class="w-full mx-auto flex flex-col justify-between max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
              <div>
                  <img class="px-2 py-3 rounded-t-lg w-full h-96" src="<?php echo $item['image']==''? '../assets/imgs/product-image.png':$item['image']?>" alt="product image" />
              </div>
              <div class="px-2 pb-5 mt-2">
                  <div class=" flex items-center justify-between " data-toolTip="Show In Details">
                    <a href="items.php?do=viewItem&id=<?php echo $item['item_id']?>" class="hover:text-sky-600 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                      <span class=""><?php echo substr($item['name'], 0, 15)?></span>
                    </a>
                  </div>
                  <div class="flex items-center justify-between my-3 dark:text-gray-400 text-gray-500">
                    <span>Category: <?php echo select('name','categories',"where id =". $item['cat_id'],'','LIMIT 1')['name']?></span>
                    <span class="text-sm dark:text-gray-400 text-gray-500">Status: <?php echo $item['status']?></span>
                  </div>
                  <div class="mb-5 dark:text-gray-400  text-gray-500 text-wrap text-start h-[78px] overflow-hidden">
                    <?php echo substr($item['description'], 0, 70) . '...'; ?>
                  </div>
                  <div class="flex items-center justify-between">
                    <span class="text-2xl font-bold text-gray-900 dark:text-white">$<?php echo $item['price']; ?></span>
                    <div class="flex items-center gap-2">
                      <?php 
                        if(isset($_SESSION['userid']) && $_SESSION['userid'] == $item['member_id']) {?>
                          <a href="items.php?do=checkDelete&id=<?php echo $item['item_id']?>" class="px-3 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-red-700 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">
                            Delete
                          </a>
                          <a href="items.php?do=edit&id=<?php echo $item['item_id']?>" class="px-3 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                            Edit
                          </a>
                        <?php } else {?>
                              <a href="cart.php?from=cart&do=add&item_id=<?php echo $item['item_id']?>" class="px-3 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-yellow-700 rounded-md hover:bg-yellow-600 focus:outline-none focus:bg-yellow-600">
                                Add To Cart
                              </a>
                        <?php }?>
                    </div>
                  </div>
                  <div class="flex items-center justify-between mt-3 me-1">
                    <span class="text-gray-900 text-sm dark:text-gray-200"><?php echo count(select('id','comments','where item_id = '.$item['item_id']." and status = 1 ")) ?> Comments</span>
                    <span class="text-gray-900 text-sm dark:text-gray-200"><?php echo $item['date'] ?></span>
                  </div>
              </div>
            </div>
          </div>
  <?php } ?>
  </div>
</div>
