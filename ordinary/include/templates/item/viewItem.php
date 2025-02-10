<div class="mb-10">
  <div class=" bg-gray-100 dark:bg-gray-800 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                  <img class="max-w-[100%] max-h-[460px] h-full mx-auto" src="<?php echo isset($item['image']) && $item['image']!=''?$item['image']:'../assets/imgs/product-image.png' ?>" alt="Product Image">
                </div>
                <div class="flex -mx-2 mb-4">
                    <div class="w-1/2 px-2">
                        <a href="cart.php?from=cart&do=add&item_id=<?php echo $item['item_id']?>" class="block text-center w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">Add to Cart</a>
                    </div>
                    <div class="w-1/2 px-2">
                        <a href="profile.php?id=<?php echo $item['member_id'] ?>" class="block text-center w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">Show User Profile</a>
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2  mt-5"><?php echo $item['name']?></h2>
                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                  <span class="font-bold text-gray-700 dark:text-gray-300"> Category:</span> <?php echo select('name','categories',"where id =". $item['cat_id'],'','LIMIT 1')['name']?>
                </p>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Price:</span>
                        <span class="text-red-600 ">$<?php echo $item['price'] ?></span>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700 dark:text-gray-300">Status:</span>
                        <span class="text-gray-600 dark:text-gray-300"><?php echo $item['status'] ?></span>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Comments:</span>
                        <span class="text-gray-600 dark:text-gray-300"><?php echo count($comments) ?></span>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700 dark:text-gray-300">Date:</span>
                        <span class="text-gray-600 dark:text-gray-300"><?php echo $item['date'] ?></span>
                    </div>
                </div>

                <div>
                    <span class="font-bold text-gray-700 dark:text-gray-300">Product Description:</span>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                      <?php echo $item['description'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md bg-gray-50 dark:bg-gray-800 dark:border-gray-600 mt-10">


    <div class="flex items-center justify-between my-5">
      <h2 class="text-2xl font-bold  dark:text-gray-50 select-none">Add New Comment</h2>
      <?php if(count($comments) > 0) { ?>
        <span class="cursor-pointer dark:text-gray-400 hover:text-sky-600 transition-colors duration-300 show-comments text-gray-500">show comments</span>
      <?php } ?>
    </div>
      <form action="comments.php?do=add&itemid=<?php echo $item['item_id'] ?>" method="POST">
      <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
          <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
              <label for="comment" class="sr-only">Your comment</label>
              <textarea id="comment" rows="4"  required  name="comment" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:outline-none dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required ></textarea>
          </div>
          
          <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
            <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
              Post comment
            </button>
          </div>
      </div>
    </form>
    <div class="space-y-2 mb-2 comments ">
      <?php if(count($comments) > 0) { ?>
      <h1 class="text-3xl font-bold text-center text-gray-700  dark:text-gray-200">Comments</h1>
      <?php } ?>
      <p class="text-sm text-center text-gray-500 mb-4">To Add A Comment You Must Be Logged In <a href="login.php" class="text-sky-600 hover:underline">login Now</a></p>
      <!-- Single Comment -->
      <?php 
      foreach ($comments as  $comment) { ?>
      <div class="flex items-start space-x-4 dark:bg-gray-700 p-4 rounded-lg mt-0 mb-0 <?php echo $comment['status']?'':'not-approved-comment'?>">
        <a href="profile.php?id=<?php echo $comment['user_id'] ?>">
          <img src="<?php 
          $imag=select('image','users','where id ='.$comment['user_id'],'','LIMIT 1')['image'];
          echo $imag != '' ? $imag : '../assets/imgs/default.webp';
          ?>" alt="Avatar" class="w-10 h-10 rounded-full">
          </a>
        <div class="flex-1">
          <div class="flex flex-1 justify-between items-center">
            <h3 class="text-sm font-semibold dark:text-white"><?php 
                echo select('name','users','where id='.$comment['user_id'],'','limit 1')['name'];
                ?></h3>
          <span class="text-xs text-gray-500 dark:text-gray-200"><?php echo $comment['date']; ?></span>
          </div>
          <div class="flex justify-between items-start">
            <p class="text-gray-700 text-sm mt-1 dark:text-gray-200">
              <?php echo $comment['comment']; ?>
            </p>
            <?php if(isset($user) && $comment['user_id'] == $user['id']){?>
              <div>
                <a href="comments.php?do=edit&id=<?php echo $comment['id']?>" class="text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600">Edit</a>
                <a href="comments.php?do=delete&id=<?php echo $comment['id']?>" class="text-gray-500 text-[15px] font-semibold hover:underline hover:text-sky-600">Delete</a>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <?php if(count($comments) > 0) { ?>
    <div class="flex justify-end">
      <span class="cursor-pointer dark:text-gray-400 text-end hover:text-sky-600 transition-colors duration-300 hide-comments hidden">Hide comments</span>
    </div>
    <?php } ?>
    </div>
  </div>
</div>