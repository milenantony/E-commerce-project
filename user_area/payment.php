<?php include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Merienda&family=Rye&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    

  <style>
   body{
      overflow-x: hidden;
   }
   img{
    width: 100%;
   }
  </style> 
</head>
<body>

 <!-- php code for accessing user id -->
  
  <?php 
 
    $user_name=$_SESSION['u_name'];
    $get_details="select * from `user_table` where u_name='$user_name'";
    $result_details=mysqli_query($con, $get_details);
    $row_user=mysqli_fetch_array($result_details);
    $user_id=$row_user['u_id'];

 
 
 
 
  ?>



    <div class="container">
        <h2 class="text-center text-success mt-3">Payment Options</h2>
        <div class="row d-flex justify -content-center align-items-center my-5">
            <div class="col-md-6">
                <img src="../images/pay.png" alt="">
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>" class=""><h2 class="text-center">Pay Offline</h2></a>
            </div>
        </div>
    </div>









<!-- include footer -->

 <?php include("../includes/footer.php")      ?>











<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>




















