<?php
require_once('../incs-template1/config.php');
include_once('../incs-template1/cookie-session.php');


if (!isset($_SESSION['user_id'])) {
    header("Location:/");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['delete_categories'])) {

    $query_products_categories = mysqli_query($connect, "UPDATE products SET products_sub_categories = '1' WHERE products_sub_categories = '" . $_POST['delete_categories'] . "'") or die(db_conn_error);

mysqli_query($connect, "DELETE FROM sub_categories WHERE id_sub_categories = '" . $_POST['delete_categories'] . "'") or die(db_conn_error);

header('Location:' . GEN_WEBSITE . '/sub-categories.php?confirm_delete=1');
    exit();
}


$errors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit'])) {


    if($_POST['select_option'] =='Choose categories'){
        $errors['parent_categories'] = 'Please choose parent category.';
    
    }else{
        $sub_cat = $_POST['select_option'];
    
    }
    

    if (preg_match('/^.{3,20}$/i', trim($_POST['sub_categories']))) {
        $products_categories = mysqli_real_escape_string($connect, trim($_POST['sub_categories']));
    } else {
        $errors['products_sub_categories'] = 'Please enter valid name.';
    }



    //now to edit the product	
    if (empty($errors)) {

        $query_products_categories = mysqli_query($connect, "INSERT INTO sub_categories (sub_categories_name, id_categories ) 
        VALUES ('" . $products_categories ."','". $sub_cat . "')") or die(db_conn_error);
        
        if (mysqli_affected_rows($connect) == 1) {

            header('Location:' . GEN_WEBSITE . '/sub-categories.php?confirm=1');
            exit();
        }
    }
}













include('../incs-template1/adding-to-cart.php');
include('../incs-template1/header.php');
include('../incs-template1/settings.php');
?>









<main class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>

            </ul>
        </div>
    </div>



    <section class="ps-section--account">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ps-section__left">
                        <aside class="ps-widget--account-dashboard">
                            <div class="ps-widget__header"><img src="img/users/3.jpg" alt="" />
                                <figure>
                                    <figcaption>Hello</figcaption>
                                    <p><?= $EMAIL; ?></p>
                                </figure>
                            </div>

                        </aside>
                    </div>
                </div>
                <div class="col-lg-8">







                    <?php
                    if (isset($_GET['confirm']) and $_GET['confirm'] == 1) {

                        echo ' <h3><span class="badge bg-primary">New Sub category added</span></h3>';
                    }

                    if (isset($_GET['confirm_delete']) and $_GET['confirm_delete'] == 1) {

                        echo ' <h3><span class="badge bg-primary">Sub-category has been deleted.</span></h3>';
                    }


                    if (isset($_GET['confirm_modify']) and $_GET['confirm_modify'] == 1) {

                        echo ' <h3><span class="badge bg-primary">Sub-category has been modified</span></h3>';
                    }



                    ?>


                    <?php
                    $products_cat_select_confirm = mysqli_query($connect, "SELECT products_categories_id FROM products_categories") or die(db_conn_error);


                    if (mysqli_num_rows($products_cat_select_confirm) > 1) {


                        echo ' <div class="ps-section__right">
                        <form class="ps-form--account-setting" action="" method="POST">
                            <div class="ps-form__header">
                                <h3> Add sub-categories details</h3>
                            </div>                            
                            <div class="ps-form__content">
                       
    
                            <div class="form-group">
                            <label>Select parent Category name</label>

                            <select class="form-select form-select-lg mb-3 d-block form-control" aria-label=".form-select-lg example" name="select_option">
                            ';
                    ?>
                        <?php
                        $products_cat_select = mysqli_query($connect, "SELECT products_categories_name, products_categories_id FROM products_categories WHERE products_categories_id != '1'") or die(db_conn_error);


                        echo '<option>Choose categories</option>';
                        while ($while_products_cat = mysqli_fetch_array($products_cat_select)) {

                            echo '<option value="' . $while_products_cat['products_categories_id'] . '">' . $while_products_cat['products_categories_name'] . '</option>';
                        }
                     echo '</select> ';
                        ?>


                        <?php if (array_key_exists('parent_categories', $errors)){
                            echo '<p class="text-danger" >' . $errors['parent_categories'] . '</p>';
                        }
                        
                        echo '</div>
<div class="form-group">
                        <label>Sub-category name</label>
<input class="form-control" type="text" placeholder="e.g Men clothings" name="sub_categories"';?><?php if (isset($_POST['sub_categories'])){echo 'value="'.$_POST['sub_categories'].'"/>';}?>

                        <?php if (array_key_exists('products_sub_categories', $errors)){
                            echo '<p class="text-danger" >' . $errors['products_sub_categories'] . '</p>';
                        }
                        ?>
                        <?php echo '    
            </div>
<div class="row">

                                </div>
                            </div>
                            <div class="form-group submit">
                                <button class="ps-btn" type="submit" name="submit">Add Sub-category</button>
                            </div>
                        </form>
                    </div>

                '; ?>
                    <?php
                    }
                    ?>

                    <?php
                    $select_sub_category = mysqli_query($connect, "SELECT id_sub_categories , sub_categories_name FROM sub_categories WHERE sub_categories_name != '" . UNCATEGORIZED . "'") or die(db_conn_error);

                    if (mysqli_num_rows($select_sub_category) > 0) {

                        echo '<div class="ps-form__header">
<h3>Modify Sub products categories</h3>
</div>';

                        while ($row_categories = mysqli_fetch_array($select_sub_category)) {

                            echo '<div class="dropdown">
<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
' . $row_categories['sub_categories_name'] . '
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<form method="GET" action="products-sub-categories-change.php">  

<button type="submit" class="dropdown-item" name="modify_sub_categories" value="' . $row_categories['id_sub_categories'] . '">Modify Sub categories</button>
</form>

<form method="POST" action="">  


<button type="submit" class="dropdown-item" name="delete_categories" value="' . $row_categories['id_sub_categories'] . '">Delete</button>

</form>
 
</div>
</div>';
                        }
                    }

                    ?>








                </div>
            </div>
        </div>
    </section>

</main>










<?php include('../incs-template1/footer.php'); ?>