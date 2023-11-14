<?php

    if(isset($_GET['delete_user'])){
        $delete_id=$_GET['delete_user'];
        $get_data="Delete from `user_table` where u_id=$delete_id";
        $results=mysqli_query($con,$get_data);
        if($results)
        {
            echo"<script>alert('user deleted successfully')</script>";
            echo"<script>window.open('./index.php?list_users','_self')</script>";

        }
    }

