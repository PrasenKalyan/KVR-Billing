<?php
// Include the configuration file
include_once('config.php');
// Include the PhpSpreadsheet classes
require 'vendor/autoload.php';

/**
 * Generate and export a quotation list to an Excel spreadsheet.
 *
 * This script retrieves data from the 'add_tgqot' table and generates an Excel spreadsheet
 * with formatted headers and rows containing information about quotations.
 *
 * @author Syed Omer Ali
 * LinkedIn ID :https://www.linkedin.com/in/syed-omer-ali-0069801ab/
 */

// SQL query to retrieve data from the 'add_tgqot' table

$datatable="add_tgqot";
$y="SELECT * FROM ".$datatable."    ORDER BY id desc"; 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// Create a new Spreadsheet object
$objPHPExcel = new Spreadsheet();

// Styling and formatting for the spreadsheet
$objPHPExcel->getActiveSheet()->mergeCells('A1:O1');
$objPHPExcel->getActiveSheet()->getStyle("A1:O1")->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$objPHPExcel->getActiveSheet()->getStyle("A1:O1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'KVR BEST PROPERTY MANAGEMENT PVT.LTD');
$objPHPExcel->getActiveSheet()->getStyle("A1:O1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->mergeCells('A4:O4');
$objPHPExcel->getActiveSheet()->getStyle("A4:O4")->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$objPHPExcel->getActiveSheet()->getStyle("A4:P4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$objPHPExcel->getActiveSheet()->setCellValue('A4', 'TELANGANA QUOTATION LIST');
$objPHPExcel->getActiveSheet()->getStyle("A4:P4")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Quotation No');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Store Code');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Store Name');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Coordinator Name');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Supervisor');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'Fault_No');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'City');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', 'Date');
$objPHPExcel->getActiveSheet()->SetCellValue('J6', 'Ro Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('K6', 'Service Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('L6', 'Gst Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('M6', 'Total Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('N6', 'Status');
$objPHPExcel->getActiveSheet()->SetCellValue('O6', 'User');
$objPHPExcel->getActiveSheet()->SetCellValue('P6', 'Fault_Description');
$objPHPExcel->getActiveSheet()->getStyle("A6:P6")->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
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
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);

$objPHPExcel->getActiveSheet()->getStyle("A6:P6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

// Adding data from the database
$result			=	$db->query($y) or die(mysqli_error($link));
$i=1;
$rowCount	=	7;
while($row	=	$result->fetch_assoc()){
       // Populate spreadsheet with quotation data
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['quet_num'],'UTF-8'));
       $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row['falt_no'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($scode=$row['store_code'],'UTF-8'));
	// Fetch additional data from related 'dpr' table
	$ds="select * from dpr where store_code='$scode'";
	$result1=$db->query($ds) or die(mysqli_error($link));
	$row1=$result1->fetch_assoc();
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row1['store_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row1['coordinator'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row1['superwisor'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($row1['city'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['inv_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($row['tot_base'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($row['tot_ser'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($row['tot_gst'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper($row['net'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($row['status'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($row['ses'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, mb_strtoupper($row['falt_desc'],'UTF-8'));
	// Increment counters
       $rowCount++;
       $i++;
 }
// Create a new worksheet
$sheet = $objPHPExcel->getActiveSheet();

// Create a new Xlsx Writer
$writer = new Xlsx($objPHPExcel);

// Set the appropriate headers for file download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data_Export.xlsx"');
header('Cache-Control: max-age=0');

// Save the spreadsheet to the output
$writer->save('php://output');
?>
