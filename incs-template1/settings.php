<?php

if(isset($_SESSION['user_id'])){
   echo 
   '<div class="ps-breadcrumb">
<div class="container">

<a href="slider-banners.php"><button type="button" class="btn btn-primary btn-lg">Slider banner</button></a>
<a href="banners.php"><button type="button" class="btn btn-secondary btn-lg">Banners</button></a>
<a href="products-categories.php"><button type="button" class="btn btn-info btn-lg">Products categories</button></a>

<a href="add-products.php"><button type="button" class="btn btn-warning btn-lg">Add products</button></a>
<a href="shop.php"><button type="button" class="btn btn-success btn-lg">All products</button></a>
</div>
</div>';

}
?>

