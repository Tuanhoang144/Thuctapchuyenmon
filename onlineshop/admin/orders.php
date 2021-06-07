<?php
session_start();

error_reporting(0);
require('Classes/PHPExcel.php');
include("../db.php");

if(isset($_POST['btnExport'])){
	$objExcel = new PHPExcel;
	function cellColor($cells,$color){
		global $objExcel;
		$objExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'startcolor' => array(
				 'rgb' => $color
			)
		));
	}
	$styleArray = array(
		'font'  => array(
			'bold'  => true,
			'color' => array('rgb' => 'FF0000'),
			'size'  => 13,
			'name'  => 'Times new roman'
		));
		$styleArray1 = array(
			'font'  => array(
				'bold'  => true,
				'color' => array('rgb' => '333333'),
				'size'  => 10,
				'name'  => 'Times new roman'
			));
			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);
	$objExcel->setActiveSheetIndex(0);
	$objExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
	$objExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
	$objExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
	$objExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
	$objExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
	$objExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
	//$objExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
	$objExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
	$objExcel->getActiveSheet()->getColumnDimension('I')->setWidth(19);
	$objExcel->getActiveSheet()->getStyle('A6:D6')->getFont()->setBold(true);
	$objExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
	$objExcel->getActiveSheet()->getStyle('A2')->applyFromArray($styleArray);
	$objExcel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
	$objExcel->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray1);
	$objExcel->getActiveSheet()->getStyle('A4')->getFont()->setBold(true);
	$objExcel->getActiveSheet()->getStyle('A4')->applyFromArray($styleArray1);
	$objExcel->getActiveSheet()->getStyle('A6')->getFont()->setBold(true);
	$objExcel->getActiveSheet()->getStyle('A6')->applyFromArray($styleArray);
	$objExcel->getActiveSheet()->getStyle("A8:I8")->getFont()->setSize(12);

	$rowCount = 8;
	
	

	$objExcel->getActiveSheet()->mergeCells('A6:G6');

	cellColor('A8', 'FFFF66');
	cellColor('B8', 'FFFF66');
	cellColor('C8', 'FFFF66');
	cellColor('D8', 'FFFF66');
	cellColor('E8', 'FFFF66');
	cellColor('F8', 'FFFF66');
	cellColor('G8', 'FFFF66');
	$sheet = $objExcel->getActiveSheet()->setTitle('đơn hàng');

	$sheet->getStyle("A6:G6")->applyFromArray($style);
	$sheet->setCellValue('A6', "DANH SÁCH đơn hàng");
	$sheet->setCellValue('A'.$rowCount,'STT');
	$sheet->setCellValue('B'.$rowCount,'full name');
	$sheet->setCellValue('C'.$rowCount,'Email');
	$sheet->setCellValue('D'.$rowCount,'Address');
	$sheet->setCellValue('E'.$rowCount,'DateOrder');
    $sheet->setCellValue('F'.$rowCount,'prod_count');
	$sheet->setCellValue('G'.$rowCount,'total_amt');
	$cnt = 1;
	$result = $con->query("SELECT * FROM orders_info");
	while($row = mysqli_fetch_array($result)){
		$rowCount++;
		$sheet->setCellValue('A'.$rowCount,$cnt);
		$sheet->setCellValue('B'.$rowCount,$row['f_name']);
		$sheet->setCellValue('C'.$rowCount,$row['email']);
		$sheet->setCellValue('D'.$rowCount,$row['address']);
		$sheet->setCellValue('E'.$rowCount,$row['dateorder']);
		$sheet->setCellValue('F'.$rowCount,$row['prod_count']);
		$sheet->setCellValue('G'.$rowCount,$row['total_amt']);
		$cnt++;
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
// if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
// {
// $order_id=$_GET['order_id'];

// /*this is delet query*/
// mysqli_query($con,"delete from orders where order_id='$order_id'")or die("delete query is incorrect...");
// } 

// ///pagination
// $page=$_GET['page'];

// if($page=="" || $page=="1")
// {
// $page1=0;	
// }
// else
// {
// $page1=($page*10)-10;	
// }

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
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th> Email</th>
                                    <th> Address</th>
                                    <!-- <th>count</th>
                                    <th>price</th> -->
                                    <th>Time</th>
									<th>Orders Status</th>
									<th>Payment methods</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                         
                            <tbody>
                                <?php
									$query = $con->query("select * from orders_info") or die(mysqli_error());
									while($fetch = $query->fetch_array())
										{
										$order_id = $fetch['order_id'];
										$cus_names = $fetch['f_name'];
										$email = $fetch['email'];
										$address = $fetch['address'];
										// $count = $fetch['prod_count'];
										// $price = $fetch['total_amt'];
										$time = $fetch['dateorder'];
										$orderstatus = $fetch['order_stat'];
										$phuongthucthanhtoan = $fetch['phuongthucthanhtoan'];	
								?>
                                <tr>
                                    <td><?php echo $order_id; ?></td>
                                    <td><?php echo $cus_names; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $address; ?></td>
                                    <td><?php echo $time; ?></td>
									<td><?php echo $orderstatus; ?></td>
									<td><?php echo $phuongthucthanhtoan; ?></td>
									
                                    <td><a href="watchorder.php?order_id=<?php echo $order_id; ?>">View</a>
                                        <?php
									if($orderstatus == 'Confirmed'){

									}elseif($orderstatus == 'Cancelled'){

									}else{
									echo '| <a class="btn btn-mini btn-info" href="confirm.php?order_id='.$order_id.'">Confirm</a> ';
									echo '| <a class="btn btn-mini btn-danger" href="cancel.php?order_id='.$order_id.'">Cancel</a></td>';
									}
					?>
                                </tr>
                                <?php
					}
				?>
                            </tbody>
                        </table>
                        <form method="POST">  
                        <button class="btn btn-mini btn-info" name="btnExport" type="submit" >Xuất file excel</button>
                         </form>
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