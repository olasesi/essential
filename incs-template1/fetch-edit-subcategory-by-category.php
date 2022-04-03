<?php
require_once ('../incs-template1/config.php'); 
include_once ('../incs-template1/cookie-session.php'); 

$category_id = $_POST["category_id"];
$result = mysqli_query($connect,"SELECT * FROM sub_categories WHERE id_categories = $category_id");

if($category_id != 1){
    echo '<option value="">Select sub-category</option>';
}
while($row = mysqli_fetch_array($result)) {
echo '<option value="'.$row["id_sub_categories"].'">'.$row["sub_categories_name"].'</option>';
}
?>