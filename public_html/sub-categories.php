<?php require_once ('../incs-template1/config.php'); ?>
<?php include_once ('../incs-template1/cookie-session.php'); ?>

<?php
if(!isset($_GET['id'])){
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
$statement = 'products WHERE real_sub_categories = "'.$_GET['id'].'" ORDER BY products_id DESC'; 

?>	




    <div class="ps-page--shop" id="shop-sidebar">
        <div class="ps-container">
            <div class="ps-layout--shop" >
                <div class="ps-layout__left">
                    <?php 
                        include ('../incs-template1/category-sidebar.php');
                    ?>
                    
                </div>
                <div class="ps-layout__right">
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">

                        <?php
                            $all_products = mysqli_query($connect,"SELECT * FROM products WHERE real_sub_categories  = '".mysqli_real_escape_string($connect, $_GET['id'])."'") or die(db_conn_error);
                          
                        ?>

                            <p><strong> <?php echo mysqli_num_rows($all_products); ?></strong> Products found</p>

                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="row">
                                        <?php 
                include ('../incs-template1/products-subcat.php');
?>
                                       
                                    </div>
                                </div>
                                <div class="ps-pagination">

                                <?php echo pagination($statement,$per_page,$page,$url=GEN_WEBSITE.'/products-sub-categories.php?id='.$_GET['id'].'&'); ?>

                                    <!-- <ul class="pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                                    </ul> -->
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
















<?php include ('../incs-template1/footer.php'); ?>

