<?php

    if(isset($_GET['delete_product'])){
        $delete_id=$_GET['delete_product'];
        $get_data="Delete from `products` where p_id=$delete_id";
        $results=mysqli_query($con,$get_data);
        if($results)
        {
            echo"<script>alert('Product deleted successfully')</script>";
            echo"<script>window.open('./index.php?view_products','_self')</script>";

        }
    }

?>

