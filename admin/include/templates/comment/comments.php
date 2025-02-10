<div class="container mx-auto comments">
<h1 class="text-[40px] font-bold text-center text-gray-700 mb-4 dark:text-gray-200">Comments</h1>

<div class="relative h-[fit-content] rounded-lg">
    <?php if(count($comments) == 0) { ?>
        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
      <span class="font-medium">Info alert!</span> There is No Comments
    </div>
    <?php } elseif(count($comments) == 1) 
    { foreach($comments as $comment) { ?>
    <div class="grid mb-4 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 bg-white dark:bg-gray-800">
                  <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
                  <blockquote class="max-w-2xl mx-auto text-gray-500 dark:text-gray-400">
                    <div class="flex mt-2 items-center justify-center">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Comment:</h3>
                        <p class="ms-3"><?php echo $comment['comment'] ?></p>
                    </div>
                    <div class="flex mt-2 items-center justify-center">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Status:</h3>
                        <a href="comments.php?from=<?php echo $from ?>&do=change-status&id=<?php echo $comment['id'] ?>" class="hover:text-sky-600 ms-3 font-medium text-gray-500 dark:text-gray-400 hover:underline">
                          <?php echo $comment['status'] ? 'Active' : 'Inactive' ?>
                        </a>
                    </div>
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Added Date:</h3>
                      <p class="ms-3"><?php echo $comment['date'] ?></p>
                    </div>
                    <div class="flex mt-2 items-center justify-center">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Member:</h3>
                        <p class="ms-3"><?php echo select('name', 'users', 'where id = ' . $comment['user_id'],'','LIMIT 1')['name'] ?></p>
                    </div>
                    <a href="members.php?from=<?php echo $from ?>&do=viewCommentMember&id=<?php echo $comment['user_id'] ?>" class="block text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Comment`s Member</a> 
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Item:</h3>
                      <p class="ms-3"><?php echo select('name', 'items', 'where item_id = ' . $comment['item_id'],'','LIMIT 1')['name'] ?></p>
                    </div>
                    <a href="items.php?from=<?php echo $from ?>&do=viewCommentItem&id=<?php echo $comment['item_id'] ?>" class="block text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Comment`s Item</a> 
                    <div class="flex mt-2 items-center justify-center gap-3">
                      <a href="comments.php?from=<?php echo $from ?>&do=edit&id=<?php echo $comment['id'] ?>" class="px-3 py-1.5 rounded-md bg-sky-600 hover:bg-sky-700 text-white">Edit</a>
                      <a href="comments.php?from=<?php echo $from ?>&do=checkDelete&id=<?php echo $comment['id'] ?>" class="px-3 py-1.5 rounded-md bg-red-600 hover:bg-red-700 text-white">Delete</a>
                    </div>
                  </blockquote>
                  </figure>
                </div> 
    <?php }} elseif(count($comments) > 1) { ?>
    
    <table class="w-full text-sm text-left rtl:text-right light:text-gray-500 dark:text-gray-400 text-center">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200 ">
            <tr class="bg-white border-b dark:odd:bg-gray-800 dark:odd:border-gray-700">
                <th scope="col" class="px-4 py-3 hidden sm:table-cell">
                    ID
                </th>
                <th scope="col" class="px-4 py-3">
                    Comment
                </th>
                <th scope="col" class="px-4 py-3 hidden lg:table-cell">
                    Item Name
                </th>
                <th scope="col" class="px-4 py-3 hidden lg:table-cell ">
                    User Name
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
            foreach($comments as $comment) {
            ?>
                <tr class="<?php echo $comment['status'] == 0? 'opacity-[0.95] line-through' : '' ?> details light:odd:bg-white light:even:bg-gray-100 border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white light:text-gray-800 md:text-[20px]">
                <th scope="row" class="px-4 py-3 font-bold whitespace-nowrap hidden sm:table-cell"> 
                <?php echo $comment['id'] ?>
                </th>
                <td class="px-4 py-3">
                <?php echo substr($comment['comment'],0,12).'...' ?>
                </td>
                <td class="px-4 py-3 hidden lg:table-cell">
                <?php echo substr(select('name','items','where item_id = '.$comment['item_id'],'','LIMIT 1')['name'],0,12).'...' ?>
                </td>
                <td class="px-4 py-3 hidden lg:table-cell">
                <?php echo substr(select('name','users','where id ='.$comment['user_id'],'','LIMIT 1')['name'],0,12).'...' ?>
                </td>
                <td class="px-4 py-3 hidden lg:table-cell">
                    <?php echo $comment['date'] ?>
                </td>
                <td class="px-4 py-3">
                    <div class="flex items-center justify-end">
                    <a href="comments.php?from=<?php echo $from ?>&do=change-status&id=<?php echo $comment['id'] ?>" data-toolTip="approved" class="hover:text-sky-600 font-medium text-gray-400 hover:underline"><?php echo $comment['status'] == 1 ? 
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" stroke-dashoffset="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="14;0"/></path></g></svg>' 
                    :
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="0;14"/></path></g></svg>' ?>
                    </a>
                    <a href="comments.php?from=<?php echo $from ?>&do=edit&id=<?php echo $comment['id'] ?>" data-toolTip="Edit" class="hover:text-sky-600 font-medium text-blue-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21h18"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="20;0"/></path><path stroke-dasharray="48" stroke-dashoffset="48" d="M7 17v-4l10 -10l4 4l-10 10h-4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.6s" values="48;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M14 6l4 4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s" values="8;0"/></path></g></svg>
                    </a>
                    <a href="comments.php?from=<?php echo $from ?>&do=checkDelete&id=<?php echo $comment['id'] ?>" data-toolTip="Delete" class="hover:text-sky-600 font-medium text-[20px] text-red-600 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-dasharray="12" stroke-dashoffset="12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l7 7M12 12l-7 -7M12 12l-7 7M12 12l7 -7"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="12;0"/></path></svg>
                    </a>
                    <button class="show-details text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">details</button> 

                    </div>
                <!--  -->
                </td>
            </tr>
            <tr class="<?php echo $comment['status'] == 0 ?'opacity-[0.95]' : '' ?>  hidden light:odd:bg-white light:even:bg-gray-100 border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white light:text-gray-800 md:text-[20px]">
              <th scope="row" class="px-4 pt-3 font-medium text-gray-900  dark:text-white" colspan="10">
                <div class="grid mb-4 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 bg-white dark:bg-gray-800">
                  <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
                  <blockquote class="max-w-2xl mx-auto text-gray-500 dark:text-gray-400">
                  <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Comment:</h3>
                      <p class="ms-3"><?php echo $comment['comment'] ?></p>
                    </div>
                  <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Status:</h3>
                      <a href="comments.php?from=<?php echo $from ?>&do=change-status&id=<?php echo $comment['id'] ?>" class="hover:text-sky-600 ms-3 font-medium text-gray-500 dark:text-gray-400 hover:underline">
                        <?php echo $comment['status'] ? 'Active' : 'Inactive' ?>
                      </a>
                    </div>
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Added Date:</h3>
                      <p class="ms-3"><?php echo $comment['date'] ?></p>
                    </div>
                  <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Member:</h3>
                      <p class="ms-3"><?php echo select('name', 'users', 'where id = ' . $comment['user_id'],'','LIMIT 1')['name'] ?></p>
                    </div>
                    <a href="members.php?from=<?php echo $from ?>&do=viewCommentMember&id=<?php echo $comment['user_id'] ?>" class="block text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Comment`s Member</a> 
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Item:</h3>
                      <p class="ms-3"><?php echo select('name', 'items', 'where item_id = ' . $comment['item_id'],'','LIMIT 1')['name'] ?></p>
                    </div>
                    <a href="items.php?from=<?php echo $from ?>&do=viewCommentItem&id=<?php echo $comment['item_id'] ?>" class="block text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Comment`s Item</a> 
                  </blockquote>
                  </figure>
                </div>  
              </th>
              </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } ?>
</div>
</div>
<script>

</script>
<style>
    .comments{
    td { 
        min-width: fit-content !important;
        max-width: 150px !important;
    }
   }
</style>