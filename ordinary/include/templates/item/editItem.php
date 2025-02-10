<div class="flex min-h-full w-full flex-col justify-start px-6 py-8 lg:px-8">
<h2 class="mb-5 text-center text-2xl/9 font-bold tracking-tight text-gray-700 dark:text-gray-200">Edit Item</h2>
  <div class="container mx-auto mt-3">
  <div class="flex flex-col-reverse">
  <div class="grid grid-cols-1 md:grid-cols-2 w-full">
  <section class="max-w-4xl md:w-[90%] p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
  <form action="items.php?do=edit&id=<?php echo $item['item_id'] ?>" method="POST" class="item-fields" enctype="multipart/form-data">
      <h2 class="mb-5 text-center text-2xl/9 font-bold tracking-tight text-gray-700 dark:text-gray-200">Item</h2>
      <div class="text-sm text-red-700 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Alert!</span> <span class="mx-1" style="color:red;">*</span> For Required Fields.
              </div>

      <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
              <div div class="col-span-2">
                <input data-required id="itemName" required  name="name" placeholder="Item Name"  value="<?php echo $item['name']; ?>" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
              </div>

              <div class="col-span-2">
                <textarea data-required id="description" required  rows="4" name="description" placeholder="Write your Description here..." class="min-h-[100px] block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"><?php echo $item['description']; ?></textarea>
              </div>

              <div class="col-span-2">
                <input type="number"  data-required  required name="price" id="ordering" placeholder="Item Price"  value="<?php echo $item['price']; ?>" class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
              </div>

              <div class="col-span-2">
                <select id="country" name="country"  required class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                <option value="" disabled>Select The Country</option>
                <?php
                foreach ($countries as $country) {
                  $check = $item['country'] == $country?'selected': '';
                  echo "<option value='$country' $check >$country</option>";
                }
                ?>
                </select>
              </div>

              <div class="col-span-2">
                <select id="status" name="status"  required class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                  <option value="" disabled>Select The Status</option>
                  <option value="A" <?php echo $item['status'] == 'A'?'selected': '' ?>>A</option>
                  <option value="B" <?php echo $item['status'] == 'B'?'selected': '' ?>>B</option>
                  <option value="C" <?php echo $item['status'] == 'C'?'selected': '' ?>>C</option>
                  <option value="D" <?php echo $item['status'] == 'D'?'selected': '' ?>>D</option>
                  <option value="F" <?php echo $item['status'] == 'F'?'selected': '' ?>>F</option>
                </select>
              </div>

              <div class="col-span-2">
                <select id="category" name="category"  required class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                  <option value="" disabled>Select The Category</option>
                  <?php
                    foreach ($categories as $category) {
                      $check = $item['cat_id'] == $category['id'] ? 'selected': '';
                      echo '<option value='. $category['id'] .' '.$check.'>'.$category['name'].'</option>';
                    } 
                  ?>
                </select>
              </div>
      </div>
      <div class="py-7">
          <span id="" data-required onclick="document.getElementById('edit-image-ordinary').click()" class="cursor-pointer px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Change Image</span>
          <input name="image"  id="edit-image-ordinary" class="hidden w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="default_size" type="file">
        </div>
        <div class="flex justify-between mt-6 flex-col-reverse sm:flex-row sm:gap-0 gap-4">
          <button name="submit" value="cancel" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Cancel</button>
          <button name="submit" value="update" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
        </div>
  </form>
  </section>
  <section class="item-preview max-w-4xl md:w-[90%] p-6 mx-auto flex justify-center items-center bg-white rounded-md shadow-md dark:bg-gray-800">
      <div class="w-full mx-auto flex flex-col justify-between max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div>
          <a href="#">
            <img id="image-field" class="p-8 rounded-t-lg w-full" src="<?php echo isset($item['image']) && $item['image']!=''?$item['image']:'../assets/imgs/product-image.png' ?>" alt="product image" />
          </a>
        </div>
        <div class="px-5 pb-5 mt-2">
            <div class="text-xl flex items-center justify-between font-semibold tracking-tight text-gray-900 dark:text-white">
            <span id="name-field"></span>
          </div>
          <div class="flex items-center justify-between my-3 dark:text-gray-400 text-gray-500">
            <span>Category: <span id="category-field"></span></span>
            <span>Status: <span id="status-field"></span></span>
            </div>
            <div class="mb-5 dark:text-gray-400 text-gray-500 text-wrap h-[78px] overflow-hidden">
              <span id="description-field"></span>...
            </div>
            <div class="flex items-center justify-between">
                <span class="text-2xl font-bold text-gray-900 dark:text-white">$<span id="price-field"></span></span>
                <a href="" class="px-3 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-yellow-700 rounded-md hover:bg-yellow-600 focus:outline-none focus:bg-yellow-600">Add To Cart</a>
            </div>
            <div class="flex items-center justify-between mt-3 me-1">
              <span class="text-gray-900 text-sm dark:text-gray-200"><?php echo count(select('id','comments','where item_id = '.$item['item_id']." and status = 1 ")) ?> Comments</span>
              <span class="text-gray-900 text-sm dark:text-gray-200"><?php echo $item['date'] ?></span>
            </div>
        </div>
      </div>
    </section>
  </div>




