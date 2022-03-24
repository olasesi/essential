<?php 
require_once ('../../incs-template1/config.php');
include_once ('../../incs-template1/cookie-session.php'); 

if(isset($_SESSION['user_id'])){
	header("Location:.././");
	exit();
}

$login_array = array();
if(isset($_POST['login']) AND $_SERVER['REQUEST_METHOD']== "POST" ){

if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
	$em = mysqli_real_escape_string($connect,$_POST['email']);
}else{
	$login_array['email_error'] = "Please enter a valid email address";
}

if(preg_match('/^.{6,255}$/i',$_POST['password'])){
	$pw =  mysqli_real_escape_string($connect,$_POST['password']);
}else{
	$login_array['password_error'] = "Please enter a password that is 6 characters and above";
}



if(empty($login_array)){
		$vl =  mysqli_query($connect, "SELECT * FROM users WHERE(email='".$em."' AND password='".$pw."' AND active='1')") or die(db_conn_error);
		if(mysqli_num_rows($vl)== 1){
		 $row = mysqli_fetch_array($vl,MYSQLI_NUM);
		 
		 $value = md5(uniqid(rand(), true));
		 $query_confirm_sessions = mysqli_query ($connect, "SELECT cookies_session FROM users WHERE email='".$em."' AND active = '1'") or die(db_conn_error);
	$cookie_value_if_empty = mysqli_fetch_array($query_confirm_sessions);
	
	if (empty($cookie_value_if_empty[0])){
	mysqli_query($connect,"UPDATE users SET cookies_session = '".$value."' WHERE email='".$em."' AND active = '1'") or die(db_conn_error);		
	setcookie("remember_me", $value, time() + 432000);	//session time out is 5 days
	
	}else if(!empty($cookie_value_if_empty[0])){
	
	setcookie("remember_me", $cookie_value_if_empty[0], time() + 432000);	
	}
	
		 
		$_SESSION['user_id'] = $row[0];
		$_SESSION['email'] = $row[2];
		 
		header("Location:./"); exit;
		}else{ 
		 $login_array['password_mismatch']= "Email and password do not match";}
}
}



?>



<?php 
include ('../../incs-template1/adding-to-cart.php'); 

 ?>

 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    
    
    <!--facebook open graph -->
    <meta property="og:url" content="<?php 'https://'.$website_name; ?>" />
    <meta property="og:type" content="website" />
    <!--<meta property="og:title" content="" />-->
    <!--<meta property="og:description" content="<?php ?>" />-->
    <!--<meta property="og:image"   content="<?php ?>" />-->
    
    
    <meta name="keywords" content="<?php echo KEY_WORDS;?>">
    <meta name="description" content="<?php echo PAGE_DESCRIPTION;?>">
    <title><?php echo TITLE;?></title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../fonts/Linearicons/Linearicons/Font/demo-files/demo.css">
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../plugins/owl-carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="../plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="../plugins/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="../plugins/lightGallery-master/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="../plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="../plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/color-style.css">
</head>

<body class="loaded">


<div class="ps-page--my-account">
    
    <div class="ps-my-account">
        <div class="container">
            <form class="ps-form--account ps-tab-root" action="" method="POST">
                <ul class="ps-tab-list">
                    <li class="active"><a href="#sign-in">Admin Login</a></li>
                    <!-- <li><a href="#register">Register</a></li> -->
                </ul>
                <div class="ps-tabs">
                    <div class="ps-tab active" id="sign-in">
                        <div class="ps-form__content">
                            <h5>Log in to your account </h5>
                            <div class="form-group">
                            <?php 
                            if(array_key_exists('email-error', $login_array)){echo '<p class="text-danger">'.$login_array['email-error'].'</p>';}
                            
                           
                            if(array_key_exists('password_mismatch', $login_array)){echo '<p class="text-danger">'.$login_array['password_mismatch'].'</p>';}
                            
                            ?>  
                                <input class="form-control" type="text" placeholder="Email address" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'] ;} ?>">
                            </div>
                           <?php if(array_key_exists('password_error', $login_array)){echo '<p class="text-danger">'.$login_array['password_error'].'</p>';}?>

                            <div class="form-group form-forgot">
                                <input class="form-control" type="password" name="password" placeholder="Password" value="<?php if(isset($_POST['password'])){echo '';} ?>"><!--<a href="">Forgot?</a>-->
                            </div>
                          
                            <div class="form-group submtit">
                                <button class="ps-btn ps-btn--fullwidth" type="submit" name="login">Login</button>
                            </div>
                        </div>
                         <div class="ps-form__footer">
                            <p></p>
                            <ul class="ps-list--social">
                               
                            </ul>
                        </div> 
                    </div>
                   
                </div>
            </form>
        </div>
    </div>
    
</div>



