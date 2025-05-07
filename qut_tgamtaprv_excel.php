<?php 
include_once 'config.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$tsname = $_GET['user'];

if (($tsname == 'admin') or ($tsname == 'durgarao') or ($tsname == 'accounts') or ($tsname == 'tgbilling')) {
    $y = "select * from tgrequest_amnt where  confirm='Yes' and status='' order by id desc";
} else {
    $y = "select * from tgrequest_amnt where  confirm='Yes' and status='' and user='$tsname'  order by id desc";
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->mergeCells('A1:X1');
$sheet->getStyle("A1:X1")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle("A1:X1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A1', 'JTECHNO ASSOCIATES FACILITY MANAGEMENT PVT.LTD');
$sheet->getStyle("A1:X1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->mergeCells('A4:X4');
$sheet->getStyle("A4:X4")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');
$sheet->getStyle("A4:X4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$sheet->setCellValue('A4', 'TELANGANA PROVED AMOUNT LIST');
$sheet->getStyle("A4:X4")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

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
$sheet->setCellValue('O6', 'Requested Amount');
$sheet->setCellValue('P6', 'Balance Amount');
$sheet->setCellValue('Q6', 'GST Type');
$sheet->setCellValue('R6', 'GST Amount');
$sheet->setCellValue('S6', 'Remarks');
$sheet->setCellValue('T6', 'Advance Amount');
$sheet->setCellValue('U6', 'Whom to be Invest Amount');
$sheet->setCellValue('V6', 'Approved Amount');
$sheet->setCellValue('W6', 'Rq Approved Date');
$sheet->setCellValue('X6', 'User');

$sheet->getStyle("A6:X6")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setRGB('0000FF');

$sheet->getStyle("A6:X6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$result = $db->query($y) or die(mysqli_error($db));
$cnt = $result->num_rows;
$i = 1;
$rowCount = 7;

while ($row = $result->fetch_assoc()) {
    $qot = $row['quet_num'];
    $krid = $row['id'];
    $ac = $row['ac_det'];
    $a = "select store_code,ro_no,ro_date,falt_desc,tot_base,tot_ser,tot_gst,adv_amnt,adv_amnt1,adv_amnt2,gst_type,net,bal from add_tgqot where quet_num='$qot'";
    $result1 = $db->query($a) or die(mysqli_error($db));
    $row2 = $result1->fetch_assoc();
    $str_code = $row2['store_code'];
    $tot_base = $row2['tot_base'];
    $ds = "select * from dpr where store_code='$str_code'";
    $result2 = $db->query($ds) or die(mysqli_error($db));
    $row1 = $result2->fetch_assoc();
    $sheet->setCellValue('A' . $rowCount, mb_strtoupper($i, 'UTF-8'));
    $sheet->setCellValue('B' . $rowCount, mb_strtoupper($qot, 'UTF-8'));
    $sheet->setCellValue('C' . $rowCount, mb_strtoupper($row1['superwisor'], 'UTF-8'));
    $sheet->setCellValue('D' . $rowCount, mb_strtoupper($row1['coordinator'], 'UTF-8'));
    $sheet->setCellValue('E' . $rowCount, mb_strtoupper($row1['store_name'], 'UTF-8'));
    $sheet->setCellValue('F' . $rowCount, mb_strtoupper($str_code, 'UTF-8'));
    $sheet->setCellValue('G' . $rowCount, mb_strtoupper($row1['format_type'], 'UTF-8'));
    $sheet->setCellValue('H' . $rowCount, mb_strtoupper($row2['ro_no'], 'UTF-8'));
    $sheet->setCellValue('I' . $rowCount, mb_strtoupper(date('d-m-Y', strtotime($row2['ro_date'])), 'UTF-8'));
    $sheet->setCellValue('J' . $rowCount, mb_strtoupper($row2['falt_desc'], 'UTF-8'));
    $sheet->setCellValue('K' . $rowCount, mb_strtoupper($tot_base, 'UTF-8'));
    $sheet->setCellValue('L' . $rowCount, mb_strtoupper($row2['tot_ser'], 'UTF-8'));
    $sheet->setCellValue('M' . $rowCount, mb_strtoupper($row2['tot_gst'], 'UTF-8'));
    $sheet->setCellValue('N' . $rowCount, mb_strtoupper($row2['net'], 'UTF-8'));
    $sheet->setCellValue('O' . $rowCount, mb_strtoupper($row['req_amnt'] + $row['gstamt'], 'UTF-8'));
    $sheet->setCellValue('P' . $rowCount, mb_strtoupper($row2['bal'], 'UTF-8'));
    $sheet->setCellValue('Q' . $rowCount, mb_strtoupper($row['gsttype'], 'UTF-8'));
    $sheet->setCellValue('R' . $rowCount, mb_strtoupper($row['gstamt'], 'UTF-8'));
    $sheet->setCellValue('S' . $rowCount, mb_strtoupper($row['remarks'], 'UTF-8'));
    $adamt = "select sum(approve_amnt) as req_amnt from tgrequest_amnt where quet_num='$qot'and  status='Amount Transferred' and   confirm='Yes'";
    $ads = $db->query($adamt) or die(mysqli_error($db));
    $ads1 = $ads->fetch_assoc();
    $adsd = $ads1['req_amnt'];
    $sheet->setCellValue('T' . $rowCount, mb_strtoupper($adsd, 'UTF-8'));
    $sheet->setCellValue('U' . $rowCount, mb_strtoupper($ac, 'UTF-8'));
    $tyy = "select sum(approve_amnt) as req_amnt from tgrequest_amnt where quet_num='$qot' and  confirm='Yes' and status='' and ac_det='$ac'";
    $result3 = $db->query($tyy) or die(mysqli_error($db));
    $row4 = $result3->fetch_assoc();
    $sheet->setCellValue('V' . $rowCount, mb_strtoupper($row4['req_amnt'], 'UTF-8'));
    $sheet->setCellValue('W' . $rowCount, mb_strtoupper(date('d-m-Y', strtotime($row['req_date'])), 'UTF-8'));
    $sheet->setCellValue('X' . $rowCount, mb_strtoupper($row['user'], 'UTF-8'));
    $rowCount++;
    $i++;
}

$cnt1 = 2;
$tc = $rowCount + $cnt + $cnt1;

$sheet->setCellValue('A' . $tc, 'SNo');
$sheet->setCellValue('B' . $tc, 'Name');
$sheet->setCellValue('C' . $tc, 'Account No');
$sheet->setCellValue('D' . $tc, 'Bank');
$sheet->setCellValue('E' . $tc, 'IFSC Code');
$sheet->setCellValue('F' . $tc, 'Amount');

if (($tsname == 'admin') or ($tsname == 'durgarao') or ($tsname == 'accounts')) {
    $y2 = "select distinct ac_det from tgrequest_amnt where confirm='Yes' and status='' ";
} else {
    $y2 = "select distinct ac_det from tgrequest_amnt where  user='$tsname' and  confirm='Yes' and status='' ";
}

$result10 = $db->query($y2) or die(mysqli_error($db));
$cnt2 = 1;
$j = 1;
$rowCount1 = $tc + $cnt2;

while ($row10 = $result10->fetch_assoc()) {
    $acd = $row10['ac_det'];
    $yu = "select * from ac_det where name='$acd'";
    $result11 = $db->query($yu) or die(mysqli_error($db));
    $row11 = $result11->fetch_assoc();
    $r12 = "select sum(approve_amnt) as amt from tgrequest_amnt where ac_det='$acd' and confirm='Yes' and status='' ";
    $result12 = $db->query($r12) or die(mysqli_error($db));
    $row12 = $result12->fetch_assoc();
    $dds = $row12['amt'];

    $sheet->setCellValue('A' . $rowCount1, mb_strtoupper($j, 'UTF-8'));
    $sheet->setCellValue('B' . $rowCount1, mb_strtoupper($acd, 'UTF-8'));
    $sheet->setCellValue('C' . $rowCount1, mb_strtoupper($row11['ac_no'], 'UTF-8'));
    $sheet->setCellValue('D' . $rowCount1, mb_strtoupper('', 'UTF-8'));
    $sheet->setCellValue('E' . $rowCount1, mb_strtoupper($row11['ifsc'], 'UTF-8'));
    $sheet->setCellValue('F' . $rowCount1, mb_strtoupper($dds, 'UTF-8'));

    $j++;
    $rowCount1++;
}

$writer = new Xlsx($spreadsheet);
$fileName = 'tgaprvamountlist.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $fileName . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
?>
