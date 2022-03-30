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
$statement = 'products WHERE id_categories = '.$_GET['id'].' ORDER BY id_sub_categories  DESC'; 

?>	




    <div class="ps-page--shop">
        <div class="ps-container">
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">Sub categories</h4>
                        <ul class="ps-list--categories">

                        <?php  
                            $query_page_section =  mysqli_query($connect, "SELECT id_categories, sub_categories_name FROM sub_categories") or die(db_conn_error);

                            while($row_cat = mysqli_fetch_array($query_page_section)){
                                echo  '<li><a href="sub-categories.php?id='.$row_cat['id_categories'].'">'.$row_cat['sub_categories_name'].'</a>
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
                            $all_products = mysqli_query($connect,"SELECT products_id  FROM products, sub_categories WHERE id_categories = products_sub_categories AND id_categories = '".$_GET['id']."'") or die(db_conn_error);
                          
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

                                <?php echo pagination($statement,$per_page,$page,$url=GEN_WEBSITE.'/sub-categories.php?id='.$_GET['id'].'&'); ?>

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

