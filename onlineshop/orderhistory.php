<?php
include "header.php";
?>

<div class="main ">
    <div class="table-responsive">
        <form method="post" action="login_form.php">
            <table class="table table-hover tablesorter " id="">
                <thead class=" text-primary">
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Customer Name</th>
                        <th> Email</th>
                        <th> Address</th>
                        <th>Time</th>
                        <th>orders Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                     if(isset($_SESSION["uid"])){
                        $query = $con->query("SELECT * FROM `orders_info` where user_id ='$_SESSION[uid]'") or die(mysqli_error());
                        while($fetch = $query->fetch_array())
                            {
                            $order_id = $fetch['order_id'];
                            $cus_names = $fetch['f_name'];
                            $email = $fetch['email'];
                            $address = $fetch['address'];
                            $time = $fetch['dateorder'];
                            $status = $fetch['order_stat'];
                    ?>					
                    <tr>
                        
                        <td><?php echo $cus_names; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $time; ?></td>
                        <td><?php echo $status; ?></td>
                        <?php  ?>
                        <!-- <td><a class="btn btn-primary" href="thanhtoan.php?order_id=<?php echo $order_id; ?>">Chọn phương thức thanh toán</a> -->
                            <?php
					}
                };
				?>
                </tbody>
            </table>

        </form>
    </div>
</div>

<?php
include "newslettter.php";
include "footer.php";
?>