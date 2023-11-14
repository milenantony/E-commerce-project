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
    <title>Mobile Care</title>
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
  </style> 
</head>
<body>
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
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href='index.php?c_id=1'>Andriod</a></li>
            <li><a class="dropdown-item" href='index.php?c_id=2'>iPhone</a></li>
            
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Brands
          </a>
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
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item dropdown"> 
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i> My Account</a>
          <ul class="dropdown-menu">
            <?php 
              if(!isset($_SESSION['u_name'])){
                echo"
                <li><a class='dropdown-item' href='user_login.php'>Login</a></li>
                ";
              }else{
                echo"
                <li><a class='dropdown-item' href='profile.php?myprofile'>My Profile</a></li>
                <li><a class='dropdown-item' href='logout.php'>Logout</a></li>
                ";
              }
            ?>
          </ul>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="../cart.php">Cart<i class="fas fa-shopping-cart"></i><sup><?php echo "$cartItemCount";?></sup></a>
        </li>
      </ul>
      <form class="d-flex ms-2" role="search" action="search_products.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="search" class="btn btn-outline-success" name="search_data_products">
      </form>
    </div>
  </div>
</nav>   

<!-- second class -->


<section id="sec1">
    <div class="container-fluid mb-5 mt-3" >
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3500">
                <img src="../images/id1.webp" class="d-block w-100 "  alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                <img src="../images/id2.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="../images/id3.webp" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>



<!-- third class -->

<section id="sec2">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">

        <!-- fetching products -->

        <?php

          getproducts();
          get_unique_categories();
          get_unique_brands();
          cart();
          
          // $ip = getIPAddress();  
          // echo 'User Real IP Address - '.$ip;  

          
         
         
          
            
        

          




        ?>
      </div>
          
    </div>
    <div class="col-md-1"></div>
  </div>
</section>



<!-- include footer -->

 <?php include("../includes/footer.php")      ?>











<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>















