<?php require_once ('../incs-template1/config.php'); ?>
<?php include_once ('../incs-template1/cookie-session.php'); ?>
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
$query_page_section = mysqli_query($connect, "SELECT products_id, products_image FROM products WHERE products_id = '".mysqli_real_escape_string ($connect, $_GET['id'])."'") or die(db_conn_error);
if(mysqli_num_rows($query_page_section) == 1){

        while($deleteFolder = mysqli_fetch_array($query_page_section)){
            $deleteImage = $deleteFolder['products_image'];
           
           if($deleteImage != 'default.jpg'){
            unlink ('images/products/'.$deleteImage);
           }
       
       
       
        }



        mysqli_query($connect, "DELETE FROM products WHERE products_id = '".mysqli_real_escape_string ($connect, $_GET['id'])."'") or die(db_conn_error);
        mysqli_query($connect, "DELETE FROM inventory WHERE inventory_product_id = '".mysqli_real_escape_string ($connect, $_GET['id'])."'") or die(db_conn_error);



        header('Location:'.GEN_WEBSITE.'/shop.php?confirm_delete=1');
        exit();
   
}

?>


