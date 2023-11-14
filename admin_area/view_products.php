<h3 class="text-center text-success">All Products</h3>
<div class="row mt-5 mb-5">
    <table class="table table-bordered border border-light table-dark table-hover card1">
        <thead class=" text-center">
            <tr>
                <th>Product Id</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>


            </tr>
        </thead>
        <tbody class="text-center">
            
            <?php   
                $get_products="select * from `products`";
                $results=mysqli_query($con,$get_products);
                $num=0;
                while($row=mysqli_fetch_assoc($results)){
                    $p_id=$row['p_id'];
                    $p_name=$row['p_name'];
                    $p_image=$row['p_img'];
                    $p_price=$row['p_price'];
                    $status=$row['status'];
                    $num++;
            ?>        
                <tr>
                    <td><?php echo $num ?></td>
                    <td><img src='./product_images/<?php echo $p_image ?>' class='card-img-top  tab-img'></td>
                    <td><?php echo $p_name ?></td>
                    <td><?php echo $p_price ?></td>
                    <td>
                        <?php
                        $get_count="select * from `orders_pending` where p_id=$p_id";
                        $results_count=mysqli_query($con,$get_count);
                        $row_count=mysqli_num_rows( $results_count);
                        echo $row_count;
                        ?>
                    </td>
                    <td><?php echo $status ?></td>
                    <td><a href='index.php?edit_products=<?php echo $p_id ?>' class='text-success'>
                        <span class='material-symbols-outlined'>edit_square</span></a>  
                    </td>
                    <td><a href='index.php?delete_product=<?php echo $p_id ?>' class='text-success'>
                        <span class='material-symbols-outlined'>delete</span></a>
                    </td> 
                </tr>
            <?php
                }

            ?>        
                
                
            
        </tbody>
    </table>
       
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