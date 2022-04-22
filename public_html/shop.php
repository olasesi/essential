<?php require_once ('../incs-template1/config.php'); ?>
<?php include_once ('../incs-template1/cookie-session.php'); ?>
<?php 
include ('../incs-template1/adding-to-cart.php'); 
include ('../incs-template1/header.php'); ?>
<?php include ('../incs-template1/settings.php'); ?>


<?php 
include ('../incs-template1/paginate.php');
$statement = "products ORDER BY products_id DESC"; 
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

                    <div class="ps-page__header">
                        <h1>SHOP</h1>

                        <?php
                        if(isset($_SESSION['user_id'])){
                            echo  '<small>slider banners (870x399)px</small>';
                            }
                        ?>
                        <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">

                        
                        <?php
                            $query_slider_banner_select =  mysqli_query($connect, "SELECT shop_slider_image, shop_slider_name FROM shop_slider_banner ORDER BY shop_slider_id ASC LIMIT 3") or die(db_conn_error);

                        while($looping_slider=mysqli_fetch_array($query_slider_banner_select)){
                            echo ' 
                                <a href="shop-default.html"><img src="images/shop-sliders/'.$looping_slider['shop_slider_image'].'" alt="'.$looping_slider['shop_slider_name'].'" width="870px" height="399px" style="object-fit: cover;"></a>
                                    ';

                            }

                  
                   ?>


                        </div>
                    </div>

                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">

                        <?php 
                            $all_products = mysqli_query($connect,"SELECT products_id  FROM products") or die(db_conn_error);
                          
                        ?>

                            <p><strong> <?php echo mysqli_num_rows($all_products); ?></strong> Products found</p>

                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <?php
                                        if(isset($_GET['confirm_delete']) AND $_GET['confirm_delete'] == 1 ){
                                        echo ' <h3><span class="badge bg-primary">Product has been deleted</span></h3>';
                                        }
                                    ?>
                                    <div class="row">


                                    <?php 
                                        include ('../incs-template1/products.php');
                                    ?>
                                       
                                    </div>
                                </div>
                                <div class="ps-pagination">

                                <?php echo pagination($statement,$per_page,$page,$url=GEN_WEBSITE.'/shop.php?'); ?>

                                  
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
















<?php include ('../incs-template1/footer.php'); ?>

