<div class="flex min-h-full w-full flex-col justify-start px-6 py-8 lg:px-8">
  <div class="container mx-auto mt-12">
    <div class="flex justify-center w-full items-center md:gap-10 sm:gap-0 flex-col-reverse md:flex-row">
      <div class="mt-10 w-[90%] sm:w-full sm:max-w-sm">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
      <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
      <h2 class="my-5 text-center text-2xl/9 font-bold tracking-tight text-blue-700 dark:text-gray-200 ">Login To Admin Account</h2>
            <form action="login.php" method="POST">

              <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
              <div class="col-span-2">
                <input required  id="emailAddress" name="email" placeholder="Email Address" type="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
              </div>
          
              <div class="col-span-2">
                <input  required id="password" placeholder="Password" name="password" type="password"  class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
              </div>
              <div class="col-span-2">
                <input type="checkbox" value="1" name="remember" id="remember" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 select-none">Remember me</label>
              </div>
          </div>

          <div class="flex justify-between mt-6 flex-col sm:flex-row-reverse sm:gap-0 gap-4">
            <button name="submit" value="login" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Login</button>
            <a href="../ordinary/index.php" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-sky-700 rounded-md hover:bg-sky-600 focus:outline-none focus:bg-sky-600">Go To Shop</a>
          </div>
        </div>
      </form>
    </section>


