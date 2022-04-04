<footer class="ps-footer">
    <div class="ps-container">
        <div class="ps-footer__widgets">
        <aside class="widget widget_footer">
                <h4 class="widget-title">About us</h4>
                <ul class="ps-list--link">
                    <p><?=FOOTER_DESCRIPTION;?></p>
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Company</h4>
                <ul class="ps-list--link">
                    <li><a href="/">Home</a></li>
                   
                    <li><a href="shop.php">Shop</a></li>
                   
                </ul>
            </aside>
     
          

               
        <aside class="widget widget_footer widget_contact-us">
                <h4 class="widget-title">Contact us</h4>
                <div class="widget_content">
                    <p>Call us 24/7</p>
                    <h3><?=$TEL;?></h3>
                    <h3><?=$TEL2;?></h3>
                    <p><?=$ADDRESS;?><br><a href="mailto:<?=$EMAIL;?>"><?=$EMAIL;?></a></p>
                    <p><?=$ADDRESS2;?><br><a href="mailto:<?=$EMAIL2;?>"><?=$EMAIL2;?></a></p>
                    <ul class="ps-list--social">
                   <?php 
                   if(!empty($WHATSAPP_LINK)){echo '<li><a target="_blank" class="instagram" href="'.$WHATSAPP_LINK.'"><i class="fa fa-whatsapp"></i></a></li>';}
                   if(!empty($FB_LINK)){echo '<li><a target="_blank" class="facebook" href="'.$FB_LINK.'"><i class="fa fa-facebook"></i></a></li>';}
                    if(!empty($TW_LINK)){echo '<li><a target="_blank" class="twitter" href="'.$TW_LINK.'"><i class="fa fa-twitter"></i></a></li>';}
                       
                            if(!empty($INSTAGRAM_LINK)){echo '<li><a target="_blank" class="instagram" href="'.$INSTAGRAM_LINK.'"><i class="fa fa-instagram"></i></a></li>';}
                                if(!empty($URL_LINK)){echo '<li><a target="_blank" class="google-plus" href="'.$URL_LINK.'"><i class="fa fa-globe"></i></a></li>';}
                    ?>
                    </ul>
                </div>
            </aside>
           
          
        </div>
       
        <div class="ps-footer__copyright">
            <p>&copy; <script>var footer_date=new Date(); document.write(footer_date.getFullYear())</script> Duromedia. All Rights Reserved</p>
           
        </div>
    </div>
</footer>
 <div id="scrool">
    <div class="back2top"><i class="icon icon-arrow-up"></i></div>
    <div class="whatsapp">
        <?php 
        if(!empty($WHATSAPP_LINK)) {
            echo '<a href="'.$WHATSAPP_LINK.'" target="_blank">
               <i class="fab fa-whatsapp-square    "></i>
            </a>';
            
        }
        ?>
    </div>

</div>
<div class="ps-site-overlay"></div>


<!--include ../../data/menu/menu-product-categories-->
<div class="ps-panel--sidebar" id="navigation-mobile">
    <div class="ps-panel__header">
        <h3>Categories</h3>
    </div>
    <div class="ps-panel__content">
        <div class="menu--product-categories">
            <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>
             <div class="menu__content">
                <ul class="menu--mobile">

                    <?php
                    $query_select_products_cat =  mysqli_query($connect, "SELECT products_categories_id, products_categories_name FROM products_categories") or die(mysqli_error($connect));

                    while ($while_product_cat = mysqli_fetch_array($query_select_products_cat)){
                        echo '<li class="menu-item-has-children has-mega-menu">
                    <a href="categories.php?id=' . $while_product_cat['products_categories_id'] . '">' . $while_product_cat['products_categories_name'] . '</a>
                    
                    ';
    
                            $query_select_subcategory =  mysqli_query($connect, "SELECT id_sub_categories, id_categories, sub_categories_name FROM sub_categories WHERE id_categories = '" . $while_product_cat['products_categories_id'] . "'") or die(mysqli_error($connect));
                                
                        $counting_sub = mysqli_query($connect, "SELECT id_sub_categories FROM sub_categories WHERE id_categories = '" . $while_product_cat['products_categories_id'] . "'") or die(mysqli_error($connect));
                        if(mysqli_num_rows($counting_sub) > 0 ){

                        echo  '<span class="sub-toggle"></span>';
                        }
                        
                        
                        echo '<div class="mega-menu"><div class="mega-menu__column">
                                           
                        ';
                        while ($while_subcategory_cat = mysqli_fetch_array($query_select_subcategory)) {
                            echo '    
                               
                                    <h4><a href="sub-categories.php?id=' . $while_subcategory_cat['id_sub_categories'] . '">' . $while_subcategory_cat['sub_categories_name'] . '</a> <h4>
                                    
                        ';
                        }
                        echo ' 
                        </div>
                        </div>  ';
                    echo'
                    </li>';
                    }
                    ?>
                    
                    
                </ul>
            </div> 
        </div>
        <!--+createMenu(product_categories, 'menu--mobile')-->
    </div>
</div>
<div class="navigation--list">
    <div class="navigation__content">
        <a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i class="icon-menu"></i><span> Menu</span></a>
        <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> Categories</span></a>
        <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span> Search</span></a>
        <!-- <a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span> Cart</span></a></div> -->

        <?php
            if(!empty($_SESSION["shopping_cart"])) {
                $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                echo '<a class="navigation__item" href="cart.php"><i class="icon-bag2"></i><span class="d-flex"> Cart <span class="mobile-cart">'.$cart_count.'</span></span></a></div>';
            }else{
                echo '<a class="navigation__item" href="cart.php"><i class="icon-bag2"></i><span class="d-flex"> Cart <span class="mobile-cart">0</span></span></a></div>'; 
            }
        ?>

</div>
<div class="ps-panel--sidebar" id="search-sidebar">
    <div class="ps-panel__header">
        <form class="ps-form--search-mobile" action="search.php" method="GET">
            <div class="form-group--nest">
                <input class="form-control" type="text" placeholder="Search something..." name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
                <button type="submit"><i class="icon-magnifier"></i></button>
            </div>
        </form>
    </div>
    <div class="navigation__content"></div>
</div>
<div class="ps-panel--sidebar" id="menu-mobile">
    <div class="ps-panel__header">
        <h3>Menu</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
            <li class="menu-item-has-children"><a href="/">Home</a></span></li>
            <li class="menu-item-has-children"><a href="shop.php">Shop</a></li>
           
        </ul>
    </div>
</div>
<div id="loader-wrapper">
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<div class="ps-search" id="site-search">
    <a class="ps-btn--close" href="#"></a>
    <div class="ps-search__content">
        <form class="ps-form--primary-search" action="do_action" method="post">
            <input class="form-control" type="text" placeholder="Search for...">
            <button><i class="aroma-magnifying-glass"></i></button>
        </form>
    </div>
</div>
<div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
            <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                <div class="ps-product__header">
                    <div class="ps-product__thumbnail" data-vertical="false">
                        <div class="ps-product__images" data-arrow="true">
                            <div class="item"><img src="img/products/detail/fullwidth/1.jpg" alt=""></div>
                            <div class="item"><img src="img/products/detail/fullwidth/2.jpg" alt=""></div>
                            <div class="item"><img src="img/products/detail/fullwidth/3.jpg" alt=""></div>
                        </div>
                    </div>
                    <div class="ps-product__info">
                        <h1>Marshall Kilburn Portable Wireless Speaker</h1>
                        <div class="ps-product__meta">
                            <p>Brand:<a href="shop-default.html">Sony</a></p>
                            <div class="ps-product__rating">
                                <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>(1 review)</span>
                            </div>
                        </div>
                        <h4 class="ps-product__price">$36.78 – $56.99</h4>
                        <div class="ps-product__desc">
                            <p>Sold By:<a href="shop-default.html"><strong> Go Pro</strong></a></p>
                            <ul class="ps-list--dot">
                                <li> Unrestrained and portable active stereo speaker</li>
                                <li> Free from the confines of wires and chords</li>
                                <li> 20 hours of portable capabilities</li>
                                <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                            </ul>
                        </div>
                        <div class="ps-product__shopping"><a class="ps-btn ps-btn--black" href="#">Add to cart</a><a class="ps-btn" href="#">Buy Now</a>
                            <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i class="icon-chart-bars"></i></a></div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
<script src="plugins/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="plugins/nouislider/nouislider.min.js"></script>
<script src="plugins/popper.min.js"></script>
<script src="plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/imagesloaded.pkgd.min.js"></script>
<script src="plugins/masonry.pkgd.min.js"></script>
<script src="plugins/isotope.pkgd.min.js"></script>
<script src="plugins/jquery.matchHeight-min.js"></script>
<script src="plugins/slick/slick/slick.min.js"></script>
<script src="plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="plugins/slick-animation.min.js"></script>
<script src="plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
<script src="plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
<script src="plugins/select2/dist/js/select2.full.min.js"></script>
<script src="plugins/gmap3.min.js"></script>
<!-- custom scripts-->
<script src="js/main.js"></script>
</body>

</html>