<?php 
include('dbconnection/connection.php');
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
 //$tsname=$_GET['user'];
$datatable="emp";
//	if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='vishnu')){
     $y="SELECT * FROM expenses where state='AP' ORDER BY id desc";    
    //}else{
    // $y="SELECT * FROM ".$datatable."  where status='work to be started' and ses='$tsname'  ORDER BY id desc";
	// }

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:G1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:G1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A1:G4")->getFont()->setBold(true)->getColor()->setRGB('FFFFFF');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JYOTHI FACILITY MANAGEMENT PVT.LTD');
 $objPHPExcel->getActiveSheet()->getStyle("A1:G1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->mergeCells('A3:G3');
$objPHPExcel->getActiveSheet()->getStyle("A4:G4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
$objPHPExcel->getActiveSheet()->getStyle("A4:G4")->getFont()->setBold(true)->getColor()->setRGB('FFFFFF');

 


 $objPHPExcel->getActiveSheet()->setCellValue('D2', 'EXPENSES LIST');
 //$objPHPExcel->getActiveSheet()->getStyle("A3:G3")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A4', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B4', 'DATE');
$objPHPExcel->getActiveSheet()->SetCellValue('C4', 'STATE');
$objPHPExcel->getActiveSheet()->SetCellValue('D4', 'DESCRIPTION');
$objPHPExcel->getActiveSheet()->SetCellValue('E4', 'AMOUNT');
$objPHPExcel->getActiveSheet()->SetCellValue('F4', 'USER');
$objPHPExcel->getActiveSheet()->SetCellValue('G4', 'STATUS');

$sqy=mysqli_query($link,"SELECT * FROM expenses where state='AP' ORDER BY id desc");  

$objPHPExcel->getActiveSheet()->getStyle("A2:G2")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
       $objPHPExcel->getActiveSheet()->getRowDimension('A')->setRowHeight(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(16);
       

$i=1;
$rowCount	=	5;

while($row=mysqli_fetch_array($sqy)){
    
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['edate'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($row['state'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row['expdesc'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row['amount'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row['user'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row['status'],'UTF-8'));

	$rowCount++;
$i++; 
}
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="apexpenses.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>