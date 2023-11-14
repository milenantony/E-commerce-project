<?php 
  include('includes/connect.php');
  include('functions/common_function.php');
  session_start();
  if(isset($_GET['remove'])){
     $remove_id=$_GET['remove'];
     $user_name=$_SESSION['u_name'];
     $get_details="select * from `user_table` where u_name='$user_name'";
     $result_details=mysqli_query($con, $get_details);
     $row_user=mysqli_fetch_array($result_details);
     $user_id=$row_user['u_id'];               
    $delete_query="DELETE FROM `cart_details` WHERE p_id=$remove_id and u_id=$user_id";
    $run_delete=mysqli_query($con,$delete_query);
    // if($run_delete){
    //   echo"<script>window.open('cart.php','_self')</script>";
    // }
    header('location:cart.php');
 }
  if(isset($_GET['delete_all'])){
    $delete_all="DELETE FROM `cart_details` ";
    $delete_all=mysqli_query($con,$delete_all);
    //  if($run_delete){
    //    echo"<script>window.open('cart.php','_self')</script>";
    //  }
    header('location:cart.php');
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Care</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Merienda&family=Rye&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand text-success" href="#" style="font-family: 'Alumni Sans Inline One', cursive; font-size:40px;">Mobile Care</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="user_area/index.php"><i class="fa fa-home"></i> Home</a>
        </li>
        <?php 
         
         if(!isset($_SESSION['u_name'])){
          echo"
          <li class='nav-item'>
            <a class='nav-link' href='./user_area/user_login.php'>Login</a>
          </li>
          ";
         }else{
          echo"
          <li class='nav-item'>
            <a class='nav-link' href='./user_area/logout.php'>Logout</a>
          </li>
          ";
         }
         ?>
          <ul class="dropdown-menu">

            <?php

              $select_query="select * from `brands`";
              $result_query=mysqli_query($con,$select_query);
              while($row=mysqli_fetch_assoc($result_query)){
                $b_id=$row['b_id'];
                $b_name=$row['b_name'];
                  
                echo"
                <li><a class='dropdown-item' href='index.php?b_id=$b_id'>$b_name</a></li>";               
              } 

            ?>
          </ul>
        </li>        
      </ul>
      <form class="d-flex ms-2" role="search" action="search_products.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="search" class="btn btn-outline-success" name="search_data_products">
      </form>
    </div>
  </div>
  </nav>

  <section id="sec2" class="content">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">

          <!-- fetching products -->

          <?php

            
            // get_unique_categories();
            // get_unique_brands();
            search_products();
            cart();
  

          ?>

        </div>
      </div>
      <div class="col-md-1"></div>
    </div>
  </section>

  <!-- fourth part -->
  <div class="container product-data">
  <h1 class="heading text-center">My Cart</h1>
    <div class="row mt-5">  
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-success">
          <tbody class="text-center">
            <!-- php code dynamic data -->
            <?php
            
              $ip=getIPAddress();
              $total_price=0;
              $user_name=$_SESSION['u_name'];
              $get_details="select * from `user_table` where u_name='$user_name'";
              $result_details=mysqli_query($con, $get_details);
              $row_user=mysqli_fetch_array($result_details);
              $user_id=$row_user['u_id'];               
              $cart_query="select * from `cart_details` where u_id=$user_id";
              $grand=0;
              $result_query=mysqli_query($con,$cart_query);
              $result_count=mysqli_num_rows($result_query);
              if($result_count>0){
                echo"
                <thead class='text-center'>
                  <tr>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Product Price</th> 
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                  </tr>
                </thead>";           
                while($row=mysqli_fetch_assoc($result_query)){
                  $p_id=$row['p_id'];
                  $quantity=$row['quantity'];
                  $select_query="select * from `products` where p_id='$p_id'";
                  $result_products=mysqli_query($con,$select_query);
                  while($row_product_price=mysqli_fetch_array($result_products)){
                    $p_price=array($row_product_price['p_price']);
                    $product_price=$row_product_price['p_price'];
                    $p_name=$row_product_price['p_name'];
                    $p_img=$row_product_price['p_img'];
                    $p_values=array_sum($p_price);
                    $total_price+=$p_values;?> 
                      <tr>
                        <td><?php echo $p_name ?></td>
                        <td><img class="image-fluid w-25 h-25" src="./admin_area/product_images/<?php echo $p_img ?>" alt=""></td>
                        <td><?php  echo $product_price ?>/-</td>
                        <td>
                          <form action="" method="post">
                            <input type="hidden" value="<?php echo $p_id ?>" name="update_id">
                            <div class="quantity_box">
                              <center>
                                <input type="number" min="1" value="<?php echo $quantity ?>" name="update_quantity" class="w-50 text-center">
                                <input type="submit" class="update_quantity btn btn-outline-light text-dark btn-sm" value="Update" name="update_product_quantity" onclick="<?php cart()  ?>">
                              </center>
                            </div>
                          </form>
                        </td>
                        <?php
                          $ip=getIPAddress();
                          $user_name=$_SESSION['u_name'];
                          $get_details="select * from `user_table` where u_name='$user_name'";
                          $result_details=mysqli_query($con, $get_details);
                          $row_user=mysqli_fetch_array($result_details);
                          $user_id=$row_user['u_id'];                           
                          if(isset($_POST["update_product_quantity"])){
                            $update_value=$_POST["update_quantity"];
                            $update_id=$_POST["update_id"];
                            $update_cart="update `cart_details` set quantity=$update_value where u_id=$user_id and p_id=$update_id";
                            $result_products_quantity=mysqli_query($con,$update_cart);
                           
                            
                            if($result_products_quantity){
                              echo"<script>window.open('cart.php','_self')</script>";
                            }
                          }
                        ?>
                        <td><?php echo $subtotal=number_format($product_price*$quantity) ?></td>
                        <?php $grand=$grand+($product_price*$quantity); ?>
                        <td>
                          <input type="hidden" value="<?php echo $p_id ?>" name="remove_id">
                            <div class="col">
                                <button class="btn btn-outline-light text-dark btn-sm" type="submit" name="remove_cart" onclick="<?php cart() ?>">
                                <a href="cart.php?remove=<?php echo $p_id ?>">
                                <!-- <input type="submit" class="btn btn-outline-light text-dark btn-sm "  value="Remove" name="remove_cart" onclick="return confirm('Are you sure you want to delete this item')">   -->
                                <i class='fas fa-trash me-2'></i>Remove</button >                             
                              </a>
                            </div>
                        </td>
                      </tr>
                  <?php 
                  }    
                }
                
                
              }
              else{
                echo"<h2 class='text-center text-danger'>Cart is Empty</h2>";
              }  
            ?>           
          </tbody>
        </table>    
    </div>        
    
    <?php 
      
      if($grand>0){
        echo" <div class='row mt-5'>
          <div class='col-md-4'>
            <h3 class='bottom_btn  text-center'>Grand Price:$grand/-</h3>
          </div>
          <div class='col-md-4'>
            <a href='index.php'><button class='btn btn-outline-light text-dark btn'>Continue Shopping</button></a>
          </div>
          <div class='col-md-4'>
            <a href='user_area/checkout.php'><button class='btn btn-outline-light text-dark btn'>Checkout</button></a>
          </div>
        </div>     
        ";
        
    ?>
  </div>  
     
  <button class=" btn btn-outline-light text-dark btn mb-5 mt-5">
    <a href="cart.php?delete_all">
      <i class='fas fa-trash me-2'></i>Delete All</button>
    </a>

  </div> 
  
  <?php  
    
    }else{
        
    echo"";
    }

  ?>

  </div>

  <!-- include footer -->
  
  <?php include("includes/footer.php") ?>


  <style>
  body{
    overflow-x: hidden;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }
  .content {
    flex: 1;
  }
  
  a{
    text-decoration: none;
    color:black;
  }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
