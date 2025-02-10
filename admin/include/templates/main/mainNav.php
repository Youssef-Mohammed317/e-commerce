<nav class="dark:bg-gray-800 light:bg-gray-100 shadow mainNav mb-4">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="mobile-menu-button relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-sky-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-1">
            <a href="./dashboard.php?from=dashboard" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'dashboard') ? 'bg-sky-500  text-white' : 'text-gray-800 dark:text-gray-100 hover:bg-sky-600 hover:text-white' ?> rounded-md px-3 py-2 text-md font-medium" aria-current="page">Dashboard</a>
            <a href="./members.php?from=members" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'members') ? 'bg-sky-500  text-white' : 'text-gray-800 dark:text-gray-100 hover:bg-sky-600 hover:text-white' ?> rounded-md px-3 py-2 text-md font-medium">Members</a>
            <a href="./categories.php?from=categories" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'categories') ? 'bg-sky-500  text-white' : 'text-gray-800 dark:text-gray-100 hover:bg-sky-600 hover:text-white' ?> rounded-md px-3 py-2 text-md font-medium">Categories</a>
            <a href="./items.php?from=items" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'items') ? 'bg-sky-500  text-white' : 'text-gray-800 dark:text-gray-100 hover:bg-sky-600 hover:text-white' ?> rounded-md px-3 py-2 text-md font-medium">Items</a>
            <a href="./comments.php?from=comments" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'comments') ? 'bg-sky-500  text-white' : 'text-gray-800 dark:text-gray-100 hover:bg-sky-600 hover:text-white' ?> rounded-md px-3 py-2 text-md font-medium">Comments</a>
          </div>
        </div>
      </div>
      <div class="flex-1 flex items-center justify-between absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <div class="relative w-full py-2">
          <div class="relative">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                  </svg>
              </div>
              <input type="search" id="default-search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Members, Product, Category, Comments..."/>
          </div>
          <div id="results-search" style="min-width: 270px;" class="w top-[50px] right-0 absolute z-10 border-md border-gray-400 flex items-center justify-center flex-col w-full">
          </div>
        </div>
        <!-- Profile dropdown -->
        <div class="relative ml-3 profile-dropdown flex items-center justify-end">
          <div>
            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Open user menu</span>
              <img class="size-8 rounded-full" src="<?php echo isset($user['image']) && $user['image']!=''?$user['image']:'../assets/imgs/default.webp'?>" alt="">
            </button>
          </div>
        
          <div class="user-menu  absolute right-0 top-[100%] z-10 mt-2 w-48 origin-top-right rounded-md bg-white dark:bg-gray-800 py-1 shadow-lg ring-1 ring-black/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <a href="./profile.php" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'],'profile')? 'bg-sky-100 dark:bg-gray-700' : 'hover:bg-sky-100 dark:hover:bg-sky-700' ?> flex items-center transition  px-4 py-2 text-sm text-gray-700 dark:text-gray-200 " role="menuitem" tabindex="-1" id="user-menu-item-0" >
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-dasharray="28" stroke-dashoffset="28" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M4 21v-1c0 -3.31 2.69 -6 6 -6h4c3.31 0 6 2.69 6 6v1"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s" values="28;0"/></path><path d="M12 11c-2.21 0 -4 -1.79 -4 -4c0 -2.21 1.79 -4 4 -4c2.21 0 4 1.79 4 4c0 2.21 -1.79 4 -4 4Z"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.4s" dur="0.4s" values="28;0"/></path></g></svg>
            <span class="mx-1">
              Your Profile
            </span>
            </a>
            <!-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a> -->
            <a href="./logout.php" class="flex items-center hover:bg-sky-100 dark:hover:bg-sky-700 transition  px-4 py-2 text-sm text-gray-700 dark:text-gray-200 " role="menuitem" tabindex="-1" id="user-menu-item-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="48" stroke-dashoffset="48" d="M16 5v-1c0 -0.55 -0.45 -1 -1 -1h-9c-0.55 0 -1 0.45 -1 1v16c0 0.55 0.45 1 1 1h9c0.55 0 1 -0.45 1 -1v-1"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="48;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M10 12h11"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.2s" values="12;0"/></path><path stroke-dasharray="6" stroke-dashoffset="6" d="M21 12l-3.5 -3.5M21 12l-3.5 3.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.9s" dur="0.2s" values="6;0"/></path></g></svg>
            <span class="mx-1">Sign out</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <a href="./dashboard.php?from=dashboard" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'dashboard') ? 'bg-sky-500  text-white' : 'text-gray-800 dark:text-gray-100 hover:bg-sky-600 hover:text-white'  ?> block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>
      <a href="./members.php?from=members" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'members') ? 'bg-sky-500 text-white' : 'text-gray-800 dark:text-gray-100 hover:bg-sky-600 hover:text-white' ?> block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Members</a>
      <a href="./categories.php?from=categories" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'categories') ? 'bg-sky-500  text-white' : 'text-gray-800 dark:text-gray-100 hover:bg-sky-600 hover:text-white' ?> block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Categories</a>
      <a href="./items.php?from=items" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'items') ? 'bg-sky-500  text-white' : 'text-gray-800 dark:text-gray-100 hover:bg-sky-600 hover:text-white' ?> block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Items</a>
      <a href="./comments.php?from=comments" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'comments') ? 'bg-sky-500  text-white' : 'text-gray-800 dark:text-gray-100 hover:bg-sky-600 hover:text-white' ?> block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Commnets</a>
    </div>
  </div>
  <!--  -->
</nav>
