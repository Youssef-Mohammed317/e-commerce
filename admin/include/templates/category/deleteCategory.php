<div class="flex justify-center items-center mt-5 flex-col">
  <p class="text-2xl text-red-600 text-center mb-5">Are you sure you want to delete This Member</p>
  <form action="categories.php?from=<?php echo $from ?>&do=delete&id=<?php echo $id ?>" method="post" class="">
    <button name="submit" value="delete" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-red-700 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Delete</button>
    <button name="submit" value="cancel" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Cancel</button>
  </form>
</div>