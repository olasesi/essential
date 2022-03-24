<?php require_once ('../incs-template1/config.php'); ?>
<?php include_once ('../incs-template1/cookie-session.php'); ?>
<?php
if(!isset($_GET['id'])){
    header("Location:./");
	exit();
}
?>
<?php
$query_page_section =  mysqli_query($connect, "SELECT products_id FROM products WHERE products_id = '".mysqli_real_escape_string ($connect, $_GET['id'])."'") or die(db_conn_error);
if(mysqli_num_rows($query_page_section) != 1){
    header("Location:./");
	exit();  
}
?>


<?php
include ('../incs-template1/adding-to-cart.php'); 
include ('../incs-template1/header.php'); ?>
<?php include ('../incs-template1/settings.php'); ?>


<div class="ps-page--product">
        <div class="ps-container">
        <?php
if(isset($_GET['confirm_modify']) AND $_GET['confirm_modify'] == 1){
echo ' <h3><span class="badge bg-primary">Product has been modified</span></h3>';
}
?>

            <div class="ps-page__container">
                <div class="ps-page__left">
                    <div class="ps-product--detail ps-product--fullwidth">
                        <div class="ps-product__header">
                            <div class="ps-product__thumbnail" data-vertical="true">
                                <figure>
                                    <div class="ps-wrapper">

                                    <?php 
                                    $query_sel_pro_sec =  mysqli_query($connect, "SELECT * FROM products, products_categories WHERE products_categories_id = products_sub_categories AND products_id = '".mysqli_real_escape_string ($connect, $_GET['id'])."'") or die(db_conn_error);

while($rows_loop = mysqli_fetch_array($query_sel_pro_sec)){

                                    ?>

                                        <div class="ps-product__gallery" data-arrow="true">
                                            <div class="item"><a><img src="images/products/<?php echo $rows_loop['products_image']; ?>" alt="<?php echo $rows_loop['products_name']; ?>"></a></div>
                                           
                                        </div>
                                    </div>
                                </figure>
                                <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                                    <div class="item"><img src="images/products/<?php echo $rows_loop['products_image']; ?>" alt="<?php echo $rows_loop['products_name']; ?>"></div>
                                  
                                </div>
                            </div>
                            <div class="ps-product__info">
                                <h1><?php echo $rows_loop['products_name']; ?></h1>
                                <div class="ps-product__meta">
                                    
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="1">5</option>
                                        </select>
                                       
                                    </div> 
                                </div>
                                <h4 class="ps-product__price"><?php if(empty($rows_loop['products_sales_price'])){echo '&#8358;'.number_format($rows_loop['products_price']);}else{echo '&#8358;'.number_format($rows_loop['products_sales_price']);}  ?></h4>
                                <div class="ps-product__desc">
                                   
                                   
                                </div>
                               
                                <div class="ps-product__shopping">
                                    <figure>
                                       

                                 
                                  



<form method="POST" action=""> 
        <input type="hidden" name="code" value="<?php echo $rows_loop['products_id']; ?>" />
           
            <button class="ps-btn d-block d-sm-block" type="submit" name="buy_button">Add to Cart</button>
           
        </form>


                                    
                                </div>
                                <div class="ps-product__specification">
                                  
                                    <p class="categories"><strong> Categories:</strong><a><?php echo $rows_loop['products_categories_name']; ?></a></p>
                                   
                                </div>
                                 <div class="fb-share-button" data-href="https://<?=$website_name;?>/product-description.php?id=<?=$_GET['id'];?>" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2F<?=$website_name;?>%2Fproduct-description.php%3Fid%3D<?=$_GET['id'];?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fa fa-facebook"> Share</i></a></div>
                                <div class="ps-product__sharing">
                               
                                
                                
                               
                                </div>
                            </div>
                        </div>
                        <div class="ps-product__content ps-tab-root">
                            <ul class="ps-tab-list">
                                <li class="active"><a href="#tab-1">Description</a></li>
                               
                            </ul>
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="tab-1">
                                    <div class="ps-document">
                                       
                                       
                                      <p><?php echo $rows_loop['products_long_description']; }?></p>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-page__right">
                    <aside class="widget widget_product widget_features">
                        <p><i class="icon-network"></i> Nationwide delivery</p>
                        <p><i class="icon-3d-rotate"></i> Friendly return policy</p>
                        <p><i class="icon-receipt"></i> Amazing customer service</p>
                        <p><i class="icon-credit-card"></i> Online payment</p>
                    </aside>
                    <aside class="widget widget_sell-on-site">
                        <p><i class="icon-store"></i> Buy from <?php echo $website_name_with_spaces; ?></p>
                    </aside>
                   
                </div>
            </div>
           
        </div>
    </div>




</div>











<?php include ('../incs-template1/footer.php'); ?>