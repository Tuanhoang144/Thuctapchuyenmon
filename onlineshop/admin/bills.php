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
                <div class="card-header card-header-info">
                <?php 
                                if(isset($_GET['search']) && $_GET['search'] != ''){
                                    $a = $_GET['search'];
                                }
                            ?>
                        <form method="GET">
                            <input type="text" name="search" class="form-control col-md-10" placeholder="Tìm Kiếm">
                        </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        
                        <table class="table table-hover tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Orrder id</th>
                                    <th>Customer Name</th>
                                    <th> Email</th>
                                    <th>Address</th>
                                    <th>Orders date</th>
                                    <th>price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                        $result=mysqli_query($con,"SELECT order_products.order_id,f_Name,email,address,dateorder,sum(amt) as 'tongtien' FROM order_products,products,orders_info  WHERE f_Name like '%".$a."%' and products.product_id = order_products.product_id  and orders_info.order_id = order_products.order_id
                        group by order_products.order_id")or die ("query 1 incorrect.....");

                        while(list($order_id,$cus_names,$email,$address,$time,$price)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td>$order_id</td><td>$cus_names</td><td>$email</td><td>$address</td><td>$time</td><td>$price</td>
                        
                        <td>
                        <a class=' btn btn-danger' href='invoicedetails.php?order_id=$order_id'>Xuất hoá đơn</a>
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