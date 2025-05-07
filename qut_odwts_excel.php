<?php include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
 $tsname=$_GET['user'];
$datatable="add_odqot";
	if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='odbilling')or ($tsname=='naiduys')){
     $y="SELECT * FROM ".$datatable."  where status='work to be started'  ORDER BY id desc";    
    }else{
     $y="SELECT * FROM ".$datatable."  where status='work to be started' and ses='$tsname'  ORDER BY id desc";
	 }

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:S1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:S1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A1:S1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JYOTHI FACILITY MANAGEMENT PVT.LTD');
 $objPHPExcel->getActiveSheet()->getStyle("A1:S1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:S4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:S4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
        $objPHPExcel->getActiveSheet()->getStyle("A4:S4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A4', 'Odisha WORK TO STARTED QUOTATION LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:S4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Quotation No');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Store Code');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Store Name');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Coordinator Name');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Supervisor');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'City');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'Date');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', 'Ro Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('J6', 'Service Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('K6', 'Gst Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('L6', 'Total Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('M6', 'RO No');
$objPHPExcel->getActiveSheet()->SetCellValue('N6', 'RO Date');
$objPHPExcel->getActiveSheet()->SetCellValue('O6', 'AFM');
$objPHPExcel->getActiveSheet()->SetCellValue('P6', 'Status');
$objPHPExcel->getActiveSheet()->SetCellValue('Q6', 'User');
$objPHPExcel->getActiveSheet()->SetCellValue('R6', 'Fault Description');
$objPHPExcel->getActiveSheet()->SetCellValue('S6', 'Reason');

$objPHPExcel->getActiveSheet()->getStyle("A6:S6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
       // $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(14);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(22);
 
$objPHPExcel->getActiveSheet()->getStyle("A6:S6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result			=	$db->query($y) or die(mysql_error());
$i=1;
$rowCount	=	7;
while($row	=	$result->fetch_assoc()){
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['quet_num'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($scode=$row['store_code'],'UTF-8'));
	
	$ds="select * from dpr where store_code='$scode'";
	$result1=$db->query($ds) or die(mysql_error());
	$row1=$result1->fetch_assoc();
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row1['store_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row1['coordinator'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row1['superwisor'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row1['city'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['inv_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($row['tot_base'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($row['tot_ser'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($row['tot_gst'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($row['net'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper($row['ro_no'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['ro_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($row1['afm'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, mb_strtoupper($row['status'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, mb_strtoupper($row['ses'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, mb_strtoupper($row['falt_desc'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, mb_strtoupper($row['reason'],'UTF-8'));
	$rowCount++;
$i++; }
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="odworktobestartd.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>