<div class="container mx-auto ">
<h1 class="text-[40px] font-bold text-center text-gray-700 dark:text-gray-200">Dashboard</h1>
<div class="py-5 px-4">
  <div class="grid justify-items-center grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-4">
    <a href="members.php?from=dashboard" class="block w-full flex flex-col items-center justify-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Total Members</h5>
      <p class="font-normal text-gray-700 dark:text-gray-400 text-center text-[40px] "><?php echo $totalMembers - 1; ?></p>
    </a>
    <a href="members.php?from=dashboard&do=viewApproved" class="w-full flex flex-col items-center justify-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      
      <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Approved Members</h5>
      <p class="font-normal text-gray-700 dark:text-gray-400 text-center text-[40px] "><?php echo $approvedMembers - 1; ?></p>
    </a>
    <a href="members.php?from=dashboard&do=viewPending" class="w-full flex flex-col items-center justify-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      
      <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Pending Members</h5>
      <p class="font-normal text-gray-700 dark:text-gray-400 text-center text-[40px] "><?php echo $pendingMembers; ?></p>
    </a>
    <a href="categories.php?from=dashboard" class="w-full flex flex-col items-center justify-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      
      <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Total Categories</h5>
      <p class="font-normal text-gray-700 dark:text-gray-400 text-center text-[40px] "><?php echo $totalCategories; ?></p>
    </a>
    <a href="items.php?from=dashboard" class="w-full flex flex-col items-center justify-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      
      <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Total Items</h5>
      <p class="font-normal text-gray-700 dark:text-gray-400 text-center text-[40px] "><?php echo $totalItems; ?></p>
    </a>
    <a href="items.php?from=dashboard&do=viewApproved" class="w-full flex flex-col items-center justify-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      
      <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Approved Items</h5>
      <p class="font-normal text-gray-700 dark:text-gray-400 text-center text-[40px] "><?php echo $approvedItems; ?></p>
    </a>
    <a href="items.php?from=dashboard&do=viewPending" class="w-full flex flex-col items-center justify-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      
      <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Pending Items</h5>
      <p class="font-normal text-gray-700 dark:text-gray-400 text-center text-[40px] "><?php echo $pendingItems; ?></p>
    </a>
    <a href="comments.php?from=dashboard" class="w-full flex flex-col items-center justify-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      
      <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Total Comments</h5>
      <p class="font-normal text-gray-700 dark:text-gray-400 text-center text-[40px] "><?php echo $totalComments; ?></p>
    </a>
    <a href="comments.php?from=dashboard&do=viewApproved" class="w-full flex flex-col items-center justify-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      
      <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Approved Comments</h5>
      <p class="font-normal text-gray-700 dark:text-gray-400 text-center text-[40px] "><?php echo $approvedComments; ?></p>
    </a>
    <a href="comments.php?from=dashboard&do=viewPending" class="w-full flex flex-col items-center justify-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      
      <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Pending Comments</h5>
      <p class="font-normal text-gray-700 dark:text-gray-400 text-center text-[40px] "><?php echo $pendingComments; ?></p>
    </a>
  </div>
  <div class="grid grid-cols-1 gap-2 lg:grid-cols-2 mt-4">
  <div class="relative h-[fit-content] rounded-lg">
    <table class="w-full max-w-[100%] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg">
      <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-200 ">
            <tr>
              <th scope="col" class="px-4 py-3 h-[60px] " colspan="10">
                <div class=" flex justify-between items-center">
                  <span>Latest 6 Registered Members</span>
                  <a href="members.php?from=dashboard&do=add" class="hover:text-sky-600 font-medium flex items-center  dark:bg-[#1f2937] px-2 py-1 rounded-lg">
                  <span class="me-3">Add Member</span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="mb-1" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21v-1c0 -2.21 1.79 -4 4 -4h4c2.21 0 4 1.79 4 4v1"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="20;0"/></path><path stroke-dasharray="20" stroke-dashoffset="20" d="M9 13c-1.66 0 -3 -1.34 -3 -3c0 -1.66 1.34 -3 3 -3c1.66 0 3 1.34 3 3c0 1.66 -1.34 3 -3 3Z"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.2s" values="20;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M15 6h6"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s" values="8;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M18 3v6"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.2s" values="8;0"/></path></g></svg> 
                  </a>
                </div>
              </th>
            </tr>
        </thead>
        <tbody>
          <?php
            foreach($latestUsers as $member){
            ?>
              <tr class="<?php echo $member['status'] == 0 ?'opacity-[0.95] line-through' : '' ?> details  odd:bg-white border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white text-gray-800 md:text-[20px]">
              <th scope="row" class="px-4 py-3 font-medium text-gray-900  dark:text-white">
                  <?php echo substr( $member['name'],0,12).'...' ?>
                </th>
                <th scope="row" class="px-4 py-3 font-medium text-gray-900   dark:text-white">
                <div class="flex items-center justify-end">
                    <a href="members.php?from=dashboard&do=change-status&id=<?php echo $member['id'] ?>" data-toolTip="approved" class="hover:text-sky-600 font-medium text-gray-400 hover:underline"><?php echo $member['status'] == 1 ? 
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" stroke-dashoffset="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="14;0"/></path></g></svg>' 
                    :
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="0;14"/></path></g></svg>' ?>
                    </a>
                    <a href="members.php?from=dashboard&do=edit&id=<?php echo $member['id'] ?>" data-toolTip="Edit" class="hover:text-sky-600  font-medium text-blue-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21h18"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="20;0"/></path><path stroke-dasharray="48" stroke-dashoffset="48" d="M7 17v-4l10 -10l4 4l-10 10h-4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.6s" values="48;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M14 6l4 4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s" values="8;0"/></path></g></svg>
                    </a>
                    <a href="members.php?from=dashboard&do=checkDelete&id=<?php echo $member['id'] ?>" data-toolTip="Delete" class="hover:text-sky-600  font-medium text-[20px] text-red-600 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-dasharray="12" stroke-dashoffset="12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l7 7M12 12l-7 -7M12 12l-7 7M12 12l7 -7"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="12;0"/></path></svg>
                    </a>
                    <button class="show-details text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">details</button> 
                    </div>
                </th>
              </tr>
              <tr class="<?php echo $member['status'] == 0 ?'opacity-[0.95]' : '' ?> hidden odd:bg-white even:bg-gray-100 border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white text-gray-800 md:text-[20px]">
              <th scope="row" class="px-4 pt-3 font-medium text-gray-900  dark:text-white" colspan="10">
                <div class="grid mb-4 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 bg-white dark:bg-gray-800">
                  <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
                  <figcaption class="flex items-center justify-center ">
                    <img class="rounded-full w-9 h-9" src="<?php echo $member['image']?$member['image']:'../assets/imgs/default.webp'?>" alt="profile picture">
                    <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                        <div><?php echo $member['name'] ?></div>
                        <div class="text-sm text-gray-500 dark:text-gray-400 "><?php echo $member['email'] ?></div>
                    </div>
                  </figcaption>  
                  <blockquote class="max-w-2xl mx-auto mt-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">ID:</h3>
                      <p class="ms-3"><?php echo $member['id'] ?></p>
                    </div>
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Rank:</h3>
                      <p class="ms-3"><?php echo $member['rank'] ?></p>
                    </div>
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">status:</h3>
                      
                      <a href="members.php?from=dashboard&do=<?php echo $member['status'] == 1 ? 'deactivate' : 'activate' ?>&id=<?php echo $member['id'] ?>" class="hover:text-sky-600 ms-3 font-medium text-gray-400 hover:underline">
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
                    <a href="items.php?from=dashboard&do=viewMemberItems&id=<?php echo $member['id'] ?>" class="text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Member`s Items</a> 
                  
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Total Member Comments:</h3>
                      <p class="ms-3"><?php echo count(select('id','comments','where user_id = '.$member['id'])) ?></p>
                    </div>
                    <a href="comments.php?from=dashboard&do=viewMemberComments&id=<?php echo $member['id'] ?>" class="text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Member`s Comments</a> 
                  </blockquote>
                  </figure>
                </div>  
              </th>
              </tr>
            <?php }?>
        </tbody>
    </table>
  </div>
  <div class="relative h-[fit-content]  rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
          <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-200">
              <tr>
                <th scope="col" class="px-4 py-3 h-[60px] " colspan="10">
                  
                  <div class=" flex justify-between items-center">
                  <span>Latest 6 categories</span>
                  <a href="categories.php?from=dashboard&do=add" class="hover:text-sky-600 font-medium flex items-center  dark:bg-[#1f2937] px-2 py-1 rounded-lg">
                  <span class="me-3">Add Category</span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" stroke-dasharray="64" stroke-dashoffset="64" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" begin="0.6s" dur="0.15s" values="0;0.3"/><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M7 12h10"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.75s" dur="0.2s" values="12;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M12 7v10"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.95s" dur="0.2s" values="12;0"/></path></g></svg>
                  </a>
                </div>
                </th>
              </tr>
          </thead>
          <tbody>
            <?php
              foreach($latestCategories as $cat){
              ?>
              <tr class="<?php echo $cat['visibility'] == 0 ?'opacity-[0.95] line-through' : '' ?> details  odd:bg-white even:bg-gray-100 border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white text-gray-800 md:text-[20px]">
                  <th scope="row" class="px-4 py-3 font-medium text-gray-900  dark:text-white">
                    <?php echo substr($cat['name'],0,12).'...' ?>
                  </th>
                  <th scope="row" class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                  <div class="flex items-center justify-end">
                  <a href="./categories.php?from=dashboard&do=change-visibility&id=<?php echo $cat['id'] ?>" data-toolTip="visible" class="hover:text-sky-600 ms-3 font-medium text-gray-400 hover:underline">
                  <?php echo $cat['visibility'] == 1 ? 
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" stroke-dashoffset="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="14;0"/></path></g></svg>' 
                    :
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="0;14"/></path></g></svg>' ?>
                    </a>
                    <a href="categories.php?from=dashboard&do=edit&id=<?php echo $cat['id'] ?>" data-toolTip="Edit" class="hover:text-sky-600  font-medium text-blue-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21h18"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="20;0"/></path><path stroke-dasharray="48" stroke-dashoffset="48" d="M7 17v-4l10 -10l4 4l-10 10h-4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.6s" values="48;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M14 6l4 4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s" values="8;0"/></path></g></svg>
                    </a> 
                    <a href="categories.php?from=dashboard&do=checkDelete&id=<?php echo $cat['id'] ?>" data-toolTip="Delete" class="hover:text-sky-600  font-medium text-[20px] text-red-600 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-dasharray="12" stroke-dashoffset="12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l7 7M12 12l-7 -7M12 12l-7 7M12 12l7 -7"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="12;0"/></path></svg>
                    </a>
                    <button class="show-details text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">details</button> 
                    </div>
                  </th>
              </tr>
              <tr class="<?php echo $cat['visibility'] == 0 ?'opacity-[0.95]' : '' ?>  hidden odd:bg-white even:bg-gray-100 border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white text-gray-800 md:text-[20px] <?php echo $member['status'] == 0 ?'opacity-[0.95]' : '' ?>">
              <th scope="row" class="px-4 pt-3 font-medium text-gray-900  dark:text-white" colspan="10">
                <div class="grid mb-4 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 bg-white dark:bg-gray-800">
                  <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
                  <blockquote class="max-w-2xl mx-auto text-gray-500 lg:mb-8 dark:text-gray-400">
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Name:</h3>
                      <p class="ms-3"><?php echo $cat['name'] ?></p>
                    </div>
                    <div class="flex items-center justify-center flex-col">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white my-2">Description</h3>
                      <p class="ms-3 leading-normal max-w-[400px]"><?php echo $cat['description'] ?></p>
                    </div>
                    <div class="flex mt-2 items-center justify-center my-2">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Visibility:</h3>
                      <a href="./categories.php?from=dashboard&do=change-visibility&id=<?php echo $cat['id'] ?>" class="hover:text-sky-600 ms-3 font-medium text-gray-400 hover:underline">
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
                    <a href="items.php?from=dashboard&do=viewCategoryItems&id=<?php echo $cat['id'] ?>" class="text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Category`s Items</a> 
                  
                  </blockquote>
                  </figure>
                </div>  
              </th>
              </tr>
              <?php }?>
          </tbody>
      </table>
  </div>
  <div class="relative h-[fit-content] rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
          <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-200">
              <tr>
                <th scope="col" class="px-4 py-3 h-[60px] " colspan="10">
                 
                  <div class=" flex justify-between items-center">
                  <span> Latest 6 Items</span>
                  <a href="items.php?from=dashboard&do=add" class="hover:text-sky-600 font-medium flex items-center  dark:bg-[#1f2937] px-2 py-1 rounded-lg">
                  <span class="me-3">Add Item</span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" stroke-dasharray="64" stroke-dashoffset="64" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" begin="0.6s" dur="0.15s" values="0;0.3"/><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M7 12h10"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.75s" dur="0.2s" values="12;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M12 7v10"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.95s" dur="0.2s" values="12;0"/></path></g></svg>
                  </a>
                </div>
                </th>
              </tr>
          </thead>
          <tbody>
            <?php foreach($latestItems as $item) { ?>
              <tr class="<?php echo $item['approved'] == 0 ?'opacity-[0.95] line-through' : '' ?> details  odd:bg-white even:bg-gray-100 border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white text-gray-800 md:text-[20px]">
              <th scope="row" class="px-4 py-3 font-medium text-gray-900  dark:text-white">
                    <?php echo  substr($item['name'],0,12).'...' ?>
              </th>
              <th scope="row" class="px-4 py-3 font-medium text-gray-900  dark:text-white">
              <div class="flex items-center justify-end">
                  <a href="items.php?from=dashboard&do=change-approve&id=<?php echo $item['item_id'] ?>" data-toolTip="approved" class="hover:text-sky-600  font-medium text-gray-400 hover:underline">
                    <?php echo $item['approved'] == 1 ? 
                  '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" stroke-dashoffset="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="14;0"/></path></g></svg>' 
                  :
                  '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="0;14"/></path></g></svg>' ?>
                  </a>
                  <a href="items.php?from=dashboard&do=edit&id=<?php echo $item['item_id'] ?>" data-toolTip="Edit" class="hover:text-sky-600  font-medium text-blue-600 hover:underline">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21h18"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="20;0"/></path><path stroke-dasharray="48" stroke-dashoffset="48" d="M7 17v-4l10 -10l4 4l-10 10h-4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.6s" values="48;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M14 6l4 4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s" values="8;0"/></path></g></svg>
                  </a>
                  <a href="items.php?from=dashboard&do=checkDelete&id=<?php echo $item['item_id'] ?>" data-toolTip="Delete" class="hover:text-sky-600  font-medium text-[20px] text-red-600 hover:underline">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-dasharray="12" stroke-dashoffset="12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l7 7M12 12l-7 -7M12 12l-7 7M12 12l7 -7"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="12;0"/></path></svg>
                  </a>
                  <button class="show-details text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">details</button> 
              </div>
              </th>
              </tr>
              <tr class="<?php echo $item['approved'] == 0 ?'opacity-[0.95]' : '' ?>  hidden odd:bg-white even:bg-gray-100 border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white text-gray-800 md:text-[20px]">
              <th scope="row" class="px-4 pt-3 font-medium text-gray-900  dark:text-white" colspan="10">
                <div class="grid gap-2 mb-4 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 bg-white dark:bg-gray-800">
                  <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
                  <blockquote class="max-w-2xl mx-auto text-gray-500 dark:text-gray-400">
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Name:</h3>
                      <p class="ms-3"><?php echo $item['name'] ?></p>
                    </div>
                    <div class="flex items-center justify-center flex-col">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white my-2">Description</h3>
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
                      <a href="items.php?from=dashboard&do=change-approve&id=<?php echo $item['item_id'] ?>" class="hover:text-sky-600 ms-3 font-medium text-gray-400 hover:underline">
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
                    <a href="categories.php?from=dashboard&do=viewItemCategory&id=<?php echo $item['cat_id'] ?>" class="block text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Item`s Category</a> 
  
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Member:</h3>
                      <p class="ms-3"><?php echo select('name', 'users', 'where id = ' . $item['member_id'],'','LIMIT 1')['name'] ?></p>
                    </div>
                    <a href="members.php?from=dashboard&do=viewItemMember&id=<?php echo $item['member_id'] ?>" class="block text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Item`s Member</a> 
              
                    <div class="flex items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Total Item`s Comments:</h3>
                      <p class="ms-3"><?php echo count(select('id','comments','where item_id = ' . $item['item_id'])) ?></p>
                    </div>
                    <a href="comments.php?from=dashboard&do=viewItemComments&id=<?php echo $item['item_id'] ?>" class="block text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Item`s Comments</a> 

                  </blockquote>
                  </figure>
                </div>  
              </th>
              </tr>
            <?php }?>
          </tbody>
      </table>
  </div>
  <div class="relative h-[fit-content] rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
          <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-200">
              <tr>
                <th scope="col" class="px-4 py-3 h-[60px] " colspan="10">
                  Latest 6 Comments
                </th>
              </tr>
          </thead>
          <tbody>
            <?php foreach($latestComments as $comment){?>
              <tr class="<?php echo $comment['status'] == 0 ?'opacity-[0.95] line-through' : '' ?>  details  odd:bg-white even:bg-gray-100 border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white text-gray-800 md:text-[20px]">
                  <th scope="row" class=" px-4 py-3 font-medium text-gray-900  dark:text-white">
                  <?php echo  substr(select('name', 'users', 'where id = ' . $comment['user_id'], '', 'LIMIT 1')['name'] , 0, 12) . '...'?>
                  </th>
                  <th scope="row" class="px-4 py-3 font-medium text-gray-900 text-start dark:text-white">
                    <?php echo substr($comment['comment'],0,12) .'...' ?>
                  </th>
                  <th scope="row" class="px-4 py-3 font-medium text-gray-900  dark:text-white">
                  <div class="flex items-center justify-end">
                    <a href="comments.php?from=dashboard&do=change-status&id=<?php echo $comment['id'] ?>" data-toolTip="approved" class="hover:text-sky-600  font-medium text-gray-400 hover:underline"><?php echo $comment['status'] == 1 ? 
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" stroke-dashoffset="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="14;0"/></path></g></svg>' 
                    :
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" d="M3 12c0 -4.97 4.03 -9 9 -9c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9Z"><animate fill="freeze" attributeName="fill-opacity" dur="0.15s" values="0;0.3"/></path><path stroke-dasharray="14" d="M8 12l3 3l5 -5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.15s" dur="0.2s" values="0;14"/></path></g></svg>' ?>
                    </a>
                    <a href="comments.php?from=dashboard&do=edit&id=<?php echo $comment['id'] ?>" data-toolTip="Edit" class="hover:text-sky-600  font-medium text-blue-600 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21h18"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="20;0"/></path><path stroke-dasharray="48" stroke-dashoffset="48" d="M7 17v-4l10 -10l4 4l-10 10h-4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.6s" values="48;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M14 6l4 4"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s" dur="0.2s" values="8;0"/></path></g></svg>
                    </a>
                    <a href="comments.php?from=dashboard&do=checkDelete&id=<?php echo $comment['id'] ?>" data-toolTip="Delete" class="hover:text-sky-600  font-medium text-[20px] text-red-600 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-dasharray="12" stroke-dashoffset="12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l7 7M12 12l-7 -7M12 12l-7 7M12 12l7 -7"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="12;0"/></path></svg>
                    </a>
                    <button class="show-details text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">details</button> 
                  </div>
                  </th>
              </tr>
              <tr class="<?php echo $comment['status'] == 0 ?'opacity-[0.95]' : '' ?>  hidden odd:bg-white even:bg-gray-100 border-b dark:odd:bg-gray-800 dark:odd:border-gray-700  dark:even:border-gray-600   dark:even:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white text-gray-800 md:text-[20px]">
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
                      <a href="comments.php?from=dashboard&do=change-status&id=<?php echo $comment['id'] ?>" class="hover:text-sky-600 ms-3 font-medium text-gray-400 hover:underline">
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
                    <a href="members.php?from=dashboard&do=viewCommentMember&id=<?php echo $comment['user_id'] ?>" class="block text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Comment`s Member</a> 
                    <div class="flex mt-2 items-center justify-center">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Item:</h3>
                      <p class="ms-3"><?php echo select('name', 'items', 'where item_id = ' . $comment['item_id'],'','LIMIT 1')['name'] ?></p>
                    </div>
                    <a href="items.php?from=dashboard&do=viewCommentItem&id=<?php echo $comment['item_id'] ?>" class="block text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600 px-3 py-1.5 rounded-md">Show Comment`s Item</a> 
                  </blockquote>
                  </figure>
                </div>  
              </th>
              </tr>
              <?php }?>
          </tbody>
      </table>
  </div>

</div>
</div>
</div>

<style>
th {
  min-width: fit-content !important;
  max-width: 150px !important;
}
</style>