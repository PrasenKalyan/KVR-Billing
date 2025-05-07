<?php 
function numberTowords($num)
{ 
$ones = array( 
1 => "one", 
2 => "two", 
3 => "three", 
4 => "four", 
5 => "five", 
6 => "six", 
7 => "seven", 
8 => "eight", 
9 => "nine", 
10 => "ten", 
11 => "eleven", 
12 => "twelve", 
13 => "thirteen", 
14 => "fourteen", 
15 => "fifteen", 
16 => "sixteen", 
17 => "seventeen", 
18 => "eighteen", 
19 => "nineteen" 
); 
$tens = array( 
1 => "ten",
2 => "twenty", 
3 => "thirty", 
4 => "forty", 
5 => "fifty", 
6 => "sixty", 
7 => "seventy", 
8 => "eighty", 
9 => "ninety" 
); 
$hundreds = array( 
"hundred", 
"thousand", 
"million", 
"billion", 
"trillion", 
"quadrillion" 
); //limit t quadrillion 
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){ 
if($i < 20){ 
$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
$rettxt .= $tens[substr($i,0,1)]; 
$rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
$rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
$rettxt .= " ".$tens[substr($i,1,1)]; 
$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
} 
} 
if($decnum > 0){ 
$rettxt .= " and "; 
if($decnum < 20){ 
$rettxt .= $ones[$decnum]; 
}elseif($decnum < 100){ 
$rettxt .= $tens[substr($decnum,0,1)]; 
$rettxt .= " ".$ones[substr($decnum,1,1)]; 
} 
} 
return 'Total Invoice Amount in Words - '.strtoupper($rettxt).' RUPEES ONLY'; 
} 

extract($_POST);
if(isset($convert))
{
echo "<p align='center' style='color:blue'>".numberTowords("$num")."</p>";
}

?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//export.php

//export.php

error_reporting(E_ALL);

/** PHPExcel */
// Replace PHPExcel with PHP Spreadsheet
require_once __DIR__ . '/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

include 'dbconnection/connection.php';

$state = $_GET['state'];
if ($state == 'AP') {
    $qottable = 'add_qot';
    $qottable1 = 'add_qot1';

} elseif ($state == 'TG') {
    $qottable = 'add_tgqot';
    $qottable1 = 'add_tgqot1';

} elseif ($state == 'TN') {
    $qottable = 'add_tngqot';
    $qottable1 = 'add_tnqot1';
} elseif ($state == 'KL') {
    $qottable = 'add_klqot';
    $qottable1 = 'add_klqot1';

} elseif ($state == 'KN') {
    $qottable = 'add_knqot';
    $qottable1 = 'add_knqot1';

} elseif ($state == 'OD') {
    $qottable = 'add_odqot';
    $qottable1 = 'add_odqot1';

}

$result = array();
$finalresults = array();
$outputFileType = 'Xlsx';
$spreadsheet = new Spreadsheet();

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load("Billsupplytemplate.xlsx");

$id = $_GET['id'];
$sq = mysqli_query($link, "select * from " . $qottable . " where id='$id'");
$r = mysqli_fetch_array($sq);
$store_code = $r['store_code'];
$quet_num = $r['quet_num'];
$bid = $r['id'];
include('dbconnection/connection1.php');
$a = "select * from dpr where store_code='$store_code'";
$ssq1 = mysqli_query($link, $a);
$r1 = mysqli_fetch_array($ssq1);
$state_code = $r1['state_code'];
$company_name1 = $r1['company_name'];
$addr1 = $r1['ship_ddress'];
$state1 = $r1['state'];
$statefull = $r1['state'];
$gst_in1 = $r1['gst_in'];
$ship_name = $r1['ship_name'];
$ship_state = $r1['ship_state'];
$ship_gst = $r1['ship_gst'];
$store_name = $r1['store_name'];
$city = $r1['city'];
if ($statefull == 'TG') $statefull = 'Telangana';
else if ($statefull == 'AP') $statefull = 'Andhra Pradesh';
$sqy = mysqli_query($link, "select * from organization where id='1'");
$state = $_GET['state'];
$r2y = mysqli_fetch_array($sqy);
$vendor_name1 = $r2y['vendor_name1'];

if ($state == 'AP') {
    $address = $r2y['ap_address'];
    $gst = $r2y['ap_gst'];

} elseif ($state == 'TG') {
    $address = $r2y['tg_address'];
    $gst = $r2y['tg_gst'];

} elseif ($state == 'TN') {
    $address = $r2y['tn_address'];
    $gst = $r2y['tn_gst'];

} elseif ($state == 'KL') {
    $address = $r2y['kl_address'];
    $gst = $r2y['kl_gst'];
} elseif ($state == 'KN') {
    $address = $r2y['kn_address'];
    $gst = $r2y['kn_gst'];

} elseif ($state == 'OD') {
    $address = $r2y['od_address'];
    $gst = $r2y['od_gst'];

}

$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('BillofSupply');
$sheet->setCellValue('c8', $vendor_name1);
$sheet->setCellValue('c9', $address);
$sheet->setCellValue('c10', $state1);
$sheet->setCellValue('A11', 'Vendor GSTIN: ' . $gst);
$sheet->setCellValue('G11', 'Vendor State Code :' . $state_code);
$sheet->setCellValue('A12', 'Quotation No: ' . $r['quet_num']);
$sheet->setCellValue('G12', 'Quotation Date: ' . date('d-m-Y', strtotime($r['inv_date'])));
$sheet->setCellValue('c15', $r1['company_name']);
$sheet->setCellValue('c16', $r1['address']);
$sheet->setCellValue('c17', $statefull);
$sheet->setCellValue('c18', $r1['gst_in']);
$sheet->setCellValue('c20', $ship_name);
$sheet->setCellValue('c21', $store_name . $addr1);
$sheet->setCellValue('c22', $ship_state);
$sheet->setCellValue('c23', $ship_gst);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=" . $quet_num . " " . $city . " BSP.xlsx");
header('Cache-Control: max-age=0');
include_once('dbconnection/connection.php');
$aa = "select  @acount:=@acount+1 sno,hsn,serv_code,desc1,brand,model,qty,uom,rate,base_amt,serv_amt,(base_amt+serv_amt) as total,gst_amnt  from (SELECT @acount:= 0) AS acount, " . $qottable1 . "  where  id1='$bid' ";

$t = mysqli_query($link, $aa) or die(mysqli_close($link));
$i = 1;
$gst_amnt1 = 0;
$tx = 0;
while ($rows = mysqli_fetch_assoc($t)) {
    $result[] = $rows;
}
$finalrowvalue = 0;
$rowCount = 25;
$noofrecords = sizeof($result);
foreach ($result as $key => $values) {
    $finalrowvalue = $rowcount;
    //start of printing column names as names of MySQL fields
    $column = 'A';
    foreach ($values as $value) {
        //echo $value.'<br>';
        //echo $column.$rowCount.'<br>';

        $sheet->setCellValue($column . $rowCount, $value);
        $column++;
    }
    $rowCount++;
}


$objWorksheet = $spreadsheet->getActiveSheet();
$row_id = 25 + $noofrecords; // deleted row id
$number_rows = 46 - $noofrecords; // number of rows count

if ($objWorksheet != NULL) {

    if ($objWorksheet->removeRow($row_id, $number_rows)) {

        $aa = "select count(base_amt) as counti  ,sum(base_amt) as base ,sum(serv_amt) as serv,sum(base_amt+serv_amt) as total,sum(gst_amnt) as gst from " . $qottable1 . " where  id1='$bid' ";

        $t = mysqli_query($link, $aa) or die(mysqli_close($link));
        $ROWID = $row_id;
        $ROWID1 = $row_id + 1;
        $ROWID2 = $row_id + 2;
        $ROWID3 = $row_id + 3;
        $ROWID4 = $row_id + 4;
        $ROWID5 = $row_id + 5;
        $ROWID6 = $row_id + 6;

        while ($t1 = mysqli_fetch_array($t)) {

            $sheet->setCellValue('J' . $ROWID, $t1['base']);
            $sheet->setCellValue('K' . $ROWID, $t1['serv']);
            $sheet->setCellValue('L' . $ROWID, $t1['total']);
            $sheet->setCellValue('M' . $ROWID, $t1['gst']);
            $sheet->setCellValue('M' . $ROWID1, $t1['gst'] / 2);
            $sheet->setCellValue('M' . $ROWID2, $t1['gst'] / 2);
            $sheet->setCellValue('M' . $ROWID3, 0);
            $sheet->setCellValue('M' . $ROWID4, $t1['gst']);
            $sheet->setCellValue('M' . $ROWID5, $t1['gst'] + $t1['base'] + $t1['serv']);
            $sheet->setCellValue('A' . $ROWID6, numberTowords($t1['gst'] + $t1['base'] + $t1['serv']));
        }

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }

}
?>
