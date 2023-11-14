<h3 class="text-center text-success">All Users</h3>
<div class="row mt-5 mb-5">
    <table class="table table-bordered border border-light table-dark table-hover card1">
        <thead class=" text-center">
            <?php 
               $get_products="select * from `user_table` where role=0";
               $results=mysqli_query($con,$get_products);
               $row_count=mysqli_num_rows( $results);
               if( $row_count==0){
                echo"<h3 class='text-danger text-center mt-5 >No Orders yet</h3>";
               }
               else{
                    echo"<tr>
                    <th>Sl No</th>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Address</th>
                    <th>User Mobile</th>
                    <th>Delete</th>
                    </tr>
                    </thead>
                    ";
                    $num=0;
                    while($row_orders=mysqli_fetch_assoc($results)){
                    $user_id=$row_orders['u_id'];
                    $u_name=$row_orders['u_name'];
                    $u_email=$row_orders['u_email'];
                    $u_address=$row_orders['u_address'];
                    $u_mobile=$row_orders['u_mobile'];
                    $num++;
                    echo" 
                    <tbody class='text-center'>
                        <tr>
                            <td>$num </td>
                            <td>$user_id</td>
                            <td>$u_name</td>
                            <td>$u_email</td>
                            <td>$u_address</td>
                            <td>$u_mobile</td>
                            <td><a href='index.php?delete_user=$user_id' class='text-success'>
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