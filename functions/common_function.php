<?php
 


  //  getting products

  function getproducts()
  {

      global $con;
      //    condition to check isset or not
        if(!isset($_GET['c_id'])){
        if(!isset($_GET['b_id'])){
      $select_query="select * from `products` order by rand() LIMIT 0,6";
      $result_query=mysqli_query($con,$select_query);
      while($row=mysqli_fetch_assoc($result_query)){
        $p_id=$row['p_id'];
        $p_name=$row['p_name'];
        $p_des=$row['p_des'];
        $c_id=$row['c_id'];
        $b_id=$row['b_id'];
        $p_img=$row['p_img'];
        $p_price=$row['p_price'];
        $rating=$row['rating'];
        echo"
          <div class='col mb-3'>
            <div class='card h-100 shadow p-3 mb-5 bg-body-tertiary rounded w-75'>
              <img src='../admin_area/product_images/$p_img' class='card-img-top' alt='$p_name'>
              <div class='card-body'>
                <h5 class='card-title'>$p_name</h5>
                <p class='card-text'>$p_des</p>
                <p class='card-text'>Price:$p_price/-</p>
                <div style='text-align:center;'>
                  <a href='index.php?cart_item=$p_id' class='btn btn-outline-success'>Add to cart</a>
                  <a href='product_details.php?p_id=$p_id' class='btn btn-outline-success ms-2'>More</a>
                </div>  
              </div>
            </div>
          </div>
        ";

      }
      }
    } 
      
  }


  //getting unique category   
    
  function get_unique_categories()
  {

    global $con;
            //    condition to check isset or not
    if(isset($_GET['c_id']))
    {
      $category_id=$_GET['c_id'];  
      $select_query="select * from `products` where c_id=$category_id";
      $result_query=mysqli_query($con,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
          echo"<h2 class='text-center text-danger' style='margin-left:430px'>Item is not available...</h2>";
      }  
      while($row=mysqli_fetch_assoc($result_query))
      {
        $p_id=$row['p_id'];
        $p_name=$row['p_name'];
        $p_des=$row['p_des'];
        $c_id=$row['c_id'];
        $b_id=$row['b_id'];
        $p_img=$row['p_img'];
        $p_price=$row['p_price'];
        $rating=$row['rating'];
        echo"
          <div class='col mb-3'>
          <div class='card h-100 shadow p-3 mb-5 bg-body-tertiary rounded w-75'>
              <img src='../admin_area/product_images/$p_img' class='card-img-top' alt='$p_name'>
              <div class='card-body'>
                <h5 class='card-title'>$p_name</h5>
                <p class='card-text'>$p_des</p>
                <p class='card-text'>Price:$p_price/-</p>
                <div style='text-align:center;'>
                  <a href='index.php?cart_item=$p_id' class='btn btn-outline-success'>Add to cart</a>
                  <a href='product_details.php?p_id=$p_id' class='btn btn-outline-success ms-2'>More</a>
                </div>  
              </div>
          </div>
          </div>
        ";

      }
    } 

  }



  // getting  unique brand 
  function get_unique_brands()
  {

    global $con;
            //    condition to check isset or not
    if(isset($_GET['b_id']))
    {
      $brand_id=$_GET['b_id'];  
      $select_query="select * from `products` where b_id=$brand_id";
      $result_query=mysqli_query($con,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
          echo"<h2 class='text-center text-danger' style='margin-left:430px'>Brand is not available...</h2>";
      }  
      while($row=mysqli_fetch_assoc($result_query))
      {
        $p_id=$row['p_id'];
        $p_name=$row['p_name'];
        $p_des=$row['p_des'];
        $c_id=$row['c_id'];
        $b_id=$row['b_id'];
        $p_img=$row['p_img'];
        $p_price=$row['p_price'];
        $rating=$row['rating'];
        echo"
          <div class='col mb-3'>
          <div class='card h-100 shadow p-3 mb-5 bg-body-tertiary rounded w-75'>
              <img src='../admin_area/product_images/$p_img' class='card-img-top' alt='$p_name'>
              <div class='card-body'>
                <h5 class='card-title'>$p_name</h5>
                <p class='card-text'>$p_des</p>
                <p class='card-text'>Price:$p_price/-</p>
                  <div style='text-align:center;'>
                  <a href='index.php?cart_item=$p_id' class='btn btn-outline-success'>Add to cart</a>
                  <a href='product_details.php?p_id=$p_id' class='btn btn-outline-success ms-2'>More</a>
                </div>   
              </div>
          </div>
          </div>
        ";

      }
    } 

  }


  //searching products
  
  function search_products()
  {

  
    global $con;
    if(isset($_GET['search_data_products'])){
      $search_data=$_GET['search_data'];
    $search_query="select * from `products` where p_name like '%$search_data%'";
    $result_query=mysqli_query($con,$search_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo"<h2 class='text-center text-danger' style='margin-left:430px'>Search product is not available...</h2>";
    }  
    while($row=mysqli_fetch_assoc($result_query)){
      $p_id=$row['p_id'];
      $p_name=$row['p_name'];
      $p_des=$row['p_des'];
      $c_id=$row['c_id'];
      $b_id=$row['b_id'];
      $p_img=$row['p_img'];
      $p_price=$row['p_price'];
      $rating=$row['rating'];
      echo"
        <div class='col mb-3'>
          <div class='card h-100 shadow p-3 mb-5 bg-body-tertiary rounded w-75'>
            <img src='../admin_area/product_images/$p_img' class='card-img-top' alt='$p_name'>
            <div class='card-body'>
                <h5 class='card-title'>$p_name</h5>
                <p class='card-text'>$p_des</p>
                <p class='card-text'>Price:$p_price/-</p>
                <div style='text-align:center;'>
                  <a href='index.php?cart_item=$p_id' class='btn btn-outline-success'>Add to cart</a>
                  <a href='product_details.php?p_id=$p_id' class='btn btn-outline-success ms-2'>More</a>
                </div>  
            </div>
          </div>
        </div>
      ";

    }
    }
  
  }

  //  getting all products

  function get_all_products()
  {

      global $con;
      //    condition to check isset or not
        if(!isset($_GET['c_id'])){
        if(!isset($_GET['b_id'])){
      $select_query="select * from `products` order by rand()";
      $result_query=mysqli_query($con,$select_query);
      while($row=mysqli_fetch_assoc($result_query)){
        $p_id=$row['p_id'];
        $p_name=$row['p_name'];
        $p_des=$row['p_des'];
        $c_id=$row['c_id'];
        $b_id=$row['b_id'];
        $p_img=$row['p_img'];
        $p_price=$row['p_price'];
        $rating=$row['rating'];
        echo"
          <div class='col mb-3'>
            <div class='card h-100 shadow p-3 mb-5 bg-body-tertiary rounded w-75'>
              <img src='admin_area/product_images/$p_img' class='card-img-top' alt='$p_name'>
              <div class='card-body'>
                  <h5 class='card-title'>$p_name</h5>
                  <p class='card-text'>$p_des</p>
                  <p class='card-text'>Price:$p_price/-</p>
                  <div style='text-align:center;'>
                    <a href='index.php?cart_item=$p_id' class='btn btn-outline-success'>Add to cart</a>
                    <a href='user_area/product_details.php?p_id=$p_id' class='btn btn-outline-success ms-2'>More</a>
                  </div>  
                </div>
            </div>
          </div>
        ";

      }
      }
    } 
      
  }

// view details

function view_details()
{

  global $con;
  //    condition to check isset or not
    if(isset($_GET['p_id'])){
    if(!isset($_GET['c_id'])){
    if(!isset($_GET['b_id'])){
      $product_id=$_GET['p_id'];
  $select_query="select * from `products` where p_id=$product_id";
  $result_query=mysqli_query($con,$select_query);
  while($row=mysqli_fetch_assoc($result_query)){
    $p_id=$row['p_id'];
    $p_name=$row['p_name'];
    $p_des=$row['p_des'];
    $p_spec=$row['p_spec'];
    $c_id=$row['c_id'];
    $b_id=$row['b_id'];
    $p_img=$row['p_img'];
    $p_price=$row['p_price'];
    $rating=$row['rating'];
    echo"
    <section id='section1'>
    <div class='container'>

      <div class='row mt-5 '>
        <div class='col-md-2'></div>
        <div class='col-md-8'>

          <div class='card mb-3 bg-light shadow p-5 mb-5 bg-body-tertiary rounded m-lg-4' style='max-width: 900px;'> 
            <div class='row g-0'>
              <div class='col-md-5'>
                <img src='../admin_area/product_images/$p_img' class='img-fluid' alt='...'>
              </div>
              <div class='col-md-7'>
                <div class='card-body'>

                  <h5 class='card-title'><b>$p_name</b></h5>
                  <p class='card-text'>$p_des</p>
                  <h6 class='card-text d-inline-block'><b><i class='fa fa-inr'></i>$p_price/-</b></h6>
                  <p class='card-text  text-danger '>Hurry, only few left</p>
                  <label class='card-text'>Specifications:</label>
                  <p class='card-text mt-3'>$p_spec</p>
                  <button class='btn btn-outline-dark d-inline-block' type='button' ><a href='../user_area/payview.php?p_id=$p_id' style='color: rgb(255, 135, 80);text-decoration: none;'>Buy Now</a></button>
                  <button class='btn btn-outline-dark d-inline-block' type='button' ><a href='index.php?cart_item=$p_id' style='color: rgb(255, 135, 80);text-decoration: none;'>Add to Cart</a></button>

                </div>
              </div> 
            </div>                         
          </div>
        
        </div>
        <div class='col-md-2'></div>
      </div> 
    </div> 
  </section>

    ";
  }
  }
  }
} 
}

// get ip address
function getIPAddress() {  
  //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
      $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
  //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
      }  
  //whether ip is from the remote address  
    else{  
      $ip = $_SERVER['REMOTE_ADDR'];  
    }  
  return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  



// cart function

function cart(){
 
  if(isset($_GET['cart_item'])){

    global $con;
    $ip = getIPAddress();
    $user_name=$_SESSION['u_name'];
    $get_details="select * from `user_table` where u_name='$user_name'";
    $result_details=mysqli_query($con, $get_details);
    $row_user=mysqli_fetch_array($result_details);
    $user_id=$row_user['u_id'];
    $get_p_id=$_GET['cart_item'];
    $select_query="select * from `cart_details` where u_id=$user_id and p_id=$get_p_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
     echo"<script>alert('Item is already present inside cart')</script>";
      echo"<script>window.open('index.php','_self')</script>";
    }else{

      $insert_query="insert into `cart_details` (p_id,quantity,u_id) values ($get_p_id,1,$user_id)";
      $result_query=mysqli_query($con,$insert_query);
      echo"<script>alert('Item is added to cart')</script>";
      echo"<script>window.open('index.php','_self')</script>";

    } 
    







  }

}


// total price function

function total_cart_price(){

  global $con;
  $ip=getIPAddress();
  $total_price=0;
  $cart_query="select * from `cart_details` where ip_address='$ip'";
  $result_query=mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_assoc($result_query)){
    $p_id=$row['p_id'];
    $select_query="select * from `products` where p_id='$p_id'";
    $result_products=mysqli_query($con,$select_query);
    while($row_product_price=mysqli_fetch_array($result_products)){
      $p_price=array($row_product_price['p_price']);
      $p_values=array_sum($p_price);
      $total_price+=$p_values;
    }

  }

 echo $total_price;





}

// get user orders
function user_orders(){
   
  global $con;
  $user_name=$_SESSION['u_name'];
  $get_details="select * from `user_table` where u_name='$user_name'";
    $result_details=mysqli_query($con, $get_details);
    while($row_user=mysqli_fetch_array($result_details)){
      $user_id=$row_user['u_id'];
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['edit_account'])){
          if(!isset($_GET['delete_account'])){
           $get_orders="select * from `user_orders` where u_id=$user_id and order_status='pending'";
           $result_orders_query=mysqli_query($con,$get_orders);
           $row_count=mysqli_num_rows($result_orders_query);
           if($row_count>0){
            echo"<h3 class='text-center text-success mt-5 mb-3'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
            <p class='text-center'><a href='profile.php?my_orders'>Order Details</a></p>";
           }else{
            echo"<h3 class='text-center text-success mt-5 mb-3'>You have zero pending orders</h3>
            <p class='text-center'><a href='../index.php'>Explore More</a></p>";
           } 
          }  
        }
      } 
    }

}



function getCartItemCount($con)
{

    // Check if the user is logged in
    if (isset($_SESSION['u_name'])) {
        $user_name = $_SESSION['u_name'];

        // Get the user ID based on the username
        $get_user_id_query = "SELECT u_id FROM user_table WHERE u_name = '$user_name'";
        $result_user_id = mysqli_query($con, $get_user_id_query);

        if ($result_user_id && mysqli_num_rows($result_user_id) > 0) {
            $row_user_id = mysqli_fetch_assoc($result_user_id);
            $user_id = $row_user_id['u_id'];

            // Count the number of cart items for the user
            $count_cart_items_query = "SELECT COUNT(*) as cart_count FROM cart_details WHERE u_id = $user_id";
            $result_cart_items = mysqli_query($con, $count_cart_items_query);

            if ($result_cart_items && mysqli_num_rows($result_cart_items) > 0) {
                $row_cart_items = mysqli_fetch_assoc($result_cart_items);
                $cart_items_count = $row_cart_items['cart_count'];

                return $cart_items_count;
            } else {
                // No cart items found
                return 0;
            }
        } else {
            // Unable to get user ID
            return 0;
        }
    } else {
        // User not logged in
        return 0;
    }
}

function checkUserRole($con, $username)
{
    $query = "SELECT role FROM user_table WHERE u_name = '$username'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['role'];
    }

    return null;
}










?>
