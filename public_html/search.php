<?php require_once ('../incs-template1/config.php'); ?>
<?php include_once ('../incs-template1/cookie-session.php'); ?>

<?php
if(!isset($_GET['search'])){
    header("Location:./");
	exit();
}
?>


<?php 
include ('../incs-template1/adding-to-cart.php'); 
include ('../incs-template1/header.php'); ?>
<?php include ('../incs-template1/settings.php'); ?>

<?php 
include ('../incs-template1/paginate.php');
$statement = "products WHERE products_name LIKE '%".$_GET['search']."%' ORDER BY products_id DESC"; 
//$statement = 'products WHERE products_sub_categories = '.$_GET['search'].' ORDER BY products_id DESC'; 
?>	




    <div class="ps-page--shop" id="shop-sidebar">
        <div class="ps-container">
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                <?php 
                    include ('../incs-template1/category-sidebar.php');
                ?>
                    
                </div>
                <div class="ps-layout__right">
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">

                        <?php 
                            $all_products = mysqli_query($connect,"SELECT products_id  FROM products WHERE products_name LIKE '%".$_GET['search']."%'") or die(db_conn_error);
                          
                        ?>

                            <p><strong> <?php echo mysqli_num_rows($all_products); ?></strong> Products found</p>

                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="row">
                                        <?php 
                include ('../incs-template1/products.php');
?>
                                       
                                    </div>
                                </div>
                                <div class="ps-pagination">

                                <?php echo pagination($statement,$per_page,$page,$url=GEN_WEBSITE.'/search.php?search=&'); ?>

                                   
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
















<?php include ('../incs-template1/footer.php'); ?>

