<?php

if(isset($_SESSION['user_id'])){
   echo 
   '<div class="ps-breadcrumb">
<div class="container">

<div class="btn-group" >
  <a href="slider-banners.php">
    <button class="btn btn-primary btn-lg" type="button">
    Slider banner
    </button>
  </a>
  <button type="button" class="btn btn-lg btn-primary dropdown-toggle  dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
    <span class="visually-hidden"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
      <li class="fw-bold h5"><a class="dropdown-item" href="slider-banners.php">Home Page Slider</a></li>
      <li class="fw-bold h5"><a class="dropdown-item" href="shop-slider-banners.php">Shop Page Slider</a></li> 
   </ul>
</div>

<div class="btn-group" >
  <a href="banners.php">
    <button class="btn btn-secondary btn-lg" type="button">
    Banners
    </button>
  </a>
  <button type="button" class="btn btn-lg btn-secondary dropdown-toggle  dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
    <span class="visually-hidden"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
      <li class="fw-bold h5"><a class="dropdown-item" href="banners.php">Home Page Banner</a></li>
      <li class="fw-bold h5"><a class="dropdown-item" href="top-banner.php">Top Banner</a></li> 
   </ul>
</div>

<div class="btn-group" >
  <a href="products-categories.php">
    <button class="btn btn-info btn-lg" type="button">
    Product categories
    </button>
  </a>
  <button type="button" class="btn btn-lg btn-info dropdown-toggle  dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
    <span class="visually-hidden"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
      <li class="fw-bold h5"><a class="dropdown-item" href="products-categories.php">Category</a></li>
      <li class="fw-bold h5"><a class="dropdown-item" href="products-sub-categories.php">Sub-category</a></li> 
   </ul>
</div>



<div class="btn-group" >
  <a href="shop.php">
    <button class="btn btn-success btn-lg" type="button">
    All products
    </button>
  </a>
  <button type="button" class="btn btn-lg btn-success dropdown-toggle  dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
    <span class="visually-hidden"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
      <li class="fw-bold h5"><a class="dropdown-item" href="shop.php">All products</a></li>
      <li class="fw-bold h5"><a class="dropdown-item" href="add-products.php">Add products</a></li> 
   </ul>
</div>


</div>
</div>';

}
?>

