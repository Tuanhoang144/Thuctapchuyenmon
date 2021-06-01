<?php
include("../db.php");

$sql =  "SELECT total_amt FROM orders_info where YEAR(dateorder) = YEAR(CURDATE())";
$result =mysqli_query($con,$sql);

include "sidenav.php";
include "topheader.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- chart-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['tháng hiện tại', 'Doanh thu'],
            <?php 
            $count = 0;
            //echo($result);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result))
                {
                    $product_id=$row['total_amt'];
                    $today_sale=$row['total_amt'];
                    $count+=$today_sale;
                }
                echo "['$product_id','$count ' ],"; 
            }
            ?>
        ]);
        

        var options = {
            height: 600,
            chart: {
                title: 'Thống kê doanh thu theo năm',
                subtitle: 'doanh thu'
            },
            // // Accepts also 'rgb(255, 0, 0)' format but not rgba(255, 0, 0, 0.2),
            // // for that use fillOpacity versions
            // // Colors only the chart area, simple version
            // // chartArea: {
            // //   backgroundColor: '#FF0000'
            // // },
            // // Colors only the chart area, with opacity
            // chartArea: {
            //     backgroundColor: {
            //         fill: '#FFFFFF',
            //         fillOpacity: 0.1
            //     },
            // },
            // // Colors the entire chart area, simple version
            // // backgroundColor: '#FF0000',
            // // Colors the entire chart area, with opacity
            // backgroundColor: {
            //     fill: '#FFFFFF',
            //     fillOpacity: 0.8
            // },
        }


        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));;
    };
    </script>

</head>

<body>
</body>

</html>
<div class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <?php
                $query = mysqli_query($con,"select * from products");
                $result = mysqli_num_rows($query);
              ?>
                    <h4 class="card-title">Tổng sản phẩm </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table table-hover tablesorter " id="">
                            <?php
                                    $query = mysqli_query($con,"select * from products");
                                    $result = mysqli_num_rows($query);
                                   
                                ?>
                            <h4> <?php echo $result ?></h4>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Tổng doanh thu trong ngày </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table table-hover tablesorter " id="">
                            <?php 
                            $todaysale =0;
                                $query1 = mysqli_query($con,"SELECT order_id,total_amt FROM orders_info where date(dateorder) = curdate()");
                                $result1 = mysqli_num_rows($query1);
                                if($result1 > 0)
                                {
                                        while($row = mysqli_fetch_array($query1))
                                        {
                                            $today_sale=$row["total_amt"];
                                            $todaysale+=$today_sale;
                                        }
                                        echo "<h4>$todaysale</h4>" ;
                                }else {
                                    echo "<h4>0</h4>";
                                }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <?php
                $query = mysqli_query($con,"select * from products");
                $result = mysqli_num_rows($query);
              ?>
                    <h4 class="card-title">Tổng khách hàng </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table table-hover tablesorter " id="">
                            <?php
                                    $query = mysqli_query($con,"select * from user_info_backup");
                                    $result = mysqli_num_rows($query);
                                ?>
                            <h4> <?php echo $result ?></h4>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Tổng doanh thu theo tháng </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table table-hover tablesorter " id="">
                            <?php 
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
                                        echo "<h4>$todaysale</h4>" ;
                                }else {
                                    echo "<h4>0</h4>";
                                }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>  
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Tổng doanh thu theo năm </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table table-hover tablesorter " id="">
                            <?php 
                                $todaysale =0;
                                $query1 = mysqli_query($con,"SELECT order_id,total_amt FROM orders_info where year(dateorder) = YEAR(CURDATE()) ");
                                $result1 = mysqli_num_rows($query1);
                                if($result1 > 0)
                                {
                                        while($row = mysqli_fetch_array($query1))
                                        {
                                            $today_sale=$row["total_amt"];
                                            $todaysale+=$today_sale;
                                        }
                                        echo "<h4>$todaysale</h4>" ;
                                }else {
                                    $count =0;
                                }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>                        
    </div>
    <div class="container-fluid">

        <div class="col-md-14">
            <div class="card ">
                <div class="card-header card-header-primary">

                    <h4 class="card-title">Thống kê</h4>
                </div>
                <div class="card-body">
                    <div id="chart_div"></div>

                    <table class="table table-hover tablesorter " id="">

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
<?php
include "footer.php";
?>