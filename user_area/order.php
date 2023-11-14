<?php 
include('../includes/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

    // Getting total items and total price of all items
    $get_ip_address = getIPAddress();
    $total_price = 0;
    $cart_query_price = "SELECT * FROM `cart_details` WHERE u_id = $user_id";
    $result_cart_price = mysqli_query($con, $cart_query_price);
    $invoice_number = mt_rand();
    $status = 'pending';
    $count_products = mysqli_num_rows($result_cart_price);

    // Fetching all items from the cart
    $cart_items = array();
    while($row_cart_item = mysqli_fetch_array($result_cart_price)){
        $cart_items[] = $row_cart_item;
    }

    // Process each cart item
    foreach ($cart_items as $cart_item) {
        $product_id = $cart_item['p_id'];
        $quantity = $cart_item['quantity'];

        // Fetch product details
        $select_product = "SELECT * FROM `products` WHERE p_id = $product_id";
        $run_price = mysqli_query($con, $select_product);

        while($row_product_price = mysqli_fetch_array($run_price)){
            $product_price = $row_product_price['p_price'];
            $subtotal = $product_price * $quantity;

            // Insert into orders_pending table
            $insert_pending_order = "INSERT INTO `orders_pending` (u_id, invoice_number, p_id, quantity, order_status) VALUES ($user_id, $invoice_number, $product_id, $quantity, '$status')";
            $result_pending_orders = mysqli_query($con, $insert_pending_order);

            // Insert into view table
            $p_name = $row_product_price['p_name'];
            $p_img = $row_product_price['p_img'];
            $insert_view = "INSERT INTO `view` (u_id, p_id, p_name, p_price, p_img, quantity, invoicenumber) VALUES ($user_id, $product_id, '$p_name', $product_price, '$p_img', $quantity, $invoice_number)";
            $result_view = mysqli_query($con, $insert_view);

            $total_price += $subtotal;
        }
    }

    if($count_products > 0){
        // Insert into user_orders table
        $insert_order = "INSERT INTO `user_orders` (u_id, amount, invoice_number, total_products, order_date, order_status) VALUES ($user_id, $total_price, $invoice_number, $count_products, NOW(), '$status')";
        $result_query = mysqli_query($con, $insert_order);

        if($result_query){
            // Display success message and redirect
            echo "<script>alert('Orders are submitted successfully and continue payment')</script>";
            echo "<script>window.open('profile.php?my_orders','_self')</script>";

            // Delete items from cart
            $empty_cart = "DELETE FROM `cart_details` WHERE u_id = $user_id";
            $result_delete = mysqli_query($con, $empty_cart);
        }
    } else {
        // Display error message if cart is empty
        echo "<script>alert('Cart is empty, can't checkout')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>
