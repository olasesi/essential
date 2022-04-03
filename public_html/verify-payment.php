<?php
require_once ('../incs-template1/config.php'); 
include_once ('../incs-template1/cookie-session.php'); 



$result = array();
//The parameter after verify/ is the transaction reference to be verified
$url = 'https://api.paystack.co/transaction/verify/'.$_GET['reference'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
$ch, CURLOPT_HTTPHEADER, [
 'Authorization: '.API]
);
$request = curl_exec($ch);
curl_close($ch);

if ($request) {
$result = json_decode($request, true);
}

if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {

   
    mysqli_query($connect, "UPDATE orders SET orders_status='1' WHERE orders_reference = '".$_GET['reference']."' AND orders_status = '0'") or die(db_conn_error);


	
    foreach($_SESSION['shopping_cart'] as $c => $cs){
		$adding = $cs['quantity'];
		$sub = substr($cs['code'], 4);

		
//$select = mysqli_query($connect, "SELECT products_categories_name, products_categories_id FROM products_categories WHERE products_categories_id ") or die(db_conn_error);

mysqli_query($connect, "UPDATE `inventory` SET `inventory_value_prev` = `inventory_value_prev` + '".$adding."' WHERE `inventory_product_id` = '".$sub."'") or die(mysqli_error($connect));

	   } 
  
  
  
  

	
   


   


     $body =  '

     <!-- CSS Reset : BEGIN -->
    <style>

			/* What it does: Remove spaces around the email design added by some email clients. */
			/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
			html,
		body {
			margin: 0 auto !important;
			padding: 0 !important;
			height: 100% !important;
			width: 100% !important;
			background: #f1f1f1;
		}

		/* What it does: Stops email clients resizing small text. */
		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}

		/* What it does: Centers email on Android 4.4 */
		div[style*="margin: 16px 0"] {
			margin: 0 !important;
		}

		/* What it does: Stops Outlook from adding extra spacing to tables. */
		table,
		td {
			mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
		}

		/* What it does: Fixes webkit padding issue. */
		table {
			border-spacing: 0 !important;
			border-collapse: collapse !important;
			table-layout: fixed !important;
			margin: 0 auto !important;
		}

		/* What it does: Uses a better rendering method when resizing images in IE. */
		img {
			-ms-interpolation-mode:bicubic;
		}

		/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
		a {
			text-decoration: none;
		}

		/* What it does: A work-around for email clients meddling in triggered links. */
		*[x-apple-data-detectors],  /* iOS */
		.unstyle-auto-detected-links *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}

		/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
		.a6S {
			display: none !important;
			opacity: 0.01 !important;
		}

		/* What it does: Prevents Gmail from changing the text color in conversation threads. */
		.im {
			color: inherit !important;
		}

		/* If the above doesn\'t work, add a .g-img class to any image in question. */
		img.g-img + div {
			display: none !important;
		}

		/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
		/* Create one of these media queries for each additional viewport size you\'d like to fix */

		/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
		@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
			u ~ div .email-container {
				min-width: 320px !important;
			}
		}
		/* iPhone 6, 6S, 7, 8, and X */
		@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
			u ~ div .email-container {
				min-width: 375px !important;
			}
			
		}
		/* iPhone 6+, 7+, and 8+ */
		@media only screen and (min-device-width: 414px) {
			u ~ div .email-container {
				min-width: 414px !important;
			}
		}
	</style>

	<!-- CSS Reset : END -->

	<!-- Progressive Enhancements : BEGIN -->
	
	<style>

				.primary{
			background: #17bebb;
		}
		.bg_white{
			background: #ffffff;
		}
		.bg_light{
			background: #fcfcfc;
		}
		.bg_black{
			background: #000000;
		}
		.bg_dark{
			background: rgba(0,0,0,.8);
		}
		.email-section{
			padding:2.5em;
		}

		/*BUTTON*/
		.btn{
			padding: 10px 15px;
			display: inline-block;
		}
		.btn.btn-primary{
			border-radius: 5px;
			background: #17bebb;
			color: #ffffff;
		}
		.btn.btn-white{
			border-radius: 5px;
			background: #ffffff;
			color: #000000;
		}
		.btn.btn-white-outline{
			border-radius: 5px;
			background: transparent;
			border: 1px solid #fff;
			color: #fff;
		}
		.btn.btn-black-outline{
			border-radius: 0px;
			background: transparent;
			border: 2px solid #000;
			color: #000;
			font-weight: 700;
		}
		.btn-custom{
			color: rgba(0,0,0,.3);
			text-decoration: underline;
		}

		h1,h2,h3,h4,h5,h6{
			font-family: \'Work Sans\', sans-serif;
			color: #000000;
			margin-top: 0;
			font-weight: 400;
		}

		body{
			font-family: \'Work Sans\', sans-serif;
			font-weight: 400;
			font-size: 15px;
			line-height: 1.8;
			color: rgba(0,0,0,.4);
		}

		a{
			color: #17bebb;
		}

		table{
		}
		/*LOGO*/

		.logo h1{
			margin: 0;
		}
		.logo h1 a{
			color: #17bebb;
			font-size: 24px;
			font-weight: 700;
			font-family: \'Work Sans\', sans-serif;
		}

		/*HERO*/
		.hero{
			position: relative;
			z-index: 0;
		}

		.hero .text{
			color: rgba(0,0,0,.3);
		}
		.hero .text h2{
			color: #000;
			font-size: 34px;
			margin-bottom: 15px;
			font-weight: 300;
			line-height: 1.2;
		}
		.hero .text h3{
			font-size: 24px;
			font-weight: 200;
		}
		.hero .text h2 span{
			font-weight: 600;
			color: #000;
		}


		/*PRODUCT*/
		.product-entry{
			display: block;
			position: relative;
			float: left;
			padding-top: 20px;
		}

		.product-entry .text{
			width: calc(100% - 125px);
			padding-left: 20px;
		}
		.product-entry .text h3{
			margin-bottom: 0;
			padding-bottom: 0;
		}
		.product-entry .text p{
			margin-top: 0;
		}
		.product-entry img, .product-entry .text{
			float: left;
		}

		ul.social{
			padding: 0;
		}
		ul.social li{
			display: inline-block;
			margin-right: 10px;
		}

		/*FOOTER*/

		.footer{
			border-top: 1px solid rgba(0,0,0,.05);
			color: rgba(0,0,0,.5);
		}
		.footer .heading{
			color: #000;
			font-size: 20px;
		}
		.footer ul{
			margin: 0;
			padding: 0;
		}
		.footer ul li{
			list-style: none;
			margin-bottom: 10px;
		}
		.footer ul li a{
			color: rgba(0,0,0,1);
		}


		@media screen and (max-width: 500px) {

			.product-entry  img,
			.product-entry  div.text {
				display: block;
				width: 100%;
			}

			.product-entry  div.text {
				padding: 0px;
			}

		}


    </style>

    <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
        <center style="width: 100%; background-color: #f1f1f1;">
            <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
            </div>
            <div style="max-width: 600px; margin: 0 auto;" class="email-container">
                <!-- BEGIN BODY -->
                <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                    <tr>
                    <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td class="logo" style="text-align: left;">
                                    <h1><a href="#">Shop</a></h1>
                                </td>
                            </tr>
                        </table>
                    </td>
                    </tr><!-- end tr -->
                    <tr>
                    <td valign="middle" class="hero bg_white" style="padding: 2em 0 2em 0;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="padding: 0 2.5em; text-align: left;">
                                    <div class="text">
                                        <h2>'.$_SESSION['customer']['surname_customer'].' thank you for shopping!</h2>
                                        <h3>Chat with viola via <a href="<?php echo $WHATSAPP_LINK  ?>">whatsapp</a></h3>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    </tr><!-- end tr -->
                    <tr>
                        <table class="bg_white" role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
                                <th width="80%" style="text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 20px">Item</th>
                                <th width="20%" style="text-align:right; padding: 0 2.5em; color: #000; padding-bottom: 20px">Price</th>
                            </tr>';
                            $all_total_price = 0;
							foreach($_SESSION['shopping_cart'] as $codename => $codearray){
$body .='<tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
<td valign="middle" width="80%" style="text-align:left; padding: 0 2.5em;">
	<div class="product-entry">
		<img src="'.GEN_WEBSITE.'/images/products/'.$codearray['image'].'" alt="'.$codearray['name'].'" style="width: 100px; max-width: 600px; height: auto; margin-bottom: 20px;">
		<div class="text">
			<h3>'.$codearray['name'].'</h3>
					</div>
	</div>
</td>
<td valign="middle" width="20%" style="text-align:left; padding: 0 2.5em;">
	<span class="price" style="color: #000; font-size: 20px;">'.$codearray['quantity']. ' x ' .$codearray['price'].'</span>
	</td>
</tr>';

$all_total_price += $codearray['price'] * $codearray['quantity'];
}  
							   
						



$body .= '<tr>
                                <th valign="middle" width="80%" style="text-align: center; padding: 0.5em 0;">
                                    <span class="total" style="color: #000; font-size: 20px;">Total</span>
                                </th>
                                <th valign="middle" width="20%" style="text-align: center; padding: 0.5em 0;">
                                    <span class="price" style="color: #000; font-size: 20px;">'.$all_total_price.'</span>
                                </th>
                            </tr>
                        </table>
                    </tr><!-- end tr -->
                <!-- 1 Column Text + Button : END -->
                </table>
                <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                    <tr style="text-align: center;">
                    <td valign="middle" class="bg_light footer email-section">
                        <table align="center" style="margin: auto;">
                            <tr >
                            
                            <td valign="top"  style="padding-top: 20px; text-align: center;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                <td width="100%" style="text-align: center; padding-left: 5px; padding-right: 5px;">
                                    <h3 class="heading">Contact Info</h3>
                                    <ul style="list-style-type: none;">
                                                <li><span class="text">'. $ADDRESS .'</span></li>
                                                <li>
                                                    <a href="tel:'. $TEL .'"><span class="text">'. $TEL .'</span></a>
                                                    <a href="tel:'. $TEL2 .'"><span class="text">'. $TEL2 .'</span></a>
                                                </li>
                                            </ul>
                                </td>
                                </tr>
                                    <tr width="100%" style="margin: 0px auto;">
                                        <td width="20%" style="text-align: center; padding-left: 5px; padding-right: 5px;">
                                            <a href="" style="padding: 0px 8px;">
                                                <svg enable-background="new 0 0 56.693 56.693" height="25px" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" width="25px"  xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#a9a9a9" d="M40.43,21.739h-7.645v-5.014c0-1.883,1.248-2.322,2.127-2.322c0.877,0,5.395,0,5.395,0V6.125l-7.43-0.029  c-8.248,0-10.125,6.174-10.125,10.125v5.518h-4.77v8.53h4.77c0,10.947,0,24.137,0,24.137h10.033c0,0,0-13.32,0-24.137h6.77  L40.43,21.739z"/></svg>
                                            </a>
                                            <a href="" style="padding: 0px 8px;">
                                                <svg enable-background="new 0 0 56.693 56.693" height="25px" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" width="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#a9a9a9" d="M52.837,15.065c-1.811,0.805-3.76,1.348-5.805,1.591c2.088-1.25,3.689-3.23,4.444-5.592c-1.953,1.159-4.115,2-6.418,2.454  c-1.843-1.964-4.47-3.192-7.377-3.192c-5.581,0-10.106,4.525-10.106,10.107c0,0.791,0.089,1.562,0.262,2.303  c-8.4-0.422-15.848-4.445-20.833-10.56c-0.87,1.492-1.368,3.228-1.368,5.082c0,3.506,1.784,6.6,4.496,8.412  c-1.656-0.053-3.215-0.508-4.578-1.265c-0.001,0.042-0.001,0.085-0.001,0.128c0,4.896,3.484,8.98,8.108,9.91  c-0.848,0.23-1.741,0.354-2.663,0.354c-0.652,0-1.285-0.063-1.902-0.182c1.287,4.015,5.019,6.938,9.441,7.019  c-3.459,2.711-7.816,4.327-12.552,4.327c-0.815,0-1.62-0.048-2.411-0.142c4.474,2.869,9.786,4.541,15.493,4.541  c18.591,0,28.756-15.4,28.756-28.756c0-0.438-0.009-0.875-0.028-1.309C49.769,18.873,51.483,17.092,52.837,15.065z"/></svg>
                                            </a>
                                            <a href="" style="padding: 0px 8px;">
                                                <svg enable-background="new 0 0 100 100" height="25px" id="Layer_1" version="1.0" viewBox="0 0 100 100" width="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#a9a9a9" d="M70,9.999H30c-10.999,0-20,9.001-20,20v40.002c0,10.996,9.001,20,20,20h40c10.999,0,20-9.004,20-20V29.999  C90,19,80.999,9.999,70,9.999z M83.333,70.001c0,7.35-5.979,13.333-13.333,13.333H30c-7.351,0-13.333-5.983-13.333-13.333V29.999  c0-7.352,5.982-13.333,13.333-13.333h40c7.354,0,13.333,5.981,13.333,13.333V70.001z"/><circle fill="#a9a9a9" cx="71.667" cy="28.332" r="5"/><path fill="#a9a9a9" d="M50,29.999c-11.048,0-20,8.953-20,20c0,11.043,8.952,20.002,20,20.002c11.045,0,20-8.959,20-20.002  C70,38.952,61.045,29.999,50,29.999z M50,63.334c-7.363,0-13.333-5.97-13.333-13.335S42.637,36.666,50,36.666  s13.333,5.968,13.333,13.333S57.363,63.334,50,63.334z"/></svg>
                                            </a>
                                            <a href="" style="padding: 0px 8px;">
                                                <svg height="25px" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" width="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#a9a9a9" d="M381.953,-0.001c3.073,0 9.216,0 13.824,0.512c11.264,0 26.112,1.024 32.768,2.56c10.24,2.048 19.968,5.12 27.648,9.216c9.728,4.608 17.92,10.752 25.6,18.432c7.168,7.168 13.312,15.36 17.92,25.088c4.096,7.68 7.168,17.408 9.216,27.648c1.536,6.656 2.56,21.504 3.072,32.768l0,265.729c0,3.072 0,9.216 -0.512,13.824c0,11.264 -1.024,26.112 -2.56,32.768c-2.048,10.24 -5.12,19.968 -9.216,27.648c-4.608,9.728 -10.752,17.92 -18.432,25.6c-7.168,7.168 -15.36,13.312 -25.088,17.92c-7.68,4.096 -17.408,7.168 -27.648,9.216c-6.656,1.536 -21.504,2.56 -32.768,3.072l-265.728,0c-3.072,0 -9.216,0 -13.824,-0.512c-11.264,0 -26.112,-1.024 -32.768,-2.56c-10.24,-2.048 -19.968,-5.12 -27.648,-9.216c-9.728,-4.608 -17.92,-10.752 -25.6,-18.432c-7.168,-7.168 -13.312,-15.36 -17.92,-25.088c-4.096,-7.68 -7.168,-17.408 -9.216,-27.648c-1.536,-6.656 -2.56,-21.504 -3.072,-32.768l0,-265.729c0,-3.072 0,-9.216 0.512,-13.824c0,-11.264 1.024,-26.112 2.56,-32.768c2.048,-10.24 5.12,-19.968 9.216,-27.648c4.608,-9.728 10.752,-17.92 18.432,-25.6c7.168,-7.168 15.36,-13.312 25.088,-17.92c7.68,-4.096 17.408,-7.168 27.648,-9.216c6.656,-1.536 21.503,-2.56 32.768,-3.072l265.728,0Zm8.696,122.563c-34.457,-34.486 -80.281,-53.487 -129.103,-53.507c-100.595,0 -182.468,81.841 -182.508,182.437c-0.013,32.156 8.39,63.546 24.361,91.212l-25.892,94.545l96.75,-25.37c26.657,14.535 56.67,22.194 87.216,22.207l0.075,0c100.586,0 182.465,-81.852 182.506,-182.448c0.019,-48.751 -18.946,-94.59 -53.405,-129.076Zm-129.102,280.709l-0.061,0c-27.22,-0.011 -53.917,-7.32 -77.207,-21.137l-5.539,-3.287l-57.413,15.056l15.325,-55.959l-3.608,-5.736c-15.184,-24.145 -23.203,-52.051 -23.192,-80.704c0.033,-83.611 68.083,-151.635 151.756,-151.635c40.517,0.016 78.603,15.811 107.243,44.474c28.64,28.663 44.404,66.764 44.389,107.283c-0.035,83.617 -68.083,151.645 -151.693,151.645Zm83.207,-113.573c-4.56,-2.282 -26.98,-13.311 -31.161,-14.832c-4.18,-1.521 -7.219,-2.282 -10.259,2.282c-3.041,4.564 -11.78,14.832 -14.44,17.875c-2.66,3.042 -5.32,3.423 -9.88,1.14c-4.561,-2.281 -19.254,-7.095 -36.672,-22.627c-13.556,-12.087 -22.709,-27.017 -25.369,-31.581c-2.66,-4.564 -0.283,-7.031 2,-9.304c2.051,-2.041 4.56,-5.324 6.84,-7.986c2.28,-2.662 3.04,-4.564 4.56,-7.606c1.52,-3.042 0.76,-5.705 -0.38,-7.987c-1.14,-2.282 -10.26,-24.72 -14.06,-33.848c-3.701,-8.889 -7.461,-7.686 -10.26,-7.826c-2.657,-0.132 -5.7,-0.16 -8.74,-0.16c-3.041,0 -7.98,1.141 -12.161,5.704c-4.18,4.564 -15.96,15.594 -15.96,38.032c0,22.438 16.34,44.116 18.62,47.159c2.281,3.043 32.157,49.089 77.902,68.836c10.88,4.697 19.374,7.501 25.997,9.603c10.924,3.469 20.866,2.98 28.723,1.806c8.761,-1.309 26.98,-11.029 30.781,-21.677c3.799,-10.649 3.799,-19.777 2.659,-21.678c-1.139,-1.902 -4.179,-3.043 -8.74,-5.325Z" id="WhatsApp-Logo-Icon" style="fill-rule:nonzero;"/></svg>
                                            </a>
                                        </td>
                                        <!-- <td width="20%" style="text-align: center; padding-left: 5px; padding-right: 5px;">
                                            <svg enable-background="new 0 0 56.693 56.693" height="56.693px" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" width="56.693px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M52.837,15.065c-1.811,0.805-3.76,1.348-5.805,1.591c2.088-1.25,3.689-3.23,4.444-5.592c-1.953,1.159-4.115,2-6.418,2.454  c-1.843-1.964-4.47-3.192-7.377-3.192c-5.581,0-10.106,4.525-10.106,10.107c0,0.791,0.089,1.562,0.262,2.303  c-8.4-0.422-15.848-4.445-20.833-10.56c-0.87,1.492-1.368,3.228-1.368,5.082c0,3.506,1.784,6.6,4.496,8.412  c-1.656-0.053-3.215-0.508-4.578-1.265c-0.001,0.042-0.001,0.085-0.001,0.128c0,4.896,3.484,8.98,8.108,9.91  c-0.848,0.23-1.741,0.354-2.663,0.354c-0.652,0-1.285-0.063-1.902-0.182c1.287,4.015,5.019,6.938,9.441,7.019  c-3.459,2.711-7.816,4.327-12.552,4.327c-0.815,0-1.62-0.048-2.411-0.142c4.474,2.869,9.786,4.541,15.493,4.541  c18.591,0,28.756-15.4,28.756-28.756c0-0.438-0.009-0.875-0.028-1.309C49.769,18.873,51.483,17.092,52.837,15.065z"/></svg>
                                        </td>
                                        <td width="20%" style="text-align: center; padding-left: 5px; padding-right: 5px;">
                                            <svg enable-background="new 0 0 100 100" height="100px" id="Layer_1" version="1.0" viewBox="0 0 100 100" width="100px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M70,9.999H30c-10.999,0-20,9.001-20,20v40.002c0,10.996,9.001,20,20,20h40c10.999,0,20-9.004,20-20V29.999  C90,19,80.999,9.999,70,9.999z M83.333,70.001c0,7.35-5.979,13.333-13.333,13.333H30c-7.351,0-13.333-5.983-13.333-13.333V29.999  c0-7.352,5.982-13.333,13.333-13.333h40c7.354,0,13.333,5.981,13.333,13.333V70.001z"/><circle cx="71.667" cy="28.332" r="5"/><path d="M50,29.999c-11.048,0-20,8.953-20,20c0,11.043,8.952,20.002,20,20.002c11.045,0,20-8.959,20-20.002  C70,38.952,61.045,29.999,50,29.999z M50,63.334c-7.363,0-13.333-5.97-13.333-13.335S42.637,36.666,50,36.666  s13.333,5.968,13.333,13.333S57.363,63.334,50,63.334z"/></svg>
                                        </td>
                                        <td width="20%" style="text-align: center; padding-left: 5px; padding-right: 5px;">
                                            <svg height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M381.953,-0.001c3.073,0 9.216,0 13.824,0.512c11.264,0 26.112,1.024 32.768,2.56c10.24,2.048 19.968,5.12 27.648,9.216c9.728,4.608 17.92,10.752 25.6,18.432c7.168,7.168 13.312,15.36 17.92,25.088c4.096,7.68 7.168,17.408 9.216,27.648c1.536,6.656 2.56,21.504 3.072,32.768l0,265.729c0,3.072 0,9.216 -0.512,13.824c0,11.264 -1.024,26.112 -2.56,32.768c-2.048,10.24 -5.12,19.968 -9.216,27.648c-4.608,9.728 -10.752,17.92 -18.432,25.6c-7.168,7.168 -15.36,13.312 -25.088,17.92c-7.68,4.096 -17.408,7.168 -27.648,9.216c-6.656,1.536 -21.504,2.56 -32.768,3.072l-265.728,0c-3.072,0 -9.216,0 -13.824,-0.512c-11.264,0 -26.112,-1.024 -32.768,-2.56c-10.24,-2.048 -19.968,-5.12 -27.648,-9.216c-9.728,-4.608 -17.92,-10.752 -25.6,-18.432c-7.168,-7.168 -13.312,-15.36 -17.92,-25.088c-4.096,-7.68 -7.168,-17.408 -9.216,-27.648c-1.536,-6.656 -2.56,-21.504 -3.072,-32.768l0,-265.729c0,-3.072 0,-9.216 0.512,-13.824c0,-11.264 1.024,-26.112 2.56,-32.768c2.048,-10.24 5.12,-19.968 9.216,-27.648c4.608,-9.728 10.752,-17.92 18.432,-25.6c7.168,-7.168 15.36,-13.312 25.088,-17.92c7.68,-4.096 17.408,-7.168 27.648,-9.216c6.656,-1.536 21.503,-2.56 32.768,-3.072l265.728,0Zm8.696,122.563c-34.457,-34.486 -80.281,-53.487 -129.103,-53.507c-100.595,0 -182.468,81.841 -182.508,182.437c-0.013,32.156 8.39,63.546 24.361,91.212l-25.892,94.545l96.75,-25.37c26.657,14.535 56.67,22.194 87.216,22.207l0.075,0c100.586,0 182.465,-81.852 182.506,-182.448c0.019,-48.751 -18.946,-94.59 -53.405,-129.076Zm-129.102,280.709l-0.061,0c-27.22,-0.011 -53.917,-7.32 -77.207,-21.137l-5.539,-3.287l-57.413,15.056l15.325,-55.959l-3.608,-5.736c-15.184,-24.145 -23.203,-52.051 -23.192,-80.704c0.033,-83.611 68.083,-151.635 151.756,-151.635c40.517,0.016 78.603,15.811 107.243,44.474c28.64,28.663 44.404,66.764 44.389,107.283c-0.035,83.617 -68.083,151.645 -151.693,151.645Zm83.207,-113.573c-4.56,-2.282 -26.98,-13.311 -31.161,-14.832c-4.18,-1.521 -7.219,-2.282 -10.259,2.282c-3.041,4.564 -11.78,14.832 -14.44,17.875c-2.66,3.042 -5.32,3.423 -9.88,1.14c-4.561,-2.281 -19.254,-7.095 -36.672,-22.627c-13.556,-12.087 -22.709,-27.017 -25.369,-31.581c-2.66,-4.564 -0.283,-7.031 2,-9.304c2.051,-2.041 4.56,-5.324 6.84,-7.986c2.28,-2.662 3.04,-4.564 4.56,-7.606c1.52,-3.042 0.76,-5.705 -0.38,-7.987c-1.14,-2.282 -10.26,-24.72 -14.06,-33.848c-3.701,-8.889 -7.461,-7.686 -10.26,-7.826c-2.657,-0.132 -5.7,-0.16 -8.74,-0.16c-3.041,0 -7.98,1.141 -12.161,5.704c-4.18,4.564 -15.96,15.594 -15.96,38.032c0,22.438 16.34,44.116 18.62,47.159c2.281,3.043 32.157,49.089 77.902,68.836c10.88,4.697 19.374,7.501 25.997,9.603c10.924,3.469 20.866,2.98 28.723,1.806c8.761,-1.309 26.98,-11.029 30.781,-21.677c3.799,-10.649 3.799,-19.777 2.659,-21.678c-1.139,-1.902 -4.179,-3.043 -8.74,-5.325Z" id="WhatsApp-Logo-Icon" style="fill-rule:nonzero;"/></svg>
                                        </td> -->
                                </tr>
                            </table>
                            </td>
                            
                        </tr>
                        </table>
                    </td>
                    </tr><!-- end: tr -->
                    <tr>
                    <td class="bg_white" style="text-align: center; padding: 0 0.5em;">
                        <p>Get e-commerce website in 24 hours <a href="https://betasouk.com" style="color: rgba(0,0,0,.8);">betasouk</a></p>
                    </td>
                    </tr>
                </table>

            </div>
        </center>
    </body>

   
    ';
    
     $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: noreply@'.$website_name. "\r\n";
    $headers .= 'Reply-To: noreply@'.$website_name. "\r\n";
    $headers .= 'Return-Path: noreply@'.$website_name. "\r\n";
    $headers .= 'BCC: noreply@'.$website_name. "\r\n";
    $headers .= 'X-Priority: 3' . "\r\n";
    $headers .= 'X-Mailer: PHP/'. phpversion() . "\r\n";
    
    mail($_SESSION['customer']['email_customer'], 'Payment Success!', $body, $headers);	








    $body2 =  '

    <!-- CSS Reset : BEGIN -->
    <style>

			/* What it does: Remove spaces around the email design added by some email clients. */
			/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
			html,
		body {
			margin: 0 auto !important;
			padding: 0 !important;
			height: 100% !important;
			width: 100% !important;
			background: #f1f1f1;
		}

		/* What it does: Stops email clients resizing small text. */
		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}

		/* What it does: Centers email on Android 4.4 */
		div[style*="margin: 16px 0"] {
			margin: 0 !important;
		}

		/* What it does: Stops Outlook from adding extra spacing to tables. */
		table,
		td {
			mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
		}

		/* What it does: Fixes webkit padding issue. */
		table {
			border-spacing: 0 !important;
			border-collapse: collapse !important;
			table-layout: fixed !important;
			margin: 0 auto !important;
		}

		/* What it does: Uses a better rendering method when resizing images in IE. */
		img {
			-ms-interpolation-mode:bicubic;
		}

		/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
		a {
			text-decoration: none;
		}

		/* What it does: A work-around for email clients meddling in triggered links. */
		*[x-apple-data-detectors],  /* iOS */
		.unstyle-auto-detected-links *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}

		/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
		.a6S {
			display: none !important;
			opacity: 0.01 !important;
		}

		/* What it does: Prevents Gmail from changing the text color in conversation threads. */
		.im {
			color: inherit !important;
		}

		/* If the above doesn\'t work, add a .g-img class to any image in question. */
		img.g-img + div {
			display: none !important;
		}

		/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
		/* Create one of these media queries for each additional viewport size you\'d like to fix */

		/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
		@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
			u ~ div .email-container {
				min-width: 320px !important;
			}
		}
		/* iPhone 6, 6S, 7, 8, and X */
		@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
			u ~ div .email-container {
				min-width: 375px !important;
			}
			
		}
		/* iPhone 6+, 7+, and 8+ */
		@media only screen and (min-device-width: 414px) {
			u ~ div .email-container {
				min-width: 414px !important;
			}
		}
	</style>

	<!-- CSS Reset : END -->

	<!-- Progressive Enhancements : BEGIN -->
	
	<style>

				.primary{
			background: #17bebb;
		}
		.bg_white{
			background: #ffffff;
		}
		.bg_light{
			background: #fcfcfc;
		}
		.bg_black{
			background: #000000;
		}
		.bg_dark{
			background: rgba(0,0,0,.8);
		}
		.email-section{
			padding:2.5em;
		}

		/*BUTTON*/
		.btn{
			padding: 10px 15px;
			display: inline-block;
		}
		.btn.btn-primary{
			border-radius: 5px;
			background: #17bebb;
			color: #ffffff;
		}
		.btn.btn-white{
			border-radius: 5px;
			background: #ffffff;
			color: #000000;
		}
		.btn.btn-white-outline{
			border-radius: 5px;
			background: transparent;
			border: 1px solid #fff;
			color: #fff;
		}
		.btn.btn-black-outline{
			border-radius: 0px;
			background: transparent;
			border: 2px solid #000;
			color: #000;
			font-weight: 700;
		}
		.btn-custom{
			color: rgba(0,0,0,.3);
			text-decoration: underline;
		}

		h1,h2,h3,h4,h5,h6{
			font-family: \'Work Sans\', sans-serif;
			color: #000000;
			margin-top: 0;
			font-weight: 400;
		}

		body{
			font-family: \'Work Sans\', sans-serif;
			font-weight: 400;
			font-size: 15px;
			line-height: 1.8;
			color: rgba(0,0,0,.4);
		}

		a{
			color: #17bebb;
		}

		table{
		}
		/*LOGO*/

		.logo h1{
			margin: 0;
		}
		.logo h1 a{
			color: #17bebb;
			font-size: 24px;
			font-weight: 700;
			font-family: \'Work Sans\', sans-serif;
		}

		/*HERO*/
		.hero{
			position: relative;
			z-index: 0;
		}

		.hero .text{
			color: rgba(0,0,0,.3);
		}
		.hero .text h2{
			color: #000;
			font-size: 34px;
			margin-bottom: 15px;
			font-weight: 300;
			line-height: 1.2;
		}
		.hero .text h3{
			font-size: 24px;
			font-weight: 200;
		}
		.hero .text h2 span{
			font-weight: 600;
			color: #000;
		}


		/*PRODUCT*/
		.product-entry{
			display: block;
			position: relative;
			float: left;
			padding-top: 20px;
		}

		.product-entry .text{
			width: calc(100% - 125px);
			padding-left: 20px;
		}
		.product-entry .text h3{
			margin-bottom: 0;
			padding-bottom: 0;
		}
		.product-entry .text p{
			margin-top: 0;
		}
		.product-entry img, .product-entry .text{
			float: left;
		}

		ul.social{
			padding: 0;
		}
		ul.social li{
			display: inline-block;
			margin-right: 10px;
		}

		/*FOOTER*/

		.footer{
			border-top: 1px solid rgba(0,0,0,.05);
			color: rgba(0,0,0,.5);
		}
		.footer .heading{
			color: #000;
			font-size: 20px;
		}
		.footer ul{
			margin: 0;
			padding: 0;
		}
		.footer ul li{
			list-style: none;
			margin-bottom: 10px;
		}
		.footer ul li a{
			color: rgba(0,0,0,1);
		}


		@media screen and (max-width: 500px) {

			.product-entry  img,
			.product-entry  div.text {
				display: block;
				width: 100%;
			}

			.product-entry  div.text {
				padding: 0px;
			}

		}


    </style>

    <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;" bgcolor="#f1f1f1">
        <center style="width: 100%;" bgcolor="#f1f1f1">
            <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
            </div>
            <div style="max-width: 600px; margin: 0 auto;" class="email-container">
                <!-- BEGIN BODY -->
                <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                    <tr>
                    <td valign="top" bgcolor="#ffffff" style="padding: 1em 2.5em 0 2.5em;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td class="logo" style="text-align: left;">
                                    <h1><a href="#">Shop</a></h1>
                                </td>
                            </tr>
                        </table>
                    </td>
                    </tr><!-- end tr -->
                    <tr>
                    <td valign="middle" class="hero" style="padding: 2em 0 2em 0;" bgcolor="#ffffff">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="padding: 0 2.5em; text-align: left;">
                                    <div class="text">
                                        <h2>'.$_SESSION['customer']['surname_customer'].' somebody ordered shopping cart misses you</h2>
                                        <h3>Amazing deals, updates, interesting news right in your inbox</h3>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    </tr><!-- end tr -->
                    <tr>
                        <table  role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
                            <tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
                                <th width="80%" style="text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 20px">Item</th>
                                <th width="20%" style="text-align:right; padding: 0 2.5em; color: #000; padding-bottom: 20px">Price</th>
                            </tr>';
                            
							
							

							$all_total_price = 0;
							  
							foreach($_SESSION['shopping_cart'] as $codename => $codearray){
								$body2 .='<tr style="border-bottom: 1px solid rgba(0,0,0,.05);">
								<td valign="middle" width="80%" style="text-align:left; padding: 0 2.5em;">
									<div class="product-entry">
										<img src="'.GEN_WEBSITE.'/images/products/'.$codearray['image'].'" alt="'.$codearray['name'].'" style="width: 100px; max-width: 600px; height: auto; margin-bottom: 20px;">
										<div class="text">
											<h3>'.$codearray['name'].'</h3>
													</div>
									</div>
								</td>
								<td valign="middle" width="20%" style="text-align:left; padding: 0 2.5em;">
									<span class="price" style="color: #000; font-size: 20px;">'.$codearray['quantity']. ' x ' .$codearray['price'].'</span>
									</td>
								</tr>';
								
								$all_total_price += $codearray['price'] * $codearray['quantity'];
								}  
															   


								$body2 .='<tr>
                                <th valign="middle" width="80%" style="text-align: center; padding: 0.5em 0;">
                                    <span class="total" style="color: #000; font-size: 20px;">Total</span>
                                </th>
                                <th valign="middle" width="20%" style="text-align: center; padding: 0.5em 0;">
                                    <span class="price" style="color: #000; font-size: 20px;">'.$all_total_price.'</span>
                                </th>
                            </tr>
                        </table>
                    </tr><!-- end tr -->
                <!-- 1 Column Text + Button : END -->
                </table>
                <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                    <tr style="text-align: center;">
                    <td valign="middle" class="footer email-section" bgcolor="#fcfcfc>
                        <table align="center" style="margin: auto;">
                            <tr >
                            
                            <td valign="top"  style="padding-top: 20px; text-align: center;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                <td width="100%" style="text-align: center; padding-left: 5px; padding-right: 5px;">
                                    <h3 class="heading">Contact Info</h3>
                                    <ul class="list-style-type: none;">
                                                <li><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                                <li><span class="text">+2 392 3929 210</span></a></li>
                                            </ul>
                                </td>
                                </tr>
                                    <tr width="100%" style="margin: 0px auto;">
                                        <td width="20%" style="text-align: center; padding-left: 5px; padding-right: 5px;">
                                            <a href="" style="padding: 0px 8px;">
                                                <svg enable-background="new 0 0 56.693 56.693" height="25px" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" width="25px"  xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#a9a9a9" d="M40.43,21.739h-7.645v-5.014c0-1.883,1.248-2.322,2.127-2.322c0.877,0,5.395,0,5.395,0V6.125l-7.43-0.029  c-8.248,0-10.125,6.174-10.125,10.125v5.518h-4.77v8.53h4.77c0,10.947,0,24.137,0,24.137h10.033c0,0,0-13.32,0-24.137h6.77  L40.43,21.739z"/></svg>
                                            </a>
                                            <a href="" style="padding: 0px 8px;">
                                                <svg enable-background="new 0 0 56.693 56.693" height="25px" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" width="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#a9a9a9" d="M52.837,15.065c-1.811,0.805-3.76,1.348-5.805,1.591c2.088-1.25,3.689-3.23,4.444-5.592c-1.953,1.159-4.115,2-6.418,2.454  c-1.843-1.964-4.47-3.192-7.377-3.192c-5.581,0-10.106,4.525-10.106,10.107c0,0.791,0.089,1.562,0.262,2.303  c-8.4-0.422-15.848-4.445-20.833-10.56c-0.87,1.492-1.368,3.228-1.368,5.082c0,3.506,1.784,6.6,4.496,8.412  c-1.656-0.053-3.215-0.508-4.578-1.265c-0.001,0.042-0.001,0.085-0.001,0.128c0,4.896,3.484,8.98,8.108,9.91  c-0.848,0.23-1.741,0.354-2.663,0.354c-0.652,0-1.285-0.063-1.902-0.182c1.287,4.015,5.019,6.938,9.441,7.019  c-3.459,2.711-7.816,4.327-12.552,4.327c-0.815,0-1.62-0.048-2.411-0.142c4.474,2.869,9.786,4.541,15.493,4.541  c18.591,0,28.756-15.4,28.756-28.756c0-0.438-0.009-0.875-0.028-1.309C49.769,18.873,51.483,17.092,52.837,15.065z"/></svg>
                                            </a>
                                            <a href="" style="padding: 0px 8px;">
                                                <svg enable-background="new 0 0 100 100" height="25px" id="Layer_1" version="1.0" viewBox="0 0 100 100" width="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#a9a9a9" d="M70,9.999H30c-10.999,0-20,9.001-20,20v40.002c0,10.996,9.001,20,20,20h40c10.999,0,20-9.004,20-20V29.999  C90,19,80.999,9.999,70,9.999z M83.333,70.001c0,7.35-5.979,13.333-13.333,13.333H30c-7.351,0-13.333-5.983-13.333-13.333V29.999  c0-7.352,5.982-13.333,13.333-13.333h40c7.354,0,13.333,5.981,13.333,13.333V70.001z"/><circle fill="#a9a9a9" cx="71.667" cy="28.332" r="5"/><path fill="#a9a9a9" d="M50,29.999c-11.048,0-20,8.953-20,20c0,11.043,8.952,20.002,20,20.002c11.045,0,20-8.959,20-20.002  C70,38.952,61.045,29.999,50,29.999z M50,63.334c-7.363,0-13.333-5.97-13.333-13.335S42.637,36.666,50,36.666  s13.333,5.968,13.333,13.333S57.363,63.334,50,63.334z"/></svg>
                                            </a>
                                            <a href="" style="padding: 0px 8px;">
                                                <svg height="25px" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" width="25px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#a9a9a9" d="M381.953,-0.001c3.073,0 9.216,0 13.824,0.512c11.264,0 26.112,1.024 32.768,2.56c10.24,2.048 19.968,5.12 27.648,9.216c9.728,4.608 17.92,10.752 25.6,18.432c7.168,7.168 13.312,15.36 17.92,25.088c4.096,7.68 7.168,17.408 9.216,27.648c1.536,6.656 2.56,21.504 3.072,32.768l0,265.729c0,3.072 0,9.216 -0.512,13.824c0,11.264 -1.024,26.112 -2.56,32.768c-2.048,10.24 -5.12,19.968 -9.216,27.648c-4.608,9.728 -10.752,17.92 -18.432,25.6c-7.168,7.168 -15.36,13.312 -25.088,17.92c-7.68,4.096 -17.408,7.168 -27.648,9.216c-6.656,1.536 -21.504,2.56 -32.768,3.072l-265.728,0c-3.072,0 -9.216,0 -13.824,-0.512c-11.264,0 -26.112,-1.024 -32.768,-2.56c-10.24,-2.048 -19.968,-5.12 -27.648,-9.216c-9.728,-4.608 -17.92,-10.752 -25.6,-18.432c-7.168,-7.168 -13.312,-15.36 -17.92,-25.088c-4.096,-7.68 -7.168,-17.408 -9.216,-27.648c-1.536,-6.656 -2.56,-21.504 -3.072,-32.768l0,-265.729c0,-3.072 0,-9.216 0.512,-13.824c0,-11.264 1.024,-26.112 2.56,-32.768c2.048,-10.24 5.12,-19.968 9.216,-27.648c4.608,-9.728 10.752,-17.92 18.432,-25.6c7.168,-7.168 15.36,-13.312 25.088,-17.92c7.68,-4.096 17.408,-7.168 27.648,-9.216c6.656,-1.536 21.503,-2.56 32.768,-3.072l265.728,0Zm8.696,122.563c-34.457,-34.486 -80.281,-53.487 -129.103,-53.507c-100.595,0 -182.468,81.841 -182.508,182.437c-0.013,32.156 8.39,63.546 24.361,91.212l-25.892,94.545l96.75,-25.37c26.657,14.535 56.67,22.194 87.216,22.207l0.075,0c100.586,0 182.465,-81.852 182.506,-182.448c0.019,-48.751 -18.946,-94.59 -53.405,-129.076Zm-129.102,280.709l-0.061,0c-27.22,-0.011 -53.917,-7.32 -77.207,-21.137l-5.539,-3.287l-57.413,15.056l15.325,-55.959l-3.608,-5.736c-15.184,-24.145 -23.203,-52.051 -23.192,-80.704c0.033,-83.611 68.083,-151.635 151.756,-151.635c40.517,0.016 78.603,15.811 107.243,44.474c28.64,28.663 44.404,66.764 44.389,107.283c-0.035,83.617 -68.083,151.645 -151.693,151.645Zm83.207,-113.573c-4.56,-2.282 -26.98,-13.311 -31.161,-14.832c-4.18,-1.521 -7.219,-2.282 -10.259,2.282c-3.041,4.564 -11.78,14.832 -14.44,17.875c-2.66,3.042 -5.32,3.423 -9.88,1.14c-4.561,-2.281 -19.254,-7.095 -36.672,-22.627c-13.556,-12.087 -22.709,-27.017 -25.369,-31.581c-2.66,-4.564 -0.283,-7.031 2,-9.304c2.051,-2.041 4.56,-5.324 6.84,-7.986c2.28,-2.662 3.04,-4.564 4.56,-7.606c1.52,-3.042 0.76,-5.705 -0.38,-7.987c-1.14,-2.282 -10.26,-24.72 -14.06,-33.848c-3.701,-8.889 -7.461,-7.686 -10.26,-7.826c-2.657,-0.132 -5.7,-0.16 -8.74,-0.16c-3.041,0 -7.98,1.141 -12.161,5.704c-4.18,4.564 -15.96,15.594 -15.96,38.032c0,22.438 16.34,44.116 18.62,47.159c2.281,3.043 32.157,49.089 77.902,68.836c10.88,4.697 19.374,7.501 25.997,9.603c10.924,3.469 20.866,2.98 28.723,1.806c8.761,-1.309 26.98,-11.029 30.781,-21.677c3.799,-10.649 3.799,-19.777 2.659,-21.678c-1.139,-1.902 -4.179,-3.043 -8.74,-5.325Z" id="WhatsApp-Logo-Icon" style="fill-rule:nonzero;"/></svg>
                                            </a>
                                        </td>
                                        <!-- <td width="20%" style="text-align: center; padding-left: 5px; padding-right: 5px;">
                                            <svg enable-background="new 0 0 56.693 56.693" height="56.693px" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" width="56.693px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M52.837,15.065c-1.811,0.805-3.76,1.348-5.805,1.591c2.088-1.25,3.689-3.23,4.444-5.592c-1.953,1.159-4.115,2-6.418,2.454  c-1.843-1.964-4.47-3.192-7.377-3.192c-5.581,0-10.106,4.525-10.106,10.107c0,0.791,0.089,1.562,0.262,2.303  c-8.4-0.422-15.848-4.445-20.833-10.56c-0.87,1.492-1.368,3.228-1.368,5.082c0,3.506,1.784,6.6,4.496,8.412  c-1.656-0.053-3.215-0.508-4.578-1.265c-0.001,0.042-0.001,0.085-0.001,0.128c0,4.896,3.484,8.98,8.108,9.91  c-0.848,0.23-1.741,0.354-2.663,0.354c-0.652,0-1.285-0.063-1.902-0.182c1.287,4.015,5.019,6.938,9.441,7.019  c-3.459,2.711-7.816,4.327-12.552,4.327c-0.815,0-1.62-0.048-2.411-0.142c4.474,2.869,9.786,4.541,15.493,4.541  c18.591,0,28.756-15.4,28.756-28.756c0-0.438-0.009-0.875-0.028-1.309C49.769,18.873,51.483,17.092,52.837,15.065z"/></svg>
                                        </td>
                                        <td width="20%" style="text-align: center; padding-left: 5px; padding-right: 5px;">
                                            <svg enable-background="new 0 0 100 100" height="100px" id="Layer_1" version="1.0" viewBox="0 0 100 100" width="100px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M70,9.999H30c-10.999,0-20,9.001-20,20v40.002c0,10.996,9.001,20,20,20h40c10.999,0,20-9.004,20-20V29.999  C90,19,80.999,9.999,70,9.999z M83.333,70.001c0,7.35-5.979,13.333-13.333,13.333H30c-7.351,0-13.333-5.983-13.333-13.333V29.999  c0-7.352,5.982-13.333,13.333-13.333h40c7.354,0,13.333,5.981,13.333,13.333V70.001z"/><circle cx="71.667" cy="28.332" r="5"/><path d="M50,29.999c-11.048,0-20,8.953-20,20c0,11.043,8.952,20.002,20,20.002c11.045,0,20-8.959,20-20.002  C70,38.952,61.045,29.999,50,29.999z M50,63.334c-7.363,0-13.333-5.97-13.333-13.335S42.637,36.666,50,36.666  s13.333,5.968,13.333,13.333S57.363,63.334,50,63.334z"/></svg>
                                        </td>
                                        <td width="20%" style="text-align: center; padding-left: 5px; padding-right: 5px;">
                                            <svg height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M381.953,-0.001c3.073,0 9.216,0 13.824,0.512c11.264,0 26.112,1.024 32.768,2.56c10.24,2.048 19.968,5.12 27.648,9.216c9.728,4.608 17.92,10.752 25.6,18.432c7.168,7.168 13.312,15.36 17.92,25.088c4.096,7.68 7.168,17.408 9.216,27.648c1.536,6.656 2.56,21.504 3.072,32.768l0,265.729c0,3.072 0,9.216 -0.512,13.824c0,11.264 -1.024,26.112 -2.56,32.768c-2.048,10.24 -5.12,19.968 -9.216,27.648c-4.608,9.728 -10.752,17.92 -18.432,25.6c-7.168,7.168 -15.36,13.312 -25.088,17.92c-7.68,4.096 -17.408,7.168 -27.648,9.216c-6.656,1.536 -21.504,2.56 -32.768,3.072l-265.728,0c-3.072,0 -9.216,0 -13.824,-0.512c-11.264,0 -26.112,-1.024 -32.768,-2.56c-10.24,-2.048 -19.968,-5.12 -27.648,-9.216c-9.728,-4.608 -17.92,-10.752 -25.6,-18.432c-7.168,-7.168 -13.312,-15.36 -17.92,-25.088c-4.096,-7.68 -7.168,-17.408 -9.216,-27.648c-1.536,-6.656 -2.56,-21.504 -3.072,-32.768l0,-265.729c0,-3.072 0,-9.216 0.512,-13.824c0,-11.264 1.024,-26.112 2.56,-32.768c2.048,-10.24 5.12,-19.968 9.216,-27.648c4.608,-9.728 10.752,-17.92 18.432,-25.6c7.168,-7.168 15.36,-13.312 25.088,-17.92c7.68,-4.096 17.408,-7.168 27.648,-9.216c6.656,-1.536 21.503,-2.56 32.768,-3.072l265.728,0Zm8.696,122.563c-34.457,-34.486 -80.281,-53.487 -129.103,-53.507c-100.595,0 -182.468,81.841 -182.508,182.437c-0.013,32.156 8.39,63.546 24.361,91.212l-25.892,94.545l96.75,-25.37c26.657,14.535 56.67,22.194 87.216,22.207l0.075,0c100.586,0 182.465,-81.852 182.506,-182.448c0.019,-48.751 -18.946,-94.59 -53.405,-129.076Zm-129.102,280.709l-0.061,0c-27.22,-0.011 -53.917,-7.32 -77.207,-21.137l-5.539,-3.287l-57.413,15.056l15.325,-55.959l-3.608,-5.736c-15.184,-24.145 -23.203,-52.051 -23.192,-80.704c0.033,-83.611 68.083,-151.635 151.756,-151.635c40.517,0.016 78.603,15.811 107.243,44.474c28.64,28.663 44.404,66.764 44.389,107.283c-0.035,83.617 -68.083,151.645 -151.693,151.645Zm83.207,-113.573c-4.56,-2.282 -26.98,-13.311 -31.161,-14.832c-4.18,-1.521 -7.219,-2.282 -10.259,2.282c-3.041,4.564 -11.78,14.832 -14.44,17.875c-2.66,3.042 -5.32,3.423 -9.88,1.14c-4.561,-2.281 -19.254,-7.095 -36.672,-22.627c-13.556,-12.087 -22.709,-27.017 -25.369,-31.581c-2.66,-4.564 -0.283,-7.031 2,-9.304c2.051,-2.041 4.56,-5.324 6.84,-7.986c2.28,-2.662 3.04,-4.564 4.56,-7.606c1.52,-3.042 0.76,-5.705 -0.38,-7.987c-1.14,-2.282 -10.26,-24.72 -14.06,-33.848c-3.701,-8.889 -7.461,-7.686 -10.26,-7.826c-2.657,-0.132 -5.7,-0.16 -8.74,-0.16c-3.041,0 -7.98,1.141 -12.161,5.704c-4.18,4.564 -15.96,15.594 -15.96,38.032c0,22.438 16.34,44.116 18.62,47.159c2.281,3.043 32.157,49.089 77.902,68.836c10.88,4.697 19.374,7.501 25.997,9.603c10.924,3.469 20.866,2.98 28.723,1.806c8.761,-1.309 26.98,-11.029 30.781,-21.677c3.799,-10.649 3.799,-19.777 2.659,-21.678c-1.139,-1.902 -4.179,-3.043 -8.74,-5.325Z" id="WhatsApp-Logo-Icon" style="fill-rule:nonzero;"/></svg>
                                        </td> -->
                                </tr>
                            </table>
                            </td>
                            
                        </tr>
                        </table>
                    </td>
                    </tr><!-- end: tr -->
                    <tr>
                    <td  style="text-align: center; padding: 0 0.5em;" bgcolor="#ffffff">
                        <p>Get e-commerce website in 24 hours <a href="https://betasouk.com" style="color: rgba(0,0,0,.8);">betasouk</a></p>
                    </td>
                    </tr>
                </table>

            </div>
        </center>
    </body>

   
    ';

    
     $headers2 = 'MIME-Version: 1.0' . "\r\n";
    $headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers2 .= 'From: noreply@'.$website_name. "\r\n";
    $headers2 .= 'Reply-To: noreply@'.$website_name. "\r\n";
    $headers2 .= 'Return-Path: noreply@'.$website_name. "\r\n";
    $headers2 .= 'BCC: noreply@'.$website_name. "\r\n";
    $headers2 .= 'X-Priority: 3' . "\r\n";
    $headers2 .= 'X-Mailer: PHP/'. phpversion() . "\r\n";
    
    mail($EMAIL, 'New customer order', $body2, $headers2);	

 
	unset($_SESSION["shopping_cart"]);
	unset($_SESSION['customer']);
	include ('../incs-template1/adding-to-cart.php'); 
	include ('../incs-template1/header.php'); 

 echo ' <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>Payment Success</li>
                </ul>
            </div>
        </div>
        <section class="ps-section--account">
            <div class="container">
                <div class="ps-block--payment-success">
                    <h3>Payment Success!</h3>
                    <p>Thanks for your payment. Please visit<a href="user-information.html"> here</a> to check your order status.</p>
                </div>
            </div>
        </section>
 
 ';

  
     
   
//Perform necessary action
}else{
   echo '<h3>Payment was not successful</h3>';
    unset($_SESSION["shopping_cart"]);
    unset($_SESSION['customer']);
}




include ('../incs-template1/footer.php'); ?>