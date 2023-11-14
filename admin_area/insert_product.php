<?php
 
    include('../includes/connect.php');

    if(isset($_POST['Insert_product']))
    {
        $p_name=$_POST['p_name'];
        $p_des=$_POST['p_des'];
        $p_spec=$_POST['p_spec'];
        $c_id=$_POST['c_name'];
        $b_id=$_POST['b_name'];
        $p_price=$_POST['p_price'];
        $status='true';

            // accessing images

        $p_img=$_FILES['p_img']['name'];

            // accessing tem images

        $temp_img=$_FILES['p_img']['tmp_name'];
        move_uploaded_file($temp_img,"./product_images/$p_img");
        $insert_product="insert into `products` (p_name,p_des,p_spec,c_id,b_id,p_img,p_price,date,status) values ('$p_name','$p_des','$p_spec','$c_id','$b_id','$p_img','$p_price',NOW(),'$status')";
        $result_query=mysqli_query($con, $insert_product);
        if($result_query)
        {
            echo"<script>alert('Successfully product has been inserted')</script>";
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
</head>
<body>
  
<div class="container text-light ">
    <div class="row mt-1 mb-5">

        <div class="col-md-3"></div>

        <div class="col-md-6 rounded card1" style="border: 2px solid white;">
             <h2 class="text-center mt-3">Insert Product</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row mt-5 mb-2">
                    <div class="col-md-12">
                        <label class="form-label">Mobile Name</label>
                        <input type="text" name="p_name" class="form-control" style="border: 1px solid black;" required>
                    </div>
                </div> 
                
                <div class="row mt-3 mb-2">
                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <input type="text" name="p_des" class="form-control" style="border: 1px solid black;" required>
                    </div>
                </div>

                <div class="row mt-3 mb-2">
                    <div class="col-12">
                        <label class="form-label">Specifications</label>
                        <textarea name="p_spec" class="form-control" style="border: 1px solid black;" required></textarea>
                    </div>
                </div>


                <div class="row mt-3 mb-2">
                    <div class="col-12">
                        <label class="form-label">Category</label>
                        <select name="c_name" class="form-select" required>
                            <option value="" hidden>Select Category</option>
                            <?php

                                $select_query="select * from `categories`";
                                $result_query=mysqli_query($con,$select_query);
                                while($row=mysqli_fetch_assoc($result_query)){
                                    $c_id=$row['c_id'];
                                    $c_name=$row['c_name'];
                                    echo"
                                    <option value='$c_id'>$c_name</option>";
                                    
                                }    
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row mt-3 mb-2">
                    <div class="col-12">
                        <label class="form-label">Brand</label>
                        <select name="b_name" class="form-select" required>
                            <option value="" hidden>Select Brand</option>
                            <?php

                                $select_query="select * from `brands`";
                                $result_query=mysqli_query($con,$select_query);
                                while($row=mysqli_fetch_assoc($result_query)){
                                    $b_id=$row['b_id'];
                                    $b_name=$row['b_name'];
                                    // $b_des=$row['b_des'];

                                    echo"
                                    <option value='$b_id'>$b_name</option>";
                                    
                                }    
                            ?>
                        </select>

                    </div>
                </div>

                <div class="row mt-3 mb-2">
                    <div class="col-12">
                        <label class="form-label">Image</label>
                        <input type="file" name="p_img" class="form-control" style="border: 1px solid black;" required>
                    </div>
                </div>

                <div class="row mt-3 mb-2">
                    <div class="col-12">
                        <label class="form-label">Price</label>
                        <input type="number" name="p_price" class="form-control" style="border: 1px solid black;" required>
                    </div>
                </div>
                <div class="row mt-4 mb-5">
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-success" name="Insert_product">Save</button>
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
         
    }
    .card1:hover{
        transition: scale3d(2,2,2);
        box-shadow: 0px 0px 10px white;
    }
</style>
<script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value; // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
    output.innerHTML = this.value;
    }
</script>




</body>
</html>