<?php

if(isset($_SESSION['user_id'])){
   echo 
   '<div class="ps-breadcrumb">
<div class="container">

<a href="slider-banners.php"><button type="button" class="btn btn-primary btn-lg">Slider banner</button></a>
<a href="banners.php"><button type="button" class="btn btn-secondary btn-lg">Banners</button></a>
<a href="products-categories.php"><button type="button" class="btn btn-info btn-lg">Products categories</button></a>

<div class="btn-group" >
  <a class="btn btn-secondary btn-lg" type="button">
    Small split button
  </a>
  <button type="button" class="btn btn-lg btn-secondary dropdown-toggle  dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden"></span>
  </button>
  <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Action</a></li>
      <li><a class="dropdown-item" href="#">Another action</a></li>
      <li><a class="dropdown-item" href="#">Something else here</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">Separated link</a></li>
   </ul>
</div>


<a href="add-products.php"><button type="button" class="btn btn-warning btn-lg">Add products</button></a>
<a href="shop.php"><button type="button" class="btn btn-success btn-lg">All products</button></a>
<a href="top-banner.php"><button type="button" class="btn btn-dark btn-lg">Add Top Banner</button></a>

</div>
</div>';

}
?>

