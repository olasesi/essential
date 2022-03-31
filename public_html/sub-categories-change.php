<?php 
require_once ('../incs-template1/config.php'); 
include_once ('../incs-template1/cookie-session.php'); 


if(!isset($_SESSION['user_id'])){
	header("Location:/");
	exit();
}

if(!isset($_GET['modify_sub_categories'])){
	header("Location:/");
	exit();
}



$select_subcategory_cat = mysqli_query($connect, "SELECT id_sub_categories, sub_categories_name FROM sub_categories WHERE id_sub_categories = '".$_GET['modify_sub_categories']."'") or die(db_conn_error);
if(mysqli_num_rows($select_subcategory_cat) == 1){
   while($rows = mysqli_fetch_array($select_subcategory_cat)){
    $rows_each_subcategory = $rows['sub_categories_name'];
}
}else{
	header("Location:/");
	exit();
}

$errors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['submit'])){
	 
    if (preg_match ('/^.{3,20}$/i', trim($_POST['sub_categories']))) {	
		$subcategory_categories = mysqli_real_escape_string ($connect, trim($_POST['sub_categories']));
	} else {
		$errors['sub_categories'] = 'Please enter valid category name.';
	} 
	 
  //now to edit the product	
     if (empty($errors)){
     
        $query_subcategory_categories = mysqli_query($connect,"UPDATE sub_categories SET sub_categories_name = '".$subcategory_categories."' WHERE id_sub_categories = '".$_GET['modify_sub_categories']."'") or die(db_conn_error);

       // $confirm = 1;   
        
           if(mysqli_affected_rows($connect) == 1){
             
                 header('Location:'.GEN_WEBSITE.'/sub-categories.php?confirm_modify=1');
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
    

                   




<?php 
if(isset($confirm) AND $confirm == 1){
    echo ' <h3><span class="badge bg-primary">Sub-category has been added</span></h3>';

}
?>

<?php 
if(isset($confirm) AND $confirm == 1){
    echo '<h3><span class="badge bg-primary"><a href="/sub-categories.php">Back to Products Categories</a></span></h3>';

}
?>









                   

                        <div class="ps-section__right">
                            <form class="ps-form--account-setting" action="" method="POST">
                                <div class="ps-form__header">
                                    <h3> Modify sub categories</h3>
                                </div>
                                <div class="ps-form__content">
                                     <div class="form-group">
                                        <label>Change category name</label>
                                        <input class="form-control" type="text" placeholder="e.g Clothings" name="sub_categories" value="<?php if(isset($_POST['sub_categories'])){echo $_POST['sub_categories'];}else{echo $rows_each_subcategory;} ?>">
                                        <?php if (array_key_exists('sub_categories', $errors)) {
	                    echo '<p class="text-danger" >'.$errors['sub_categories'].'</p>';
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