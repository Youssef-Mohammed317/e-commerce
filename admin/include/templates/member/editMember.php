<div class="flex min-h-full w-full flex-col justify-start px-6 py-8 lg:px-8">
    <div class="container mx-auto mt-3">
      <div class="flex justify-center w-full items-center md:gap-10 sm:gap-0 flex-col-reverse md:flex-row">
        <div class="mt-5 w-[90%] sm:w-full sm:max-w-sm">
          <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <form action="members.php?from=<?php echo $from ?>&do=edit&id=<?php echo $member['id']; ?>" method="POST" enctype="multipart/form-data">
              <h2 class="mb-5 text-center text-2xl/9 font-bold tracking-tight text-gray-700 dark:text-gray-200">Edit Member</h2>
              <div class="text-sm text-red-700 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Alert!</span> <span class="mx-1" style="color:red;">*</span> For Required Fields.
              </div>

              <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
              <div>
                <input id="username" name="name" required  data-required  placeholder="Username" type="text" value="<?php echo  $member['name']; ?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
              </div>

              <div>
                <input id="emailAddress" name="email"  required  data-required placeholder="Email Address" type="email" value="<?php echo $member['email']; ?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
              </div>

              <div class="col-span-2">
                <input id="password"  placeholder="Password Leave blank if you don't want to change" name="password" type="password"  class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
              </div>

              <div class="col-span-2">
                <input id="passwordConfirmation"   name="password_confirmation" placeholder="Password Confirmation" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
              </div>
              <div class="col-span-2 my-6 flex justify-between items-center">
                <?php if($member['image']!=''){ ?>
                  <span onclick="document.getElementById('profile-image-adi').click()" id="profile-image-text-adi" class="cursor-pointer px-6 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Change Image</span>
                  <span onclick="document.getElementById('profile-image-adi').remove();document.getElementById('profile-image-text-adi').remove();document.getElementById('profile-remove-image-adi').remove();" id="profile-remove-image-adi" class="cursor-pointer px-6 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-red-700 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Remove Image</span>
                <?php } else { ?>
                  <span onclick="document.getElementById('profile-image-adi').click()" id="profile-image-text-adi" class="cursor-pointer px-6 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Change Image</span>
                <?php } ?>
                <input name="image" id="profile-image-adi" value="" class="hidden w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="default_size" type="file">
              </div>
          </div>

          <div class="flex justify-between mt-6 flex-col sm:flex-row-reverse sm:gap-0 gap-4">
            <button name="submit" value="update" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Save</button>
            <a href="<?php echo $from; ?>.php" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Cancel</a>
        </div>
      </form>
    </section>

