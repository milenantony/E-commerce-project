<?php 
  include('../includes/connect.php');
  include('../functions/common_function.php');
   session_start();

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
<!-- bootstrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<style>
 .tab-img{
   width: 100px;
   object-fit: contain;
 }
</style>
</head>
<body class="bg-dark">
<nav class="navbar navbar-expand-lg bg-dark  border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand text-success" href="#" >ADMIN DASHBOARD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php?insert_product">Insert Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?view_products">View Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?insert_brands">Insert brands</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?view_brands">View Brands</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?list_orders">All Orders</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="index.php?list_payments">All Payments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?list_users">All Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>

</nav>   

<!-- insert brand -->
<div class="container">
  <div class="row mt-5">
    <?php
      if(isset($_GET['insert_brands'])){
        include('insert_brands.php');
      }
      if(isset($_GET['view_products'])){
        include('view_products.php');
      }
      if(isset($_GET['edit_products'])){
        include('edit_products.php');
      }
      if(isset($_GET['delete_product'])){
        include('delete_products.php');
      }
      if(isset($_GET['view_brands'])){
        include('view_brands.php');
      }
      if(isset($_GET['edit_brand'])){
        include('edit_brand.php');
      }
      if(isset($_GET['delete_brand'])){
        include('delete_brand.php');
      }
      if(isset($_GET['list_orders'])){
        include('list_orders.php');
      }
      if(isset($_GET['delete_order'])){
        include('delete_order.php');
      }
      if(isset($_GET['list_payments'])){
        include('list_payments.php');
      }
      if(isset($_GET['list_users'])){
        include('list_users.php');
      }
      if(isset($_GET['delete_user'])){
        include('delete_user.php');
      }



    ?>
  </div>
</div>

<!-- insert product -->
<div class="container">
  <div class="row mt-2">
    <?php
    if(isset($_GET['insert_product'])){
        include('insert_product.php');
      }
    



    ?>
  </div>
</div>








<!--bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>