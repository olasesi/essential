<?php require_once ('../incs-template1/config.php'); ?>
<?php include_once ('../incs-template1/cookie-session.php'); ?>
<?php 
include ('../incs-template1/adding-to-cart.php'); 
include ('../incs-template1/header.php'); ?>
<?php include ('../incs-template1/settings.php'); ?>
<?php 
//unset($_SESSION['email_customer']);
//unset($_SESSION['price']);
//unset($_SESSION['product_name']);
//unset($_SESSION['ref']);

?>


<div id="homepage-1">
    <div class="ps-home-banner ps-home-banner--1">
        <div class="ps-container">
            <div class="ps-section__left">
            <?php
                if(isset($_SESSION['user_id'])){
                echo  '<small>slider banners (1230x425)px</small>';
                }
                ?>
                <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1"
                    data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
                   <?php
                   	$query_slider_banner_select =  mysqli_query($connect, "SELECT slider_banner_image FROM slider_banner ORDER BY slider_id ASC LIMIT 3") or die(db_conn_error);

                   while($looping_slider=mysqli_fetch_array($query_slider_banner_select)){
                    echo ' <div class="ps-banner bg--cover" data-background="images/sliders/'.$looping_slider['slider_banner_image'].'">
                                <a class="ps-banner__overlay" ></a>
                            </div>';

                    }

                  
                   ?>
                   
                   
                   
                </div>
            </div>
            <div class="ps-section__right">
            <?php
if(isset($_SESSION['user_id'])){
   echo  '<small>banner 1 &#38; banner 2 (390x193)px</small>';
 }
   ?>

<?php
                   	$query_banner_select =  mysqli_query($connect, "SELECT banner_image FROM banner ORDER BY banner_id ASC LIMIT 2") or die(db_conn_error);

                   while($looping_banner=mysqli_fetch_array($query_banner_select)){
            echo '<a class="ps-collection"><img src="images/banners/'.$looping_banner['banner_image'].'" alt="'.$looping_banner['banner_image'].'"></a>';

                   }

                  
                   ?>
               
               
            </div>
        </div>
    </div>

    <div class="ps-site-features">
        <div class="ps-container">
            <div class="ps-block--site-features">
                <div class="ps-block__item">
                    <div class="ps-block__left"><i class="icon-rocket"></i></div>
                    <div class="ps-block__right">
                        <h4>World WIde Delivery</h4>
                        <p>- Within Lagos same day</p>
                        <p>- Outside Lagos 3 day</p>
                        <p>- Outside the country 7-14 day</p>
                    </div>
                </div>
                <div class="ps-block__item">
                    <div class="ps-block__left"><i class="icon-sync"></i></div>
                    <div class="ps-block__right">
                        <h4>7 Days Return</h4>
                        <p>If goods have problems</p>
                    </div>
                </div>
                <div class="ps-block__item">
                    <div class="ps-block__left"><i class="icon-credit-card"></i></div>
                    <div class="ps-block__right">
                        <h4>Secure Payment</h4>
                        <!--<p>100% secure payment</p>-->
                        <svg xmlns="http://www.w3.org/2000/svg" width="137" height="13" fill="none"><path d="M.037 5.095l1.075-.135c-.011-.774-.025-1.944-.013-2.149C1.19 1.364 2.38.134 3.81.013 3.9.006 3.99.002 4.077 0a2.947 2.947 0 0 1 2.046.76c.574.509.95 1.26 1.008 2.007.015.192.01 1.491.01 2.257l1.096.163L8.2 11.44 4.093 12 0 11.346l.037-6.251zm4.106-.514l1.724.256c-.007-.933-.05-2.295-.26-2.654-.319-.545-.846-.867-1.443-.88h-.063c-.607.008-1.138.322-1.458.864-.222.378-.266 1.66-.265 2.637l1.765-.223zM18.228 10.108c-.576 0-1.064-.072-1.464-.216a2.864 2.864 0 0 1-.972-.6 2.552 2.552 0 0 1-.588-.864 4.067 4.067 0 0 1-.252-1.044h1.008c.032.256.088.5.168.732.08.224.204.424.372.6.168.168.388.304.66.408.28.096.636.144 1.068.144.28 0 .536-.036.768-.108.24-.08.448-.192.624-.336.176-.144.312-.316.408-.516.104-.2.156-.42.156-.66 0-.24-.032-.448-.096-.624a1.02 1.02 0 0 0-.336-.468 1.885 1.885 0 0 0-.636-.324 6.4 6.4 0 0 0-1.008-.228 8.79 8.79 0 0 1-1.212-.276 3.246 3.246 0 0 1-.9-.432 1.982 1.982 0 0 1-.564-.672c-.128-.272-.192-.6-.192-.984 0-.328.068-.632.204-.912.136-.288.324-.536.564-.744.248-.208.54-.372.876-.492.336-.12.708-.18 1.116-.18.864 0 1.548.204 2.052.612.512.4.812.984.9 1.752h-.936c-.104-.544-.316-.932-.636-1.164-.32-.24-.78-.36-1.38-.36-.592 0-1.04.132-1.344.396a1.255 1.255 0 0 0-.444.996c0 .208.024.396.072.564.056.16.156.3.3.42.152.12.36.228.624.324a6.72 6.72 0 0 0 1.068.228c.48.072.9.168 1.26.288.36.12.664.276.912.468s.432.428.552.708c.128.28.192.624.192 1.032 0 .36-.076.696-.228 1.008a2.472 2.472 0 0 1-.612.804c-.264.224-.58.4-.948.528-.36.128-.752.192-1.176.192zM25.355 10.108c-.44 0-.848-.076-1.224-.228a2.916 2.916 0 0 1-.96-.636 2.966 2.966 0 0 1-.636-1.008 3.77 3.77 0 0 1-.216-1.308v-.096c0-.472.072-.904.216-1.296.144-.4.344-.74.6-1.02.264-.288.576-.508.936-.66.36-.16.756-.24 1.188-.24.36 0 .708.06 1.044.18.344.112.648.292.912.54.264.248.472.572.624.972.16.392.24.868.24 1.428v.324h-4.728c.024.72.204 1.272.54 1.656.336.376.828.564 1.476.564.984 0 1.54-.364 1.668-1.092h.996c-.112.632-.408 1.112-.888 1.44-.48.32-1.076.48-1.788.48zm1.704-3.852c-.048-.648-.232-1.112-.552-1.392-.312-.28-.728-.42-1.248-.42-.512 0-.932.164-1.26.492-.32.32-.524.76-.612 1.32h3.672zM32.091 10.108c-.44 0-.848-.072-1.224-.216a3.054 3.054 0 0 1-.972-.636 3.12 3.12 0 0 1-.648-1.008 3.626 3.626 0 0 1-.228-1.32v-.096c0-.48.08-.916.24-1.308.16-.4.376-.74.648-1.02.28-.28.604-.496.972-.648.376-.16.772-.24 1.188-.24.328 0 .644.04.948.12.312.08.588.208.828.384.248.168.456.392.624.672.168.28.276.62.324 1.02h-.984c-.08-.496-.284-.848-.612-1.056-.32-.208-.696-.312-1.128-.312a1.93 1.93 0 0 0-.804.168c-.24.112-.452.272-.636.48a2.23 2.23 0 0 0-.42.744 2.991 2.991 0 0 0-.156.996v.096c0 .776.188 1.364.564 1.764.384.392.88.588 1.488.588.224 0 .436-.032.636-.096a1.651 1.651 0 0 0 .96-.768c.112-.192.18-.416.204-.672h.924a2.595 2.595 0 0 1-.276.948 2.386 2.386 0 0 1-.576.744c-.24.208-.52.372-.84.492-.32.12-.668.18-1.044.18zM38.335 10.108a2.83 2.83 0 0 1-.876-.132 1.724 1.724 0 0 1-.684-.42 2.145 2.145 0 0 1-.456-.756c-.112-.304-.168-.672-.168-1.104V3.724h.996v3.924c0 .552.116.956.348 1.212.24.256.608.384 1.104.384.224 0 .44-.036.648-.108.208-.072.392-.18.552-.324.16-.144.288-.324.384-.54.096-.216.144-.464.144-.744V3.724h.996V10h-.996v-.996c-.144.296-.388.556-.732.78-.336.216-.756.324-1.26.324zM43.216 3.724h.996v1.128c.2-.352.452-.64.756-.864.312-.232.748-.356 1.308-.372v.936a4.461 4.461 0 0 0-.852.12 1.647 1.647 0 0 0-.66.324 1.472 1.472 0 0 0-.408.612c-.096.248-.144.564-.144.948V10h-.996V3.724zM50 10.108c-.44 0-.848-.076-1.224-.228a2.916 2.916 0 0 1-.96-.636 2.966 2.966 0 0 1-.636-1.008 3.77 3.77 0 0 1-.216-1.308v-.096c0-.472.072-.904.216-1.296.144-.4.344-.74.6-1.02.264-.288.576-.508.936-.66.36-.16.756-.24 1.188-.24.36 0 .708.06 1.044.18.344.112.648.292.912.54.264.248.472.572.624.972.16.392.24.868.24 1.428v.324h-4.728c.024.72.204 1.272.54 1.656.336.376.828.564 1.476.564.984 0 1.54-.364 1.668-1.092h.996c-.112.632-.408 1.112-.888 1.44-.48.32-1.076.48-1.788.48zm1.704-3.852c-.048-.648-.232-1.112-.552-1.392-.312-.28-.728-.42-1.248-.42-.512 0-.932.164-1.26.492-.32.32-.524.76-.612 1.32h3.672zM56.496 10.108c-.408 0-.788-.068-1.14-.204a2.683 2.683 0 0 1-.9-.612 3.01 3.01 0 0 1-.588-.984 4.01 4.01 0 0 1-.204-1.32v-.096c0-.48.072-.92.216-1.32.144-.4.344-.744.6-1.032.256-.296.564-.524.924-.684.36-.16.756-.24 1.188-.24.528 0 .956.112 1.284.336.328.216.584.476.768.78V.724h.996V10h-.996V8.92c-.088.152-.208.3-.36.444a2.792 2.792 0 0 1-.516.384 2.874 2.874 0 0 1-.6.252c-.216.072-.44.108-.672.108zm.108-.828c.288 0 .56-.048.816-.144.256-.096.476-.24.66-.432.184-.2.328-.448.432-.744.112-.304.168-.656.168-1.056v-.096c0-.808-.18-1.404-.54-1.788-.352-.384-.836-.576-1.452-.576-.624 0-1.112.208-1.464.624-.352.416-.528 1.008-.528 1.776v.096c0 .392.048.736.144 1.032.104.296.24.54.408.732.176.192.38.336.612.432.232.096.48.144.744.144zM67.712 10.108c-.512 0-.948-.112-1.308-.336a2.38 2.38 0 0 1-.816-.804V10h-.996V.724h.996V4.78a1.92 1.92 0 0 1 .348-.432c.152-.144.32-.268.504-.372.192-.112.396-.2.612-.264.216-.064.436-.096.66-.096.408 0 .788.072 1.14.216.352.144.652.352.9.624.256.272.456.604.6.996.144.392.216.832.216 1.32v.096c0 .48-.068.92-.204 1.32a3.103 3.103 0 0 1-.576 1.02 2.583 2.583 0 0 1-.9.672 2.937 2.937 0 0 1-1.176.228zm-.096-.828c.624 0 1.1-.2 1.428-.6.328-.408.492-.996.492-1.764V6.82c0-.4-.052-.748-.156-1.044a2.095 2.095 0 0 0-.42-.732 1.53 1.53 0 0 0-.612-.444 1.798 1.798 0 0 0-.744-.156c-.288 0-.56.048-.816.144a1.71 1.71 0 0 0-.648.444c-.184.192-.328.44-.432.744a3.152 3.152 0 0 0-.156 1.044v.096c0 .8.192 1.396.576 1.788.384.384.88.576 1.488.576zM73.63 9.352l-2.46-5.628h1.068l1.92 4.5 1.74-4.5h1.02l-3.468 8.46h-1.008l1.188-2.832zM87.127 3.669A3.138 3.138 0 0 0 86.1 2.95a3.09 3.09 0 0 0-1.228-.25c-.448 0-.848.086-1.187.26a2.199 2.199 0 0 0-.662.497v-.191a.387.387 0 0 0-.214-.348.323.323 0 0 0-.14-.03h-1.315a.314.314 0 0 0-.254.116.377.377 0 0 0-.1.262v8.97c0 .1.034.188.1.258a.34.34 0 0 0 .254.103h1.341a.342.342 0 0 0 .244-.103.336.336 0 0 0 .11-.259v-3.06c.178.202.417.357.702.464.35.134.72.203 1.093.203.43 0 .848-.082 1.242-.248a3.124 3.124 0 0 0 1.04-.724c.305-.326.545-.709.707-1.128a3.93 3.93 0 0 0 .263-1.477c0-.54-.086-1.037-.263-1.477a3.387 3.387 0 0 0-.706-1.12zm-1.204 3.24c-.073.19-.18.362-.315.51a1.415 1.415 0 0 1-1.065.466c-.2.001-.4-.04-.584-.12a1.484 1.484 0 0 1-.49-.346 1.593 1.593 0 0 1-.32-.51 1.738 1.738 0 0 1-.115-.63c0-.224.04-.435.115-.631a1.532 1.532 0 0 1 .804-.846c.185-.086.386-.13.59-.129.215 0 .414.044.593.13.177.083.338.199.474.341a1.622 1.622 0 0 1 .425 1.135c0 .225-.037.436-.112.63zM95.298 2.89h-1.33a.339.339 0 0 0-.246.11.384.384 0 0 0-.108.266v.166a1.856 1.856 0 0 0-.602-.472 2.525 2.525 0 0 0-1.166-.258 3.227 3.227 0 0 0-2.284.964 3.554 3.554 0 0 0-.734 1.123 3.827 3.827 0 0 0-.275 1.477c0 .54.092 1.037.275 1.477.184.434.427.817.728 1.128a3.146 3.146 0 0 0 2.277.973c.437 0 .834-.088 1.173-.259.25-.13.456-.287.608-.471v.177a.34.34 0 0 0 .11.259.341.341 0 0 0 .244.104h1.33a.324.324 0 0 0 .25-.105.349.349 0 0 0 .102-.258V3.267a.377.377 0 0 0-.1-.262.325.325 0 0 0-.252-.115zM93.502 6.9a1.55 1.55 0 0 1-.312.511c-.136.143-.296.26-.473.344-.178.085-.38.129-.596.129-.207 0-.407-.044-.59-.13a1.501 1.501 0 0 1-.791-.855 1.766 1.766 0 0 1-.112-.62c0-.225.038-.436.112-.632.075-.193.181-.364.314-.504.137-.143.3-.26.478-.342.182-.085.382-.129.59-.129.215 0 .417.044.595.13.178.085.338.2.473.341a1.623 1.623 0 0 1 .424 1.135c0 .215-.037.424-.112.622zM108.567 6.094a2.265 2.265 0 0 0-.654-.402c-.247-.101-.509-.181-.785-.235l-1.014-.204c-.26-.05-.441-.117-.543-.203a.328.328 0 0 1-.136-.264c0-.11.063-.2.189-.282.137-.086.329-.13.566-.13.26 0 .518.053.757.157.243.106.471.226.67.36.295.187.546.162.727-.053l.487-.57a.543.543 0 0 0 .152-.357c0-.128-.064-.245-.185-.351-.207-.184-.533-.378-.971-.568-.437-.192-.987-.29-1.637-.29-.427 0-.82.058-1.168.172-.35.116-.65.276-.893.474-.245.204-.438.44-.57.713a2 2 0 0 0-.198.875c0 .56.167 1.017.496 1.358.328.333.766.56 1.304.67l1.054.232c.3.062.528.132.675.21.129.067.19.163.19.297 0 .12-.061.227-.188.324-.133.104-.342.155-.622.155a1.83 1.83 0 0 1-.831-.19 3.056 3.056 0 0 1-.678-.458.995.995 0 0 0-.307-.17c-.126-.037-.268.003-.431.13l-.583.461c-.169.145-.24.32-.209.522.029.194.19.394.491.62.269.193.614.368 1.029.518.415.151.901.229 1.453.229.444 0 .854-.058 1.215-.172.362-.119.681-.278.941-.48a2.056 2.056 0 0 0 .819-1.663c0-.319-.053-.6-.165-.836a1.843 1.843 0 0 0-.447-.6zM114.383 7.73a.363.363 0 0 0-.295-.192.55.55 0 0 0-.343.113c-.095.062-.198.11-.306.141a.75.75 0 0 1-.426.013.43.43 0 0 1-.181-.093.554.554 0 0 1-.143-.204.92.92 0 0 1-.059-.362v-2.46h1.731c.099 0 .188-.04.266-.117a.368.368 0 0 0 .112-.26V3.268a.369.369 0 0 0-.115-.268.38.38 0 0 0-.263-.109h-1.732V1.216a.354.354 0 0 0-.108-.27.347.347 0 0 0-.243-.104h-1.344a.36.36 0 0 0-.34.226.371.371 0 0 0-.027.148V2.89h-.767a.324.324 0 0 0-.255.115.385.385 0 0 0-.098.262V4.31a.4.4 0 0 0 .212.346c.044.021.092.032.14.03h.768v2.925c0 .39.069.726.2 1.003.132.274.305.504.514.676.217.178.465.31.731.388.27.084.551.126.833.126.385 0 .75-.061 1.094-.18a2.13 2.13 0 0 0 .861-.552c.152-.181.17-.381.046-.581l-.463-.76zM121.672 2.89h-1.329a.339.339 0 0 0-.244.11.39.39 0 0 0-.08.122.394.394 0 0 0-.027.144v.166a1.906 1.906 0 0 0-.605-.472c-.335-.173-.726-.258-1.168-.258-.42 0-.834.083-1.226.249a3.24 3.24 0 0 0-1.055.715 3.528 3.528 0 0 0-.734 1.123 3.79 3.79 0 0 0-.276 1.477c0 .54.092 1.037.275 1.477.184.434.428.817.729 1.128a3.138 3.138 0 0 0 2.273.973 2.59 2.59 0 0 0 1.175-.259c.255-.13.457-.287.612-.471v.177a.34.34 0 0 0 .108.259.343.343 0 0 0 .243.104h1.329a.335.335 0 0 0 .252-.105.364.364 0 0 0 .102-.258V3.267a.38.38 0 0 0-.1-.262.332.332 0 0 0-.115-.087.311.311 0 0 0-.139-.028zM119.876 6.9a1.534 1.534 0 0 1-.786.855 1.362 1.362 0 0 1-.594.129c-.207 0-.405-.044-.588-.13a1.516 1.516 0 0 1-.792-.855 1.757 1.757 0 0 1-.113-.62c0-.225.037-.436.112-.632.073-.187.179-.358.314-.504.138-.143.3-.26.479-.342.184-.086.385-.13.588-.129.217 0 .415.044.594.13.181.085.34.2.472.341.134.143.24.313.314.504a1.73 1.73 0 0 1 0 1.253zM128.978 7.64l-.763-.593c-.146-.118-.284-.15-.404-.1a.742.742 0 0 0-.279.205 2.527 2.527 0 0 1-.583.535c-.192.122-.444.183-.742.183-.219 0-.42-.04-.6-.122a1.423 1.423 0 0 1-.469-.342 1.575 1.575 0 0 1-.308-.51 1.751 1.751 0 0 1-.106-.617c0-.228.034-.438.106-.632.07-.192.173-.363.308-.503.135-.144.295-.26.472-.342.187-.088.391-.132.597-.13.298 0 .547.064.742.187.198.126.396.306.584.534.078.092.17.16.278.206.122.048.259.016.401-.101l.762-.594a.53.53 0 0 0 .201-.269.437.437 0 0 0-.034-.365 3.329 3.329 0 0 0-1.18-1.127c-.504-.291-1.108-.441-1.784-.441a3.519 3.519 0 0 0-2.51 1.033c-.322.322-.576.71-.747 1.137a3.68 3.68 0 0 0-.273 1.407c0 .495.093.968.273 1.402.173.424.427.808.747 1.128a3.527 3.527 0 0 0 2.51 1.034c.676 0 1.28-.149 1.784-.444a3.286 3.286 0 0 0 1.182-1.13.411.411 0 0 0 .055-.173.415.415 0 0 0-.023-.182.624.624 0 0 0-.197-.273zM136.06 9.045l-2.104-3.143 1.801-2.415c.094-.139.119-.272.075-.397-.031-.09-.116-.2-.334-.2h-1.425a.52.52 0 0 0-.234.058.482.482 0 0 0-.209.205L132.191 5.2h-.349V.363a.37.37 0 0 0-.099-.26.352.352 0 0 0-.253-.103h-1.332a.37.37 0 0 0-.337.22.346.346 0 0 0-.027.143V9.29c0 .103.038.193.11.259a.353.353 0 0 0 .254.104h1.333a.328.328 0 0 0 .251-.105.346.346 0 0 0 .075-.119.333.333 0 0 0 .024-.14V6.927h.386l1.571 2.446c.112.187.267.281.46.281h1.491c.226 0 .32-.11.358-.202.054-.13.038-.262-.047-.406zM102.863 2.89h-1.489a.389.389 0 0 0-.298.122.544.544 0 0 0-.13.249l-1.099 4.167h-.268l-1.182-4.167a.66.66 0 0 0-.113-.247.329.329 0 0 0-.264-.124h-1.544c-.199 0-.325.066-.372.193a.588.588 0 0 0-.002.37l1.887 5.865c.03.093.08.17.145.232a.388.388 0 0 0 .281.104h.798l-.066.19-.19.547a.872.872 0 0 1-.29.426.7.7 0 0 1-.442.148.956.956 0 0 1-.4-.09 1.842 1.842 0 0 1-.35-.209.62.62 0 0 0-.335-.115h-.016c-.13 0-.243.074-.334.216l-.474.708c-.193.304-.086.504.039.615.234.224.528.399.875.524.344.125.723.186 1.126.186.682 0 1.252-.187 1.689-.565.435-.376.756-.887.952-1.524l2.188-7.258c.05-.155.05-.284.005-.389-.037-.08-.125-.174-.327-.174z" fill="#011B33"/></svg>
                    </div>
                </div>
                <div class="ps-block__item">
                    <div class="ps-block__left"><i class="icon-bubbles"></i></div>
                    <div class="ps-block__right">
                        <h4>24/7 Support</h4>
                        <p>Dedicated support</p>
                    </div>
                </div>
                <div class="ps-block__item">
                    <div class="ps-block__left"><i class="icon-gift"></i></div>
                    <div class="ps-block__right">
                        <h4>Gift Service</h4>
                        <p>Support gift service</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
        $select_products3 = mysqli_query($connect,"SELECT * FROM products, inventory WHERE products_deals = 'Deals of the day' AND products_id = inventory_product_id ORDER BY products_id DESC LIMIT 12" ) or die(db_conn_error);

        if (mysqli_num_rows($select_products3) != 0) {

        echo '

        <div class="ps-deal-of-day">
            <div class="ps-container">
                <div class="ps-section__header">
                    <div class="ps-block--countdown-deal">
                        <div class="ps-block__left">
                            <h3>Deals of the day</h3>
                        </div>
                        <!-- <div class="ps-block__right">
                             <figure>
                                 <figcaption>End in:</figcaption>
                                 <ul class="ps-countdown" data-time="December 30, 2021 15:37:25">
                                     <li><span class="days"></span></li>
                                     <li><span class="hours"></span></li>
                                     <li><span class="minutes"></span></li>
                                     <li><span class="seconds"></span></li>
                              </ul>
                            </figure>
                         </div> -->
                    </div>
                </div>
                <div class="ps-section__content">
                <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">';
                        
                        

                while($rows_loop = mysqli_fetch_array($select_products3)){

                echo '
                <div class="ps-product ps-product--inner">


                <div class="ps-product__thumbnail">
                    <a href="product-description.php?id='.$rows_loop['products_id'].'"><img src="images/products/'.$rows_loop['products_image'].'" alt="'.$rows_loop['products_name'].'" /></a>';
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


        

                            if(!empty($rows_loop['products_sales_price'])){
                                echo '<p class="ps-product__price sale">
                                     &#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>
                                    </p>';
                            } else {
                                echo '<p class="ps-product__price">
                                &#8358;'.number_format($rows_loop['products_price']).'</p>';
                            }
                            
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

                                

                                <div class="ps-product__progress-bar ps-progress" data-value="100">
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar" role="progressbar" style="width: '.(100-100*$rows_loop['inventory_value_prev']/$rows_loop['inventory_value']).'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                   
                                    <p>'.($rows_loop['inventory_value'] - $rows_loop['inventory_value_prev']).' product is left</p>
                                </div>
                
                            </div>
                   
                    
                    </div>





                

                </div>

                    ';}

                    echo '
                    </div>
                </div>
            </div>
        </div> ';
        }

    
    ?> 

    





    <div class="ps-home-ads pb-5">
        <div class="ps-container">
            <div class="row">
            


    <?php
                   	$query_banner_select =  mysqli_query($connect, "SELECT banner_image FROM banner ORDER BY banner_id ASC LIMIT 2,3") or die(db_conn_error);

                   while($looping_banner=mysqli_fetch_array($query_banner_select)){
            echo ' <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "><a class="ps-collection"><img src="images/banners/'.$looping_banner['banner_image'].'" alt="'.$looping_banner['banner_image'].'"></a></div>';

                   }

                  
                   ?>
               


               
            </div>
        </div>
    </div>
 

                        <?php 
                        $query_page_section =  mysqli_query($connect, "SELECT products_categories_id, products_categories_name FROM products_categories ORDER BY products_categories_id ASC LIMIT 0,1") or die(db_conn_error);

                        ?>    
    <div class="ps-product-list ps-clothings">
        <div class="ps-container">
            <div class="ps-section__header">
                                                <?php
                                            while($while_query_page_section=mysqli_fetch_array($query_page_section)){
                                echo '<h3>'.$while_query_page_section['products_categories_name']. '</h3>';

                                $pro_cat_name =$while_query_page_section['products_categories_id'];
                                }?>
               
            </div>
            <div class="ps-section__content">
                <div class="ps-carousel--responsive owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                   
                                                         <?php 
                                    $query_sel_pro_sec =  mysqli_query($connect, "SELECT * FROM products WHERE products_sub_categories = '". $pro_cat_name."' ORDER BY products_id ASC LIMIT 12") or die(db_conn_error);

                                    while($rows_loop=mysqli_fetch_array($query_sel_pro_sec)){

                                        echo '
                                       <div class="ps-product">
    <div class="ps-product__thumbnail">
        <a href="product-description.php?id='.$rows_loop['products_id'].'"><img src="images/products/'.$rows_loop['products_image'].'" alt="'.$rows_loop['products_name'].'" /></a>';
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
            </div>';
            if(!empty($rows_loop['products_sales_price'])){
                echo '<p class="ps-product__price sale">
                     &#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>
                    </p>';
            } else {
                echo '<p class="ps-product__price">
                &#8358;'.number_format($rows_loop['products_price']).'</p>';
            }
            
            echo '
            
        </div>
            <div class="ps-product__content hover"><a class="ps-product__title" href="product-description.php?id='.$rows_loop['products_id'].'">'.$rows_loop['products_name'].'</a>';
                 if(!empty($rows_loop['products_sales_price'])){
                echo '<p class="ps-product__price sale">
                     &#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>
                    </p>';
            } else {
                echo '<p class="ps-product__price">
                &#8358;'.number_format($rows_loop['products_price']).'</p>';
            }
            echo '
                    
            </div>
            
            </div>
                                    
                                    
                                    
                                    
                                    
                                                
            
                        </div>
            
                                ';



            } 
            ?> 
 
                    
                   

                </div>
            </div>






        </div>
    </div>
    





    <?php 
                        $query_page_section =  mysqli_query($connect, "SELECT products_categories_id, products_categories_name FROM products_categories ORDER BY products_categories_id ASC LIMIT 1, 1") or die(db_conn_error);

                        ?>    
    <div class="ps-product-list ps-clothings">
        <div class="ps-container">
            <div class="ps-section__header">
                <?php
                    while($while_query_page_section=mysqli_fetch_array($query_page_section)){
                    echo '<h3>'.$while_query_page_section['products_categories_name']. '</h3>';

                    $pro_cat_name =$while_query_page_section['products_categories_id'];
                }?>
               
            </div>
            <div class="ps-section__content">
                <div class="ps-carousel--responsive owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                   
                    <?php 
                        $query_sel_pro_sec =  mysqli_query($connect, "SELECT * FROM products WHERE products_sub_categories = '". $pro_cat_name."' ORDER BY products_id ASC LIMIT 12") or die(db_conn_error);

                        while($rows_loop=mysqli_fetch_array($query_sel_pro_sec)){

                        echo '
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a href="product-description.php?id='.$rows_loop['products_id'].'"><img src="images/products/'.$rows_loop['products_image'].'" alt="'.$rows_loop['products_name'].'" /></a>';
                                if(!empty($rows_loop['products_sales_price'])){
                                    $dis = 100 - ceil($rows_loop['products_sales_price']/$rows_loop['products_price']*100);
                                    echo '
                                    <div class="ps-product__badge">-'.$dis.'%</div>
                                        ';}
                                        echo    
                                        '<ul class="ps-product__actions">
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
            </div>';
            if(!empty($rows_loop['products_sales_price'])){
                echo '<p class="ps-product__price sale">
                     &#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>
                    </p>';
            } else {
                echo '<p class="ps-product__price">
                &#8358;'.number_format($rows_loop['products_price']).'</p>';
            }
            
            echo '
            
        </div>
            <div class="ps-product__content hover"><a class="ps-product__title" href="product-description.php?id='.$rows_loop['products_id'].'">'.$rows_loop['products_name'].'</a>';
            if(!empty($rows_loop['products_sales_price'])){
                echo '<p class="ps-product__price sale">
                     &#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>
                    </p>';
            } else {
                echo '<p class="ps-product__price">
                &#8358;'.number_format($rows_loop['products_price']).'</p>';
            }
            echo '
                    
            </div>
            
            </div>
                                    
                                    
                                    
                                    
                                    
                                                
            
                        
                        </div>
            
                                ';



            } 
            ?> 
 
                    
                   

                </div>
            </div>






        </div>
    </div>
    


    <?php 
                        $query_page_section =  mysqli_query($connect, "SELECT products_categories_id, products_categories_name FROM products_categories ORDER BY products_categories_id ASC LIMIT 2,1") or die(db_conn_error);

                        ?>    
    <div class="ps-product-list ps-clothings">
        <div class="ps-container">
            <div class="ps-section__header">
                                                <?php
                                            while($while_query_page_section=mysqli_fetch_array($query_page_section)){
                                echo '<h3>'.$while_query_page_section['products_categories_name']. '</h3>';

                                $pro_cat_name =$while_query_page_section['products_categories_id'];
                                }?>
               
            </div>
            <div class="ps-section__content">
                <div class="ps-carousel--responsive owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                   
                                                         <?php 
                                    $query_sel_pro_sec =  mysqli_query($connect, "SELECT * FROM products WHERE products_sub_categories = '". $pro_cat_name."' ORDER BY products_id ASC LIMIT 12") or die(db_conn_error);

                                    while($rows_loop=mysqli_fetch_array($query_sel_pro_sec)){

                                        echo '
                                       <div class="ps-product">
    <div class="ps-product__thumbnail">
        <a href="product-description.php?id='.$rows_loop['products_id'].'"><img src="images/products/'.$rows_loop['products_image'].'" alt="'.$rows_loop['products_name'].'" /></a>';
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
            </div>';
            if(!empty($rows_loop['products_sales_price'])){
                echo '<p class="ps-product__price sale">
                     &#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>
                    </p>';
            } else {
                echo '<p class="ps-product__price">
                &#8358;'.number_format($rows_loop['products_price']).'</p>';
            }
            
            echo '
            
        </div>
            <div class="ps-product__content hover"><a class="ps-product__title" href="product-description.php?id='.$rows_loop['products_id'].'">'.$rows_loop['products_name'].'</a>';
                 if(!empty($rows_loop['products_sales_price'])){
                echo '<p class="ps-product__price sale">
                     &#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>
                    </p>';
            } else {
                echo '<p class="ps-product__price">
                &#8358;'.number_format($rows_loop['products_price']).'</p>';
            }
            echo '
                    
            </div>
            
            </div>
                                    
                                    
                                    
                                    
                                    
                                                
            
                        </div>
            
                                ';



            } 
            ?> 
 
                    
                   

                </div>
            </div>






        </div>
    </div>
    


    <?php 
                        $query_page_section =  mysqli_query($connect, "SELECT products_categories_id, products_categories_name FROM products_categories ORDER BY products_categories_id ASC LIMIT 3, 1") or die(db_conn_error);

                        ?>    
    <div class="ps-product-list ps-clothings">
        <div class="ps-container">
            <div class="ps-section__header">
            <?php
                while($while_query_page_section=mysqli_fetch_array($query_page_section)){
                echo '<h3>'.$while_query_page_section['products_categories_name']. '</h3>';

                $pro_cat_name =$while_query_page_section['products_categories_id'];
                }?>
               
            </div>
            <div class="ps-section__content">
                <div class="ps-carousel--responsive owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                   
                                                         <?php 
                                    $query_sel_pro_sec =  mysqli_query($connect, "SELECT * FROM products WHERE products_sub_categories = '". $pro_cat_name."' ORDER BY products_id ASC LIMIT 12") or die(db_conn_error);

                                    while($rows_loop=mysqli_fetch_array($query_sel_pro_sec)){

                                        echo '
                                       <div class="ps-product">
    <div class="ps-product__thumbnail">
        <a href="product-description.php?id='.$rows_loop['products_id'].'"><img src="images/products/'.$rows_loop['products_image'].'" alt="'.$rows_loop['products_name'].'" /></a>';
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
            </div>';
            if(!empty($rows_loop['products_sales_price'])){
                echo '<p class="ps-product__price sale">
                     &#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>
                    </p>';
            } else {
                echo '<p class="ps-product__price">
                &#8358;'.number_format($rows_loop['products_price']).'</p>';
            }
            
            echo '
            
        </div>
            <div class="ps-product__content hover"><a class="ps-product__title" href="product-description.php?id='.$rows_loop['products_id'].'">'.$rows_loop['products_name'].'</a>';
                 if(!empty($rows_loop['products_sales_price'])){
                echo '<p class="ps-product__price sale">
                     &#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>
                    </p>';
            } else {
                echo '<p class="ps-product__price">
                &#8358;'.number_format($rows_loop['products_price']).'</p>';
            }
            echo '
                    
            </div>
            
            </div>
                                    
                                    
                                    
                                    
                                    
                                                
            
                        </div>
            
                                ';



            } 
            ?> 
 
                    
                   

                </div>
            </div>






        </div>
    </div>
    


    <?php 
                        $query_page_section =  mysqli_query($connect, "SELECT products_categories_id, products_categories_name FROM products_categories ORDER BY products_categories_id ASC LIMIT 4, 1") or die(db_conn_error);

                        ?>    
    <div class="ps-product-list ps-clothings">
        <div class="ps-container">
            <div class="ps-section__header">
                                                <?php
                                            while($while_query_page_section=mysqli_fetch_array($query_page_section)){
                                echo '<h3>'.$while_query_page_section['products_categories_name']. '</h3>';

                                $pro_cat_name =$while_query_page_section['products_categories_id'];
                                }?>
               
            </div>
            <div class="ps-section__content">
                <div class="ps-carousel--responsive owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                   
                                                         <?php 
                                    $query_sel_pro_sec =  mysqli_query($connect, "SELECT * FROM products WHERE products_sub_categories = '". $pro_cat_name."' ORDER BY products_id ASC LIMIT 12") or die(db_conn_error);

                                    while($rows_loop=mysqli_fetch_array($query_sel_pro_sec)){

                                        echo '
                                       <div class="ps-product">
    <div class="ps-product__thumbnail">
        <a href="product-description.php?id='.$rows_loop['products_id'].'"><img src="images/products/'.$rows_loop['products_image'].'" alt="'.$rows_loop['products_name'].'" /></a>';
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
            </div>';
            if(!empty($rows_loop['products_sales_price'])){
                echo '<p class="ps-product__price sale">
                     &#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>
                    </p>';
            } else {
                echo '<p class="ps-product__price">
                &#8358;'.number_format($rows_loop['products_price']).'</p>';
            }
            
            echo '
            
        </div>
            <div class="ps-product__content hover"><a class="ps-product__title" href="product-description.php?id='.$rows_loop['products_id'].'">'.$rows_loop['products_name'].'</a>';
                 if(!empty($rows_loop['products_sales_price'])){
                echo '<p class="ps-product__price sale">
                     &#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>
                    </p>';
            } else {
                echo '<p class="ps-product__price">
                &#8358;'.number_format($rows_loop['products_price']).'</p>';
            }
            echo '
                    
            </div>
            
            </div>
                                    
                                    
                                    
                                    
                                    
                                                
            
                        </div>
            
                                ';



            } 
            ?> 
 
                    
                   

                </div>
            </div>






        </div>
    </div>
    


    <?php 
                        $query_page_section =  mysqli_query($connect, "SELECT products_categories_id, products_categories_name FROM products_categories ORDER BY products_categories_id ASC LIMIT 5, 1") or die(db_conn_error);

                        ?>    
    <div class="ps-product-list ps-clothings">
        <div class="ps-container">
            <div class="ps-section__header">
                                                <?php
                                            while($while_query_page_section=mysqli_fetch_array($query_page_section)){
                                echo '<h3>'.$while_query_page_section['products_categories_name']. '</h3>';

                                $pro_cat_name =$while_query_page_section['products_categories_id'];
                                }?>
               
            </div>
            <div class="ps-section__content">
                <div class="ps-carousel--responsive owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                   
                                                         <?php 
                                    $query_sel_pro_sec =  mysqli_query($connect, "SELECT * FROM products WHERE products_sub_categories = '". $pro_cat_name."' ORDER BY products_id ASC LIMIT 12") or die(db_conn_error);

                                    while($rows_loop=mysqli_fetch_array($query_sel_pro_sec)){

                                        echo '
                                       <div class="ps-product">
    <div class="ps-product__thumbnail">
        <a href="product-description.php?id='.$rows_loop['products_id'].'"><img src="images/products/'.$rows_loop['products_image'].'" alt="'.$rows_loop['products_name'].'" /></a>';
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
            </div>';
            if(!empty($rows_loop['products_sales_price'])){
                echo '<p class="ps-product__price sale">
                     &#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>
                    </p>';
            } else {
                echo '<p class="ps-product__price">
                &#8358;'.number_format($rows_loop['products_price']).'</p>';
            }
            
            echo '
            
        </div>
            <div class="ps-product__content hover"><a class="ps-product__title" href="product-description.php?id='.$rows_loop['products_id'].'">'.$rows_loop['products_name'].'</a>';
                 if(!empty($rows_loop['products_sales_price'])){
                echo '<p class="ps-product__price sale">
                     &#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>
                    </p>';
            } else {
                echo '<p class="ps-product__price">
                &#8358;'.number_format($rows_loop['products_price']).'</p>';
            }
            echo '
                    
            </div>
            
            </div>
                                    
                                    
                                    
                                    
                                    
                                                
            
                        </div>
            
                                ';



            } 
            ?> 
 
                    
                   

                </div>
            </div>






        </div>
    </div>
    


    <?php 
                        $query_page_section =  mysqli_query($connect, "SELECT products_categories_id, products_categories_name FROM products_categories ORDER BY products_categories_id ASC LIMIT 6, 1") or die(db_conn_error);

                        ?>    
    <div class="ps-product-list ps-clothings">
        <div class="ps-container">
            <div class="ps-section__header">
                                                <?php
                                            while($while_query_page_section=mysqli_fetch_array($query_page_section)){
                                echo '<h3>'.$while_query_page_section['products_categories_name']. '</h3>';

                                $pro_cat_name =$while_query_page_section['products_categories_id'];
                                }?>
               
            </div>
            <div class="ps-section__content">
                <div class="ps-carousel--responsive owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                   
                                                         <?php 
                                    $query_sel_pro_sec =  mysqli_query($connect, "SELECT * FROM products WHERE products_sub_categories = '". $pro_cat_name."' ORDER BY products_id ASC LIMIT 12") or die(db_conn_error);

                                    while($rows_loop=mysqli_fetch_array($query_sel_pro_sec)){

                                        echo '
                                       <div class="ps-product">
    <div class="ps-product__thumbnail">
        <a href="product-description.php?id='.$rows_loop['products_id'].'"><img src="images/products/'.$rows_loop['products_image'].'" alt="'.$rows_loop['products_name'].'" /></a>';
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
            </div>';
            if(!empty($rows_loop['products_sales_price'])){
                echo '<p class="ps-product__price sale">
                     &#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>
                    </p>';
            } else {
                echo '<p class="ps-product__price">
                &#8358;'.number_format($rows_loop['products_price']).'</p>';
            }
            
            echo '
            
        </div>
            <div class="ps-product__content hover"><a class="ps-product__title" href="product-description.php?id='.$rows_loop['products_id'].'">'.$rows_loop['products_name'].'</a>';
                 if(!empty($rows_loop['products_sales_price'])){
                echo '<p class="ps-product__price sale">
                     &#8358;'.number_format($rows_loop['products_sales_price']).' ' . '<del>'.'&#8358;'.number_format($rows_loop['products_price']) .'</del>
                    </p>';
            } else {
                echo '<p class="ps-product__price">
                &#8358;'.number_format($rows_loop['products_price']).'</p>';
            }
            echo '
                    
            </div>
            
            </div>
                                    
                                    
                                    
                                    
                                    
                                                
            
                        </div>
            
                                ';



            } 
            ?> 
 
                    
                   

                </div>
            </div>






        </div>
    </div>
    


















  
    <div class="ps-home-ads mb-5">
        <div class="ps-container">
            <div class="row">



                <?php
                $query_banner_select =  mysqli_query($connect, "SELECT banner_image FROM banner WHERE banner_name='banner 6'") or die(db_conn_error);
                while($looping_banner=mysqli_fetch_array($query_banner_select)){
                echo ' 
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 "><a class="ps-collection mb-md-5 mb-lg-0"><img src="images/banners/'.$looping_banner['banner_image'].'" alt="'.$looping_banner['banner_image'].'"></a> </div>';

                                }

                ?>
                            
                            <?php
                $query_banner_select =  mysqli_query($connect, "SELECT banner_image FROM banner WHERE banner_name='banner 7'") or die(db_conn_error);
                while($looping_banner=mysqli_fetch_array($query_banner_select)){
                echo ' 
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "><a class="ps-collection"><img src="images/banners/'.$looping_banner['banner_image'].'" alt="'.$looping_banner['banner_image'].'"></a> </div>';

                                }

                ?>                                    
               
                
               
            </div>
        </div>
    </div>
   
   


   
</div>
<?php include ('../incs-template1/footer.php'); ?>
