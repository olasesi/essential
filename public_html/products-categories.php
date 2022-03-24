<?php 
require_once ('../incs-template1/config.php'); 
include_once ('../incs-template1/cookie-session.php'); 


if(!isset($_SESSION['user_id'])){
	header("Location:/");
	exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['delete_categories'])){

    $query_products_categories = mysqli_query($connect,"UPDATE products SET products_sub_categories = '1' WHERE products_sub_categories = '".$_POST['delete_categories']."'") or die(db_conn_error);
   

    mysqli_query($connect, "DELETE FROM products_categories WHERE products_categories_id = '".$_POST['delete_categories']."'") or die(db_conn_error);

    
    
    
    
   
    header('Location:'.GEN_WEBSITE.'/products-categories.php?confirm_delete=1');
    exit();
   

}


$errors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['submit'])){
	 
    if (preg_match ('/^.{3,20}$/i', trim($_POST['products_categories']))) {	
		$products_categories = mysqli_real_escape_string ($connect, trim($_POST['products_categories']));
	} else {
		$errors['products_categories'] = 'Please enter valid name.';
	} 
	 
  //now to edit the product	
     if (empty($errors)){
 
        $query_products_categories = mysqli_query($connect,"INSERT INTO products_categories (products_categories_name) 
        VALUES ('".$products_categories."')") or die(db_conn_error);

              if(mysqli_affected_rows($connect) == 1){
             
                header('Location:'.GEN_WEBSITE.'/products-categories.php?confirm=1');
                exit();
            }
       
             
           
 } 
 
  }













  include ('../incs-template1/adding-to-cart.php'); 
 include ('../incs-template1/header.php'); 
 include ('../incs-template1/settings.php');
 ?>









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
    

                   




<?php 
if(isset($_GET['confirm']) AND $_GET['confirm'] == 1){

    echo ' <h3><span class="badge bg-primary">New category added</span></h3>';

}

if(isset($_GET['confirm_delete']) AND $_GET['confirm_delete'] == 1){

    echo ' <h3><span class="badge bg-primary">Category has been deleted. Products in the category has been put into Uncategorized</span></h3>';

}


if(isset($_GET['confirm_modify']) AND $_GET['confirm_modify'] == 1){

    echo ' <h3><span class="badge bg-primary">Category has been modified</span></h3>';

}



?>











                   

                        <div class="ps-section__right">
                            <form class="ps-form--account-setting" action="" method="POST">
                                <div class="ps-form__header">
                                    <h3> Add products categories</h3>
                                </div>
                                <div class="ps-form__content">
                                     <div class="form-group">
                                        <label>Category name</label>
                                        <input class="form-control" type="text" placeholder="e.g Clothings" name="products_categories" value="<?php if(isset($_POST['products_categories'])){echo $_POST['products_categories'];} ?>">
                                        <?php if (array_key_exists('products_categories', $errors)) {
	                    echo '<p class="text-danger" >'.$errors['products_categories'].'</p>';
	                    }
                    ?>
                                    </div> 
                                    <div class="row">
                                      
                                    </div>
                                </div>
                                <div class="form-group submit">
                                    <button class="ps-btn" type="submit" name="submit">Add category</button>
                                </div>
                            </form>
                        </div>

<?php
     $select_products_cat = mysqli_query($connect, "SELECT products_categories_id, products_categories_name FROM products_categories WHERE products_categories_name != '".UNCATEGORIZED."'") or die(db_conn_error);

     if(mysqli_num_rows($select_products_cat) > 0){

echo '<div class="ps-form__header">
<h3>Modify products categories</h3>
</div>';

while($row_categories = mysqli_fetch_array($select_products_cat)){

echo '<div class="dropdown">
<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
'.$row_categories['products_categories_name'].'
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<form method="GET" action="products-categories-change.php">  

<button type="submit" class="dropdown-item" name="modify_categories" value="'.$row_categories['products_categories_id'].'">Modify categories</button>
</form>

<form method="POST" action="">  


<button type="submit" class="dropdown-item" name="delete_categories" value="'.$row_categories['products_categories_id'].'">Delete</button>

</form>
 
</div>
</div>';
     }
     }

?>
                   

                        
                    
                      
                       
                    
                    
                    </div>
                </div>
            </div>
        </section>
      
    </main>










<?php include ('../incs-template1/footer.php'); ?>