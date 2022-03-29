<?php 
require_once ('../incs-template1/config.php'); 
include_once ('../incs-template1/cookie-session.php'); 
?>
<?php
if(!isset($_SESSION['user_id'])){
	header("Location:./");
	exit();
}
?>
<?php
if(!isset($_GET['id'])){
    header("Location:./");
	exit();
}
?>
<?php
$query_page_section =  mysqli_query($connect, "SELECT * FROM inventory,products WHERE products_id = '".mysqli_real_escape_string ($connect, $_GET['id'])."' AND inventory_product_id =  '".mysqli_real_escape_string ($connect, $_GET['id'])."' ") or die(db_conn_error);

while($row_cat = mysqli_fetch_array($query_page_section)){
    $products_name=$row_cat['products_name'];
    $products_price=$row_cat['products_price'];
    $products_sales_price=$row_cat['products_sales_price'];
    $products_sub_categories=$row_cat['products_sub_categories'];
    $products_promo=$row_cat['products_promo'];
    $products_deals=$row_cat['products_deals'];
    $products_new_arrivals=$row_cat['products_new_arrivals'];
    $products_best_sellers=$row_cat['products_best_sellers'];
    $products_popular=$row_cat['products_popular'];
    $products_short_description=$row_cat['products_short_description'];
    $products_long_description=$row_cat['products_long_description'];
    $products_image=$row_cat['products_image'];
    $inventory_value=$row_cat['inventory_value'];
}



?>




<?php

$errors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['submit'])){
	 
    if (preg_match ('/^[a-z A-Z0-9_-]{3,20}$/i', trim($_POST['products_name']))) {	
		$products_name = mysqli_real_escape_string ($connect, trim($_POST['products_name']));
	} else {
		$errors['products_name'] = 'Please enter valid name.';
	} 
	 
    if (preg_match ('/^[0-9]{0,10}$/i', trim($_POST['price']))) {	
		$products_price = mysqli_real_escape_string ($connect, trim($_POST['price']));
	} else {
		$errors['price'] = 'Please enter valid price.';
	} 


  
if(!empty($_POST['price']) AND empty($_POST['sales_price'])){
    $products_sales_price = mysqli_real_escape_string ($connect, trim($_POST['sales_price']));
}elseif(!empty($_POST['price']) AND !empty($_POST['sales_price'])){
if(preg_match ('/^[0-9]{0,10}$/i', trim($_POST['price'])) AND preg_match ('/^[0-9]{0,10}$/i', trim($_POST['sales_price']))){
if($_POST['sales_price'] < $_POST['price']){
    $products_sales_price = mysqli_real_escape_string($connect, trim($_POST['sales_price']));
}else{
    $errors['sales_price'] = 'Regular price must be greater than sales price';  
}

}else{
    $errors['sales_price'] = 'Please enter valid value for regular price or and sales price.';    
}

    
}


if (preg_match ('/^[0-9]{1,4}$/i', trim($_POST['inventory']))) {	
    $inventory = mysqli_real_escape_string ($connect, trim($_POST['inventory']));
} else {
    $errors['inventory'] = 'Please enter valid number';
} 


 if ($_POST['products_categories'] == 'Choose categories') {
        $errors['products_categories'] = 'Please select a category';
    } else{
    $cat = $_POST['products_categories'];
    }



    if (isset($_POST['hot_promo'])) {
        $hot_promo = $_POST['hot_promo'];
    }else{
        $hot_promo = 0;
    } 

    if (isset($_POST['deals_of_the_day']) ){
        $deals_of_the_day = $_POST['deals_of_the_day'];
    } else{
    $deals_of_the_day = 0;
}
    if (isset($_POST['new_arrivals'])) {
        $new_arrivals = $_POST['new_arrivals'];
    } else{
        $new_arrivals =0;
    }

    if (isset($_POST['best_sellers']) ){
        $best_sellers = $_POST['best_sellers'];
    } else{
        $best_sellers = 0;
    }

    if (isset($_POST['most_popular'])) {
        $most_popular = $_POST['most_popular'];
    }else{
$most_popular = 0 ;

    }

    if (preg_match ('/^.{0,250}$/i', trim($_POST['short']))) {	
		$products_desc_short = mysqli_real_escape_string ($connect, trim($_POST['short']));
	} else {
		$errors['short'] = 'Character is longer than 250 ';
	} 


    if (preg_match ('/^.{0,1000}$/i', trim($_POST['long']))) {	
		$products_desc_long = mysqli_real_escape_string ($connect, trim($_POST['long']));
	} else {
		$errors['long'] = 'Character is longer than 1000 ';
	} 

 
    

     //now to edit the product	
     if (empty($errors)){
 
       


mysqli_query($connect, "UPDATE products SET products_name='".$products_name."', products_price = '".$products_price."', products_sales_price = '".$products_sales_price."' , products_sub_categories = '".$cat."', products_promo = '".$hot_promo."', products_deals = '".$deals_of_the_day."', products_new_arrivals = '".$new_arrivals."', products_best_sellers = '".$best_sellers."', products_popular = '".$most_popular."', products_short_description = '".$products_desc_short."', products_long_description= '".$products_desc_long."' WHERE products_id  = '".mysqli_real_escape_string ($connect, $_GET['id'])."'") or die(db_conn_error);
    if (mysqli_affected_rows($connect) == 1) {
        
   
            
 
        header('Location:'.GEN_WEBSITE.'/product-description.php?confirm_modify=1&id='.$_GET['id']);
        exit();
       
        
}


      
       
             
           
 } 
 
 
  }

//Upload image
  if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['upload'])){

    if (is_uploaded_file($_FILES['product_image']['tmp_name']) AND $_FILES['product_image']['error'] == UPLOAD_ERR_OK){ 
         
        if($_FILES['product_image']['size'] > 2097152){ 		//conditions for the file size 2MB
            $errors['editfile_size']="File size is too big. Max file size 2MB";
        }
    
        $editallowed_extensions = array('jpeg', '.png', '.jpg', '.JPG', 'JPEG', '.PNG');		
        $editallowed_mime = array('image/jpeg', 'image/png', 'image/pjpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/x-png');
        $editimage_info = getimagesize($_FILES['product_image']['tmp_name']);
        $ext = substr($_FILES['product_image']['name'], -4);
        
        
        
        
        if (!in_array($_FILES['product_image']['type'], $editallowed_mime) || !in_array($editimage_info['mime'], $editallowed_mime) || !in_array($ext, $editallowed_extensions)){
            $errors['wrong_upload'] = "Please choose correct file type. JPG or PNG";
            
        }
        
    }







    if (empty($errors)){
 
       
        if (is_uploaded_file($_FILES['product_image']['tmp_name']) AND $_FILES['product_image']['error'] == UPLOAD_ERR_OK){
       
        $new_name= (string) sha1($_FILES['product_image']['name'] . uniqid('',true));
        $new_name .= ((substr($ext, 0, 1) != '.') ? ".{$ext}" : $ext);
        $dest = "images/products/".$new_name;
        
        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $dest)) {
        
        $_SESSION['images']['new_name'] = $new_name;
        $_SESSION['images']['file_name'] = $_FILES['product_image']['name'];
        


} else {
        trigger_error('The file could not be moved.');
        $errors['not_moved'] = "The file could not be moved.";
        unlink ($_FILES['product_image']['tmp_name']);
        }	

    }





$image_uploaded = (isset($_SESSION['images']['new_name']))?$_SESSION['images']['new_name']:'default.jpg';

 mysqli_query($connect,"UPDATE products SET products_image = '".$image_uploaded."' WHERE products_id = '".$_GET['id']."'") or die(db_conn_error);
    if (mysqli_affected_rows($connect) == 1) {

        mysqli_query($connect,"INSERT INTO inventory(inventory_product_id,inventory_value) VALUES ( '". mysqli_insert_id($connect)."','".$inventory."')") or die(db_conn_error);
        
        $_POST = array();		
        $_FILES = array();
        
        unlink ('images/products/'.$products_image);
        unset($_FILES['product_image'], $_SESSION['images']);
        header('Location:'.GEN_WEBSITE.'/product-description.php?confirm_modify=1&id='.$_GET['id']);
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
                                    <h3> Edit products</h3>
                                </div>
                                <div class="ps-form__content">
                                     <div class="form-group">
                                        <label>Product name <span style="color:red;">*</span></label>
                                        <input class="form-control" type="text" placeholder="e.g Long sleeve Shirt" name="products_name" value="<?php if(isset($_POST['products_name'])){echo $_POST['products_name'];}else{echo $products_name;} ?>">
                                        <?php if (array_key_exists('products_name', $errors)) {
	                    echo '<p class="text-danger">'.$errors['products_name'].'</p>';
	                    }
                    ?>
                                 </div> 
                                    <div class="row">
                                         <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Price <span style="color:red;">*</span></label>
                                                <input class="form-control" type="text" name="price" placeholder="e.g 5500" value="<?php if(isset($_POST['price'])){echo $_POST['price'];}else{echo $products_price;} ?>">
                                                <?php if (array_key_exists('price', $errors)) {
	                    echo '<p class="text-danger">'.$errors['price'].'</p>';
	                    }
                    ?>
                        
</div>




                                            <div class="form-group">
                                        <div class="ps-checkbox">
                                            <input class="form-control" type="checkbox" id="hot promo" name="hot_promo" value="Hot promotion" <?php if(isset($_POST['hot_promo'])){echo 'checked';}elseif($products_promo == 'Hot promotions'){echo 'checked';} ?>>
                                            <label for="hot promo">Hot promotions</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="ps-checkbox">
                                            <input class="form-control" type="checkbox" id="deals" <?php if(isset($_POST['deals_of_the_day'])){echo 'checked';}elseif($products_deals == 'Deals of the day'){echo 'checked';} ?> name="deals_of_the_day" value="Deals of the day">
                                            <label for="deals">Deals of the day</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="ps-checkbox">
                                            <input name="new_arrivals" value="New arrivals" <?php if(isset($_POST['new_arrivals'])){echo 'checked';}elseif($products_new_arrivals == 'New arrivals'){echo 'checked';} ?> class="form-control" type="checkbox" id="arrivals">
                                            <label for="arrivals">New arrivals</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="ps-checkbox">
                                            <input name="best_sellers" value="Best bellers" <?php if(isset($_POST['best_sellers'])){echo 'checked';}elseif($products_best_sellers == 'Best sellers'){echo 'checked';} ?> class="form-control" type="checkbox" id="best sellers">
                                            <label for="best sellers">Best sellers</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="ps-checkbox">
                                            <input name="most_popular" <?php if(isset($_POST['most_popular'])){echo 'checked';}elseif($products_popular == 'Most Popular'){echo 'checked';} ?> class="form-control" type="checkbox" id="popular" value="Most popular">
                                            <label for="popular">Most Popular</label>
                                        </div>
                                    </div>



                                            
                                        </div>
                                       



                                        
                                         <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Products sub/categories<span style="color:red;">*</span></label>
                                               
                                                <select class="form-control" name="products_categories">
                                                
                                                    
                                             
                                               
                                               
                       <?php        
                         $products_cat_select = mysqli_query($connect, "SELECT products_categories_name, products_categories_id FROM products_categories") or die(db_conn_error);

if(isset ($_POST['products_categories'])){
                        echo '<option>Choose categories</option>';
                        while($while_products_cat = mysqli_fetch_array($products_cat_select)){
                            //$selected = (isset($_POST['products_categories']))?:;
                            
                            echo '<option value="'.$while_products_cat['products_categories_id'].'">'.$while_products_cat['products_categories_name'].'</option>';
 
                        }  
                    }else{
                        echo '<option>Choose categories</option>';
                        while($while_products_cat = mysqli_fetch_array($products_cat_select)){
                            $selected = ($while_products_cat['products_categories_id'] == $products_sub_categories)?'selected="selected"':'';
                            
                            echo '<option value="'.$while_products_cat['products_categories_id'].'" '.$selected.'>'.$while_products_cat['products_categories_name'].'</option>';
 

                    }
                }
                       
                        ?>            
                      
      
 </select>





 <?php 
                   
                   if (array_key_exists('products_categories', $errors)) {
                       echo '<p class="text-danger">'.$errors['products_categories'].'</p>';
                       }
?>
   </div>
      
                                        </div> 

                                    </div>
                                </div>



                <div class="row">



                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Discount Price</label>
                            <input class="form-control" type="text" name="sales_price" placeholder="e.g 5500" value="<?php if(isset($_POST['sales_price'])){echo $_POST['sales_price'];}else{echo $products_sales_price;} ?>">
                            <?php if (array_key_exists('sales_price', $errors)) {
                                echo '<p class="text-danger">'.$errors['sales_price'].'</p>';
                                }
                            ?>
    


                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>No of product</label>
                            <input class="form-control" type="number" name="inventory"  value="<?php if(isset($_POST['inventory'])){echo $_POST['inventory'];}else{echo $inventory_value;} ?>" min="1">           
                        </div>

                    </div>




    <div  class="col-sm-12">

                                <div class="form-group">
                                        <label>Short description</label>
                                        <div class="form-group__content">
                                            <textarea name="short" class="form-control" cols="3" placeholder="Short description of the product"><?php if(isset($_POST['short'])){echo $_POST['short'];}else{echo $products_short_description;}?></textarea>

                                            <?php 
                   
                   if (array_key_exists('short', $errors)) {
                       echo '<p class="text-danger" >'.$errors['short'].'</p>';
                       }
                   ?>
                                        </div>
                                    </div>


                    </div>
                    </div>


                    <div class="row">
    <div  class="col-sm-12">

                                <div class="form-group">
                                        <label>Long description</label>
                                        <div class="form-group__content">
                                            <textarea name="long" class="form-control" rows="7" placeholder="Long description of the product"><?php if(isset($_POST['long'])){echo $_POST['long'];}else{echo $products_long_description;}?></textarea>
                                            <?php 
                   
                   if (array_key_exists('long', $errors)) {
                       echo '<p class="text-danger" >'.$errors['long'].'</p>';
                       }
                   ?>
                                        </div>
                                    </div>


                    </div>
                    </div>






                                <div class="form-group submit">
                                    <button class="ps-btn" type="submit" name="submit">Edit details</button>
                                </div>
                            </form>
                        </div>











                        <div class="ps-section__right">
                            <form class="ps-form--account-setting" action="" method="POST" enctype="multipart/form-data">
                                <div class="ps-form__header">
                                    <h3> Change Image</h3>
                                </div>
                              






                    <div class="row">
    
                    <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Upload new image</label>
                                                <input class="form-control" type="file" placeholder="Upload image" name="product_image">
                                                <?php 
                        // if (array_key_exists('image_upload', $errors)) {
				        // echo '<p class="text-danger">'.$errors['image_upload'].'</p>';}
                        
                        if (array_key_exists('editfile_size', $errors)) {
                            echo '<p class="text-danger">'.$errors['editfile_size'].'</p>';}

                        if (array_key_exists('wrong_upload', $errors)) {
                            echo '<p class="text-danger">'.$errors['wrong_upload'].'</p>';}

                        if (array_key_exists('not_moved', $errors)) {
                            echo '<p class="text-danger">'.$errors['not_moved'].'</p>';}
                            


                        ?>
                        <label style="color:#00000080">Max upload 2MB | *png, jpg</label>
                                            </div>
                                        </div> 




                    </div>
                    </div>






                                <div class="form-group submit">
                                    <button class="ps-btn" type="submit" name="upload">Upload Image</button>
                                </div>
                            </form>
                        </div>




















                        
                    
                      
                       
                    
                    
                    </div>
                </div>
            </div>
        </section>
        <!-- <div class="ps-newsletter">
            <div class="ps-container">
                <form class="ps-form--newsletter" action="do_action" method="post">
                    <div class="row">
                        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__left">
                                <h3>Newsletter</h3>
                                <p>Subcribe to get information about products and coupons</p>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__right">
                                <div class="form-group--nest">
                                    <input class="form-control" type="email" placeholder="Email address">
                                    <button class="ps-btn">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> -->
    </main>










<?php include ('../incs-template1/footer.php'); ?>