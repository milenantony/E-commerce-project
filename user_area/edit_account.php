<?php
    if(isset($_GET['edit_account'])){
        $username=$_SESSION['u_name'];
        $select_query="select * from `user_table` where u_name='$username'";
        $result_query=mysqli_query($con,$select_query);
        $row_fetch=mysqli_fetch_assoc($result_query);
        $user_id=$row_fetch['u_id'];
        $user_name=$row_fetch['u_name'];
        $user_email=$row_fetch['u_email'];
        $user_address= $row_fetch['u_address'];
        $user_mobile= $row_fetch['u_mobile'];
    }   
    if(isset($_POST['u_update'])){
        $update_id=$user_id;
        $username=$_POST['u_name'];
        $user_email=$_POST['u_email'];
        $user_address=$_POST['u_address'];
        $user_mobile=$_POST['u_mobile'];

        // update query
        $update_data="update `user_table` set u_name='$username',u_email='$user_email',u_address='$user_address',u_mobile='$user_mobile'
        where u_id=$update_id";
        $result_query_update=mysqli_query($con,$update_data);
        if($result_query_update){
            echo"<script>alert('Data updated successfully')</script>";
            echo"<script>window.open('logout.php','_self')</script>";

        }



    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E mobile</title>
  <style>
   body{
      overflow-x: hidden;
   }
   .card1{
        transition: box-shadow .3s ease-in-out;
        background-color: darkgray ;
    }
    .card1:hover{
        transition: scale3d(2,2,2);
        box-shadow: 0px 0px 10px rgb(0,0,0);
    }
  </style> 
  
</head>
<body>



    <div class="col-md-5 mt-5 m-auto rounded card1" style="border: 2px solid black;">
        <div class="container mb-5">
            <h2 class="text-center mt-3">Edit Account</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row mt-4 mb-2">
                    <div class="col-md-12">
                        <label class="form-label">User Name</label>
                        <input type="text" name="u_name" class="form-control" value="<?php echo $user_name ?>" style="border: 1px solid black;" required>
                    </div>
                </div> 
                
                <div class="row mt-3 mb-2">
                    <div class="col-12">
                        <label class="form-label">Email</label>
                        <input type="email" name="u_email" class="form-control" value="<?php echo $user_email ?>" style="border: 1px solid black;" required>
                    </div>
                </div>
                <div class="row mt-3 mb-2">
                    <div class="col-12">
                        <label class="form-label">Address</label>
                        <input type="text" name="u_address" class="form-control" value="<?php echo $user_address ?>"style="border: 1px solid black;" required>
                    </div>
                </div>
                <div class="row mt-3 mb-2">
                    <div class="col-12">
                        <label class="form-label">Mobile Number</label>
                        <input type="number" name="u_mobile" class="form-control" value="<?php echo $user_mobile ?>" style="border: 1px solid black;" required>
                    </div>
                </div>
                <div class=" text-center row mt-3 mb-5">
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-success" name="u_update">Edit</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>







</body>
</html>