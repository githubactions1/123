<?php
session_start();
include("db.php");

if (! empty($_POST["p_id"])) 
{
    $product_id = $_POST["p_id"];
    $customers_id = $_SESSION['mobileno'];
    //print_r($customers_id);exit;

    $query = "insert into wishlist (product_id,customers_id) values ('$product_id','$customers_id')";

    $run_query = mysqli_query($con,$query);

    if($run_query)
    {
        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>