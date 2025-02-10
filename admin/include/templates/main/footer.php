
</div>
</div>
</div>
</div>
<footer class="<?php echo str_contains($_SERVER['SCRIPT_NAME'],'login') ||str_contains($_SERVER['SCRIPT_NAME'],'register') ?'hidden':'' ?> bg-white rounded-t-lg mt-[100px] shadow dark:bg-gray-800 w-[100%]">
  <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2025 <a href="" class="hover:underline">Youssef Mohammad</a>. All Rights Reserved.
  </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
      <a href="./dashboard.php?from=dashboard" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'dashboard') ? 'underline' : 'hover:underline' ?> me-4 md:me-6"  aria-current="page">Dashboard</a>
      <a href="./members.php?from=members" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'members') ? 'underline' : 'hover:underline' ?> me-4 md:me-6" >Members</a>
      <a href="./categories.php?from=categories" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'categories') ? 'underline' : 'hover:underline' ?> me-4 md:me-6" >Categories</a>
      <a href="./items.php?from=items" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'items') ? 'underline' : 'hover:underline' ?> me-4 md:me-6" >Items</a>
      <a href="./comments.php?from=comments" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'comments') ? 'underline' : 'hover:underline' ?> me-4 md:me-6" >Comments</a>
    </ul>
  </div>
</footer>

<?php ob_end_flush(); ?>

<script>
  //main nav
  // mobile-menu-button
  const mainNavMobileMenuButton = document.querySelector(".mainNav .mobile-menu-button");
  const mainNavMobileMenu = document.querySelector(".mainNav .mobile-menu");
  mainNavMobileMenu.classList.add("hidden");
  mainNavMobileMenuButton.addEventListener("click", () => {
    mainNavMobileMenu.classList.toggle("hidden");
  });
  // profile dropdown
  const userButton = document.querySelector(".mainNav .profile-dropdown button");
  const userMenu = document.querySelector(".mainNav .user-menu");
  const userMenuItems = document.querySelectorAll(".mainNav .user-menu a");
  userButton.addEventListener("click", () => {
    userMenu.classList.toggle("show");
  });
  $('.show-details').click(function() {
    $(this).parents('.details').next().fadeToggle();
  })
  adjustFooter();
  window.addEventListener('resize',adjustFooter);
  function adjustFooter(){
    if($('html').height() < window.innerHeight) {
      if($('footer').offset().top < window.innerHeight ) $('footer').css({
        'position': 'absolute',
        'bottom': '0',
        'left': '0',
      })
    } else {
      $('footer').css({'position': 'relative', 'bottom': '0', 'left': '0'})
    }
  }
  window.addEventListener('scroll',function (){
    if(window.scrollY > 30){
      $('footer').css({'position': 'relative', 'bottom': '0', 'left': '0', 'z-index':'1',})
    } else {
      adjustFooter();
    }
  });
    // item preview

    let fields = document.querySelectorAll('input[name],textarea[name],select[name]');
    fields.forEach(function(e){
      if(document.getElementById( e.getAttribute('name') + '-field')){
        document.getElementById( e.getAttribute('name') + '-field').innerHTML = e.value;
        e.addEventListener('keyup',function(){
          document.getElementById( e.getAttribute('name') + '-field').innerHTML = e.value;
        })
        e.addEventListener('change',function(){
          document.getElementById( e.getAttribute('name') + '-field').innerHTML = e.value;
        })
      }
    })
    let images =document.querySelectorAll('input[name = "image"]');
    let reader = new FileReader();
    images.forEach(function(e){
      e.addEventListener('change',function(){
        reader.onload = function(){
          document.getElementById( e.getAttribute('name') + '-field').src = reader.result;
        }
        reader.readAsDataURL(e.files[0]);
      })
    })
    document.querySelectorAll('[data-required]')
    .forEach(function(e){
      let star = document.createElement('span');
      star.innerHTML='*';
      star.style.cssText =`
      color:red;
      font-size: 25px;
      position: absolute;
      top: 14px;
      left: -15px;
      `
      e.parentElement.prepend(star);
      e.parentElement.style.position = 'relative';
    })
    let AllMembers = <?php echo json_encode(select('*','users')) ?>;
    let AllCategories = <?php echo json_encode(select('*','categories')) ?>;
    let AllItems = <?php echo json_encode(select('*','items')) ?>;
    let AllComments = <?php echo json_encode(select('*','comments')) ?>;
    let searchInput = document.getElementById('default-search');
    let searchResultsBox = document.getElementById('results-search');
    searchInput.addEventListener('input',searchFunction)
    document.addEventListener('keydown',function(event){
      if(event.key == 'ArrowDown'){
        event.preventDefault();
        for(let i = 0; i < searchResultsBox.children.length; i++){
          if(searchResultsBox.children[i].classList.contains('bg-gray-200')){
            if(i + 1 < searchResultsBox.children.length){
              searchResultsBox.children[i].classList.remove('bg-gray-200');
              searchResultsBox.children[i + 1].classList.add('bg-gray-200');
              break;
            }
          }
        }
      }else if(event.key == 'ArrowUp'){
        event.preventDefault();
        for(let i = searchResultsBox.children.length - 1; i > 0 ; i--){
          if(searchResultsBox.children[i].classList.contains('bg-gray-200')){
            
            if(i - 1 >= 0){
              searchResultsBox.children[i].classList.remove('bg-gray-200');
              searchResultsBox.children[i - 1].classList.add('bg-gray-200');
              break;
            }
          }
        }
      }else if(event.key == 'Enter'){
        event.preventDefault();
        for(let i = 0; i < searchResultsBox.children.length; i++){
          if(searchResultsBox.children[i].classList.contains('bg-gray-200')){
            searchResultsBox.children[i].click();
            break;
          }
        }
      }
    })
    searchInput.addEventListener('focus',
      function(){
        if(this.value !=''){
          searchFunction();
        }
      }
    );
    document.addEventListener('click',function(e){
      if(!searchResultsBox.contains(e.target) && e.target != searchInput){
        searchResultsBox.innerHTML = '';
      }
    })

    function searchFunction(){
      searchResultsBox.innerHTML = '';
      let membersResults = AllMembers.filter(result => result['name'].toLowerCase().includes(this.value.toLowerCase()) && this.value != '');
      if(membersResults.length>0){
        searchResultsBox.innerHTML = "<div class='w-full bg-gray-100 py-2 px-4 text-sm font-medium text-gray-900 select-none'>Members</div>";
      }
      membersResults.forEach(function(e){
        searchResultsBox.innerHTML += `
            <a href="members.php?from=dashboard&do=viewItemMember&id=${e.id}" class="flex py-1 flex-row justify-start items-center w-full bg-gray-50 py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-200 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700">
              <div class="me-3">
                <img src="${e.image == '' || e.image == null ? '../assets/imgs/default.webp' : e.image}" alt="" class="rounded-full w-10 h-10">
              </div>
              <div class="flex flex-col justify-between items-start flex-1">
                <div class="">
                  <span class="hidden lg:inline">Name:</span> <span class="font-bold">${e.name}</span>
                </div>
                <div class="flex items-center flex-row justify-between w-full">
                <div class="">
                  <span class="hidden lg:inline">Email:</span> <span class="font-bold">$${e.email}</span>
                </div>
                  <div>
                    <span>Status:</span> <span class="font-bold">${e.status}</span>
                  </div>
                </div>
              </div>
            </a>
        `
      })
      let categoriesResults = AllCategories.filter(result => result['name'].toLowerCase().includes(this.value.toLowerCase()) && this.value != '');
      if(categoriesResults.length>0){
        searchResultsBox.innerHTML += "<div class='w-full bg-gray-100 py-2 px-4 text-sm font-medium text-gray-900 select-none'>Categories</div>";
      }
      categoriesResults.forEach(function(e){
        searchResultsBox.innerHTML += `
        <a href="categories.php?do=viewItemCategory&id=${e.id}" class="flex py-1 flex-row justify-start items-center w-full bg-gray-50 py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-200 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700">
          <div class="flex flex-col justify-between items-start flex-1">
            <div class="">
            <span class="hidden lg:inline">Name:</span> <span class="font-bold">${e.name}</span>
            </div>
            <div class="flex items-center flex-row justify-between w-full">
              <div class="">
                <span class="">Visibility:</span> <span class="font-bold">${e.visibility?'visible':'hidden'}</span>
              </div>
              <div>
                <span >Ads:</span> <span class="font-bold">${e.allow_ads?'Allowed':'Not allowed'}</span>
              </div>
            </div>
          </div>
        </a>
        `
        })
      let itemsResults = AllItems.filter(result => result['name'].toLowerCase().includes(this.value.toLowerCase()) && this.value != '');
      if(itemsResults.length > 0){
        searchResultsBox.innerHTML += "<div class='w-full bg-gray-100 py-2 px-4 text-sm font-medium text-gray-900 select-none'>Items</div>";
      }
      itemsResults.forEach(function(e){
        searchResultsBox.innerHTML += `
            <a href="items.php?do=viewItem&id=${e.item_id}" class="flex py-1 flex-row justify-start items-center w-full bg-gray-50 py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-200 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700">
              <div class="me-3">
                  <img src="${e.image == '' || e.image == null ? '../assets/imgs/product-image.png' : e.image}" alt="" class="w-10 h-10">
              </div>
              <div class="flex flex-col justify-between items-start flex-1">
                <div class="">
                  <span class="hidden lg:inline">Name:</span> <span class="font-bold">${e.name}</span>
                </div>
                <div class="flex items-center flex-row justify-between w-full">
                  <div>
                    <span class="hidden lg:inline">Category:</span> <span class="font-bold">${AllCategories.filter(cat => cat['id'] == e.cat_id)[0].name}</span>
                  </div>
                  <div class="">
                    <span class="hidden lg:inline">Price:</span> <span class="font-bold">$${e.price}</span>
                  </div>
                </div>
              </div>
            </a>
        `
      })
      let commentsResults = AllComments.filter(result => result['comment'].toLowerCase().includes(this.value.toLowerCase()) && this.value != '');
      if(commentsResults.length > 0){
        searchResultsBox.innerHTML += "<div class='w-full bg-gray-100 py-2 px-4 text-sm font-medium text-gray-900 select-none'>Comments</div>";
      }
      commentsResults.forEach(function(e){
        searchResultsBox.innerHTML += `
            <a href="comments.php?from=dashboard&do=viewComment&id=${e.id}" class="flex py-1 flex-row justify-start items-center w-full bg-gray-50 py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-200 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700">
              <div class="flex flex-col justify-between items-start flex-1">
                <div class="">
                  <span class="">Comment:</span> <span class="font-bold">${e.comment}</span>
                </div>
                <div class="flex items-center flex-row justify-between w-full">
                  <div>
                    <span class="">Member:</span> <span class="font-bold">${AllMembers.filter(member => member['id'] == e.user_id)[0].name}</span>
                  </div>
                  <div class="">
                    <span class="">Status:</span> <span class="font-bold">$${e.price}</span>
                  </div>
                </div>
              </div>
            </a>
        `
      })
      searchResultsBox.children[0].classList.add('bg-gray-200');
      }

</script>

</body>
</html>