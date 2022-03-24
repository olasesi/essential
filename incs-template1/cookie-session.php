<?php
if(!isset($_SESSION['user_id'])){	

if(isset($_COOKIE['remember_me'])){ 
	
	$cookiesessions = $_COOKIE['remember_me'];

	$decode_cookie = mysqli_query ($connect,"SELECT * FROM users WHERE cookies_session = '".$cookiesessions."' AND active = '1'") or die(db_conn_error);
    if (mysqli_num_rows($decode_cookie) == 1) {
	
	$rows_cookie = mysqli_fetch_array($decode_cookie, MYSQLI_NUM);
	$_SESSION['user_id'] = $rows_cookie[0];
    $_SESSION['email'] = $rows_cookie[2];
	 
}

}
}

?>