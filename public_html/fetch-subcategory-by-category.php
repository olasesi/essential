<?php
require_once ('../incs-template1/config.php'); 
include_once ('../incs-template1/cookie-session.php'); 

$category_id = $_POST["category_id"];
$result = mysqli_query($connect,"SELECT * FROM sub_categories WHERE id_categories = $category_id");
?>
<option value="">Select SubCategory</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["id_sub_categories"];?>"><?php echo $row["sub_categories_name"];?></option>
<?php
}
?>