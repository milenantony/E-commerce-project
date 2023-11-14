<?php

    if(isset($_GET['delete_brand'])){
        $delete_id=$_GET['delete_brand'];
        $get_data_brand="Delete from `brands` where b_id=$delete_id";
        $get_data="Delete from `products` where b_id=$delete_id";
        $results=mysqli_query($con,$get_data);
        $results_brand=mysqli_query($con,$get_data_brand);
        if($results_brand and $results)
        {
            echo"<script>alert('Brand deleted successfully')</script>";
            echo"<script>window.open('./index.php?view_brands','_self')</script>";

        }
    }   



?>