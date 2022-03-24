<?php require_once ('../incs-template1/config.php'); ?>
<?php include_once ('../incs-template1/cookie-session.php'); ?>
<?php


if (!isset($errors)){$errors = array();}
if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['checkout'])){
	 
    if (preg_match ('/^[a-zA-Z]{3,20}$/i', trim($_POST['firstname']))) {		//only 20 characters are allowed to be inputted
		$firstname = mysqli_real_escape_string ($connect, trim($_POST['firstname']));
	} else {
		$errors['firstname'] = 'Please enter firstname.';
	} 
	 
 
    if (preg_match ('/^[a-zA-Z]{3,20}$/i', trim($_POST['surname']))) {		//only 20 characters are allowed to be inputted
		$surname = mysqli_real_escape_string ($connect, trim($_POST['surname']));
	} else {
		$errors['surname'] = 'Please enter surname.';
	} 

    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $email = mysqli_real_escape_string($connect,$_POST['email']);
    }else{
        $errors['email'] = "Enter a valid email address";
    }

   
if(preg_match('/^(0)[0-9]{10}$/i',$_POST['phone'])){
        $phone =  mysqli_real_escape_string($connect,$_POST['phone']);
    }else{
        $errors['phone'] = "Enter a valid phone number";
    }
	
    if (preg_match ('/^.{3,255}$/i', trim($_POST['address']))) {		
		$address = mysqli_real_escape_string ($connect, trim($_POST['address']));
	} else {
		$errors['address'] = 'Please enter address.';
	} 	

    if (preg_match ('/^[a-zA-Z]{3,30}$/i', trim($_POST['city']))) {		
		$city = mysqli_real_escape_string ($connect, trim($_POST['city']));
	} else {
		$errors['city'] = 'Please enter city.';
	}  


if(isset($_SESSION['shopping_cart']) AND !empty($_SESSION['shopping_cart'])){

	if (empty($errors)){

        $all_total_price = 0;
      foreach($_SESSION['shopping_cart'] as $codename => $codearray){

        $all_total_price += $codearray['price'] * $codearray['quantity'];
      }  
       
      
      
        $ref = genReference(10);
    $q = mysqli_query($connect,"INSERT INTO orders (orders_firstname, orders_surname, orders_email, orders_phone, orders_address, orders_city, orders_name, orders_price, orders_reference) 
    VALUES ('".$firstname."','".$surname."', '".$email."', '".$phone."', '".$address."','".$city."', 'products', '".$all_total_price."', '".$ref."')") or die(db_conn_error);

if(mysqli_affected_rows($connect) == 1){

    


    $_SESSION['customer']['email_customer'] = $email;
    $_SESSION['customer']['surname_customer'] = $surname;
    $_SESSION['customer']['ref'] = $ref; 

    header("Location:pay.php");
	exit();






}








    }


}else{
    
     header("Location:/");
	exit();
    
}




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
                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-form__billing-info">
                                        <h3 class="ps-form__heading">Contact Information</h3>
                                        <div class="form-group">
                                            <label>Email </label>
                                            <input class="form-control" type="text" placeholder="Email address" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
                                            <?php if (array_key_exists('email', $errors)) {
				echo '<p class="text-danger">'.$errors['email'].'</p>';}?>
                                        </div>
                                        <div class="form-group">
                                            <label> Phone number</label>
                                            <input class="form-control" type="text" placeholder="Phone number" name="phone" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];} ?>">
                                            <?php if (array_key_exists('phone', $errors)) {
				echo '<p class="text-danger">'.$errors['phone'].'</p>';}?>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input class="form-control" type="text" placeholder="Firstname" name="firstname" value="<?php if(isset($_POST['firstname'])){echo $_POST['firstname'];} ?>">
                                                    <?php if (array_key_exists('firstname', $errors)) {
				echo '<p class="text-danger">'.$errors['firstname'].'</p>';}?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input class="form-control" type="text" placeholder="Lastname" name="surname" value="<?php if(isset($_POST['surname'])){echo $_POST['surname'];} ?>">
                                                    <?php if (array_key_exists('surname', $errors)) {
				echo '<p class="text-danger">'.$errors['surname'].'</p>';}?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" type="text" placeholder="Address" name="address" value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>">
                                            <?php if (array_key_exists('address', $errors)) {
				echo '<p class="text-danger">'.$errors['address'].'</p>';}?>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input class="form-control" type="text" placeholder="City" name="city" value="<?php if(isset($_POST['city'])){echo $_POST['city'];} ?>">
                                                    <?php if (array_key_exists('city', $errors)) {
				echo '<p class="text-danger">'.$errors['city'].'</p>';}?>
                                                </div>
                                            </div>

                                            
                                         
                                        </div>

                                        <div class="ps-block__content">
                                                                           
                                                        
                                            
                                                                           <button class="ps-btn" type="submit" name="checkout"> Continue</button>
                                                                          
                                                                       </div>

                                      
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-block--checkout-order">
                                       
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