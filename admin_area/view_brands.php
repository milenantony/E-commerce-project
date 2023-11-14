<h3 class="text-center text-success">All Brands</h3>
<div class="row mt-5 mb-5">
    <table class="table table-bordered border border-light table-dark table-hover card1">
        <thead class=" text-center">
            <tr>
                <th>Sl No</th>
                <th>Brand Name</th>
                <th>Brand Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tbody class="text-center">
            
            <?php   
                $get_products="select * from `brands`";
                $results=mysqli_query($con,$get_products);
                $num=0;
                while($row=mysqli_fetch_assoc($results)){
                    $b_id=$row['b_id'];
                    $b_name=$row['b_name'];
                    $b_des=$row['b_des'];
                    $num++;
            ?>        
                <tr>
                    <td><?php echo $num ?></td>
                    <td><?php echo $b_name ?></td>
                    <td><?php echo $b_des ?></td>
                    <td><a href='index.php?edit_brand=<?php echo $b_id ?>' class='text-success'>
                        <span class='material-symbols-outlined'>edit_square</span></a>  
                    </td>
                    <td><a href='index.php?delete_brand=<?php echo $b_id ?>' class='text-success' type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span class='material-symbols-outlined'>delete</span></a>
                    </td> 
                </tr>
            <?php
                }

            ?>        
                
                
            
        </tbody>
    </table> 
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        Are you sure you want to delete this?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal"><a href="./index.php?view_brands" class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-danger"><a href='index.php?delete_brand=<?php echo $b_id ?>' class='text-light text-decoration-none'>yes</a></button>
      </div>
    </div>
  </div>
</div>

<style>
    .card1{
        transition: box-shadow .3s ease-in-out;
    }
    .card1:hover{
        transition: scale3d(2,2,2);
        box-shadow: 0px 0px 10px white;
    }
</style> 

