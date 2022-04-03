<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    
    
    <!--facebook open graph -->
    
    <meta property="og:url" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" />
   
    <meta property="og:type" content="website" />
    
    <?php if(isset($_GET['id'])){
      
      $query_page_section =  mysqli_query($connect, "SELECT * FROM products WHERE products_id = '".mysqli_real_escape_string ($connect, $_GET['id'])."'") or die(db_conn_error);
if(mysqli_num_rows($query_page_section) == 1){
   while($rows_loop = mysqli_fetch_array($query_page_section)){
echo'
    <meta property="og:title" content="'.$rows_loop['products_name'].'"/>
    <meta property="og:description" content="'.$rows_loop['products_short_description'].'"/>
    <meta property="og:image" content="'.GEN_WEBSITE.'/images/products/'.$rows_loop['products_image'].'" />';
    }
    }
    }
    ?>
   
    <meta name="keywords" content="<?php echo KEY_WORDS;?>">
    <meta name="description" content="<?php echo PAGE_DESCRIPTION;?>">
    
    <title><?php echo TITLE;?></title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/Linearicons/Linearicons/Font/demo-files/demo.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/owl-carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="plugins/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="plugins/lightGallery-master/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color-style.css">
</head>

<body class="loaded">

    <?php 
        $num_top_banner = mysqli_query($connect, "SELECT top_banner_image, top_banner_name FROM top_banner") or die(db_conn_error);
       
        while($topBannerFetch = mysqli_fetch_array($num_top_banner)){
            echo ('
    
                <div class="ps-promotion-kids">
                    <div class="container">
                        <img src="'.GEN_WEBSITE.'/images/top-banner/'.$topBannerFetch['top_banner_image'].'" alt="'.$topBannerFetch['top_banner_name'].'" height="60px" width="1200px"></a></div>
                </div>
            
            ');
        }

    ?>


    <header class="header header--1" data-sticky="true">

        <?php
            echo '<div style="clear:both;"></div>'.$status.''
                ;
        ?>
        <div class="header__top">
            <div class="ps-container">
                <div class="header__left">
                    <div class="menu--product-categories">
                        <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Categories</span></div>
                        <div class="menu__content">
                            <ul class="menu--dropdown">
                              
                             <?php
                                $query_select_products_cat =  mysqli_query($connect, "SELECT products_categories_id, products_categories_name FROM products_categories") or die(mysqli_error($connect));

                                while ($while_product_cat = mysqli_fetch_array($query_select_products_cat)){
                                    echo '<li class="menu-item-has-children has-mega-menu">
                                <a href="categories.php?id=' . $while_product_cat['products_categories_id'] . '">' . $while_product_cat['products_categories_name'] . '</a>
                                <span class="sub-toggle"></span>
                                ';
                
                                     $query_select_subcategory =  mysqli_query($connect, "SELECT id_sub_categories, id_categories, sub_categories_name FROM sub_categories WHERE id_categories = '" . $while_product_cat['products_categories_id'] . "'") or die(mysqli_error($connect));
                                           echo '
                                    <div class="';
                                   $counting_sub = mysqli_query($connect, "SELECT id_sub_categories FROM sub_categories WHERE id_categories = '" . $while_product_cat['products_categories_id'] . "'") or die(mysqli_error($connect));
                                   if(mysqli_num_rows($counting_sub) > 0 ){

                                    echo "mega-menu";
                                   }
                                   
                                    
                                    echo '">
                                    <div class="mega-menu__column" >                   
                                   ';
                                    while ($while_subcategory_cat = mysqli_fetch_array($query_select_subcategory)) {
                                        echo '    
                                            <ul class="mega-menu__list">
                                                <li><a href="sub-categories.php?id=' . $while_subcategory_cat['id_sub_categories'] . '">' . $while_subcategory_cat['sub_categories_name'] . '</a> </li>
                                            </ul>     
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
                    <a class="ps-logo" href="/"><img src="../images/logo/logo.png" alt="<?php if(!empty($website_name_with_spaces)){
                        echo $website_name_with_spaces;
                    }
                    ?>" /></a>
                </div>
                <div class="header__center">
                    <form class="ps-form--quick-search" action="search.php" method="GET">
                        
                        <input class="form-control" type="text" placeholder="I'm shopping for..." id="input-search" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>"/>
                       
                        <button type="submit">Search</button>
                       
                    </form>
                </div>
                <div class="header__right">
                    <div class="header__actions">

                             


                    <?php
                    if(!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));

                    echo '<div class="ps-cart--mini box"><a class="header__extra" href="cart.php"><i class="icon-bag2"></i><span><i>'.$cart_count.'</i></span></a></div>';


                    }else{

                        echo '<div class="ps-cart--mini box"><a class="header__extra" href="cart.php"><i class="icon-bag2"></i><span><i>0</i></span></a></div>'; 
                    }
                    ?>
                        <div class="ps-block--user-header">
                               <?php 
                               if(isset( $_SESSION['user_id'])){
                                echo ' <div class="ps-block__left"> <i class="icon-user"></i></div>
                                    <div class="ps-block__right">
                                  <a href="'.GEN_WEBSITE.'/logout.php">Logout</a>
                              
                               
                            </div>'; }
                               ?> 
                        </div> 
                        
                    </div>
                </div>
            </div>
        </div>
        <nav class="navigation">
            <div class="ps-container">
                <div class="navigation__left">
                    <div class="menu--product-categories">
                        <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Categories</span></div>
                        <div class="menu__content">
                            <ul class="menu--dropdown">
                                <?php
                                $query_select_products_cat =  mysqli_query($connect, "SELECT products_categories_id, products_categories_name FROM products_categories") or die(mysqli_error($connect));

                                while ($while_product_cat = mysqli_fetch_array($query_select_products_cat)){
                                    echo '<li class="menu-item-has-children has-mega-menu">
                                <a href="categories.php?id=' . $while_product_cat['products_categories_id'] . '">' . $while_product_cat['products_categories_name'] . '</a>
                                <span class="sub-toggle"></span>
                                ';
                
                                     $query_select_subcategory =  mysqli_query($connect, "SELECT id_sub_categories, id_categories, sub_categories_name FROM sub_categories WHERE id_categories = '" . $while_product_cat['products_categories_id'] . "'") or die(mysqli_error($connect));
                                           echo '
                                    <div class="';
                                   $counting_sub = mysqli_query($connect, "SELECT id_sub_categories FROM sub_categories WHERE id_categories = '" . $while_product_cat['products_categories_id'] . "'") or die(mysqli_error($connect));
                                   if(mysqli_num_rows($counting_sub) > 0 ){

                                    echo "mega-menu";
                                   }
                                   
                                    
                                    echo '">
                                    <div class="mega-menu__column" >                   
                                   ';
                                    while ($while_subcategory_cat = mysqli_fetch_array($query_select_subcategory)) {
                                        echo '    
                                            <ul class="mega-menu__list">
                                                <li><a href="sub-categories.php?id=' . $while_subcategory_cat['id_sub_categories'] . '">' . $while_subcategory_cat['sub_categories_name'] . '</a> </li>
                                            </ul>     
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
                </div>
                <div class="navigation__right">
                    <ul class="menu">
                        <li class=""><a href="<?=GEN_WEBSITE;?>">Home</a><span class="sub-toggle"></span>
                            
                        </li>
                       
                        <li class=""><a href="<?=GEN_WEBSITE.'/shop.php';?>">Shop</a><span class="sub-toggle"></span>
                           
                        </li>
                       
                    </ul>
                  
                </div>
            </div>
        </nav>
    </header>
    <header class="header header--mobile" data-sticky="true">
        <?php
            echo '<div style="clear:both;"></div>'.$status.''
                ;
        ?>
        <div class="navigation--mobile">
            <div class="navigation__left">
                <a class="ps-logo" href="/"><img src="../images/logo/logo.png" alt="<?php if(!empty($website_name_with_spaces)){
                        echo $website_name_with_spaces;
                    }
                    ?>" /></a>
            </div>
            <div class="navigation__right">
                <div class="header__actions">
                 
                    <div class="ps-block--user-header">
                        
                    <div class="ps-block__left">


                    <?php 
                               if(isset( $_SESSION['user_id'])){
                                   echo ' 
                                   <div class="ps-block__right">
                                   <a href="'.GEN_WEBSITE.'/logout.php"><i class="icon-user"></i>Logout</a>
                                   </div>';
                               }
                               ?> 
                    
                    </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="ps-search--mobile">
            <form class="ps-form--search-mobile" action="search.php" method="GET">
                <div class="form-group--nest">
                    <input class="form-control" type="text" placeholder="Search something..." name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" />
                    <button type="submit"><i class="icon-magnifier"></i></button>
                </div>
            </form>
        </div>
    </header>


   