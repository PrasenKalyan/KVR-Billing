<?php 
function numberTowords2($number)
{
   
   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  return '- '.strtoupper($result).' RUPEES ONLY ';
}
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
echo "<p align='center' style='color:blue'>".numberTowords2("$num")."</p>";
}

?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php'; // Make sure to replace with the correct path to autoload.php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

// Connection to the database
include('dbconnection/connection.php');
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("qot_ti.xlsx");
$result = array();
$finalresults = array();
$outputFileType = 'Xlsx'; // 'Excel2007' was deprecated, so I replaced it with 'Xlsx'
$spreadsheet = new Spreadsheet();
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("qot_ti.xlsx");
$id = $_GET['id'];

// Fetch data from the database
$sq = mysqli_query($link, "select * from add_tgqot where quet_num='$id'");
$r = mysqli_fetch_array($sq);

// Assign fetched data to variables
$invoice_no = $r['invoice_no'];
$invoice_date = $r['invoice_date'];
$state = $r['state'];
$po_no = $r['po_no'];
$po_date = $r['po_date'];
$quet_num = $r['quet_num'];
// ... (other assignments)
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("qot_ti.xlsx");
$falt_date=date('d-m-Y',strtotime($r['falt_date']));
$falt_no=$r['falt_no'];
$falt_desc=$r['falt_desc'];
 $bid=$r['id'];
 $store_code=$r['store_code'];
include('dbconnection/connection.php');
 $a="select * from dpr where store_code='$store_code'";
$ssq1=mysqli_query($link,$a);
$r1=mysqli_fetch_array($ssq1);
 $state_code=$r1['state_code'];
 $company_name1=$r1['company_name'];
 $addr1=$r1['ship_ddress'];
 $state1=$r1['state'];
 $statefull=$r1['state'];
 $gst_in1=$r1['gst_in'];
 $ship_name=$r1['ship_name'];
 $ship_state=$r1['ship_state'];
 $ship_gst=$r1['ship_gst'];
 $store_name=$r1['store_name'];
 $city=$r1['city'];
 if ($statefull == 'TG') {
  $statefull = 'Telangana';
} else if ($statefull == 'AP') {
  $statefull = 'Telangana';
}
$sqy = mysqli_query($link, "select * from organization where id='1'");
$r2y = mysqli_fetch_array($sqy);
$vendor_name = $r2y['vendor_name'];
$ap_address = $r2y['tg_address'];
$ap_pan = $r2y['tg_pan'];
$gstno = $r2y['tg_gst'];

// Set cell values in the spreadsheet
$spreadsheet->getActiveSheet()->setCellValue('D11', $r['invoice_no']);
$spreadsheet->getActiveSheet()->setCellValue('I11', $r2y['state']);
$spreadsheet->getActiveSheet()->setCellValue('D12', date('d-m-Y', strtotime($r['invoice_date'])));
$spreadsheet->getActiveSheet()->setCellValue('I12', 36);
$spreadsheet->getActiveSheet()->setCellValue('D13', $r['po_no']);
$spreadsheet->getActiveSheet()->setCellValue('I11', 'Telangana');
$spreadsheet->getActiveSheet()->setCellValue('I13', date('d-m-Y', strtotime($r['po_date'])));
$spreadsheet->getActiveSheet()->setCellValue('C21', 'Telangana');
$spreadsheet->getActiveSheet()->setCellValue('E21', 36);
$spreadsheet->getActiveSheet()->setCellValue('C15', $vendor_name);
$spreadsheet->getActiveSheet()->setCellValue('C16', $ap_address);
$spreadsheet->getActiveSheet()->setCellValue('C19', $ap_pan);
$spreadsheet->getActiveSheet()->setCellValue('C20', $gstno);
$spreadsheet->getActiveSheet()->setCellValue('G5', 'Vendor State Code: ' . $state_code);
$spreadsheet->getActiveSheet()->setCellValue('A7', 'FM Fault No: ' . $falt_no);
$spreadsheet->getActiveSheet()->setCellValue('G7', 'FM Fault Date: ' . $falt_date);
$spreadsheet->getActiveSheet()->setCellValue('A24', 'Fault Description: ' . $falt_desc);
$spreadsheet->getActiveSheet()->setCellValue('H15', $r1['company_name']);
$spreadsheet->getActiveSheet()->setCellValue('H16', $r1['address']);
$spreadsheet->getActiveSheet()->setCellValue('H21', $r1['state']);
$spreadsheet->getActiveSheet()->setCellValue('H20', $r1['gst_in']);
$spreadsheet->getActiveSheet()->setCellValue('K21', $r1['state_code']);
// Set values in the spreadsheet

// ... (set other cell values)

// Retrieve data from the database and set values in the spreadsheet
$aa = "SELECT  @acount:=@acount+1 sno, hsn, serv_code, desc1, brand, model, qty, uom, rate, base_amt, serv_amt, (base_amt+serv_amt) as total, gst_amnt FROM (SELECT @acount:= 0) AS acount, add_tgqot1 WHERE id1='$bid'";
$t = mysqli_query($link, $aa) or die(mysqli_error($link));
$rowCount = 24;
while ($rk = mysqli_fetch_array($t)) {
  $spreadsheet->getActiveSheet()->setCellValue('A' . $rowCount, $rk['sno']);
  $spreadsheet->getActiveSheet()->setCellValue('B' . $rowCount, $rk['desc1']);
  $spreadsheet->getActiveSheet()->setCellValue('G' . $rowCount, $rk['hsn']);
  $spreadsheet->getActiveSheet()->setCellValue('H' . $rowCount, $rk['uom']);
  $spreadsheet->getActiveSheet()->setCellValue('I' . $rowCount, $rk['qty']);
  $spreadsheet->getActiveSheet()->setCellValue('J' . $rowCount, $rk['rate']);
  $spreadsheet->getActiveSheet()->setCellValue('K' . $rowCount, $rk['total']);
  
    // ... (set other cell values in the loop)
    $rowCount++;
}


// ... (other parts of the code)
$gst_amnt1 = 0;
$tx = 0;
$t = mysqli_query($link, $aa);
while ($rows = mysqli_fetch_assoc($t)) {
    $result[] = $rows;
}
$finalrowvalue = 0;

$noofrecords = sizeof($result);
$objWorksheet = $spreadsheet->getActiveSheet(); // Assuming $spreadsheet is properly initialized
$row_id = 24 + $noofrecords; // deleted row id
$number_rows = 15 - ($noofrecords);
$rowcounts = 43;
include_once('dbconnection/connection.php');
$ak = "select @acount:=@acount+1 sno,hsn,gst,sum((base_amt+serv_amt)) as total,sum(gst_amnt) as gst_amnt from (SELECT @acount:= 0) AS acount,add_tgqot1 where id1='$bid'   group by hsn,gst order by sno";
$tk = mysqli_query($link, $ak);
$finalamnt = 0;
while ($rkk = mysqli_fetch_array($tk)) {
    $objWorksheet->setCellValue('A' . $rowcounts, $rkk['sno']);
    $objWorksheet->setCellValue('B' . $rowcounts, $rkk['hsn']);
    $objWorksheet->setCellValue('C' . $rowcounts, $rkk['total']);
    $objWorksheet->setCellValue('E' . $rowcounts, $rkk['gst'] / 2);
    $objWorksheet->setCellValue('F' . $rowcounts, $rkk['gst_amnt'] / 2);
    $objWorksheet->setCellValue('G' . $rowcounts, $rkk['gst'] / 2);
    $objWorksheet->setCellValue('H' . $rowcounts, $rkk['gst_amnt'] / 2);
    $objWorksheet->setCellValue('K' . $rowcounts, $rkk['gst_amnt']);
    $finalamnt = $finalamnt + $rkk['total'] + $rkk['gst_amnt'];
    $rowcounts++;
}
$objWorksheet->setCellValue('D50', numberTowords2($finalamnt));

// Add a drawing to the worksheet
$gdImage = imagecreatefromjpeg('footerraisedinvoice.jpeg');
$objDrawing = new MemoryDrawing();
$objDrawing->setName('Sample image');
$objDrawing->setDescription('Sample image');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(MemoryDrawing::RENDERING_JPEG);
$objDrawing->setMimeType(MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(155);
$objDrawing->setWidth(1000);
$objDrawing->setCoordinates('A57');
$objDrawing->setWorksheet($spreadsheet->getActiveSheet());

// Create a new Excel file
$writer = new Xlsx($spreadsheet);
$filename = $quet_num . ' ' . 'TI.xlsx';
$writer->save($filename);

// Output headers so that the file is downloaded
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=" . $filename);
header('Cache-Control: max-age=0');
readfile($filename);
unlink($filename); // Delete the file after it has been downloaded
?>
