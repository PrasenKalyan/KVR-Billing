<?php 
include_once('config.php'); 
require 'vendor/autoload.php'; // Include the Composer autoload file

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['submit'])){
	$from_date=$_POST['from_date'];
	$to_date=$_POST['to_date'];
}

$datatable="add_tgqot";
$y="SELECT * FROM ".$datatable."   where inv_date between '$from_date' and '$to_date'   ORDER BY id desc";    

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->mergeCells('A1:BJ1');
$sheet->getStyle("A1:BJ1")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle("A1:BJ1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'JTECHNO ASSOCIATES FACILITY MANAGEMENT PVT.LTD');
$sheet->getStyle("A1:BJ1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

// ... Rest of your styling code here ...
$sheet->mergeCells('A4:BJ4');
$sheet->getStyle("A4:BJ4")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle("A4:BJ4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A4', 'TELANGANA TRACKER LIST');
$sheet->getStyle("A4:BJ4")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue('A6', 'SNo');
$sheet->setCellValue('B6', 'Quotation No');
$sheet->setCellValue('C6', 'Store Code');
$sheet->setCellValue('D6', 'Store Name');
$sheet->setCellValue('E6', 'Store Type');
$sheet->setCellValue('F6', 'Coordinator Name');
$sheet->setCellValue('G6', 'Supervisor');
$sheet->setCellValue('H6', 'AFM');
$sheet->setCellValue('I6', 'City');
$sheet->setCellValue('J6', 'Company Name');
$sheet->setCellValue('K6', 'Quotation Date');
$sheet->setCellValue('L6', 'Fault No');
$sheet->setCellValue('M6', 'Fault Date');
$sheet->setCellValue('N6', 'Fault Description');
$sheet->setCellValue('O6', 'Quotation Status');
$sheet->setCellValue('P6', 'Type of Work');
$sheet->setCellValue('Q6', 'Sub Type');
$sheet->setCellValue('R6', 'Ro No');
$sheet->setCellValue('S6', 'PO Type 416/417');
$sheet->setCellValue('T6', 'Ro Date');
$sheet->setCellValue('U6', 'Ro Amount');
$sheet->setCellValue('V6', 'Service Amount');
$sheet->setCellValue('W6', 'Gst Amount');
$sheet->setCellValue('X6', 'Total Amount');
$sheet->setCellValue('Y6', 'User');
$sheet->setCellValue('Z6', 'Invested RO Amt');
$sheet->setCellValue('AA6', 'Invested GST');
$sheet->setCellValue('AB6', 'Invested TOTAL');
$sheet->setCellValue('AC6', 'Invest Date');
$sheet->setCellValue('AD6', 'To Whoom');
$sheet->setCellValue('AE6', 'Invoice No');
$sheet->setCellValue('AF6', 'User');
$sheet->setCellValue('AG6', 'Inv Date');
$sheet->setCellValue('AH6', 'Inv Sub Date');
$sheet->setCellValue('AI6', 'Serv Period');
$sheet->setCellValue('AJ6', 'Inv Sub Mon');
$sheet->setCellValue('AK6', 'State');
$sheet->setCellValue('AL6', 'Fomate');
$sheet->setCellValue('AM6', 'Gst 28%');
$sheet->setCellValue('AN6', 'Gst 18%');
$sheet->setCellValue('AO6', 'Gst 12%');
$sheet->setCellValue('AP6', 'Gst 5%');
$sheet->setCellValue('AQ6', 'Gst 0%');
$sheet->setCellValue('AR6', 'Total Base');
$sheet->setCellValue('AS6', 'Gst(28%) Amt');
$sheet->setCellValue('AT6', 'Gst(18%) Amt');
$sheet->setCellValue('AU6', 'Gst(12%) Amt');
$sheet->setCellValue('AV6', 'Gst(5%) Amt');
$sheet->setCellValue('AW6', 'Gst(0%) Amt');
$sheet->setCellValue('AX6', 'Total Gst');
$sheet->setCellValue('AV6', 'Total Amount');
$sheet->setCellValue('AZ6', 'Doc No1');
$sheet->setCellValue('BA6', 'Rec Date1');
$sheet->setCellValue('BB6', 'Rec Month1');
$sheet->setCellValue('BC6', 'Total Amt Rec1');
$sheet->setCellValue('BD6', 'Doc No2');
$sheet->setCellValue('BE6', 'Rec Date2');
$sheet->setCellValue('BF6', 'Rec Month2');
$sheet->setCellValue('BG6', 'Total Amt Rec2');
$sheet->setCellValue('BH6', 'Outstanding');
$sheet->setCellValue('BI6', 'Ageing');
$sheet->setCellValue('BJ6', 'Remarks');

$sheet->getStyle("A6:BJ6")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
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
$sheet->getColumnDimension('M')->setWidth(22);
$sheet->getColumnDimension('N')->setWidth(20);
$sheet->getStyle("A6:BJ6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result	=	$db->query($y) or die(mysqli_error($db));
$i=1;
$rowCount	=	7;
while($row	=	$result->fetch_assoc()){
    // Add data to your spreadsheet here
	$sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
    $sheet->setCellValue('B' . $rowCount, mb_strtoupper($qno = $row['quet_num'], 'UTF-8'));
    $sheet->setCellValue('C' . $rowCount, mb_strtoupper($scode = $row['store_code'], 'UTF-8'));

    $ds = "select * from dpr where store_code='$scode'";
    $result1 = $db->query($ds) or die(mysqli_error($db));
    $row1 = $result1->fetch_assoc();
    $sheet->setCellValue('D' . $rowCount, mb_strtoupper($row1['store_name'], 'UTF-8'));
    $sheet->setCellValue('E' . $rowCount, mb_strtoupper($row1['format_type'], 'UTF-8'));
    $sheet->setCellValue('F' . $rowCount, mb_strtoupper($row1['coordinator'], 'UTF-8'));
    $sheet->setCellValue('G' . $rowCount, mb_strtoupper($row1['superwisor'], 'UTF-8'));
    $sheet->setCellValue('H' . $rowCount, mb_strtoupper($row1['afm'], 'UTF-8'));
    $sheet->setCellValue('I' . $rowCount, mb_strtoupper($row1['city'], 'UTF-8'));
    $sheet->setCellValue('J' . $rowCount, mb_strtoupper($row1['company_name'], 'UTF-8'));
    $sheet->setCellValue('K' . $rowCount, mb_strtoupper(date('d-m-Y', strtotime($row['inv_date'])), 'UTF-8'));
    $sheet->setCellValue('L' . $rowCount, mb_strtoupper($row['falt_no'], 'UTF-8'));
    $sheet->setCellValue('M' . $rowCount, mb_strtoupper(date('d-m-Y', strtotime($row['falt_date'])), 'UTF-8'));
    $sheet->setCellValue('N' . $rowCount, mb_strtoupper($row['falt_desc'], 'UTF-8'));
    $sheet->setCellValue('O' . $rowCount, mb_strtoupper($row['status'], 'UTF-8'));
    $sheet->setCellValue('P' . $rowCount, mb_strtoupper($row['type_of_work'], 'UTF-8'));
    $sheet->setCellValue('Q' . $rowCount, mb_strtoupper($row['sub_type'], 'UTF-8'));
    $sheet->setCellValue('R' . $rowCount, mb_strtoupper($row['ro_no'], 'UTF-8'));
    $sheet->setCellValue('S' . $rowCount, mb_strtoupper($row['po_type'], 'UTF-8'));
    $sheet->setCellValue('T' . $rowCount, mb_strtoupper($row['ro_date'], 'UTF-8'));
    $sheet->setCellValue('U' . $rowCount, mb_strtoupper($row['tot_base'], 'UTF-8'));
    $sheet->setCellValue('V' . $rowCount, mb_strtoupper($row['tot_ser'], 'UTF-8'));
    $sheet->setCellValue('W' . $rowCount, mb_strtoupper($row['tot_gst'], 'UTF-8'));
    $sheet->setCellValue('X' . $rowCount, mb_strtoupper($row['net'], 'UTF-8'));
    $sheet->setCellValue('Y' . $rowCount, mb_strtoupper($row['ses'], 'UTF-8'));
    // For example:
    // $sheet->setCellValue('A'.$rowCount, $row['column_name']);
    // Make sure to update the column names with the appropriate database column names
    $ds10 = "select sum(approve_amnt) as apamount,sum(transfer) as kltft,sum(gstamt) as klgst from tgrequest_amnt where quet_num='$qno'";
$result20 = $db->query($ds10) or die(mysqli_error($db));
$row20 = $result20->fetch_assoc();
$sheet->setCellValue('Z' . $rowCount, mb_strtoupper($row20['kltft'], 'UTF-8'));
$sheet->setCellValue('AA' . $rowCount, mb_strtoupper($row20['klgst'], 'UTF-8'));
$sheet->setCellValue('AB' . $rowCount, mb_strtoupper($row20['apamount'], 'UTF-8'));

$ds11 = "select transfer_date from tgrequest_amnt where quet_num='$qno' ";
$result21 = $db->query($ds11) or die(mysqli_error($db));
$row21 = $result21->fetch_assoc();

$sheet->setCellValue('AC' . $rowCount, mb_strtoupper($row21['transfer_date'], 'UTF-8'));

$yt = "select approve_amnt,ac_det,transfer_date from tgrequest_amnt where quet_num='$qno'";
$result4 = $db->query($yt) or die(mysqli_error($db));
$array = '';
while ($row4 = $result4->fetch_assoc()) {
    $at = $row4['approve_amnt'];
    $sc = $row4['ac_det'];
    $rdate = date('d-m-Y', strtotime($row4['transfer_date']));
    $array .= $sc . "-" . $at . "(" . $rdate . "),";
}

$sheet->setCellValue('AD' . $rowCount, mb_strtoupper($array, 'UTF-8'));

$ds1 = "select * from tgqot_bill where quet_num='$qno'";
$result11 = $db->query($ds1) or die(mysqli_error($db));
$row2 = $result11->fetch_assoc();
$sheet->setCellValue('AE' . $rowCount, mb_strtoupper($invno = $row2['inv_num'], 'UTF-8'));
$sheet->setCellValue('AF' . $rowCount, mb_strtoupper($row2['user'], 'UTF-8'));
$sheet->setCellValue('AG' . $rowCount, mb_strtoupper($row2['inv_date'], 'UTF-8'));
$sheet->setCellValue('AH' . $rowCount, mb_strtoupper($row2['inv_sub_date'], 'UTF-8'));
$sheet->setCellValue('AI' . $rowCount, mb_strtoupper($row2['speriod'], 'UTF-8'));
$sheet->setCellValue('AJ' . $rowCount, mb_strtoupper($row2['inv_sub_date'], 'UTF-8'));
$sheet->setCellValue('AK' . $rowCount, mb_strtoupper('TS', 'UTF-8'));
$sheet->setCellValue('AL' . $rowCount, mb_strtoupper($row2['ftype'], 'UTF-8'));
$sheet->setCellValue('AM' . $rowCount, mb_strtoupper($gst28 = $row2['gst28'], 'UTF-8'));
$sheet->setCellValue('AN' . $rowCount, mb_strtoupper($gst18 = $row2['gst18'], 'UTF-8'));
$sheet->setCellValue('AO' . $rowCount, mb_strtoupper($gst12 = $row2['gst12'], 'UTF-8'));
$sheet->setCellValue('AP' . $rowCount, mb_strtoupper($gst5 = $row2['gst5'], 'UTF-8'));
$sheet->setCellValue('AQ' . $rowCount, mb_strtoupper($gst0 = $row2['gst0'], 'UTF-8'));
$sheet->setCellValue('AR' . $rowCount, mb_strtoupper($tbase = $row2['tbase'], 'UTF-8'));
$sheet->setCellValue('AS' . $rowCount, mb_strtoupper($g28 = ($gst28 * 28) / 100, 'UTF-8'));
$sheet->setCellValue('AT' . $rowCount, mb_strtoupper($g18 = ($gst18 * 18) / 100, 'UTF-8'));
$sheet->setCellValue('AU' . $rowCount, mb_strtoupper($g12 = ($gst12 * 12) / 100, 'UTF-8'));
$sheet->setCellValue('AV' . $rowCount, mb_strtoupper($g5 = ($gst5 * 5) / 100, 'UTF-8'));
$sheet->setCellValue('AW' . $rowCount, mb_strtoupper($g0 = ($gst0 * 0) / 100, 'UTF-8'));
$sheet->setCellValue('AX' . $rowCount, mb_strtoupper($gtot = $g28 + $g18 + $g12 + $g5 + $g0, 'UTF-8'));
$sheet->setCellValue('AY' . $rowCount, mb_strtoupper($tbase + $gtot, 'UTF-8'));

$y25 = "select * from tgpayment where inv_no='$invno'";
$result12 = $db->query($y25) or die(mysqli_error($db));
$row3 = $result12->fetch_assoc();

$sheet->setCellValue('AZ' . $rowCount, mb_strtoupper($row['document_num'], 'UTF-8'));
$sheet->setCellValue('BA' . $rowCount, mb_strtoupper($row3['recevied_date'], 'UTF-8'));
$sheet->setCellValue('BB' . $rowCount, mb_strtoupper(date('M', strtotime($row3['recevied_date'])), 'UTF-8'));
$sheet->setCellValue('BC' . $rowCount, mb_strtoupper($recd = $row3['recevied_amnt'], 'UTF-8'));
$sheet->setCellValue('BD' . $rowCount, mb_strtoupper($row3['document_num1'], 'UTF-8'));
$sheet->setCellValue('BE' . $rowCount, mb_strtoupper($row3['recevied_date1'], 'UTF-8'));
$sheet->setCellValue('BF' . $rowCount, mb_strtoupper(date('M', strtotime($row3['recevied_date1'])), 'UTF-8'));
$sheet->setCellValue('BG' . $rowCount, mb_strtoupper($row3['recevied_amnt1'], 'UTF-8'));
$sheet->setCellValue('BH' . $rowCount, mb_strtoupper($row3['outstanding'], 'UTF-8'));
$sheet->setCellValue('BI' . $rowCount, mb_strtoupper($row3['outstanding'], 'UTF-8'));
$sheet->setCellValue('BJ' . $rowCount, mb_strtoupper($row3['remarks'], 'UTF-8'));
	$rowCount++;
	$i++; 
}

$writer = new Xlsx($spreadsheet);
$fileName = "tstrack.xlsx";
$writer->save($fileName);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
?>
