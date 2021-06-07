<?php
		include("../db.php");

		$t_id = $_GET['order_id'];
        $sql = mysqli_query($con,"UPDATE orders_info SET order_stat = 'Confirmed' WHERE order_id = '$t_id'");
        if($sql){
            echo "<script>alert('Thành công !')</script>";
        }

		header("location:orders.php");	
		
		?>