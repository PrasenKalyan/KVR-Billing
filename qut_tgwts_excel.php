<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include_once('config.php');

$tsname = $_GET['user'];
$datatable = "add_tgqot";
if (($tsname == 'admin') || ($tsname == 'durgarao') || ($tsname == 'rasheed') || ($tsname == 'naiduys')) {
    $y = "SELECT * FROM " . $datatable . "  where status='work to be started'  ORDER BY id desc";
} else {
    $y = "SELECT * FROM " . $datatable . "  where status='work to be started' and ses='$tsname'  ORDER BY id desc";
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->mergeCells('A1:S1');
$sheet->getStyle('A1:S1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle('A1:S1')->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'JTECHNO ASSOCIATES FACILITY MANAGEMENT PVT.LTD');
$sheet->getStyle('A1:S1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->mergeCells('A4:S4');
$spreadsheet->getActiveSheet()->getStyle("A4:S4")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$spreadsheet->getActiveSheet()->getStyle("A4:S4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$spreadsheet->getActiveSheet()->setCellValue('A4', 'TELANGANA QUOTATION LIST');
$spreadsheet->getActiveSheet()->getStyle("A4:S4")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->setActiveSheetIndex(0);
$spreadsheet->getActiveSheet()->setCellValue('A6', 'SNo');
$spreadsheet->getActiveSheet()->setCellValue('B6', 'Quotation No');
$spreadsheet->getActiveSheet()->setCellValue('C6', 'Store Code');
$spreadsheet->getActiveSheet()->setCellValue('D6', 'Store Name');
$spreadsheet->getActiveSheet()->setCellValue('E6', 'Coordinator Name');
$spreadsheet->getActiveSheet()->setCellValue('F6', 'Supervisor');
$spreadsheet->getActiveSheet()->setCellValue('G6', 'City');
$spreadsheet->getActiveSheet()->setCellValue('H6', 'Date');
$spreadsheet->getActiveSheet()->setCellValue('I6', 'Ro Amount');
$spreadsheet->getActiveSheet()->setCellValue('J6', 'Service Amount');
$spreadsheet->getActiveSheet()->setCellValue('K6', 'Gst Amount');
$spreadsheet->getActiveSheet()->setCellValue('L6', 'Total Amount');
$spreadsheet->getActiveSheet()->setCellValue('M6', 'RO No');
$spreadsheet->getActiveSheet()->setCellValue('N6', 'RO Date');
$spreadsheet->getActiveSheet()->setCellValue('O6', 'AFM');
$spreadsheet->getActiveSheet()->setCellValue('P6', 'Status');
$spreadsheet->getActiveSheet()->setCellValue('Q6', 'User');
$spreadsheet->getActiveSheet()->setCellValue('R6', 'Fault Description');
$spreadsheet->getActiveSheet()->setCellValue('S6', 'Reason');
$spreadsheet->getActiveSheet()->getStyle("A6:S6")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$spreadsheet->getActiveSheet()->getStyle("A6:S6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(22);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(12);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(25);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(13);
$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(12);
$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(14);
$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(13);
$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(13);
$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(22);
$spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(22);
$spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(22);
$spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(22);
$spreadsheet->getActiveSheet()->getStyle("A6:S6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

// Set other styles and cell values similarly

$result = $db->query($y) or die(mysqli_error($link));
$i = 1;
$rowCount = 7;
while ($row = $result->fetch_assoc()) {
       $sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
       $sheet->setCellValue('B' . $rowCount, mb_strtoupper($row['quet_num'], 'UTF-8'));
       $sheet->setCellValue('C' . $rowCount, mb_strtoupper($scode = $row['store_code'], 'UTF-8'));
       
       $ds = "select * from dpr where store_code='$scode'";
       $result1 = $db->query($ds) or die(mysqli_error($link));
       $row1 = $result1->fetch_assoc();
       $sheet->setCellValue('D' . $rowCount, mb_strtoupper($row1['store_name'], 'UTF-8'));
       $sheet->setCellValue('E' . $rowCount, mb_strtoupper($row1['coordinator'], 'UTF-8'));
       $sheet->setCellValue('F' . $rowCount, mb_strtoupper($row1['superwisor'], 'UTF-8'));
       $sheet->setCellValue('G' . $rowCount, mb_strtoupper($row1['city'], 'UTF-8'));
       $sheet->setCellValue('H' . $rowCount, mb_strtoupper(date('d-m-Y', strtotime($row['inv_date'])), 'UTF-8'));
       $sheet->setCellValue('I' . $rowCount, mb_strtoupper($row['tot_base'], 'UTF-8'));
       $sheet->setCellValue('J' . $rowCount, mb_strtoupper($row['tot_ser'], 'UTF-8'));
       $sheet->setCellValue('K' . $rowCount, mb_strtoupper($row['tot_gst'], 'UTF-8'));
       $sheet->setCellValue('L' . $rowCount, mb_strtoupper($row['net'], 'UTF-8'));
       $sheet->setCellValue('M' . $rowCount, mb_strtoupper($row['ro_no'], 'UTF-8'));
       $sheet->setCellValue('N' . $rowCount, mb_strtoupper(date('d-m-Y', strtotime($row['ro_date'])), 'UTF-8'));
       $sheet->setCellValue('O' . $rowCount, mb_strtoupper($row1['afm'], 'UTF-8'));
       $sheet->setCellValue('P' . $rowCount, mb_strtoupper($row['status'], 'UTF-8'));
       $sheet->setCellValue('Q' . $rowCount, mb_strtoupper($row['ses'], 'UTF-8'));
       $sheet->setCellValue('R' . $rowCount, mb_strtoupper($row['falt_desc'], 'UTF-8'));
       $sheet->setCellValue('S' . $rowCount, mb_strtoupper($row['reason'], 'UTF-8'));
       
    // Set other cell values similarly

    $rowCount++;
    $i++;
}

$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="tgwtslist.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
?>
