<?php 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
define('DB_NAME', 'jtechnobilling');
define('DB_USER', 'root');
define('DB_PASSWORD','');
define('DB_HOST', 'localhost');
 
// Create connection
$db     =   new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

session_start();
$name=$_SESSION['user'];
if (isset($_POST['filter'])) {
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
} 
$y = "SELECT * FROM request WHERE datecheck BETWEEN '$from_date' AND '$to_date' ORDER BY id DESC";

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:K1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:K1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
 $objPHPExcel->getActiveSheet()->getStyle("A1:K1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JTECHNO');
 $objPHPExcel->getActiveSheet()->getStyle("A1:K1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:K4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:K4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
        $objPHPExcel->getActiveSheet()->getStyle("A4:K4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A4', 'EMPLOYEE ACTIVITY REPORT');
 $objPHPExcel->getActiveSheet()->getStyle("A4:K4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
 $objPHPExcel->getActiveSheet()->SetCellValue('C5', 'FROM DATE:');
$objPHPExcel->getActiveSheet()->SetCellValue('E5', 'TO DATE:');
$objPHPExcel->getActiveSheet()->SetCellValue('D5', $from_date);
$objPHPExcel->getActiveSheet()->SetCellValue('F5', $to_date);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'S No.');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Emp ID');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Emp Name');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Store ID');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Store Name');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Check-IN Location');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'Check-IN Time');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'Check-IN Date');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', 'Check-OUT Location');
$objPHPExcel->getActiveSheet()->SetCellValue('J6', 'Check-OUT Time');
$objPHPExcel->getActiveSheet()->SetCellValue('K6', 'Check-OUT Date');
$objPHPExcel->getActiveSheet()->getStyle("A6:K6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
       $objPHPExcel->getActiveSheet()->getRowDimension('A')->setRowHeight(9);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(21);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20); //loc20
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(14);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(14); // time 14
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
       
$objPHPExcel->getActiveSheet()->getStyle("A6:K6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result			=	$db->query($y) or die(mysqli_error($link));
$i=1;
$rowCount	=	7;
while($row	=	$result->fetch_assoc()){
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['empid'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($row['uploadby'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row['indid'],'UTF-8'));
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row['sname'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row['loc'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row['time'],'UTF-8'));
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($row['date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($row['checkoutloc'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($row['checkoutime'],'UTF-8'));
    $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($row['checkoutdate'],'UTF-8'));
	$rowCount++;
$i++; }
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="emp report.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>