<?php 
require_once ('../incs-template1/config.php'); 
include_once ('../incs-template1/cookie-session.php'); 


if(!isset($_SESSION['user_id'])){
	header("Location:./");
	exit();
}

if(!isset($_POST['modify_categories'])){
    header("Location:products-categories.php");
	exit();

}

$select_cat_to_modify = mysqli_query($connect, "SELECT products_categories_name FROM products_categories WHERE products_categories_id ='".$_POST['modify_categories']."'") or die(db_conn_error);

$errors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['submit'])){
	 
    if (preg_match ('/^.{3,20}$/i', trim($_POST['products_categories']))) {	
		$products_categories = mysqli_real_escape_string ($connect, trim($_POST['products_categories']));
	} else {
		$errors['products_categories'] = 'Please enter valid name.';
	} 
	 
 
    
 
 
     //now to edit the product	
     if (empty($errors)){
 
        mysqli_query($connect, "UPDATE products_categories SET products_categories_name='".$products_categories."' WHERE 	products_categories_id = '".$_POST['modify_categories']."'") or die(db_conn_error);

              if(mysqli_affected_rows($connect) == 1){
             
                header('Location:'.GEN_WEBSITE.'/products-categories.php?confirm_modify=1');
                exit();
            }
       
             
           
 } 
 
 
  }













  include ('../incs-template1/adding-to-cart.php'); 
 include ('../incs-template1/header.php'); ?>

<?php include ('../incs-template1/settings.php'); ?>







<main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                  
                </ul>
            </div>
        </div>



        <section class="ps-section--account">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ps-section__left">
                            <aside class="ps-widget--account-dashboard">
                                <div class="ps-widget__header"><img src="img/users/3.jpg" alt="" />
                                    <figure>
                                        <figcaption>Hello</figcaption>
                                        <p><?=$EMAIL;?></p>
                                    </figure>
                                </div>
                               
                            </aside>
                        </div>
                    </div>
                   <div class="col-lg-8">
    

                   











                   

                        <div class="ps-section__right">
                            <form class="ps-form--account-setting" action="" method="POST">
                                <div class="ps-form__header">
                                    <h3>Modify products categories</h3>
                                </div>
                                <div class="ps-form__content">
                                     <div class="form-group">
                                     <?php while($whiling_cat = mysqli_fetch_array($select_cat_to_modify)){
                                       $fetched_cat_name = $whiling_cat['products_categories_name'];
                                     }?>
                                        <label>Category name</label>
                                        <input class="form-control" type="text" placeholder="e.g Clothings" name="products_categories" value="<?php if(isset($_POST['products_categories'])){echo $_POST['products_categories'];}else{echo $fetched_cat_name;} ?>">
                                        <?php if (array_key_exists('products_categories', $errors)) {
	                    echo '<p class="text-danger" >'.$errors['products_categories'].'</p>';
	                    }
                    ?>
                                    </div> 
                                    <div class="row">
                                       
                                    </div>
                                </div>
                                <div class="form-group submit">
                                    <button class="ps-btn" type="submit" name="submit">Modify category</button>
                                </div>
                            </form>
                        </div>
         
                      
                       
                    
                    
                    </div>
                </div>
            </div>
        </section>
      
    </main>










<?php include ('../incs-template1/footer.php'); ?>