<?php  
 
 $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0) $page = 1;

$per_page = 12; 								// Set how many records do you want to display per page.

$startpoint = ($page * $per_page) - $per_page;
 
$select_products3 = mysqli_query($connect,"SELECT * FROM ".$statement." LIMIT $startpoint, $per_page") or die(db_conn_error);

			 if (mysqli_num_rows($select_products3)> 0){
				while($rows_loop = mysqli_fetch_array($select_products3)){

                    
// $result = mysqli_query($connect,"SELECT * FROM `products`");
/* while($row = mysqli_fetch_assoc($result)){
    echo "<div class='product_wrapper'>
    <form method='post' action=''>
    <input type='hidden' name='products_id' value=".$row['products_id']." />
    <div class='image'><img src='".$row['products_image']."' /></div>
    <div class='name'>".$row['products_name']."</div>
    <div class='price'>$".$row['products_price']."</div>
    <button type='submit' class='buy'>Buy Now</button>
    </form>
    </div>";
        } */
//mysqli_close($connect);


                    echo '
    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 ">
    <form method="post" action="">
    <div class="ps-product">
    <div class="ps-product__thumbnail">
        <a href="product-description.php?id='.$rows_loop['products_id'].'">
        <img src="images/products/'.$rows_loop['products_image'].'" alt="'.$rows_loop['products_name'].'" /></a>';
        if(!empty($rows_loop['products_sales_price'])){
            $dis = 100 - ceil($rows_loop['products_sales_price']/$rows_loop['products_price']*100);
            echo '
            <div class="ps-product__badge">-'.$dis.'%</div>
            ';
        }
        echo    '

         <ul class="ps-product__actions">
                    
                    

            <form method="POST" action="">
                <input type="hidden" name="code" value="'.$rows_loop['products_id'].'" />
                <button type="submit" class="btn-fade"><li><a data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li></button>
            </form>
                    
                    

        </ul>
        
        
        </div>




    <div class="ps-product__container">';
    if(isset($_SESSION['user_id'])){
       echo '<div class="text-center my-1">

            <a href="edit-products.php?id='.$rows_loop['products_id'].'"><button type="button" class="btn btn-success btn-lg">Edit</button></a>
            <a href="delete-products.php?id='.$rows_loop['products_id'].'"><button type="button" class="btn btn-danger btn-lg">Delete</button></a>
        </div>';}


     

echo '
        <div class="ps-product__content"><a class="ps-product__title" href="product-description.php?id='.$rows_loop['products_id'].'">'.$rows_loop['products_name'].'</a>
            <div class="ps-product__rating">
                <select class="ps-rating" data-read-only="true">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="1">5</option>
                </select>
            </div>
            <p class="ps-product__price sale">'; if(!empty($rows_loop['products_sales_price'])){
                echo '&#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>';
            } 
            
            echo '</p>
            
        </div>
            <div class="ps-product__content hover"><a class="ps-product__title" href="product-description.php?id='.$rows_loop['products_id'].'">'.$rows_loop['products_name'].'</a>
                <p class="ps-product__price sale">'; if(!empty($rows_loop['products_sales_price'])){
                    echo '&#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>';
                } 
            echo ' </p>
                    
            </div>
            
            </div>
       
</div>
</form>
</div>

';
 

//&#8358;





}
	
}else{
    echo '<h5 class="text-center">No result found</h5>';
 }
?>