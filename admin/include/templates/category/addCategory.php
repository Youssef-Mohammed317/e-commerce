<div class="flex min-h-full w-full flex-col justify-start px-6 py-8 lg:px-8">

  <div class="container mx-auto mt-3">
  <div class="flex justify-center w-full items-center md:gap-10 sm:gap-0 flex-col-reverse md:flex-row">
  <div class="mt-5 w-[90%] sm:w-full sm:max-w-sm">
  <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
    <form action="categories.php?from=<?php echo $from ?>&do=add" method="POST">
      <h2 class="mb-5 text-center text-2xl/9 font-bold tracking-tight text-gray-700 dark:text-gray-200">Add New Category</h2>
          <div class="text-sm text-red-700 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Alert!</span> <span class="mx-1" style="color:red;">*</span> For Required Fields.
          </div>

          <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div class="col-span-2">
              <input data-required required  id="categoryName" name="name"  value="<?php echo isset($_COOKIE['name']) ? $_COOKIE['name'] : '' ?>" placeholder="Category Name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
            </div>

            <div class="col-span-2">
              <textarea  data-required required id="description" rows="4"   name="description" placeholder="Write your Description here..." class="min-h-[100px] block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"><?php echo isset($_COOKIE['description']) ? $_COOKIE['description'] : '' ?></textarea>
            </div>

            <div class="col-span-2">
              <select id="visibility" required  name="visibility" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                <option value=""  disabled>Select The Visibility</option>
                <option value="1" selected>Visible</option>
                <option value="0" >Invisible</option>
              </select>
            </div>

        </div>

        <div class="flex justify-between mt-6 flex-col sm:flex-row-reverse sm:gap-0 gap-4">
          <button name="submit" value="add" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Add New Category</button>
            <a href="<?php echo $from ?>.php" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Cancel</a>
        </div>
    </form>
  </section>


