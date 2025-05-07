<?php include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
 $tsname=$_GET['user'];
$datatable="add_klqot";
 if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname=='knbilling')or ($tsname=='sumanthpotluri')or ($tsname=='naiduys')){
 $y="SELECT * FROM knqot_bill where status='payment pending'   ";
 }else{
$y="SELECT * FROM knqot_bill where status='payment pending' and user='$tsadmin'  ";
}

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:S1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:S1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
 $objPHPExcel->getActiveSheet()->getStyle("A1:S1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'KVR BEST PROPERTY MANAGEMENT PVT.LTD');
 $objPHPExcel->getActiveSheet()->getStyle("A1:S1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:S4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:S4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
        $objPHPExcel->getActiveSheet()->getStyle("A4:S4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A4', 'KARNATAKA TO BE RAISE  QUOTATION LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:S4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'State');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Quotation No');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Supervisor');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Coordinator');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'AFM');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'Store Name');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'Store Code');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', 'Store Type');
$objPHPExcel->getActiveSheet()->SetCellValue('J6', 'City');
$objPHPExcel->getActiveSheet()->SetCellValue('K6', 'Ro Num');
$objPHPExcel->getActiveSheet()->SetCellValue('L6', 'Ro Date');
$objPHPExcel->getActiveSheet()->SetCellValue('M6', 'Fault Description');
$objPHPExcel->getActiveSheet()->SetCellValue('N6', 'Bill Received Date');
$objPHPExcel->getActiveSheet()->SetCellValue('O6', 'Ro Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('P6', 'Tot Service');
$objPHPExcel->getActiveSheet()->SetCellValue('Q6', 'Tot Gst');
$objPHPExcel->getActiveSheet()->SetCellValue('R6', 'Net');
$objPHPExcel->getActiveSheet()->SetCellValue('S6', 'User');

$objPHPExcel->getActiveSheet()->getStyle("A6:S6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
       // $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(8);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(22);
        
$objPHPExcel->getActiveSheet()->getStyle("A6:S6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result			=	$db->query($y) or die(mysqli_close($link));
$i=1;
$rowCount	=	7;
while($row	=	$result->fetch_assoc()){
    $q=$row['quet_num'];
   $k= "select * from knrequest_amnt where quet_num='$q'";
   $result1	=$db->query($k) or die(mysqli_close($link));
   $row1	=	$result1->fetch_assoc();
   $qtno=$row1['quet_num'];
  $u= "select * from add_knqot where quet_num='$qtno'";
  $result2	=$db->query($u) or die(mysqli_close($link));
   $row2=$result2->fetch_assoc();
   $store_code=$row2['store_code'];
   $ds="select * from dpr where store_code='$store_code'";
	$result10=$db->query($ds) or die(mysqli_close($link));
	$row10=$result10->fetch_assoc();
$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row1['state'],'UTF-8'));
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($qtno,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row10['superwisor'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row10['coordinator'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row10['afm'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row10['store_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($store_code,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($row10['format_type'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($row10['city'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($row2['ro_no'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($row2['ro_date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper($row2['falt_desc'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($row['bill_date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($row2['tot_base'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, mb_strtoupper($row2['tot_ser'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, mb_strtoupper($row2['tot_gst'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, mb_strtoupper($row2['net'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, mb_strtoupper($row1['user'],'UTF-8'));



	$rowCount++;
$i++; }
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);

$date=date('d-m-Y');
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="knraiseinvoice"'.$date.'".xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>