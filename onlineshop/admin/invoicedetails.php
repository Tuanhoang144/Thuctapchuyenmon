<?php
session_start();
require('Classes/PHPExcel.php');
include("../db.php");

if(isset($_POST['btnExport'])){
	$objExcel = new PHPExcel;
	$objExcel->setActiveSheetIndex(0);
	$sheet = $objExcel->getActiveSheet()->setTitle('HoaDon');

	$rowCount = 1;
    $sheet->setCellValue('A'.$rowCount,'email');
	$sheet->setCellValue('B'.$rowCount,'product_title');
	$sheet->setCellValue('C'.$rowCount,'product_price');
	$sheet->setCellValue('D'.$rowCount,'qty');

    $order_id = $_GET['order_id'];
	$result = $con->query("SELECT * FROM order_products LEFT JOIN products ON products.product_id = order_products.product_id LEFT JOIN orders_info on  orders_info.order_id = order_products.order_id WHERE order_products.order_id ='$order_id' ");
	while($row = mysqli_fetch_array($result)){
		$rowCount++;
        $sheet->setCellValue('A'.$rowCount,$row['email']);
		$sheet->setCellValue('B'.$rowCount,$row['product_title']);
		$sheet->setCellValue('C'.$rowCount,$row['product_price']);
		$sheet->setCellValue('D'.$rowCount,$row['qty']);
	}

	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
	$filename = 'export.xlsx';
	$objWriter->save($filename);

	header('Content-Disposition: attachment; filename="' . $filename . '"');  
	header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');  
	header('Content-Length: ' . filesize($filename));  
	header('Content-Transfer-Encoding: binary');  
	header('Cache-Control: must-revalidate');  
	header('Pragma: no-cache');  
	readfile($filename);  
	return;

}
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
                    <h4 class="card-title">Orders / Page </h4>
                </div>
                <div class="card-body">
                    <form method="post" class="well">
                        <div id="printablediv" class="table-responsive ps">
                            <center>
                                <table class="table" style="width:50%;">
                                    <label style="font-size:25px; ">Online Shop</label></br>
                                    <label style="font-size:20px; ">Official Receipt</label></br>
                                    <b>
                                        <tr>
                                            <th>
                                                <h5>Quantity</h5>
                                                </td>
                                            <th>
                                                <h5>Product Name</h5>
                                                </td>
                                            <th>
                                                <h5>Price</h5>
                                                </td>
                                        </tr>
                                    </b>

                                    <?php

                                    $order_id = $_GET['order_id'];
                                    $query = $con->query("SELECT * FROM orders_info WHERE order_id = '$order_id'") or die (mysqli_error());
                                    $fetch = $query->fetch_array();

                                    $amnt = $fetch['total_amt'];
                                    echo "<h4>Date : ". $fetch['dateorder']." </br></h4>" ;
                                    echo "<h4>Customer : ". $fetch['f_name']."</h4>";
                                    echo "<h4>Email : ". $fetch['email']."</h4>";
                                    //tongtien
                                    $query3 = $con->query("SELECT sum(amt) as 'tongtien' FROM order_products    WHERE order_id = '$order_id'") or die (mysqli_error());
                                    $fetch1 = $query3->fetch_array();
                                    $tongtien = $fetch1['tongtien'];

                                    $query2 = $con->query("SELECT * FROM order_products LEFT JOIN products ON products.product_id = order_products.product_id WHERE order_products.order_id = '$order_id'") or die (mysqli_error());
                                    while($row = $query2->fetch_array()){

                                      $pname = $row['product_title'];
                                      $pprice = $row['product_price'];
                                      $oqty = $row['qty'];
                                  
                                      echo "<tr>";
                                      echo "<td>".$oqty."</td>";
                                      echo "<td>".$pname."</td>";
                                      echo "<td>".$pprice."</td>";
                                      echo "</tr>";
                                    }

                                    ?>

                                </table>
                                <legend></legend>
                                <h4>TOTAL: <?php echo $tongtien; ?> $</h4>
                            </center>
                        </div>
                        <div class='pull-right'>
                        <a href="bills.php" class="btn btn-warning"><i class="fa fa-angle-left"></i></a>
                        <button class="btn btn-mini btn-info" name="btnExport" type="submit" >Xuất file excel</button> 
                            <div class="add"><a onclick="javascript:printDiv('printablediv')" name="print"
                                    style="cursor:pointer;" class="btn btn-info"><i class="icon-white icon-print"></i>
                                    Print Receipt</a></div>
                    </form>
                    <!-- <form action="">
                    <div class="add"><a href="sendmail.php?order_id=<?php echo $order_id; ?>" class="btn btn-mini btn-info" > send maill</a></div>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include "footer.php";
?>
</body>