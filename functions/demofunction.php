<?php
 


  //  getting products

  function getproducts1()
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
              <img src='admin_area/product_images/$p_img' class='card-img-top' alt='$p_name'>
              <div class='card-body'>
                <h5 class='card-title'>$p_name</h5>
                <p class='card-text'>$p_des</p>
                <p class='card-text'>Price:$p_price/-</p>
                <div style='text-align:center;'>
                  <a href='user_area/user_login.php' class='btn btn-outline-success'>Add to cart</a>
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
    
  function get_unique_categories1()
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
              <img src='admin_area/product_images/$p_img' class='card-img-top' alt='$p_name'>
              <div class='card-body'>
                <h5 class='card-title'>$p_name</h5>
                <p class='card-text'>$p_des</p>
                <p class='card-text'>Price:$p_price/-</p>
                <div style='text-align:center;'>
                  <a href='user_area/user_login.php' class='btn btn-outline-success'>Add to cart</a>
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
  function get_unique_brands1()
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
              <img src='admin_area/product_images/$p_img' class='card-img-top' alt='$p_name'>
              <div class='card-body'>
                <h5 class='card-title'>$p_name</h5>
                <p class='card-text'>$p_des</p>
                <p class='card-text'>Price:$p_price/-</p>
                  <div style='text-align:center;'>
                  <a href='user_area/user_login.php' class='btn btn-outline-success'>Add to cart</a>
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
  
  function search_products1()
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
            <img src='admin_area/product_images/$p_img' class='card-img-top' alt='$p_name'>
            <div class='card-body'>
                <h5 class='card-title'>$p_name</h5>
                <p class='card-text'>$p_des</p>
                <p class='card-text'>Price:$p_price/-</p>
                <div style='text-align:center;'>
                  <a href='user_area/user_login.php' class='btn btn-outline-success'>Add to cart</a>
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

  function get_all_products1()
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
                    <a href='user_area/user_login.php' class='btn btn-outline-success'>Add to cart</a>
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

// view details

function view_details1()
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
                <img src='admin_area/product_images/$p_img' class='img-fluid' alt='...'>
              </div>
              <div class='col-md-7'>
                <div class='card-body'>

                  <h5 class='card-title'><b>$p_name</b></h5>
                  <p class='card-text'>$p_des</p>
                  <h6 class='card-text d-inline-block'><b><i class='fa fa-inr'></i>$p_price/-</b></h6>
                  <p class='card-text  text-danger '>Hurry, only few left</p>
                  <label class='card-text'>Specifications:</label>
                  <p class='card-text mt-3'>$p_spec</p>
                  <button class='btn btn-outline-dark d-inline-block' type='button' ><a href='user_area/user_login.php' style='color: rgb(255, 135, 80);text-decoration: none;'>Buy Now</a></button>
                  <button class='btn btn-outline-dark d-inline-block' type='button' ><a href='user_area/user_login.php' style='color: rgb(255, 135, 80);text-decoration: none;'>Add to Cart</a></button>

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



?>
  <!-- <div class='row mt-5 ms-5'>
    <div class='col mb-4' mb-2>
      <div class='card h-100 shadow p-3 mb-5 bg-body-tertiary rounded w-75'>
        <img src='admin_area/product_images/$p_img' class='card-img-top' alt='$p_name'>
        <div class='card-body'>
          <h5 class='card-title text-center mb-4'>$p_name</h5>
          <div style='text-align:center;'>
            <a href='user_area/user_login.php' class='btn btn-outline-success ms-2'>Add to cart</a>
            <a href='index.php' class='btn btn-outline-success'>Explore More</a>
          </div>  
        </div>
        
      </div>
    </div>
      <div class='col-md-4'>
        <div class='row'>
          <div class='col-md-12'>
            <div class='card-body'>
                <h5 class='card-title'>$p_name</h5>
                <p class='card-text'>$p_des</p>
                <p class='card-text'>$p_spec</p>
                <p class='card-text'>Price:$p_price/-</p>
                <p class='card-text'>Rating: $rating</p>
            </div>
          </div>
        </div>
    </div>
    <div class='col-md-4'>

    </div>
  </div> -->
