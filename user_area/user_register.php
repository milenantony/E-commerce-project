<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
// If user is already logged in, redirect to a welcome page or dashboard
if (isset($_SESSION['u_name'])) {
  echo "<script>alert('You are Already Logged in')</script>";
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>

<!-- <nav class="navbar navbar-expand-lg" style="background-color: rgb(7, 7, 7);height: 100px;opacity: .7;">
    <div class="container-fluid">

      <h1 class="navbar-brand" style="color:rgb(255, 155, 97); font-size:60px;" href="#">E-Cart</h1>

    </div>
</nav> -->

<div class="container">
    <div class="card card1 text-center shadow-lg p-3 mb-5  rounded position-absolute top-50 start-50 translate-middle" style="width: 24rem;">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <form method="post" action="" target="_self" class="needs-validation" novalidate>
            
            <div class="container">

              <h4 class="header" style="color: white;">Register </h4>
              
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
                <label for="pwd"  class="text-white"> Confirm Password*</label>
                <input type="password"  class="form-control" style="background: transparent; color: white;" id="pwd" name="u_password2" required>
                    
              </div><br>
                  
              <a href=""><button type='submit' class="btn btn-outline-dark" style=" color: rgb(255, 255, 255);margin-bottom: 5px; border:1px solid white" name="user_register">Register</button></a>
              <br><br>
              <p class="text-white">Already a member ?<br><a href="user_login.php" style="color:rgb(255, 255, 255);">Login Now</a></p>
                  
                  
      
            </div>
          </form>
        </div>
    </div>
  </div>


  




        <!-- php code -->

<?php

    if(isset($_POST['user_register'])){
        $u_name=$_POST['u_name'];
        $u_email=$_POST['u_email'];
        $u_password1=$_POST['u_password1'];
        $hash_password=password_hash($u_password1,PASSWORD_DEFAULT);
        $u_password2=$_POST['u_password2'];
        $user_ip=getIPAddress();
        
        

        // select query

        $select_query="select * from `user_table` where u_email='$u_email'";
        $result=mysqli_query($con,$select_query);
        $rows_count=mysqli_num_rows($result);

         // Validate email format
         
        if (!filter_var($u_email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format')</script>";
        } elseif ($u_password1 != $u_password2) {
            echo "<script>alert('Passwords do not match')</script>";
        }else{

            //insert query

            $insert_query="insert into `user_table` (u_name,u_email,u_ip,u_password) values ('$u_name','$u_email','$user_ip','$hash_password')";
            $sql_execute=mysqli_query($con,$insert_query);
            if( $sql_execute){
                echo"<script>alert('Register success ')</script>";
                echo"<script>window.open('user_login.php','_self')</script>";


  
            }else{
                echo"<script>alert('Register Failed')</script>";

            }

        
        }


        


    }



?>

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


  

<style>
    
    .card1{
      border-radius: 10px;
      border-color: rgb(255, 255, 255);
      border-style: solid;
      background-color: black;
      opacity: .7;
      transition: box-shadow .3s ease-in-out;
      border: 1px solid white;
    }
    .card1:hover{
        transition: scale3d(2,2,2);
        box-shadow: 0px 0px 10px white;
    }

</style>
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

<!-- if($rows_count>0){
            echo"<script>alert('Email  already existed')</script>";
        }
        elseif(!filter_var($u_email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format')</script>";
        } elseif ($u_password1 != $u_password2) {
            echo "<script>alert('Passwords do not match')</script>";
        elseif( $u_password1!= $u_password2){
            echo"<script>alert('Password do not match ')</script>";

        } -->