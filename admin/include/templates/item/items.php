<div class="container mx-auto items">
<h1 class="text-[40px] font-bold text-center text-gray-700 dark:text-gray-200">Items</h1>
<?php if($do == 'view') {?>
<div class="flex justify-end items-center">
    <a href="items.php?from=<?php echo $from ?>&do=add" class="flex items-center font-medium  px-4 py-3 bg-gray-500 dark:bg-[#1f2937] hover:bg-[#2f3947] text-white rounded-lg mx-3 my-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" stroke-dasharray="64" stroke-dashoffset="64" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" begin="0.6s" dur="0.15s" values="0;0.3"/><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M7 12h10"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.75s" dur="0.2s" values="12;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M12 7v10"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.95s" dur="0.2s" values="12;0"/></path></g></svg>    <span class="mx-1">Add New Item</span>
    </a>
</div>
<?php } ?>
<div class="relative h-[fit-content] rounded-lg">
<?php if(count($items) == 0) { ?>
    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
      <span class="font-medium">Info alert!</span> There is No Items
    </div>
  <?php } elseif (count($items) == 1) {
    foreach($items as $item) {
    ?>
        <div class="grid mb-6 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 bg-white dark:bg-gray-800">
                  <figure class="grid grid-cols-1 md:grid-cols-2 p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
                  <div class="max-w-2xl mx-auto text-gray-500 dark:text-gray-400">
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Name:</h3>
                      <p class="ms-3"><?php echo $item['name'] ?></p>
                    </div>
                    <div class="flex items-center justify-center flex-col my-2">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Description</h3>
                      <p class="ms-3 max-w-[400px] leading-normal"><?php echo $item['description'] ?></p>
                    </div>
                    <div class="flex items-center justify-center my-2">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Price:</h3>
                      <p class="ms-3"><?php echo $item['price'] ?></p>
                    </div>
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Status:</h3>
                      <p class="ms-3"><?php echo $item['status'] ?></p>
                    </div>
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Country:</h3>
                      <p class="ms-3"><?php echo $item['country'] ?></p>
                    </div>
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Approved:</h3>
                      <a href="items.php?from=<?php echo $from ?>&do=change-approve&id=<?php echo $item['item_id'] ?>" class="hover:text-sky-600 ms-3 font-medium text-gray-500 dark:text-gray-400 hover:underline">
                        <?php  echo $item['approved'] ? 'Approved' : 'Unapproved' ?>
                      </a>
                    </div>
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Added Date:</h3>
                      <p class="ms-3"><?php echo $item['date'] ?></p>
                    </div>
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Category:</h3>
                      <p class="ms-3"><?php echo select('name', 'categories', 'where id = ' . $item['cat_id'],'','LIMIT 1')['name'] ?></p>
                    </div>
                    <a href="categories.php?from=<?php echo $from ?>&do=viewItemCategory&id=<?php echo $item['cat_id'] ?>" class="block text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Item`s Category</a> 
  
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Member:</h3>
                      <p class="ms-3"><?php echo select('name', 'users', 'where id = ' . $item['member_id'],'','LIMIT 1')['name'] ?></p>
                    </div>
                    <a href="members.php?from=<?php echo $from ?>&do=viewItemMember&id=<?php echo $item['item_id'] ?>" class="block text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Item`s Member</a> 

                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Total Item`s Comments:</h3>
                      <p class="ms-3"><?php echo count(select('id','comments','where item_id = ' . $item['item_id'])) ?></p>
                    </div>
                    <a href="comments.php?from=<?php echo $from ?>&do=viewItemComments&id=<?php echo $item['item_id'] ?>" class="block text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Item`s Comments</a> 
                    
                    <div class="flex items-center gap-4 justify-center mt-3">
                          <a href="items.php?do=CheckDelete&id=<?php echo $item['item_id']?>" class="px-3 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-red-700 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">
                            Delete
                          </a>
                          <a href="items.php?do=edit&id=<?php echo $item['item_id']?>" class="px-3 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                            Edit
                          </a>
                    </div>
                  
                  </div>
                  <div class="max-w-2xl mx-auto text-gray-500 dark:text-gray-400 ">
                    <div class="w-full mx-auto flex flex-col justify-between max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                      <div>
                        <img class="p-8 rounded-t-lg w-full" src="<?php echo isset($item['image']) && $item['image']!=''?$item['image']:'../assets/imgs/product-image.png' ?>" alt="product image" />
                      </div>
                      <div class="px-5 pb-5 mt-2">
                          <div class=" flex items-center justify-between ">
                            <span class=" text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                              <span class=""><?php echo substr($item['name'], 0, 15)?></span>
                            </span>
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
                              <a href="items.php?do=checkDelete&id=<?php echo $item['item_id']?>" class="px-3 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-red-700 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">
                                Delete
                              </a>
                              <a href="items.php?do=edit&id=<?php echo $item['item_id']?>" class="px-3 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                Edit
                              </a>
                            </div>
                          </div>
                          <div class="flex items-center justify-between mt-3 me-1">
                            <span class="text-gray-900 text-sm dark:text-gray-200"><?php echo count(select('id','comments','where item_id = '.$item['item_id']." and status = 1 ")) ?> Comments</span>
                            <span class="text-gray-900 text-sm dark:text-gray-200"><?php echo $item['date'] ?></span>
                          </div>
                      </div>
                    </div>
                  </div>
                  </figure>
                </div>  
    <?php }} elseif (count($items) > 1) { ?>
    <table class="w-full text-sm text-left rtl:text-right light:text-gray-500 dark:text-gray-400 text-center">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200 ">
            <tr class="bg-white border-b dark:odd:bg-gray-800 dark:odd:border-gray-700">
                <th scope="col" class="px-4 py-3  hidden sm:table-cell">
                    ID
                </th>
                <th scope="col" class="px-4 py-3">
                    Name
                </th>
                <th scope="col" class="px-4 py-3 hidden sm:table-cell">
                    Description
                </th>
                <th scope="col" class="px-4 py-3 hidden lg:table-cell ">
                    Price
                </th>
                <th scope="col" class="px-4 py-3 hidden md:table-cell">
                    Category
                </th>
                <th scope="col" class="px-4 py-3 hidden lg:table-cell">
                    Date
                </th>
                <th scope="col" class="px-4 py-3 ">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($items as $item) {
            ?>
                <tr class="<?php echo $item['approved'] == 0 ?'opacity-[0.95] line-through' : '' ?> details light:odd:bg-white light:even:bg-gray-100 border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white light:text-gray-800 md:text-[20px]">
                <th scope="row" class="px-4 py-3 font-bold whitespace-nowrap  hidden sm:table-cell"> 
                <?php echo $item['item_id'] ?>
                </th>
                <td class="px-4 py-3">
                <?php echo substr($item['name'],0,12).'...' ?>
                </td>
                <td class="px-4 py-3 hidden sm:table-cell">
                <?php echo substr($item['description'],0,12).'...' ?>
                </td>

                <td class="px-4 py-3 hidden lg:table-cell">
                <?php echo $item['price'] ?>
                </td>
                <td class="px-4 py-3 hidden md:table-cell">
                <?php echo substr(select('name', 'categories', 'where id = ' . $item['cat_id'],'','LIMIT 1')['name'],0,12).'...'; ?>
                </td>
                <td class="px-4 py-3 hidden lg:table-cell">
                    <?php echo $item['date'] ?>
                </td>
                <td class="px-4 py-3">
                    <div class="flex items-center justify-end">
                    <a href="items.php?from=<?php echo $from ?>&do=change-approve&id=<?php echo $item['item_id'] ?>" data-toolTip="approved" class="hover:text-sky-600 font-medium text-gray-400 hover:underline"><?php echo $item['approved'] == 1 ? 
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" stroke-dashoffset="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="14;0"/></path></g></svg>' 
                    :
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="0;14"/></path></g></svg>' ?>
                    </a>
                    <a href="items.php?from=<?php echo $from ?>&do=edit&id=<?php echo $item['item_id'] ?>" data-toolTip="Edit" class="hover:text-sky-600 font-medium text-blue-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21h18"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="20;0"/></path><path stroke-dasharray="48" stroke-dashoffset="48" d="M7 17v-4l10 -10l4 4l-10 10h-4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.6s" values="48;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M14 6l4 4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s" values="8;0"/></path></g></svg>
                    </a>
                    <a href="items.php?from=<?php echo $from ?>&do=checkDelete&id=<?php echo $item['item_id'] ?>" data-toolTip="Delete" class="hover:text-sky-600 font-medium text-[20px] text-red-600 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-dasharray="12" stroke-dashoffset="12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l7 7M12 12l-7 -7M12 12l-7 7M12 12l7 -7"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="12;0"/></path></svg>
                    </a>
                    <button class="show-details text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">details</button> 

                    </div>
                <!--  -->
                </td>
            </tr>
            <tr class="<?php echo $item['approved'] == 0 ?'opacity-[0.95]' : '' ?>  hidden light:odd:bg-white light:even:bg-gray-100 border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white light:text-gray-800 md:text-[20px]">
              <th scope="row" class="px-4 pt-3 font-medium text-gray-900  dark:text-white" colspan="10">
                <div class="grid mb-6 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 bg-white dark:bg-gray-800">
                  <figure class="grid grid-cols-1 md:grid-cols-2 p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
                  <div class="max-w-2xl mx-auto text-gray-500 dark:text-gray-400">
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Name:</h3>
                      <p class="ms-3"><?php echo $item['name'] ?></p>
                    </div>
                    <div class="flex items-center justify-center flex-col my-2">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Description</h3>
                      <p class="ms-3 leading-normal max-w-[400px]"><?php echo $item['description'] ?></p>
                    </div>
                    <div class="flex items-center justify-center my-2">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Price:</h3>
                      <p class="ms-3"><?php echo $item['price'] ?></p>
                    </div>
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Status:</h3>
                      <p class="ms-3"><?php echo $item['status'] ?></p>
                    </div>
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Country:</h3>
                      <p class="ms-3"><?php echo $item['country'] ?></p>
                    </div>
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Approved:</h3>
                      <a href="items.php?from=<?php echo $from ?>&do=change-approve&id=<?php echo $item['item_id'] ?>" class="hover:text-sky-600 ms-3 font-medium text-gray-500 dark:text-gray-400 hover:underline">
                        <?php  echo $item['approved'] ? 'Approved' : 'Unapproved' ?>
                      </a>
                    </div>
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Added Date:</h3>
                      <p class="ms-3"><?php echo $item['date'] ?></p>
                    </div>
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Category:</h3>
                      <p class="ms-3"><?php echo select('name', 'categories', 'where id = ' . $item['cat_id'],'','LIMIT 1')['name'] ?></p>
                    </div>
                    <a href="categories.php?from=<?php echo $from ?>&do=viewItemCategory&id=<?php echo $item['cat_id'] ?>" class="block text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Item`s Category</a> 
  
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Member:</h3>
                      <p class="ms-3"><?php echo select('name', 'users', 'where id = ' . $item['member_id'],'','LIMIT 1')['name'] ?></p>
                    </div>
                    <a href="members.php?from=<?php echo $from ?>&do=viewItemMember&id=<?php echo $item['member_id'] ?>" class="block text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Item`s Member</a> 
              
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Total Item`s Comments:</h3>
                      <p class="ms-3"><?php echo count(select('id','comments','where item_id = ' . $item['item_id'])) ?></p>
                    </div>
                    <a href="comments.php?from=<?php echo $from ?>&do=viewItemComments&id=<?php echo $item['item_id'] ?>" class="block text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Item`s Comments</a> 
                    <div class="flex items-center gap-4 justify-center mt-3">
                          <a href="items.php?do=CheckDelete&id=<?php echo $item['item_id']?>" class="px-3 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-red-700 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">
                            Delete
                          </a>
                          <a href="items.php?do=edit&id=<?php echo $item['item_id']?>" class="px-3 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                            Edit
                          </a>
                    </div>
                  </div>
                  <div class="max-w-2xl mx-auto text-gray-500 dark:text-gray-400 ">
            <div class="w-full mx-auto flex flex-col justify-between max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
              <div>
                  <img class="p-8 rounded-t-lg w-full" src="<?php echo isset($item['image']) && $item['image']!=''?$item['image']:'../assets/imgs/product-image.png' ?>" alt="product image" />
              </div>
              <div class="px-5 pb-5 mt-2">
                  <div class=" flex items-center justify-between ">
                    <span  class=" text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                      <span class=""><?php echo substr($item['name'], 0, 15)?></span>
                    </span>
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
                          <a href="items.php?do=CheckDelete&id=<?php echo $item['item_id']?>" class="px-3 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-red-700 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">
                            Delete
                          </a>
                          <a href="items.php?do=edit&id=<?php echo $item['item_id']?>" class="px-3 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                            Edit
                          </a>
                    </div>
                  </div>
                  <div class="flex items-center justify-between mt-3 me-1">
                    <span class="text-gray-900 text-sm dark:text-gray-200"><?php echo count(select('id','comments','where item_id = '.$item['item_id']." and status = 1 ")) ?> Comments</span>
                    <span class="text-gray-900 text-sm dark:text-gray-200"><?php echo $item['date'] ?></span>
                  </div>
              </div>
            </div>
          </div>
                  </figure>
                </div>  
              </th>
              </tr>
            <?php } ?>
        </tbody>
    </table>
  <?php } ?>
</div>
<?php if($do == 'view') {?>
<div class="flex justify-start items-center mt-2 last-add-button">
    <a href="items.php?from=<?php echo $from ?>&do=add" class="flex items-center font-medium  px-4 py-3 bg-gray-500 dark:bg-[#1f2937] hover:bg-[#2f3947] text-white rounded-lg mx-3 my-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" stroke-dasharray="64" stroke-dashoffset="64" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" begin="0.6s" dur="0.15s" values="0;0.3"/><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M7 12h10"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.75s" dur="0.2s" values="12;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M12 7v10"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.95s" dur="0.2s" values="12;0"/></path></g></svg>    <span class="mx-1">Add New Item</span>
    </a>
</div>
<?php } ?>
</div>
<script>
    let lastButton = document.querySelector('.last-add-button');
    if(lastButton){

      if(window.scrollY == 0) {
        
        lastButton.classList.add('hidden');
      } else {
        lastButton.classList.remove('hidden');
      }
    }
    window.addEventListener('scroll', () => {
     if(lastButton){
      lastButton.classList.remove('hidden');
    }
    })
</script>
<style>
    .items{
    td { 
        min-width: fit-content !important;
        max-width: 150px !important;
    }
}
</style>