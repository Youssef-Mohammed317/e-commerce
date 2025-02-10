<div class="container mx-auto members">
<h1 class="text-[40px] font-bold text-center text-gray-700 dark:text-gray-200">Members</h1>
<?php if($do == 'view') { ?>
<div class="flex justify-end items-center ">
    <a href="members.php?from=<?php echo $from ?>&do=add" class="flex items-center font-medium  px-4 py-3 bg-gray-500 dark:bg-[#1f2937] hover:bg-[#2f3947] text-white rounded-lg mx-3 my-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21v-1c0 -2.21 1.79 -4 4 -4h4c2.21 0 4 1.79 4 4v1"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="20;0"/></path><path stroke-dasharray="20" stroke-dashoffset="20" d="M9 13c-1.66 0 -3 -1.34 -3 -3c0 -1.66 1.34 -3 3 -3c1.66 0 3 1.34 3 3c0 1.66 -1.34 3 -3 3Z"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.2s" values="20;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M15 6h6"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s" values="8;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M18 3v6"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.2s" values="8;0"/></path></g></svg> 
    <span class="mx-1">Add New Member</span>
    </a>
</div>
<?php } ?>
<div class="relative h-[fit-content] rounded-lg">
  <?php if(count($members) == 0) { ?>
    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
      <span class="font-medium">Info alert!</span> There is No Members
    </div>
  <?php } elseif (count($members) == 1) {
    foreach($members as $member) {
    ?>
    <div class="grid mb-4 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 bg-white dark:bg-gray-800 mt-4">
    <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
      <figcaption class="flex items-center justify-center ">
        <img class="rounded-full w-9 h-9" src="<?php echo ($member['image'])? $member['image']:  '../assets/imgs/default.webp' ?>" alt="profile picture">
        <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
          <div><?php echo $member['name'] ?></div>
          <div class="text-sm text-gray-500 dark:text-gray-400 "><?php echo $member['email'] ?></div>
        </div>
      </figcaption>  
      <blockquote class="max-w-2xl mx-auto mt-4 text-gray-500 dark:text-gray-400">
        <div class="flex items-center justify-center">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">ID:</h3>
          <p class="ms-3"><?php echo $member['id'] ?></p>
        </div>
        <div class="flex items-center justify-center">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Rank:</h3>
          <p class="ms-3"><?php echo $member['rank'] ?></p>
        </div>
        <div class="flex items-center justify-center">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Status:</h3>
          
          <a href="members.php?from=<?php echo $from ?>&do=change-status&id=<?php echo $member['id'] ?>" class="hover:text-sky-600 ms-3 font-medium text-gray-500 dark:text-gray-400 hover:underline me-3">
            <?php echo $member['status'] == 1 ? 'Active' : 'Inactive' ?>
          </a>
        </div>
        <div class="flex items-center justify-center">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Join Date:</h3>
          <p class="ms-3"><?php echo $member['date'] ?></p>
        </div>
        <div class="flex items-center justify-center">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Total Member Items:</h3>
          <p class="ms-3"><?php echo count(select('item_id','items','where member_id = '.$member['id'])) ?></p>
        </div>
        <a href="items.php?from=<?php echo $from ?>&do=viewMemberItems&id=<?php echo $member['id'] ?>" class="text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md me-3">Show Member`s Items</a> 
      
        <div class="flex items-center justify-center">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Total Member Comments:</h3>
          <p class="ms-3"><?php echo count(select('id','comments','where user_id = '.$member['id'])) ?></p>
        </div>
        <a href="comments.php?from=<?php echo $from ?>&do=viewMemberComments&id=<?php echo $member['id'] ?>" class="text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md me-3">Show Member`s Comments</a> 
        <div class="flex mt-2 items-center justify-center gap-3">
          <a href="members.php?from=<?php echo $from ?>&do=edit&id=<?php echo $member['id'] ?>" class="px-3 py-1.5 rounded-md bg-sky-600 hover:bg-sky-700 text-white">Edit</a>
          <a href="members.php?from=<?php echo $from ?>&do=checkDelete&id=<?php echo $member['id'] ?>" class="px-3 py-1.5 rounded-md bg-red-600 hover:bg-red-700 text-white">Delete</a>
        </div>
      </blockquote>
    </figure>
    </div>  
  <?php }} elseif (count($members) > 1) { ?>
    <table class="w-full text-sm text-left rtl:text-right light:text-gray-500 dark:text-gray-400 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200 ">
            <tr class="bg-white border-b dark:odd:bg-gray-800 dark:odd:border-gray-700">
                <th scope="col" class="px-4 py-3  hidden sm:table-cell">
                    ID
                </th>
                <th scope="col" class="px-4 py-3">
                    Name
                </th>
                <th scope="col" class="px-4 py-3 hidden lg:table-cell">
                    Date
                </th>
                <th scope="col" class="px-4 py-3 text-end">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($members as $member) { ?>
              <tr class="<?php echo $member['status'] == 0 ?'opacity-[0.95] line-through' : '' ?> details light:odd:bg-white light:even:bg-gray-100 border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white light:text-gray-800 md:text-[20px] <?php echo $member['status'] == 0 ?'opacity-[0.95]' : '' ?>">
              <th scope="row" class="px-4 py-3 font-bold whitespace-nowrap hidden sm:table-cell"> 
              <?php echo $member['id'] ?>
              </th>
              <td class="px-4 py-3">
              <?php echo substr($member['name'],0,12).'...' ?>
              </td>

              <td class="px-4 py-3 hidden lg:table-cell">
              <?php echo $member['date'] ?>
              </td>
              <td class="px-2 py-3">
                  <div class="flex items-center justify-end">
                  <a href="members.php?from=<?php echo $from ?>&do=change-status&id=<?php echo $member['id'] ?>" data-toolTip="status" class="hover:text-sky-600 font-medium text-gray-400 hover:underline"><?php echo $member['status'] == 1 ? 
                  '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" stroke-dashoffset="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="14;0"/></path></g></svg>' 
                  :
                  '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="0;14"/></path></g></svg>' ?>
                  </a>
                  <a href="members.php?from=<?php echo $from ?>&do=edit&id=<?php echo $member['id'] ?>" data-toolTip="Edit" class="hover:text-sky-600 font-medium text-blue-600 hover:underline">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21h18"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="20;0"/></path><path stroke-dasharray="48" stroke-dashoffset="48" d="M7 17v-4l10 -10l4 4l-10 10h-4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.6s" values="48;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M14 6l4 4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s" values="8;0"/></path></g></svg>
                  </a>
                  <a href="members.php?from=<?php echo $from ?>&do=checkDelete&id=<?php echo $member['id'] ?>"  data-toolTip="Delete" class="hover:text-sky-600 font-medium text-[20px] text-red-600 hover:underline">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-dasharray="12" stroke-dashoffset="12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l7 7M12 12l-7 -7M12 12l-7 7M12 12l7 -7"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="12;0"/></path></svg>
                  </a>
                  <button class="show-details text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">details</button> 
                  </div>
              </td>
              </tr>
              <tr class="<?php echo $member['status'] == 0 ?'opacity-[0.95]' : '' ?> hidden light:odd:bg-white light:even:bg-gray-100 border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white light:text-gray-800 md:text-[20px]">
            <th scope="row" class="px-4 pt-3 font-medium text-gray-900  dark:text-white" colspan="10">
              <div class="grid mb-4 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 bg-white dark:bg-gray-800">
                <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
                <figcaption class="flex items-center justify-center ">
                  <img class="rounded-full w-9 h-9" src="<?php echo ($member['image'])? $member['image']:  '../assets/imgs/default.webp' ?>" alt="profile picture">
                  <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                      <div><?php echo $member['name'] ?></div>
                      <div class="text-sm text-gray-500 dark:text-gray-400 "><?php echo $member['email'] ?></div>
                  </div>
                </figcaption>  
                <blockquote class="max-w-2xl mx-auto mt-4 text-gray-500 dark:text-gray-400">
                  <div class="flex items-center justify-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">ID:</h3>
                    <p class="ms-3"><?php echo $member['id'] ?></p>
                  </div>
                  <div class="flex items-center justify-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Rank:</h3>
                    <p class="ms-3"><?php echo $member['rank'] ?></p>
                  </div>
                  <div class="flex items-center justify-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Status:</h3>
                    
                    <a href="members.php?from=<?php echo $from ?>&do=change-status&id=<?php echo $member['id'] ?>" class="hover:text-sky-600 ms-3 font-medium text-gray-500 dark:text-gray-400 hover:underline me-3">
                      <?php echo $member['status'] == 1 ? 'Active' : 'Inactive' ?>
                    </a>
                  </div>
                  <div class="flex items-center justify-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Join Date:</h3>
                    <p class="ms-3"><?php echo $member['date'] ?></p>
                  </div>
                  <div class="flex items-center justify-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Total Member Items:</h3>
                    <p class="ms-3"><?php echo count(select('item_id','items','where member_id = '.$member['id'])) ?></p>
                  </div>
                  <a href="items.php?from=<?php echo $from ?>&do=viewMemberItems&id=<?php echo $member['id'] ?>" class="text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md me-3">Show Member`s Items</a> 
                
                  <div class="flex items-center justify-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Total Member Comments:</h3>
                    <p class="ms-3"><?php echo count(select('id','comments','where user_id = '.$member['id'])) ?></p>
                  </div>
                  <a href="comments.php?from=<?php echo $from ?>&do=viewMemberComments&id=<?php echo $member['id'] ?>" class="text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md me-3">Show Member`s Comments</a> 
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
<?php if($do == 'view') { ?>
<div class="flex justify-start items-center mt-2 last-add-button">
    <a href="members.php?form=<?php echo $from ?>&do=add" class="flex items-center font-medium  px-4 py-3 bg-gray-500 dark:bg-[#1f2937] hover:bg-[#2f3947] text-white rounded-lg mx-3 my-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21v-1c0 -2.21 1.79 -4 4 -4h4c2.21 0 4 1.79 4 4v1"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="20;0"/></path><path stroke-dasharray="20" stroke-dashoffset="20" d="M9 13c-1.66 0 -3 -1.34 -3 -3c0 -1.66 1.34 -3 3 -3c1.66 0 3 1.34 3 3c0 1.66 -1.34 3 -3 3Z"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.2s" values="20;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M15 6h6"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s" values="8;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M18 3v6"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.2s" values="8;0"/></path></g></svg> 
    <span class="mx-1">Add New Member</span>
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
    .members{
    td { 
        min-width: fit-content !important;
        max-width: 150px !important;
    }
   
}
</style>