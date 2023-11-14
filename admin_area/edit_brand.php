<?php
   
   if(isset($_GET['edit_brand'])){
        $e_id=$_GET['edit_brand'];
        $get_data="select * from `brands` where b_id=$e_id";
        $results=mysqli_query($con,$get_data);
        $row=mysqli_fetch_assoc($results);
        $b_id=$row['b_id'];
        $b_name=$row['b_name'];
        $b_des=$row['b_des'];

    }


    if(isset($_POST['edit_brand'])){
        $b_name=$_POST['b_name'];
        $b_des=$_POST['b_des'];
        $insert_product=" update `brands` set b_name='$b_name',b_des='$b_des' where b_id=$e_id";
        $result_query=mysqli_query($con, $insert_product);
        if($result_query)
        {
            echo"<script>alert('brand updated successfully')</script>";
            echo"<script>window.open('./index.php?view_brands','_self')</script>";

        }

    }


?>
<div class="container text-light">
    <div class="row mt-5">

        <div class="col-md-3"></div>

        <div class="col-md-6 rounded card1" >
            <h2 class="text-center mt-3">Edit Brands</h2>
            <form action="" method="post" class="">
                <div class="row mt-5 mb-2">
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Brand Name</label>
                        <input type="text" name="b_name" class="form-control" style="border: 1px solid black;" value="<?php echo $b_name ?>" required>
                    </div>
                </div> 
                
                <div class="row mt-3 mb-2">
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Description</label>
                        <input type="text" name="b_des" class="form-control" style="border: 1px solid black;" value="<?php echo $b_des ?>" required>
                    </div>
                </div>
                

                <div class="row mt-4 mb-5">
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-success" name="edit_brand">Save</button>
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
