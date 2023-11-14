<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
 
    <?php

        $username=$_SESSION['u_name'];
        $select_query="select * from `user_table` where u_name='$username'";
        $result_query=mysqli_query($con,$select_query);
        $row_fetch=mysqli_fetch_assoc($result_query);
        $user_id=$row_fetch['u_id'];


    ?>




    <h3 class="text-success text-center" style="margin-top: 70px;">My Orders</h3>
    <div class="row ">
        <div class="col-md-1"></div>
        <div class="col-md-10 mb-5">
            <table class="table table-bordered mt-5 table-success table-hover ">
                <thead class=" text-center">
                    <tr>
                        <th>Sl no</th>
                        <th>Amount Due</th>
                        <th>Total Products</th>
                        <th>Invoice Number</th>
                        <th>Date</th>
                        <th>Complete/Incomplete</th>
                        <th>status</th>
                        <th>View Details</th>

                    </tr>
                </thead>
                <tbody class="text-center">
                
                <?php
                        $select_query_orders="select * from `user_orders` where u_id=$user_id";
                        $result_order=mysqli_query($con,$select_query_orders);
                        $num=1;
                        while($row_orders=mysqli_fetch_assoc($result_order)){
                            $order_id=$row_orders['order_id'];
                            $user_id=$row_orders['u_id'];
                            $order_amount=$row_orders['amount'];
                            $order_invoicenumber=$row_orders['invoice_number'];
                            $order_total=$row_orders['total_products'];
                            $order_date=$row_orders['order_date'];
                            $order_status=$row_orders['order_status'];
                            if($order_status=='pending'){
                                $order_status='Incomplete';
                            }else{
                                $order_status='Complete';
                            }
                            echo"
                            <tr>
                                <td>$num</td>
                                <td>$order_amount</td>
                                <td>$order_total</td>
                                <td>$order_invoicenumber</td>
                                <td>$order_date</td>
                                <td>$order_status</td>";
                                ?>
                                <?php

                                if($order_status=='Complete'){
                                    echo"<td>Paid</td>";
                                }else{
                                    echo"<td><a style='text-decoration:none' class='text-danger' href='confirm_payment.php?order_id=$order_id'>Pay Now</td>
                                    ";
                                }
                                echo"<td><a href='view.php?invoicenumber=$order_invoicenumber'><button class='btn btn-outline-success text-dark btn'>View</button></a>
                                </td>
                                </tr>";
                            $num++;
                            
                        
                        }
                ?>   

                
                
                </tbody>
            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
</body>
</html>