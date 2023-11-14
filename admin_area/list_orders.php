<h3 class="text-center text-success">All Orders</h3>
<div class="row mt-5 mb-5">
    <table class="table table-bordered border border-light table-dark table-hover card1">
        <thead class=" text-center">
            <?php 
               $get_products="select * from `user_orders`";
               $results=mysqli_query($con,$get_products);
               $row_count=mysqli_num_rows( $results);
               if( $row_count==0){
                echo"<h3 class='text-danger text-center mt-5 >No Orders yet</h3>";
               }
               else{
                    echo"<tr>
                    <th>Sl No</th>
                    <th>User Id</th>
                    <th>Invoice Number</th>
                    <th>Amount Due</th>
                    <th>Total Products</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Delete</th>
                    </tr>
                    </thead>
                    ";
                    $num=0;
                    while($row_orders=mysqli_fetch_assoc($results)){
                    $order_id=$row_orders['order_id'];
                    $user_id=$row_orders['u_id'];
                    $order_amount=$row_orders['amount'];
                    $order_invoicenumber=$row_orders['invoice_number'];
                    $order_total=$row_orders['total_products'];
                    $order_date=$row_orders['order_date'];
                    $order_status=$row_orders['order_status'];
                    $num++;
                    echo" 
                    <tbody class='text-center'>
                        <tr>
                            <td> $num </td>
                            <td> $user_id</td>
                            <td> $order_invoicenumber </td>
                            <td> $order_amount </td>
                            <td> $order_total </td>
                            <td> $order_status </td>
                            <td> $order_date </td>
                            <td><a href='index.php?delete_order=$order_id' class='text-success'>
                            <span class='material-symbols-outlined'>delete</span></a>
                            </td> 
                        </tr>
                    </tbody>";
                    }   
                }

            ?>
               
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