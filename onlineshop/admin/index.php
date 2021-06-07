<?php

ob_start();
session_start();
if(!isset($_SESSION["login"])){
    header('location:login.php');
}


include("../db.php");
include "sidenav.php";
include "topheader.php";

?>

<div class="content">
    <div class="container-fluid">
        <div class="col-md-14">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Manage Categorys</h4>
                </div>
                <form action="" style="background-color:#fff; overflow:hidden;">
                    <div class="card-body">
                        <div class="table-responsive ps">
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card card-stats">
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">Tổng sản phẩm
                                                    </h5>
                                                    <span class="h2 font-weight-bold mb-0"> <?php
                                    $query = mysqli_query($con,"select * from products");
                                    $result = mysqli_num_rows($query);
                                   
                                ?>
                                                        <h4> <?php echo $result ?></h4>
                                                    </span>
                                                </div>
                                                <div class="col-auto">
                                                    <div
                                                        class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                        <i class="ni ni-active-40"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-sm">
                                                <span class="text-success mr-2"><i class=""></i>
                                                </span>
                                                <span class="text-nowrap"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card card-stats">
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">Tổng doanh thu
                                                        trong ngày </h5>
                                                    <span class="h2 font-weight-bold mb-0"><?php 
                            $todaysale =0;
                                $query1 = mysqli_query($con,"SELECT order_id,total_amt FROM orders_info where Date(dateorder) = Date(CURDATE())");
                                $result1 = mysqli_num_rows($query1);
                                if($result1 > 0)
                                {
                                        while($row = mysqli_fetch_array($query1))
                                        {
                                            $today_sale=$row["total_amt"];
                                            $todaysale+=$today_sale;
                                        }
                                        echo "<h4>$todaysale $</h4>" ;
                                }else {
                                    echo "<h4>0</h4>";
                                }
                            ?></span>
                                                </div>
                                                <div class="col-auto">
                                                    <div
                                                        class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                        <i class="ni ni-chart-pie-35"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-sm">
                                                <span class="text-success mr-2"><i class=""></i>
                                                </span>
                                                <span class="text-nowrap"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card card-stats">
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">Tổng khách
                                                        hàng
                                                    </h5>
                                                    <span class="h2 font-weight-bold mb-0"> <?php
                                    $query = mysqli_query($con,"select * from user_info_backup");
                                    $result = mysqli_num_rows($query);
                                ?>
                                                        <h4> <?php echo $result ?> </h4>
                                                    </span>
                                                </div>
                                                <div class="col-auto">
                                                    <div
                                                        class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                        <i class="ni ni-money-coins"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-sm">
                                                <span class="text-success mr-2"><i class=""></i>
                                                </span>
                                                <span class="text-nowrap"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card card-stats">
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">Doanh thu
                                                        tháng hiện tại</h5>
                                                    <span class="h2 font-weight-bold mb-0"> <?php 
                            $todaysale =0;
                                $query1 = mysqli_query($con,"SELECT order_id,total_amt FROM orders_info where MONTH(dateorder) = MONTH(CURDATE())");
                                $result1 = mysqli_num_rows($query1);
                                if($result1 > 0)
                                {
                                        while($row = mysqli_fetch_array($query1))
                                        {
                                            $today_sale=$row["total_amt"];
                                            $todaysale+=$today_sale;
                                        }
                                        echo "<h4>$todaysale $</h4>" ;
                                }else {
                                    echo "<h4>0</h4>";
                                }
                            ?></span>
                                                </div>
                                                <div class="col-auto">
                                                    <div
                                                        class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                        <i class="ni ni-chart-bar-32"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-sm">
                                                <span class="text-success mr-2"><i class=""></i>
                                                </span>
                                                <span class="text-nowrap"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel panel-heading">
                                    </div>
                                    <div class="panel panel-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div id="cargaBarras"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>

</div>

<?php
include "footer.php";
?>