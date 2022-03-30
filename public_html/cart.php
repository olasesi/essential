<?php require_once ('../incs-template1/config.php'); ?>
<?php include_once ('../incs-template1/cookie-session.php'); ?>
<?php include ('../incs-template1/adding-to-cart.php'); ?>


<?php
if(isset($_POST['empty_cart']) && $_POST['empty_cart']=="empty"){
    $_SESSION['shopping_cart'] = '';
	header("Location:".GEN_WEBSITE);
	exit();
}



$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = '<div class="message_box" style="background-color:red;"><div class="box">
      Product is removed from your cart!</div></div>';
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }		
}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}




?>

<?php include ('../incs-template1/header.php'); ?>




<div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo GEN_WEBSITE ?>">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                </ul>
            </div>
        </div>
        <div class="ps-section--shopping ps-shopping-cart">
            <div class="container">
                  <?php
                    if(isset($_SESSION["shopping_cart"])){
                        $total_price = 0;
                  ?>	
                <div class="ps-section__header">
                    <h1>Shopping Cart</h1>
                </div>
                <div class="ps-section__content">
                    <div class="table-responsive">
                        <table class="table ps-table--shopping-cart ps-table--responsive">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>PRICE</th>
                                    <th>QUANTITY</th>
                                    <th>TOTAL</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php	
                              if(!empty($_SESSION["shopping_cart"])){
                              foreach ($_SESSION["shopping_cart"] as $product){
                              ?>
                                <tr>
                                    <td data-label="Product">
                                      <div class="ps-product--cart">
                                          <div class="ps-product__thumbnail">
                                            <a href="product-default.html">
                                              <img src="images/products/<?php echo $product['image']; ?>" width="50" height="40"  />
                                            </a>
                                          </div>
                                          <div class="ps-product__content">
                                            <a href="product-default.html"><?php echo $product["name"]; ?></a> 
                                          </div>
                                      </div>
                                    </td>
                                    <td class="price" data-label="Price"><?php echo "&#8358;".number_format($product["price"]); ?></td>
                                    <td data-label="Quantity">
                                      <div class="form-group--number">
                                      <?php
                                    $result = mysqli_query($connect,"SELECT inventory_value, inventory_value_prev FROM inventory WHERE 	inventory_product_id='". substr($product["code"], 4)."'") or die(mysqli_error($connect));
                                while($deduct = mysqli_fetch_array($result)){

if(isset($_POST['quantity'])){
                            if($_POST['quantity'] > ($deduct['inventory_value'] - $deduct['inventory_value_prev'])){
                                      echo '<p class="text-danger">Maximum of '.($deduct['inventory_value'] - $deduct['inventory_value_prev']). ' quantity can be added </p>';
                                      $error_on_number = 'Enter products less than '.($deduct['inventory_value'] - $deduct['inventory_value_prev']);
                                    }}
                                  }
                                      ?>
                                        <form method='post' action=''>
                                          <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                          <input type='hidden' name='action' value="change" />
                                          <input name='quantity' class="form-control" type="number" placeholder="1" value="<?php echo $product['quantity']; ?>" min="1" max="<?php echo $product['inventory_value'] - $product['inventory_value_prev']; ?>" onChange="this.form.submit()">
                                        
                                        </form>
                                      </div>
                                    </td>
                                    <td data-label="Total"><?php echo "&#8358;".number_format($product["price"] * $product["quantity"]); ?></td>
                                   
                                    <?php
                                      $total_price += ($product["price"]*$product["quantity"]);
                            
                                    ?>
                                    <td data-label="Remove product">
                                      <form method='POST' action=''>
                                        <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                        <input type='hidden' name='action' value="remove" />
                                        <button type='submit' class='remove btn-fade'><strong><i class="icon-cross"></i></strong></button>
                                      </form>
                                      
                                    </td>
                                </tr>
                                <?php
                                 }}
                                ?>
                            </tbody>
                        </table>
                       
                     
                    </div>
                    <div class="ps-section__cart-actions">
                      <a class="ps-btn" href="shop.php"><i class="icon-arrow-left"></i> Back to Shop</a>
                    </div>
                </div>
                <div class="ps-section__footer">
                    <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-block--shopping-total">
                         
                            <div class="ps-block__content">
                                <h3>Total <span><?php  echo "&#8358;".number_format($total_price); ?></span></h3>
                            </div>
                        </div>
                        <?php
                          if(!empty($_SESSION["shopping_cart"])){
                            
                            echo '
                            <form method="POST" action="checkout.php">';
                           if(isset($error_on_number)){echo '<input type="hidden" name="error_on_number" value="1">';} 
                            echo '<input type="hidden" name="error_in_input" value="product_quantity">
                              <button type="submit" name="buy_button" class="ps-btn ps-btn--fullwidth">Proceed to checkout</button>
                            </form>
                            ';

                            }


                        ?>
                      </div>
                    </div>
                     
  
        </div>
                </div>
                <?php
                  } else{
                    echo '<h1>Your cart is empty!</h1>
                    <div class="ps-section__cart-actions">
                      <a class="ps-btn" href="shop.php"><i class="icon-arrow-left"></i> Back to Shop</a>
                    </div>';
                    }
                ?>
      <?php
if(!empty($_SESSION["shopping_cart"])){

$all_cat='';

foreach($_SESSION["shopping_cart"] as $code => $values) {
  $all_cat .=$values['cat'].',';

}
 $firstone = explode(',',$all_cat);
 


          $select_products3 = mysqli_query($connect,"SELECT * FROM products WHERE products_sub_categories = '".$firstone[0]."' ORDER BY products_id DESC LIMIT 6" ) or die(db_conn_error);

          if (mysqli_num_rows($select_products3) != 0) {

          echo '

          <div class="ps-deal-of-day mt-5 pt-5">
              <div class="ps-container">
                  <div class="ps-section__header">
                      <div class="ps-block--countdown-deal">
                          <div class="ps-block__left">
                              <h3>Related Products</h3>
                          </div>
                          <div class="ps-block__right">
                              
                          </div>
                      </div>
                  </div>
                  <div class="ps-section__content">
                  <div class="ps-carousel--responsive owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">';
                          
                          

                  while($rows_loop = mysqli_fetch_array($select_products3)){

                  echo '
                  <div class="ps-product">


                  <div class="ps-product__thumbnail">
                      <a href="product-description.php?id='.$rows_loop['products_id'].'"><img src="images/products/'.$rows_loop['products_image'].'" alt="'.$rows_loop['products_name'].'" /></a>';
                      if(!empty($rows_loop['products_sales_price'])){
                          $dis = 100 - ceil($rows_loop['products_sales_price']/$rows_loop['products_price']*100);
                          echo '
                          <div class="ps-product__badge">-'.$dis.'%</div>
                          ';
                      }
                      echo    '
                      <ul class="ps-product__actions">
                      
                      

                      <form method="POST" action="">
                          <input type="hidden" name="code" value="'.$rows_loop['products_id'].'" />
                          <button type="submit" class="btn-fade"><li><a data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li></button>
                      </form>
                      
                      

                      </ul>
                      </div>




                      <div class="ps-product__container">';
                      if(isset($_SESSION['user_id'])){
                      echo '<div class="text-center my-1">

                              <a href="edit-products.php?id='.$rows_loop['products_id'].'"><button type="button" class="btn btn-success btn-lg">Edit</button></a>
                              <a href="delete-products.php?id='.$rows_loop['products_id'].'"><button type="button" class="btn btn-danger btn-lg">Delete</button></a>
                          </div>';}


          

                      echo '
                              <div class="ps-product__content"><a class="ps-product__title" href="product-description.php?id='.$rows_loop['products_id'].'">'.$rows_loop['products_name'].'</a>
                                  <div class="ps-product__rating">
                                      <select class="ps-rating" data-read-only="true">
                                          <option value="1">1</option>
                                          <option value="1">2</option>
                                          <option value="1">3</option>
                                          <option value="1">4</option>
                                          <option value="2">5</option>
                                      </select><span>01</span>
                                  </div>
                                  <p class="ps-product__price sale">'; if(!empty($rows_loop['products_sales_price'])){
                                      echo '&#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>';
                                  } 
                  
                  echo '</p>
                  
                  </div>
                      <div class="ps-product__content hover"><a class="ps-product__title" href="product-description.php?id='.$rows_loop['products_id'].'">'.$rows_loop['products_name'].'</a>
                          <p class="ps-product__price sale">'; if(!empty($rows_loop['products_sales_price'])){
                              echo '&#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>';
                          } 
                      echo ' </p>
                              
                      </div>
                      
                      </div>





                  

                  </div>

                      ';}

                      echo '
                      </div>
                  </div>
              </div>
          </div> ';
          }
        }
      
      ?>





            </div>

        </div>





    </div>
  

<?php include ('../incs-template1/footer.php'); ?>
