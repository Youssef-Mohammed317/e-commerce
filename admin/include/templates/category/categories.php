<div class="container mx-auto cats">
<h1 class="text-[40px] font-bold text-center text-gray-700 dark:text-gray-200">Categories</h1>
<?php if($do == 'view') { ?>
<div class="flex justify-end items-center ">
    <a href="categories.php?from=<?php echo $from ?>&do=add" class="flex items-center font-medium  px-4 py-3 bg-gray-500 dark:bg-[#1f2937] hover:bg-[#2f3947] text-white rounded-lg mx-3 my-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" stroke-dasharray="64" stroke-dashoffset="64" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" begin="0.6s" dur="0.15s" values="0;0.3"/><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M7 12h10"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.75s" dur="0.2s" values="12;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M12 7v10"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.95s" dur="0.2s" values="12;0"/></path></g></svg>    <span class="mx-1">Add New Category</span>
    </a>
</div>
<?php }?>
<div class="relative h-[fit-content] rounded-lg">
<?php if(count($categories) == 0) { ?>
    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
      <span class="font-medium">Info alert!</span> There is No Categories
    </div>
  <?php } elseif (count($categories) == 1) {
    foreach($categories as $cat) {
    ?>
   <div class="grid mb-4 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 bg-white dark:bg-gray-800">
                  <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
                  <blockquote class="max-w-2xl mx-auto text-gray-500 dark:text-gray-400">
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Name:</h3>
                      <p class="ms-3"><?php echo $cat['name'] ?></p>
                    </div>
                    <div class="flex items-center justify-center flex-col my-2">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Description</h3>
                      <p class="ms-3 leading-normal max-w-[400px]"><?php echo $cat['description'] ?></p>
                    </div>
                    <div class="flex mt-2 items-center justify-center my-2">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Visibility:</h3>
                      <a href="./categories.php?from=<?php echo $from ?>&do=change-visibility&id=<?php echo $cat['id'] ?>" class="hover:text-sky-600 ms-3 font-medium text-gray-500 dark:text-gray-400 hover:underline me-3">
                        <?php echo $cat['visibility']?'Visible':'Hidden' ?>
                      </a>
                    </div>
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Added Date:</h3>
                      <p class="ms-3"><?php echo $cat['date'] ?></p>
                    </div>
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Total Category`s Items:</h3>
                      <p class="ms-3"><?php echo count(select('item_id','items','where cat_id = '.$cat['id'])) ?></p>
                    </div>
                    <a href="items.php?from=<?php echo $from ?>&do=viewCategoryItems&id=<?php echo $cat['id'] ?>" class="text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md me-3">Show Category`s Items</a> 
                    <div class="flex mt-2 items-center justify-center gap-3">
                      <a href="categories.php?from=<?php echo $from ?>&do=edit&id=<?php echo $cat['id'] ?>" class="px-3 py-1.5 rounded-md bg-sky-600 hover:bg-sky-700 text-white">Edit</a>
                      <a href="categories.php?from=<?php echo $from ?>&do=checkDelete&id=<?php echo $cat['id'] ?>" class="px-3 py-1.5 rounded-md bg-red-600 hover:bg-red-700 text-white">Delete</a>
                    </div>
                  </blockquote>
                  </figure>
                </div> 
  <?php }} elseif (count($categories) > 1) { ?>
    <table class="w-full text-sm text-left rtl:text-right light:text-gray-500 dark:text-gray-400 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200 ">
            <tr class="bg-white border-b dark:odd:bg-gray-800 dark:odd:border-gray-700">
                <th scope="col" class="px-4 py-3">
                    ID
                </th>
                <th scope="col" class="px-4 py-3">
                    Name
                </th>
                <th scope="col" class="px-4 py-3 hidden sm:table-cell">
                    Description
                </th>
                <th scope="col" class="px-4 py-3 hidden lg:table-cell">
                    Date
                </th>
                <th scope="col" class="px-4 py-3 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($categories as $cat) { ?>
            <tr class="<?php echo $cat['visibility'] == 0 ?'opacity-[0.95] line-through' : '' ?> details light:odd:bg-white light:even:bg-gray-100 border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white light:text-gray-800 md:text-[20px]">
                <th scope="row" class="px-4 py-3 font-bold whitespace-nowrap"> 
                <?php echo $cat['id'] ?>
                </th>
                <td class="px-4 py-3" >
                <?php echo substr($cat['name'],0,12).'...' ?>
                </td>
                <td class="px-4 py-3 hidden sm:table-cell">
                <?php echo substr($cat['description'],0,12).'...' ?>
                </td>
                <td class="px-4 py-3 hidden lg:table-cell">
                <?php echo $cat['date'] ?>
                </td>
                <td class="px-4 py-3">
                  <div class="flex items-center justify-end">
                  <a href="categories.php?from=<?php echo $from ?>&do=change-visibility&id=<?php echo $cat['id'] ?>" data-toolTip="visible" class="hover:text-sky-600 font-medium text-gray-400 hover:underline">
                  <?php echo $cat['visibility'] == 1 ? 
                  '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" stroke-dashoffset="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="14;0"/></path></g></svg>' 
                  :
                  '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="0;14"/></path></g></svg>' ?>
                  </a>
                  <a href="categories.php?from=<?php echo $from ?>&do=edit&id=<?php echo $cat['id'] ?>" data-toolTip="Edit" class="hover:text-sky-600 font-medium text-blue-600 hover:underline">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21h18"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="20;0"/></path><path stroke-dasharray="48" stroke-dashoffset="48" d="M7 17v-4l10 -10l4 4l-10 10h-4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.6s" values="48;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M14 6l4 4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s" values="8;0"/></path></g></svg>
                  </a>
                  <a href="categories.php?from=<?php echo $from ?>&do=checkDelete&id=<?php echo $cat['id'] ?>" data-toolTip="Delete" class="hover:text-sky-600 font-medium text-[20px] text-red-600 hover:underline me-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-dasharray="12" stroke-dashoffset="12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l7 7M12 12l-7 -7M12 12l-7 7M12 12l7 -7"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="12;0"/></path></svg>
                  </a>
                  <button class="show-details text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">details</button> 
                  </div>
                </td>
            </tr>
            <tr class="<?php echo $cat['visibility'] == 0 ?'opacity-[0.95]' : '' ?>  hidden light:odd:bg-white light:even:bg-gray-100 border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white light:text-gray-800 md:text-[20px] <?php echo $member['status'] == 0 ?'opacity-[0.95]' : '' ?>">
              <th scope="row" class="px-4 pt-3 font-medium text-gray-900  dark:text-white" colspan="10">
                <div class="grid mb-4 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 bg-white dark:bg-gray-800">
                  <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
                  <blockquote class="max-w-2xl mx-auto text-gray-500 dark:text-gray-400">
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Name:</h3>
                      <p class="ms-3"><?php echo $cat['name'] ?></p>
                    </div>
                    <div class="flex items-center justify-center flex-col my-2">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Description</h3>
                      <p class="ms-3 max-w-[400px]"><?php echo $cat['description'] ?></p>
                    </div>
                    <div class="flex mt-2 items-center justify-center my-2">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Visibility:</h3>
                      <a href="./categories.php?from=<?php echo $from ?>&do=change-visibility&id=<?php echo $cat['id'] ?>" class="hover:text-sky-600 ms-3 font-medium text-gray-500 dark:text-gray-400 hover:underline me-3">
                        <?php echo $cat['visibility']?'Visible':'Hidden' ?>
                      </a>
                    </div>
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Added Date:</h3>
                      <p class="ms-3"><?php echo $cat['date'] ?></p>
                    </div>
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Total Category`s Items:</h3>
                      <p class="ms-3"><?php echo count(select('item_id','items','where cat_id = '.$cat['id'])) ?></p>
                    </div>
                    <a href="items.php?from=<?php echo $from ?>&do=viewCategoryItems&id=<?php echo $cat['id'] ?>" class="text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md me-3">Show Category`s Items</a> 
                  </blockquote>
                  </figure>
                </div>  
              </th>
            </tr>
          <?php } ?>
        </tbody>
    </table>
  <?php }?>
</div>
<?php if($do == 'view') { ?>
<div class="flex justify-start items-center mt-2 last-add-button">
    <a href="categories.php?from=<?php echo $from ?>&do=add" class="flex items-center font-medium  px-4 py-3 bg-gray-500 dark:bg-[#1f2937] hover:bg-[#2f3947] text-white rounded-lg mx-3 my-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" stroke-dasharray="64" stroke-dashoffset="64" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" begin="0.6s" dur="0.15s" values="0;0.3"/><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M7 12h10"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.75s" dur="0.2s" values="12;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M12 7v10"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.95s" dur="0.2s" values="12;0"/></path></g></svg>    <span class="mx-1">Add New Category</span>
    </a>
</div>
<?php }?>
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
.cats{
  td { 
      min-width: fit-content !important;
      max-width: 150px !important;
  }
}
</style>