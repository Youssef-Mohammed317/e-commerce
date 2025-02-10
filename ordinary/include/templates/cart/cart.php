<div class="container mx-auto">
  <?php if(!empty($cartItems)) { ?>
    <h1 class="text-center my-4 dark:text-gray-100 text-3xl text-gray-600">Cart Table</h1>
  <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">
          ID
        </th>
        <th scope="col" class="px-6 py-3">
          Name
        </th>
        <th scope="col" class="px-6 py-3">
          Price
        </th>
        <th scope="col" class="px-6 py-3">
          Quantity
        </th>
        <th scope="col" class="px-6 py-3">
          Total
        </th>
        <th scope="col" class="px-6 py-3">
          Action
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($cartItems as $cartItem) { 
        $item = select('*' , 'items' , 'where item_id='.$cartItem['item_id'],'','LIMIT 1');
        ?>
        <tr>
          <td class="px-6 py-3">
            <?php echo $cartItem['id'] ?>
          </td>
          <td class="px-6 py-3">
            <div class="flex items-center gap-3">
              <img class="w-16 h-16" src="<?php echo $item['image'] == '' ? '../assets/imgs/product-image.png' : $item['image'] ?>" alt="">
              <div class="font-bold text-left">
                <div>
                  <?php echo $item['name'] ?>
                </div>
                <div>
                  <?php echo strlen($item['description']) > 20 ? substr($item['description'],0,20).'...' : $item['description'] ?>
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-3">
            $<?php echo $item['price'] ?>.00
          </td>
          <td class="px-6 py-3">
            <div class="flex gap-3 items-center justify-center">
              <div class="flex justify-center items-center">
                <a  href="cart.php?do=edit&id=<?php echo $cartItem['id']?>&quantity=<?php echo $cartItem['quantity']+1 ?>" class="px-4 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">+</a>
              </div>
              <div>
                <?php echo $cartItem['quantity'] ?>
              </div>
              <div>
                <a href="cart.php?do=edit&id=<?php echo $cartItem['id']?>&quantity=<?php echo $cartItem['quantity']-1 > 0 ? $cartItem['quantity']-1 : 1 ?>" class="px-4 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">-</a>
              </div>
            </div>
            </td>
          <td class="px-6 py-3">
            $<?php echo $cartItem['quantity'] * $item['price'] ?>.00
          </td>
          <td class="px-6 py-3">
            <div class="flex justify-center items-center gap-3">
              <a href="cart.php?from=cart&do=checkDelete&id=<?php echo $cartItem['id']?>" data-toolTip="Delete" class="font-medium text-[20px] text-red-600 hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-dasharray="12" stroke-dashoffset="12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l7 7M12 12l-7 -7M12 12l-7 7M12 12l7 -7"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="12;0"/></path></svg>
              </a>  
              <a href="items.php?do=viewItem&id=<?php echo $item['item_id'] ?>" class="font-medium text-[20px] text-sky-600 hover:underline">show details</a>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <div class="flex justify-end items-center mt-4">
    <a href="checkout.php" class="px-4 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
      Go Checkout
    </a>
  </div>
  <?php } else { ?>
    <div class="flex justify-center items-center h-[300px]">
      <div class="text-3xl text-gray-600 font-bold text-center">
        No items in your cart
      </div>
    </div>
  <?php } ?>
</div>