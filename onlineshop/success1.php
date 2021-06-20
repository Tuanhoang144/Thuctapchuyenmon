<?php
session_start();
include "db.php";
$sa = $_SESSION['uid'];
	$sql = mysqli_query($con,"update orders_info set phuongthucthanhtoan='COD' where user_id='$sa' and phuongthucthanhtoan = 'null' or phuongthucthanhtoan = '' or phuongthucthanhtoan is null");
    if($sql){
        echo "<script>alert('Thành công !')</script>";
    }
?>
<?php
include "header.php";
?>
    <div class="site-title text-center">
        <h1 class="font-title">Thanh toán đã hoàn tất thành công ...!</h1>
        <td><a href="store.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
    </div>

    <?php
include "newslettter.php";
include "footer.php";
?>