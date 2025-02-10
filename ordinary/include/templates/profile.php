<div class="mb-10 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 min-h-screen p-6">

  <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
    <!-- Profile Header -->
     <?php if(isset($_SESSION['userid']) && $_SESSION['userid'] == $id) {?>
     <div class="flex justify-between items-center">
     <a href="./profile.php?do=delete&id=<?php echo isset($_SESSION['userid']) ? $_SESSION['userid'] : ''?>" class="bg-red-700 hover:bg-red-800 flex items-center transition  rounded-lg px-4 py-2 text-sm text-gray-100 " role="menuitem" tabindex="-1" id="user-menu-item-0" >
     <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21v-1c0 -2.21 1.79 -4 4 -4h4c2.21 0 4 1.79 4 4v1"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="20;0"/></path><path stroke-dasharray="20" stroke-dashoffset="20" d="M9 13c-1.66 0 -3 -1.34 -3 -3c0 -1.66 1.34 -3 3 -3c1.66 0 3 1.34 3 3c0 1.66 -1.34 3 -3 3Z"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.2s" values="20;0"/></path><path stroke-dasharray="10" stroke-dashoffset="10" d="M15 3l6 6"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s" values="10;0"/></path><path stroke-dasharray="10" stroke-dashoffset="10" d="M21 3l-6 6"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.2s" values="10;0"/></path></g></svg>
     <span class="mx-1">
              Delete Profile
            </span>
    </a>
     <a href="./profile.php?do=edit&id=<?php echo isset($_SESSION['userid']) ? $_SESSION['userid'] : ''?>" class="bg-blue-700 hover:bg-blue-800 flex items-center transition rounded-lg  px-4 py-2 text-sm text-gray-100 " role="menuitem" tabindex="-1" id="user-menu-item-0" >
     <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21h18"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="20;0"/></path><path stroke-dasharray="48" stroke-dashoffset="48" d="M7 17v-4l10 -10l4 4l-10 10h-4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.6s" values="48;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M14 6l4 4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s" values="8;0"/></path></g></svg>
                 <span class="mx-1">
              Edit Profile
            </span>
    </a>
     </div>
     <?php }?>
    <div class="text-center mt-4">
      <img 
        src="<?php echo isset($userData['image']) && $userData['image']!=''?$userData['image']:'../assets/imgs/default.webp'?>" 
        alt="Profile Picture" 
        class="w-20 h-20 mx-auto rounded-full border-4 border-blue-500 dark:border-blue-400">
      <h1 class="mt-2 text-2xl font-bold"><?php echo $userData['name']; ?></h1>
      <!-- <p class="text-gray-600 dark:text-gray-400">Web Developer</p> -->
    </div>
    
    <div class="mt-6 grid grid-cols-2 text-center">
      <div>
        <h3 class="text-lg font-bold"><?php echo count($items) ?></h3>
        <p class="text-gray-500 dark:text-gray-400 text-sm">Posts</p>
      </div>
      <div>
        <h3 class="text-lg font-bold"><?php 
        $commentsForYourItems = 0;
        foreach($items as $item) {
          $commentsForYourItems += count(select('id','comments','where item_id = '.$item['item_id']));
        }
        echo $commentsForYourItems;
        ?></h3>
        <p class="text-gray-500 dark:text-gray-400 text-sm">Comments</p>
      </div>
    </div>
    <!-- User Posts -->
     <?php if(count($items)>0){?>
    <div class="mt-6">
      <h2 class="text-xl font-semibold mb-4">Recent Posts</h2>
        <!-- Post Item -->
        <div class="container mx-auto mb-10">
          <div class="grid grid-cols-1  md:grid-cols-2 gap-4">
            <?php
              foreach($items as $item){ ?>
          <div class="<?php echo $item['approved']?'':'not-approved-card' ?> max-w-2xl mx-auto text-gray-500 dark:text-gray-400">
            <div class="w-full mx-auto flex flex-col justify-between max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
              <div>
                  <img class="p-4 rounded-t-lg w-full" src="<?php echo isset($item['image']) && $item['image']!=''?$item['image']:'../assets/imgs/product-image.png' ?>" alt="product image" />
              </div>
              <div class="px-5 pb-5 mt-2">
                  <div class=" flex items-center justify-between " data-toolTip="Show In Details">
                    <a href="items.php?do=viewItem&id=<?php echo $item['item_id']?>" class="hover:text-sky-600 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                      <span class=""><?php echo substr($item['name'], 0, 20)?></span>
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
                          <a href="items.php?do=delete&id=<?php echo $item['item_id']?>" class="px-3 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-red-700 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">
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
    </div>
    <?php  } else {?>
    
    <?php  }?>
  </div>
</div>


