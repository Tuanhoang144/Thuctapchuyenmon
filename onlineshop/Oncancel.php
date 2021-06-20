<?php

include "db.php";
include "header.php";
$sa = $_SESSION['uid'];
	$sql = mysqli_query($con,"update orders_info set phuongthucthanhtoan='null' where user_id='$sa' and phuongthucthanhtoan is NULL");
    if($sql){
        echo "<script>alert('Thanh toán chưa thành công !')</script>";
    }
?>




			<form method="post" action="login_form.php">
        <h1 class="font-title">Thanh toán bị hủy vì một số lý do</h1>
        <td><a href="store.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
        </form>

<?php
include "newslettter.php";
include "footer.php";
?>