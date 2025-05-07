<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Change the library to PHP Spreadsheet
require 'vendor/autoload.php';
require_once __DIR__ .'/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

include 'dbconnection/connection.php';

$state = $_GET['state'];
if ($state == 'AP') {
    $qottable = 'add_qot';

} elseif ($state == 'TG') {
    $qottable = 'add_tgqot';

} elseif ($state == 'TN') {
    $qottable = 'add_tngqot';
} elseif ($state == 'KL') {
    $qottable = 'add_klqot';

} elseif ($state == 'KN') {
    $qottable = 'add_knqot';

} elseif ($state == 'OD') {
    $qottable = 'add_odqot';

}

$result = array();
$finalresults = array();
$outputFileType = 'Xlsx';
$spreadsheet = new Spreadsheet();

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load("misciliniustemplate.xlsx");
$spreadsheet->getActiveSheet()->setTitle('BillofSupply');
$id = $_GET['id'];
$sq = mysqli_query($link, "select * from " . $qottable . " where id='$id'");
$r = mysqli_fetch_array($sq);
$store_code = $r['store_code'];
$quet_num = $r['quet_num'];
include('dbconnection/connection.php');

$bid = $_GET['id'];
$loc = $_GET['loc'];
$a = "select * from dpr where store_code='$store_code'";
$ssq1 = mysqli_query($link, $a);
$r1 = mysqli_fetch_array($ssq1);
$state_code = $r1['state_code'];
$company_name1 = $r1['company_name'];
$addr1 = $r1['ship_ddress'];
$state1 = $r1['state'];
$format_type = $r1['format_type'];
$city = $r1['city'];
$gst_in1 = $r1['gst_in'];
$ship_name = $r1['ship_name'];
$ship_state = $r1['ship_state'];
$ship_gst = $r1['ship_gst'];
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('B7', 'KVR BEST PROPERTY MANAGEMENT PVT.LTD');
$m = date('m');
if ($m > '03') {
    $currentDate = date("Y-m-d");
    $dateOneYearAdded = strtotime(date("Y-m-d", strtotime($currentDate)) . " +1 year");
    $ny = date('Y', $dateOneYearAdded);
    $nyd = date('Y') . "-" . $ny;
} else {
    $currentDate = date("Y-m-d");
    $dateOneYearAdded = strtotime(date("Y-m-d", strtotime($currentDate)) . " -1 year");
    $ny = date('Y', $dateOneYearAdded);
    $nyd = $ny . "-" . date('Y');
}
$sheet->setCellValue('B8', $nyd);
// $sheet->setCellValue('B9', 'Karnataka');
$sheet->setCellValue('B9', ''); // Empty default value

if ($state == 'TG') {
    $sheet->setCellValue('B9', 'Telangana');
} elseif ($state == 'KN') {
    $sheet->setCellValue('B9', 'Karnataka');
} elseif ($state == 'AP') {
    // Add more conditions for other states if needed
} elseif ($state == 'TN') {
    // Add more conditions for other states if needed
} elseif ($state == 'KL') {
    // Add more conditions for other states if needed
} elseif ($state == 'OD') {
    // Add more conditions for other states if needed
}


$sheet->setCellValue('B10', $format_type);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=" . $state . " Summary sheet Miscellenious " . $quet_num . " " . date('d-m-Y') . ".xlsx");
header('Cache-Control: max-age=0');
include_once('dbconnection/connection.php');
$aa = "select  @acount:=@acount+1 sno,'$city','$store_code',falt_no,falt_date,falt_desc,quet_num,'',tot_base,tot_ser,tot_gst,(tot_base+tot_ser+tot_gst) as total  from (SELECT @acount:= 0) AS acount, " . $qottable . "  where id='$id' ";
$t = mysqli_query($link, $aa) or die(mysqli_error($link));
while ($rows = mysqli_fetch_assoc($t)) {
    $result[] = $rows;
}
$rowCount = 12;
$noofrecords = sizeof($result);
foreach ($result as $key => $values) {
    $column = 'A';
    foreach ($values as $value) {
        $sheet->setCellValue($column . $rowCount, $value);
        $column++;
    }
    $rowCount++;
}
$objWorksheet = $spreadsheet->getActiveSheet();
$row_id = 12 + $noofrecords; // deleted row id
$number_rows = 50 - $noofrecords;

if ($objWorksheet != null) {

    if ($objWorksheet->removeRow($row_id, $number_rows)) {
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }

}
?>
