<?php include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
 $name=$_GET['user'];
//$datatable="add_klqot";
if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') ){
 $y="select * from odrequest_amnt where gsttype='With GST'";
}else{
 $y="select * from odrequest_amnt where gsttype='With GST' and user='$tsname' ";
}

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:L1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:L1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A1:L1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'KVR BEST PROPERTY MANAGEMENT PVT.LTD');
 $objPHPExcel->getActiveSheet()->getStyle("A1:L1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:L4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:L4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
        $objPHPExcel->getActiveSheet()->getStyle("A4:L4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A4', 'OD  QUOTATION  GST FILES LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:L4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'State');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Quotation No');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Store Code');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Store Name');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Coordinator Name');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'Supervisor');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', 'To Whoom');
$objPHPExcel->getActiveSheet()->SetCellValue('J6', 'Transfer Date');
$objPHPExcel->getActiveSheet()->SetCellValue('K6', 'Status');
$objPHPExcel->getActiveSheet()->SetCellValue('L6', 'User');
$objPHPExcel->getActiveSheet()->getStyle("A6:L6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
       // $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
        
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
         $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(22);
       
$objPHPExcel->getActiveSheet()->getStyle("A6:L6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result			=	$db->query($y) or die(mysqli_close($link));
$i=1;
$rowCount	=	7;
while($row	=	$result->fetch_assoc()){
    $q=$row['quet_num'];
    $amt=$row['req_amnt']+$row['gstamt'];
    $state='OD';
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($state,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($q,'UTF-8'));
	$r="select * from add_odqot where quet_num='$q'";
	$result2=$db->query($r) or die(mysqli_close($link));
	$row2=$result2->fetch_assoc();
	$scode=$row2['store_code'];
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($scode,'UTF-8'));
	$ds="select * from dpr where store_code='$scode'";
	$result1=$db->query($ds) or die(mysqli_close($link));
	$row1=$result1->fetch_assoc();
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row1['store_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row1['coordinator'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row1['superwisor'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($amt,'UTF-8'));
		$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($row['ac_det'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper(date('d.m.Y',strtotime($row['transfer_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($row['gstatus'],'UTF-8'));
		$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($row['user'],'UTF-8'));
	$rowCount++;
$i++; }
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="apgstlist.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>