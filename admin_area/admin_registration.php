<?php include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>


<style>
    body{
        background-image: url("../images/bg2.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        font-family: 'Poppins', sans-serif;
    }
    h1{
    font-family: 'Rampart One', cursive;
    margin-left: 25px;
   
    }

</style>

<!-- <nav class="navbar navbar-expand-lg" style="background-color: rgb(7, 7, 7);height: 100px;opacity: .7;">
    <div class="container-fluid">

      <h1 class="navbar-brand" style="color:rgb(255, 155, 97); font-size:60px;" href="#">E-Cart</h1>

    </div>
</nav> -->




<div class="container">
    <div class="card text-center  shadow-lg p-3 mb-5  rounded position-absolute top-50 start-50 translate-middle" style="width: 22rem;">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <form method="post" action="" target="_self" class="needs-validation" novalidate>
            
            <div class="container">

              <h2 class="header" style="color: white;">Admin</h2>
              
              <br>
              <div class="form-group">
                <label for="uname" class="text-white">Username*</label>
                <input type="text" class="form-control" style="background: transparent;color: white;" id="email"  name="u_name" required>
                    
              </div><br>
              
              <div class="form-group">
                <label for="uname" class="text-white">Email*</label>
                <input type="email" class="form-control" style="background: transparent;color: white;" id="email"  name="u_email" required>
                    
              </div><br>
                
              <div class="form-group">
                <label for="pwd"  class="text-white">Password*</label>
                <input type="password"  class="form-control" style="background: transparent; color: white;" id="pwd" name="u_password1" required>
                    
              </div><br>

              <div class="form-group">
                <label for="pwd"  class="text-white">Confirm Password*</label>
                <input type="password"  class="form-control" style="background: transparent; color: white;" id="pwd" name="u_password2" required>
                    
              </div><br>

                  
              <button type='submit' class="btn btn-outline-dark" style=" color: rgb(255, 255, 255);margin-bottom: 5px;" name="register">Register</button>
              <br><br>
              <p class="text-white">Already a member ?<br><a href="admin_login.php" style="color:rgb(255, 255, 255);">Login Now</a></p>
                  
                  
      
            </div>
          </form>
        </div>
    </div>
  </div>
<?php

  if(isset($_POST['register'])){
    $ad_name=$_POST['u_name'];
    $ad_email=$_POST['u_email'];
    $ad_password1=$_POST['u_password1'];
    $hash_password=password_hash($ad_password1,PASSWORD_DEFAULT);
    $ad_password2=$_POST['u_password2'];


    // select query

    $select_query="select * from `admin_table` where ad_email='$ad_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo"<script>alert('Email  already existed')</script>";

    }elseif( $ad_password1!= $ad_password2){
        echo"<script>alert('Password do not match ')</script>";

    }
    else{

      //insert query

      $insert_query="insert into `admin_table` (ad_name,ad_email,ad_password) values ('$ad_name','$ad_email','$hash_password')";
      $sql_execute=mysqli_query($con,$insert_query);
      echo"<script>alert('Register successfully')</script>";
      echo"<script>window.open('admin_login','_self')</script>";

    
    }




  }



?>


  

  <style>
    
    .card{
      border-radius: 10px;
      border-color: rgb(255, 255, 255);
      border-style: solid;
      background-color: black;
      opacity: .7;
    }

  </style>
  <style>
    h1,h5{
    font-size: 2rem; /* default font size */
    transition: font-size 0.2s ease-in-out; /* transition effect */
    }
  
    h1:hover,h5:hover{
    font-size: 2.2rem; /* larger font size on hover */
    }
    button{
    font-size: 1.2rem; /* default font size */
    transition: font-size 0.2s ease-in-out; /* transition effect */
    }
  
    button:hover{
    font-size: 1.2rem; /* larger font size on hover */

    }
    label,input,textarea{
    font-size: 1rem; /* default font size */
    transition: font-size 0.2s ease-in-out; /* transition effect */
    
    }
  
    label:hover,input:hover,textarea:hover{
    font-size: 1.2rem; /* larger font size on hover */
    
    
    }
    a{
    font-size: 1rem; /* default font size */
    transition: font-size 0.2s ease-in-out; /* transition effect */
    text-decoration:none ;    

    }
    a:hover{
    font-size: 1.1rem; /* larger font size on hover */
    text-decoration-line: underline;    
    }
    
  </style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>   
</body>
</html>

