<?php include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
if(isset($_GET['p_id']))
  $product_id=$_GET['p_id'];
  $select_query="select * from `products` where p_id=$product_id";
  $result_query=mysqli_query($con,$select_query);
  $row_product_price=mysqli_fetch_array($result_query);
  $product_price=$row_product_price['p_price'];
  $invoice_number=mt_rand();
  $status='pending';
  $user_name=$_SESSION['u_name'];
  $get_details="select * from `user_table` where u_name='$user_name'";
  $result_details=mysqli_query($con, $get_details);
  $row_user=mysqli_fetch_array($result_details);
  $user_id=$row_user['u_id'];

    // getting quantity from cart

    $get_quantity="select * from `cart_details`where u_id=$user_id and p_id=$product_id";
    $run_cart=mysqli_query($con,$get_quantity);
    if (mysqli_num_rows($run_cart) > 0) {
        $get_item_quantity=mysqli_fetch_array($run_cart);
        $quantity=$get_item_quantity['quantity'];
    }


    $insert_order="insert into `user_orders` (u_id,amount,invoice_number,total_products,order_date,order_status) values ($user_id,$product_price,$invoice_number,1,NOW(),'$status')";
    $result_query=mysqli_query($con,$insert_order);
    if($result_query)
    {
        
        // order pending

        $insert_pending_order="Insert into `orders_pending` (u_id,invoice_number,p_id,quantity,order_status) values ($user_id,$invoice_number,$product_id,1,'$status')";
        $result_pending_orders=mysqli_query($con,$insert_pending_order);

        // View details
        
        $select_product = "SELECT * FROM `products` WHERE p_id=$product_id";
        $run_price = mysqli_query($con, $select_product);

        while($row_product_price = mysqli_fetch_array($run_price)){
        $p_name = $row_product_price['p_name'];
        $p_price = $row_product_price['p_price'];
        $p_img = $row_product_price['p_img'];

        // Insert the concatenated string into the 'view' table
        $insert_view = "INSERT INTO `view` (u_id, p_id, p_name, p_price, p_img, quantity, invoicenumber) VALUES ($user_id, $product_id, '$p_name', $p_price, '$p_img', 1, $invoice_number)";
        $result_view = mysqli_query($con, $insert_view);

        }

        echo"<script>alert('orders are submitted successfully')</script>";
        echo"<script>window.open('profile.php?my_orders','_self')</script>";

        
    }else{
        echo"<script>alert('Cart is empty can't checkout')</script>";
        echo"<script>window.open('../index.php','_self')</script>";
    
    }







?>
