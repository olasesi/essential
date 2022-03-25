<?php 
require_once ('../incs-template1/config.php'); 
include_once ('../incs-template1/cookie-session.php'); 


if(!isset($_SESSION['user_id'])){
	header("Location:./");
	exit();

}


$errors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['submit'])){
    
    if (is_uploaded_file($_FILES['top-banner']['tmp_name']) AND $_FILES['top-banner']['error'] == UPLOAD_ERR_OK){ 
         
    if($_FILES['top-banner']['size'] > 2097152){ 		//conditions for the file size 2MB
        $errors['editfile_size']="File size is too big. Max file size 2MB";
    }

        $editallowed_extensions = array('jpeg', '.png', '.jpg', '.JPG', 'JPEG', '.PNG','.gif', '.GIF');		
        $editallowed_mime = array('image/jpeg', 'image/png', 'image/pjpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/gif');
        $editimage_info = getimagesize($_FILES['top-banner']['tmp_name']);
        $ext = substr($_FILES['top-banner']['name'], -4);
        
    
    
    
    if (!in_array($_FILES['top-banner']['type'], $editallowed_mime) || !in_array($editimage_info['mime'], $editallowed_mime) || !in_array($ext, $editallowed_extensions)){
        $errors['wrong_upload'] = "Please choose correct file type. JPG, PNG, or GIF";
        
    }
        
    }else{
        $errors['top_banner'] = 'Please upload banner';	

    }

 
 
     //now to edit the product	
     if (empty($errors)){
 
       
        $new_name= (string) sha1($_FILES['top-banner']['name'] . uniqid('',true));
        $new_name .= ((substr($ext, 0, 1) != '.') ? ".{$ext}" : $ext);
        $dest = "images/top-banner/".$new_name;
        
        if (move_uploaded_file($_FILES['top-banner']['tmp_name'], $dest)) {
        
        $_SESSION['images']['new_name'] = $new_name;
        $_SESSION['images']['file_name'] = $_FILES['top-banner']['name'];
        
    



        $num_top_banner = mysqli_query($connect, "SELECT top_banner_id FROM top_banner") or die(db_conn_error);

        if(mysqli_num_rows($num_top_banner) == 0){

            mysqli_query($connect,"INSERT INTO top_banner(top_banner_image) 
            VALUES ('".$new_name."')") or die(db_conn_error);

        }else if(mysqli_num_rows($num_top_banner) == 1) {

            mysqli_query($connect, "DELETE FROM top_banner") or die(db_conn_error);

            mysqli_query($connect,"INSERT INTO top_banner(top_banner_image) 
            VALUES ('".$new_name."')") or die(db_conn_error);

        }



        
        if (mysqli_affected_rows($connect) == 1) {
        
        $_POST = array();		
        $_FILES = array();
            
        unset($_FILES['top-banner'], $_SESSION['images']);
        header('Location:'.GEN_WEBSITE);
        exit();
            
             
    }
 
 } else {

        trigger_error('The file could not be moved.');
        $errors['not_moved'] = "The file could not be moved.";
        unlink ($_FILES['top-banner']['tmp_name']);
    }	

 } 
 
 
  }

  //TODO
  //remove uploaded from folder













 include ('../incs-template1/adding-to-cart.php'); 
 include ('../incs-template1/header.php'); 
 include ('../incs-template1/settings.php');
 ?>









<main class="ps-page--my-account">
        <!-- <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                   
                </ul>
            </div>
        </div> -->
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
                            <form class="ps-form--account-setting" action="" method="POST" enctype="multipart/form-data">
                                <div class="ps-form__header">
                                    <h3> Top Banner</h3>
                                </div>
                                <div class="ps-form__content">
                                  
                                    <div class="row items">
                                       
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Upload</label>

                                                <input class="form-control" type="file" placeholder="Upload banner" name="top-banner">
                                                <?php 
                                                    if (array_key_exists('top_banner', $errors)) {
                                                    echo '<p class="text-danger">'.$errors['top_banner'].'</p>';}
                                                    
                                                    if (array_key_exists('editfile_size', $errors)) {
                                                        echo '<p class="text-danger">'.$errors['editfile_size'].'</p>';}

                                                    if (array_key_exists('wrong_upload', $errors)) {
                                                        echo '<p class="text-danger">'.$errors['wrong_upload'].'</p>';}

                                                    if (array_key_exists('not_moved', $errors)) {
                                                        echo '<p class="text-danger">'.$errors['not_moved'].'</p>';}
                                                        


                                                ?>
                                                <label style="color:#00000080">Max upload 2MB | *png, jpg, gif</label>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group submit">
                                    <button class="ps-btn" type="submit" name="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
    </main>










<?php include ('../incs-template1/footer.php'); ?>