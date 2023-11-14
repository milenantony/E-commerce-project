<?php



session_start();
session_unset();
session_destroy();
echo"<script>alert('Successfully Logout')</script>";
echo"<script>window.open('../user_area/user_login.php','_self')</script>";


?>