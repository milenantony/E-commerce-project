<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  
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
    <div class="card text-center mb-3 shadow-lg p-3 mb-5  rounded position-absolute top-50 start-50 translate-middle" style="width: 22rem;">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <form method="post" action="" target="_self" class="needs-validation" novalidate>
            <div class="container">

              <h2 class="header" style="text-align: center;color: white;">LOGIN</h2><br>
              <div class="form-group">
                <label for="uname" class="text-white">Username*</label>
                <input type="text" class="form-control" style="background: transparent;color: white;" id="uname"  name="u_name" required>
                    
              </div><br>
                
              <div class="form-group">
                <label for="pwd"  class="text-white">Password*</label>
                <input type="password"  class="form-control" style="background: transparent; color: white;" id="pwd" name="u_password1" required>
                    
              </div><br>
                  
              <button type='submit' class="btn btn-outline-dark" style=" color: rgb(255, 255, 255);margin-bottom: 5px;" name="user_login">Login</button>
              <br><br>
              <p class="text-white">New to E-Mobile ?<br><a href="admin_registration.php" style="color:rgb(255, 255, 255);">Register Now</a></p>
                  
                  
      
            </div>
          </form>
        </div>
    </div>
  </div>

  <script>

    //  Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
    'use strict'
    
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
    
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
    
        form.classList.add('was-validated')
      }, false)
    })
    })()
    
    
  </script>

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
    font-size: 2.4rem; /* larger font size on hover */
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
<?php

if(isset($_POST['user_login'])){
    $ad_name=$_POST['u_name'];
    $ad_password=$_POST['u_password1'];
    $select_query="select * from `admin_table` where ad_name='$ad_name'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    if($rows_count>0){
      if(password_verify($ad_password,$row_data['ad_password'])){
        $_SESSION['ad_name']=$ad_name;
        echo"<script>alert('Login successfully')</script>";
        echo"<script>window.open('index.php','_self')</script>"; 
      }else{
        echo"<script>alert('Invalid username or password')</script>";
      }
    }else{
     echo"<script>alert('Invalid username or password')</script>";
    }

}

?>

