<?php require_once ('../incs-template1/config.php'); ?>
<?php include_once ('../incs-template1/cookie-session.php'); ?>
<?php
 $all_total_price = 0;
 
 foreach($_SESSION['shopping_cart'] as $codename => $codearray){

    $all_total_price += $codearray['price'] * $codearray['quantity'];
  } 
  
  
if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['pay'])){
	 

    $result = array();

    //Set other parameters as keys in the $postdata array


    $postdata = [
        'email' => $_SESSION['customer']['email_customer'],
        'amount' => $all_total_price*100,
        'reference' => $_SESSION['customer']['ref'],
        'callback_url' => GEN_WEBSITE.'/verify-payment.php'
    ];
    
    $url = "https://api.paystack.co/transaction/initialize";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $headers = [
        'Authorization: '.API,
        'Content-Type: application/json',
    
    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $request = curl_exec($ch);
    
    curl_close($ch);
    
    if ($request) {
    
        $result = json_decode($request, true);
    
        header('Location: ' . $result['data']['authorization_url']);
    
    }else{
        
         unset($_SESSION['shopping_cart']);
         unset($_SESSION['customer']);
    }


exit();
















    



    }
 
    
?>



<?php 
include ('../incs-template1/adding-to-cart.php'); 
include ('../incs-template1/header.php'); ?>
<?php include ('../incs-template1/settings.php'); ?>



<section class="ps-section--account ps-checkout">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Checkout Information</h3>
                </div>
                <div class="ps-section__content">
                    <form class="ps-form--checkout" action="" method="POST">
                        <div class="ps-form__content">
                            <div class="row">
                               
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-block--checkout-order">
                                        <div class="ps-block__content">
                                            <figure>
                                                <figcaption><strong>Product/Service</strong><strong>Total</strong></figcaption>
                                            </figure>
                                            
                                            <?php
                                            
                                            foreach($_SESSION['shopping_cart'] as $codename => $codearray){
                                                
                                                echo '<figure class="ps-block__items"><a>
                                                <strong>'.$codearray['name'].'</strong>';
                                          
                                                echo '<small> &#8358;'.$codearray['price'] * $codearray['quantity'].'</small></a>
                                            
                                           
                                            </figure>';


} 
 
?>
                                          
                                            <figure>
                                                <figcaption><strong>Subtotal</strong><strong><?php echo '&#8358;'.$all_total_price?></strong></figcaption>
                                            </figure>
                                                       
                                            
                                            <button class="ps-btn" type="submit" name="pay"> Checkout</button>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

</div>



<?php include ('../incs-template1/footer.php'); ?>