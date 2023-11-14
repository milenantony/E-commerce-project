<?php 
  include('../includes/connect.php');
  include('../functions/common_function.php');
  session_start(); 
  $cartItemCount = getCartItemCount($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['u_name'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Merienda&family=Rye&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
      body {
        overflow-x: hidden;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
      }
      .content {
        flex: 1;
      }
      .card1 {
        transition: box-shadow .3s ease-in-out;
        background-color: darkgrey;
      }
      .card1:hover {
        transition: scale3d(2,2,2);
        box-shadow: 0px 0px 10px rgb(0,0,0);
      }
      .nav-item1 a:hover {
        color: darkgreen;
      }
    </style>
</head>
<body>
  <section id="section1" class="mb-5">
    <nav class="navbar navbar-expand-lg bg-dark  border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
    <a class="navbar-brand text-success" href="#" style="font-family: 'Alumni Sans Inline One', cursive; font-size:40px;">Mobile Care</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"><i class="fa fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['u_name'] ?> 
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="profile.php?myprofile">Profile</a></li>
            <li><a class="dropdown-item" href="profile.php?my_orders">My Orders</a></li>
            <li><a class="dropdown-item" href="profile.php?edit_account">Edit Account</a></li>
            <li><a class="dropdown-item" href="profile.php?delete_account">Delete Account</a></li>
            <li><a class='dropdown-item' href='../user_area/logout.php'>Logout</a></li>
              
          </ul>  
        <li class="nav-item">
          <a class="nav-link" href="../cart.php">Cart<i class="fas fa-shopping-cart"></i><sup><?php echo" $cartItemCount" ?></sup></a>
        </li>
      </ul>
      <form class="d-flex ms-2" role="search" action="../search_products.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="search" class="btn btn-outline-success" name="search_data_products">
      </form>
    </div>
  </div>
  </nav>  

   <!-- second class -->

   <?php
    cart();
  ?>
  
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <?php 
            if(isset($_GET['edit_account'])){
              include('edit_account.php');
            }
            if(isset($_GET['my_orders'])){
              include('myorders.php');
            }
            if(isset($_GET['delete_account'])){
              include('delete_account.php');
            }
            if(isset($_GET['myprofile'])){
              include('myprofile.php');
            }
          ?>
        </div>
      </div>
    </div>
  </section>

  <!-- include footer -->
  <?php include("../includes/footer.php") ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
