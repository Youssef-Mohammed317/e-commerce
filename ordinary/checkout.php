<?php 
include('init.php');
if(!isset($_SESSION['userid'])){
  go('login',0,'You Must Be Logged In');
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Here, you'd normally process the payment (this is just simulated)
      $name = $_POST['name'];
      $address = $_POST['address'];
      ?>
        <script>
          alert("Thank you, <?php echo $name?>! Your order has been placed and will be shipped to <?php echo $address?>.");
        </script>
        <div class="container mx-auto">
          <div class="flex justify-center mt-10">
            <a href="cart.php" class="px-4 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
              Back to Cart
            </a>
          </div>
        </div>
        <?php
}
else{
?>
  <div class="flex min-h-full w-full flex-col justify-start px-6 py-8 lg:px-8">
    <div class="container mx-auto mt-3">
      <div class="flex justify-center w-full items-center md:gap-10 sm:gap-0 flex-col-reverse md:flex-row">
        <div class="mt-5 w-[90%] sm:w-full sm:max-w-sm">
          <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <form action="checkout.php" method="POST">
            <h2 class="mb-5 text-center text-2xl/9 font-bold tracking-tight text-blue-700">Checkout</h2>
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
              <div class="col-span-2">
                <input id="" required data-required name="name" placeholder="Your Name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
              </div>
              <div class="col-span-2">
                <input id="" required data-required name="address" placeholder="Your Address" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
              </div>
              <div class="col-span-2">
                <input id="" required data-required name="city" placeholder="Your City" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
              </div>
              <div class="col-span-2">
                <input id="" required data-required name="email" placeholder="Your email Address" type="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
              </div>
            </div>
            <div class="flex justify-between mt-6 flex-col sm:flex-row-reverse sm:gap-0 gap-4">
              <button name="submit" value="add" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md  hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Go For Payment</button>
              <a href="cart.php" class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-green-700 rounded-md  hover:bg-green-600 focus:outline-none focus:bg-green-600">Go For Cart</a>
            </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
