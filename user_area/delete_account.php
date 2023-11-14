<section >
    <div class="container mt-5 mb-5">
        <div class="row mt-5 mb-5">

            <div class="col-md-4"></div>

            <div class="col-md-4 rounded card1">
                <h2 class="text-center text-danger mt-3">Delete Account</h2>
                <form action="" method="post" class="mt-5">
                    <div class="row mt-5 mb-2">
                        <div class="col-md-12">
                            <input type="submit" name="delete" class="form-control" style="border: 1px solid black;" value="Delete Account" >
                        </div>
                    </div>
                    
                    <div class="row mt-3 mb-5">
                        <div class="col-12">
                            <input type="submit" name="dont_delete" class="form-control" style="border: 1px solid black;" value="Don't Delete Account" >
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>

        </div>
    </div>

</section>

<?php 

    $u_name=$_SESSION['u_name'];
    if(isset($_POST['delete'])){
        $delete_query="Delete from `user_table` where u_name='$u_name'";
        $result=mysqli_query($con,$delete_query);
        if($result){
            session_destroy();
            echo"<script>alert('Account deleted successfully')</script>";
            echo"<script>window.open('../index.php','_self')</script>";

        }

    }
    if(isset($_POST['dont_delete'])){
        echo"<script>window.open('profile.php','_self')</script>";

    }





?>     


