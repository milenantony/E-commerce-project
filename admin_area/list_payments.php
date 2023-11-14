<h3 class="text-center text-success">All Payments</h3>
<div class="row mt-5 mb-5">
    <table class="table table-bordered border border-light table-dark table-hover card1">
        <thead class=" text-center">
            <?php 
               $get_products="select * from `user_payments`";
               $results=mysqli_query($con,$get_products);
               $row_count=mysqli_num_rows( $results);
               if( $row_count==0){
                echo"<h3 class='text-danger text-center mt-5 >No Orders yet</h3>";
               }
               else{
                    echo"<tr>
                    <th>Sl No</th>
                    <th>User Id</th>
                    <th>Order Id</th>
                    <th>Invoice Number</th>
                    <th>Amount Due</th>
                    <th>Payment Mode</th>
                    <th>Order Date</th>
                    </tr>
                    </thead>
                    ";
                    $num=0;
                    while($row_orders=mysqli_fetch_assoc($results)){
                    $pay_id=$row_orders['pay_id'];
                    $user_id=$row_orders['u_id'];
                    $order_id=$row_orders['order_id'];
                    $pay_invoicenumber=$row_orders['invoice_number'];
                    $pay_amount=$row_orders['amount'];
                    $pay_mode=$row_orders['pay_mode'];
                    $pay_date=$row_orders['date'];
                    $num++;
                    echo" 
                    <tbody class='text-center'>
                        <tr>
                            <td>$num </td>
                            <td>$user_id</td>
                            <td>$order_id</td>
                            <td>$pay_invoicenumber</td>
                            <td>$pay_amount</td>
                            <td>$pay_mode</td>
                            <td>$pay_date</td> 
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