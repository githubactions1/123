<?php
session_start();
include("db.php");

if (! empty($_POST["p_id"]))
{
	//print_r('aa');exit;
	$p_id = $_POST["p_id"];
	//print_r($p_id);exit;
	$customers_id = $_SESSION['mobileno'];

    $delete_query = "delete from wishlist where product_id = '$p_id' AND customers_id = '$customers_id'";
    
    $run_query = mysqli_query($con,$delete_query);

	if($run_query)
	{
		echo "<script>window.open('index.php','_self')</script>";
	}
}

?>
