<aside class="widget widget_shop">
    <h4 class="widget-title">Categories</h4>
    <ul class="ps-list--categories">

        <?php  
            $query_page_section =  mysqli_query($connect, "SELECT products_categories_id ,products_categories_name FROM  products_categories") or die(db_conn_error);

            while($row_cat = mysqli_fetch_array($query_page_section)){
                echo  '<li class="menu-item-has-children"><a href="categories.php?id='.$row_cat['products_categories_id'].'">'.$row_cat['products_categories_name'].'</a>';

                



                $query_select_subcategory =  mysqli_query($connect, "SELECT id_sub_categories, id_categories, sub_categories_name FROM sub_categories WHERE id_categories = '" . $row_cat['products_categories_id'] . "'") or die(mysqli_error($connect));
                
                $counting_sub = mysqli_query($connect, "SELECT id_sub_categories FROM sub_categories WHERE id_categories = '" . $row_cat['products_categories_id'] . "'") or die(mysqli_error($connect));
                if(mysqli_num_rows($counting_sub) > 0 ){

                echo '<span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                 ';
                }
                echo ' <ul class="sub-menu">';
                while ($while_subcategory_cat = mysqli_fetch_array($query_select_subcategory)) {
                    echo '    

                       
                            <li><a href="sub-categories.php?id=' . $while_subcategory_cat['id_sub_categories'] . '">' . $while_subcategory_cat['sub_categories_name'] . '</a> </li>
                           
                ';
                }







                echo ' </ul> 
                </li>';

            }

        ?>    
    </ul>
</aside>

<?php

