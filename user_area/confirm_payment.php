<?php 
  include('../includes/connect.php');
  include('../functions/common_function.php');
  session_start();
  if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $username=$_SESSION['u_name'];
    $select_query="select * from `user_table` where u_name='$username'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['u_id'];
    $select_data="select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount=$row_fetch['amount'];

  }
  if(isset($_POST['confirm'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $pay_mode=$_POST['pay_mode'];
    $insert_query="insert into `user_payments` (u_id,order_id,invoice_number,amount,pay_mode) values ($user_id,$order_id,$invoice_number,$amount,'$pay_mode')";
    $result=mysqli_query($con,$insert_query);
    if($result){
      echo"<script>alert('successfully completed the payment')</script>";
      echo"<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_order="update `user_orders` set order_status='Complete' where order_id=$order_id";
    $result_orders=mysqli_query($con,$update_order);

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Merienda&family=Rye&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-dark">
    <div class="container mt-5">
      <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4 mt-5">

          <form action="" method="post">
            <div class="card border-info mb-3">
            <div class="card-header text-center">
              <h3>Confirm Payment</h3>
            </div>
            <div class="card-body ">
              <label for="" class="">Invoice Number</label>
              <input type="text" class="form-control"  value="<?php echo $invoice_number ?>" name="invoice_number" readonly>
              <label for="" class="">Amount</label>
              <input type="text" class="form-control" value="<?php echo $amount ?>"name="amount" readonly> 
              <label for="" class="">Payment Mode</label>             
              <input type="text" class="form-control" name="pay_mode" value="Cash On Delivery" readonly>
              <center>
                <a href="#"><button class="btn btn-outline-success mt-3" name="confirm">Confirm Payment</button></a>
              </center>
              
            </div>
            </div>



          </form>

        </div>
        <div class="col-md-4"></div>

      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
   
</body>
</html>