<?php 
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// include_once('config.php');
error_reporting(0);
define('DB_NAME', 'a16673ai_jfm2324');
define('DB_USER', 'a16673ai_payamath');
define('DB_PASSWORD', 'Payamath@2016');
define('DB_HOST', 'localhost');

// Create connection
$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$tsname = $_GET['username'];
$fromdate = $_GET['from_date'];
$todate = $_GET['to_date'];

$fromdate = date('Y-m-d 00:00:00', strtotime($fromdate));
$todate = date('Y-m-d 23:59:59', strtotime($todate));

if (($tsname == 'admin') || ($tsname == 'durgarao') || ($tsname == 'accounts') || ($tsname == 'sumanthpotluri')) {
    $y = "select quet_num,state,user,gstamt,gsttype from tgrequest_amnt where confirm='Yes' and status='Amount Transferred' and date >= '$fromdate' and date <='$todate' order by id desc";
} else {
    $y = "select  quet_num,state,user,gstamt,gsttype from tgrequest_amnt where confirm='Yes' and status='Amount Transferred' and user='$tsname' and date >='$fromdate' and date<='$todate' order by id desc";
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->mergeCells('A1:U1');
$sheet->getStyle("A1:U1")->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A1:U1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'JTECHNO ASSOCIATES FACILITY MANAGEMENT PVT.LTD');
$sheet->getStyle("A1:U1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->mergeCells('A4:U4');
$sheet->getStyle("A4:U4")->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A4:U4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$sheet->setCellValue('A4', 'TS REQUEST AMOUNT LIST');
$sheet->getStyle("A4:U4")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue('A6', 'SNo');
$sheet->setCellValue('B6', 'Quotation No');
$sheet->setCellValue('C6', 'Supervisor');
$sheet->setCellValue('D6', 'Coordinator');
$sheet->setCellValue('E6', 'Store Name');
$sheet->setCellValue('F6', 'Store Code');
$sheet->setCellValue('G6', 'Store Type');
$sheet->setCellValue('H6', 'Ro Num');
$sheet->setCellValue('I6', 'Ro Date');
$sheet->setCellValue('J6', 'Fault Description');
$sheet->setCellValue('K6', 'RO Amount');
$sheet->setCellValue('L6', 'Service Fee');
$sheet->setCellValue('M6', 'GST');
$sheet->setCellValue('N6', 'Total');
$sheet->setCellValue('O6', 'Advance');
$sheet->setCellValue('P6', 'Requested Amount');
$sheet->setCellValue('Q6', 'Balance');
$sheet->setCellValue('R6', 'GST Type');
$sheet->setCellValue('S6', 'GST Amount');
$sheet->setCellValue('T6', 'Whoom');
$sheet->setCellValue('U6', 'User');
$sheet->getStyle("A6:U6")->getFill()->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('800000');
$sheet->getStyle("A6:U6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$sheet->getColumnDimension('B')->setWidth(22);
$sheet->getColumnDimension('C')->setWidth(12);
$sheet->getColumnDimension('D')->setWidth(25);
$sheet->getColumnDimension('E')->setWidth(20);
$sheet->getColumnDimension('F')->setWidth(20);
$sheet->getColumnDimension('G')->setWidth(16);
$sheet->getColumnDimension('H')->setWidth(13);
$sheet->getColumnDimension('I')->setWidth(12);
$sheet->getColumnDimension('J')->setWidth(14);
$sheet->getColumnDimension('K')->setWidth(13);
$sheet->getColumnDimension('L')->setWidth(13);
$sheet->getColumnDimension('M')->setWidth(13);
$sheet->getColumnDimension('N')->setWidth(13);
$sheet->getColumnDimension('O')->setWidth(13);
$sheet->getColumnDimension('P')->setWidth(13);
$sheet->getColumnDimension('Q')->setWidth(18);
$sheet->getColumnDimension('R')->setWidth(18);
$sheet->getColumnDimension('S')->setWidth(18);
$sheet->getColumnDimension('T')->setWidth(18);
$sheet->getColumnDimension('U')->setWidth(18);

$result = $db->query($y) or die(mysqli_error($db));
$i = 1;
$rowCount = 7;

while ($row = $result->fetch_assoc()) {
    // ... (previous code)

    $yt1 = "select gsttype,gstamt from tgrequest_amnt where quet_num='$qot'";
    $result5 = $db->query($yt1) or die(mysqli_error($db));
    $array1 = array();
    $array2 = array();

    while ($row5 = $result5->fetch_assoc()) {
        $ac1 = $row5['gstamt'];
        $sc1 = $row5['gsttype'];
        array_push($array1, $sc1);
        array_push($array2, $ac1);
    }

    $sheet->setCellValue('R' . $rowCount, (implode(",", array_unique($array1))));
    $sheet->setCellValue('S' . $rowCount, (implode(",", array_unique($array2))));

    $yt = "select req_amnt,gstamt,ac_det,req_date from tgrequest_amnt where quet_num='$qot'";
    $result4 = $db->query($yt) or die(mysqli_error($db));
    $array = '';
    while ($row4 = $result4->fetch_assoc()) {
        $at = $row4['req_amnt'] + $row4['gstamt'];
        $sc = $row4['ac_det'];
        $rdate = date('d-m-Y', strtotime($row4['req_date']));
        $array .= $sc . "-" . $at . "(" . $rdate . "),";
    }
    $sheet->setCellValue('T' . $rowCount, ($array));
    $sheet->setCellValue('U' . $rowCount, ($row['user']));

    $rowCount++;
    $i++;
}

$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="tgreqamountlist.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
?>
