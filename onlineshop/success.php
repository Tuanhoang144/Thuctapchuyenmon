<?php
session_start();
include "db.php";
$sa = $_SESSION['uid'];
	$sql = mysqli_query($con,"update orders_info set phuongthucthanhtoan='pay online' where user_id='$sa' and phuongthucthanhtoan = 'null' or phuongthucthanhtoan = '' or phuongthucthanhtoan is null");
    if($sql){
        echo "<script>alert('Thành công !')</script>";	
    }
?>
<?php
include "header.php";
?>

        <h1 class="font-title">Thanh toán đã hoàn tất thành công ...!</h1>
<a href="store.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
<?php 

?>
  <?php
include "newslettter.php";
include "footer.php";
?>