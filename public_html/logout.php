<?php
require_once ('../incs-template1/config.php'); 
include_once ('../incs-template1/cookie-session.php');
if(!isset ($_SESSION['user_id'])){ 
	header("Location:".GEN_WEBSITE);
	exit();
}

mysqli_query($connect,"UPDATE users SET cookies_session = '' WHERE user_id = '".$_SESSION['user_id']."' AND active = '1'") or die(db_conn_error);	
session_destroy();
setcookie("remember_me", "", time() - 31104000);		//I think i made the cookie session time to be a month
	
header("Location:./");
exit();

?>
