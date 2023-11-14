<?php

    if(isset($_GET['delete_order'])){
        $delete_id=$_GET['delete_order'];
        $get_data="Delete from `user_orders` where order_id=$delete_id";
        $results=mysqli_query($con,$get_data);
        if($results)
        {
            echo"<script>alert('order deleted successfully')</script>";
            echo"<script>window.open('./index.php?list_orders','_self')</script>";

        }
    }

?>
