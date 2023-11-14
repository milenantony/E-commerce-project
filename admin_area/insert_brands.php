<?php
    include('../includes/connect.php');
    if(isset($_POST['Insert_brand']))
    {
         $b_name=$_POST['b_name'];
         $b_des=$_POST['b_des'];

        // select data from database

        $select_query="SELECT * FROM `brands` WHERE b_name='$b_name'";
        $result_select=mysqli_query($con,$select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0)
        {
            echo"<script>alert('This brand is already present in the database')</script>";
        }
        else
        {
            $insert_query="INSERT INTO `brands` (b_name, b_des) VALUES ('$b_name','$b_des')";
            $result_insert=mysqli_query($con, $insert_query);
            if($result_insert)
            {
                echo"<script>alert('Brand has been inserted successfully')</script>";
            }
        }
    }
?>





<div class="container text-light">
    <div class="row mt-5">

        <div class="col-md-3"></div>

        <div class="col-md-6 rounded card1" >
            <h2 class="text-center mt-3">Insert Brands</h2>
            <form action="" method="post" class="">
                <div class="row mt-5 mb-2">
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Brand Name</label>
                        <input type="text" name="b_name" class="form-control" style="border: 1px solid black;" required>
                    </div>
                </div> 
                
                <div class="row mt-3 mb-2">
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Description</label>
                        <input type="text" name="b_des" class="form-control" style="border: 1px solid black;" required>
                    </div>
                </div>
                

                <div class="row mt-4 mb-5">
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-success" name="Insert_brand">Save</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-3"></div>

    </div>
</div>

<style>
    .card1{
        transition: box-shadow .3s ease-in-out;
        border: 1px solid white;
    }
    .card1:hover{
        transition: scale3d(2,2,2);
        box-shadow: 0px 0px 10px white;
    }
</style>
