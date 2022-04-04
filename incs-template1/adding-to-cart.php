<?php
################################
######Add to cart section#######
################################
$status="";
    if(!isset($_SESSION['shopping_cart'])){
    $_SESSION['shopping_cart']= '';
}


if (isset($_POST['code']) && $_POST['code']!=''){
    $code = $_POST['code'];
    $result = mysqli_query($connect,"SELECT * FROM products, inventory WHERE products_id='".$code."' AND inventory_product_id = products_id") or die(db_conn_error);
    
    while($row = mysqli_fetch_assoc($result)){
    $name = $row['products_name'];
    $code = 'code'.$row['products_id'];
    $cat = $row['products_sub_categories'];
    $price = $row['products_price'];
    $image = $row['products_image'];
    $inventory = $row['inventory_value'];
    $inventory_value_prev = $row['inventory_value_prev'];
    
    
    $cartArray = array(
        $code=>array(
        'name'=>$name,
        'code'=>$code,
        'cat'=>$cat,
        'price'=>$price,
        'quantity'=>1,
        'image'=>$image,
        'inventory_value'=>$inventory,
        'inventory_value_prev'=>$inventory_value_prev
        )
    );
}
 
    
    

    if(empty($_SESSION['shopping_cart'])) {
        $_SESSION['shopping_cart'] = $cartArray;
        $status = '<div class="message_box" style="background-color:green;">
        <div class="box">Product is added to your cart!</div></div>';
       

}else{
        $array_keys = array_keys($_SESSION['shopping_cart']);
        
        if(in_array($code,$array_keys)) {
            $status = '<div class="message_box" style="background-color:red;"><div class="box">
            Product is already added to your cart!</div></div>';	
        } else {
        $_SESSION['shopping_cart'] = array_merge($_SESSION['shopping_cart'],$cartArray);
        $status = '<div class="message_box" style="background-color:green;">
        <div class="box">Product is added to your cart!</div></div>';
        }
    
        }
    }

?>
