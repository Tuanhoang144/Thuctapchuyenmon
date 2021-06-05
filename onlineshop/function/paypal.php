<?php

	include('database/dbconn.php');
	if (isset($_POST['pay_now']))
{
	
	$cid = $_SESSION['id'];
	$total = $_POST['total'];
	
	include ("random_code.php");
	$t_id = $r_id;
	$date = date("M d, Y");
	$que = $conn->query("INSERT INTO `orders_info` (order_id, user_id, total_amt,  dateorder) VALUES ('$t_id', '$cid', '$total',  '$date')") or die (mysqli_error());				

	$p_id = $_POST['pid'];
	$oqty = $_POST['qty'];
	
			$i=0;
			foreach($p_id as &$pro_id){
			$conn->query("INSERT INTO `order_products` (`product_id`, `qty`, `order_id`) VALUES ('".($pro_id)."', '".($oqty[$i])."', '".($t_id)."')") or die(mysqli_error());
			$i++;
			}
	echo "<script>window.location = 'summary.php?tid= +".$t_id."'</script>";
	//header ("Location: summary.php?tid=$t_id");
	}
?>