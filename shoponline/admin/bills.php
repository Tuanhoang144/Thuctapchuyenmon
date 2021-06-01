<?php
session_start();
include("../db.php");

error_reporting(0);

include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="col-md-14">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Orders / Page <?php echo $page;?> </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table table-hover tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Product Name</th>
                                    <th>Phone number | Email</th>
                                    <th>Address</th>
                                    <th>price</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                        $result=mysqli_query($con,"select orders_info.order_id,  user_info_backup.last_name,products.product_title, user_info_backup.mobile, user_info_backup.email, user_info_backup.address1, amt,dateorder 
                        from orders_info,products,order_products,user_info_backup 
                        where orders_info.user_id = user_info_backup.user_id and orders_info.order_id = order_products.order_id and order_products.product_id = products.product_id ")or die ("query 1 incorrect.....");

                        while(list($order_id,$cus_names,$pro_name,$email,$address,$count,$price,$time)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td>$cus_names</td><td>$pro_name</td><td>$email<br>$address</td><td>$count</td><td>$price</td><td>$time</td>
                        
                        <td>
                        <a class=' btn btn-danger' href='watchorder.php?order_id=$order_id'>Xuất hoá đơn</a>
                        </td></tr>";
                        }
                        ?>
                            </tbody>
                        </table>

                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
include "footer.php";
?>