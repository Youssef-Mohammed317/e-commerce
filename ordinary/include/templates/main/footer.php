
</div>
</div>
</div>
</div>
<footer class="bg-white rounded-t-lg shadow dark:bg-gray-800 w-[100%] mt-[100px]">
  <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2025 <a href="" class="hover:underline">Youssef Mohammad</a>. All Rights Reserved.
  </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
        <li>
        <a href="./dashboard.php" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], 'dashboard') ? 'underline' : 'hover:underline' ?> me-4 md:me-6" aria-current="page">Home</a>
      </li>
        <?php 
          foreach ( select('*','categories') as $cat) { 
            if($cat['visibility'] && count(select('item_id','items','where cat_id = '.$cat['id'] .' and approved = 1 ')) > 0){
            ?>
        <li>
        <a href="category.php?id=<?php echo $cat['id']?>" class="<?php echo str_contains($_SERVER['SCRIPT_NAME'], "category") && $_GET['id'] == $cat['id'] ? ' underline' : 'hover:underline' ?> me-4 md:me-6" aria-current="page">
            <?php echo $cat['name']?>
          </a>
        </li>
        <?php } }?>
    </ul>
  </div>
</footer>
<?php ob_end_flush(); ?>

<script>
  $('.show-details').click(function() {
    $(this).parents('.details').next().fadeToggle();
  })
  adjustFooter();
  window.addEventListener('resize',adjustFooter);
  function adjustFooter(){
    if($('html').height() < window.innerHeight) {
      if($('footer').offset().top < window.innerHeight ) $('footer').css({
        'position': 'absolute',
        'z-index':'-1',
        'bottom': '0',
        'left': '0',
      })
    } else {
      $('footer').css({'position': 'relative', 'bottom': '0', 'left': '0', 'z-index':'1',})
    }
  }
  window.addEventListener('scroll',function (){
    if(window.scrollY > 0){
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
  $('.show-comments').click(function(){
    $(this).addClass('hidden');
    $('.hide-comments').removeClass('hidden')
    $('.comments').slideToggle();
  })
  $('.hide-comments').click(function(){
    $('.show-comments').removeClass('hidden')
    $(this).addClass('hidden');
    $('.comments').slideToggle();
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
    let AllResults = <?php echo json_encode(select('*','items','where approved = 1')) ?>;
    let categories = <?php echo json_encode(select('name,id','categories')) ?>;
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
    searchInput.addEventListener('focus',searchFunction);
    document.addEventListener('click',function(e){
      if(!searchResultsBox.contains(e.target) && e.target != searchInput){
        searchResultsBox.innerHTML = '';
      }
    })

    function searchFunction(){
      searchResultsBox.innerHTML = '';
      let results = AllResults.filter(result => result['name'].toLowerCase().includes(this.value.toLowerCase()) && this.value != '');
      results.forEach(function(e){
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
                    <span class="hidden lg:inline">Category:</span> <span class="font-bold">${categories.filter(cat => cat['id'] == e.cat_id)[0].name}</span>
                  </div>
                  <div class="">
                    <span class="hidden lg:inline">Price:</span> <span class="font-bold">$${e.price}</span>
                  </div>
                </div>
              </div>
            </a>
        `
        searchResultsBox.children[0].classList.add('bg-gray-200');
          })
        }
  </script>
</body>
</html>