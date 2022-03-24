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




    <div class="ps-page--shop">
        <div class="ps-container">
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="ps-list--categories">

                        <?php  
                            $query_page_section =  mysqli_query($connect, "SELECT products_categories_id ,products_categories_name FROM  products_categories") or die(db_conn_error);

                            while($row_cat = mysqli_fetch_array($query_page_section)){
                                echo  '<li><a href="categories.php?id='.$row_cat['products_categories_id'].'">'.$row_cat['products_categories_name'].'</a>
                                </li>';

                            }

                        ?>    
                        </ul>
                    </aside>
                    
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

