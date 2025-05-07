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
  return 'Total Invoice Amount in Words - '.strtoupper($result).' RUPEES ONLY ';
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
//export.php

//export.php

error_reporting(E_ALL);

/** PHPExcel */
require_once 'PHPExcel-1.8/Classes/PHPExcel.php';
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
include('dbconnection/connection.php');
$result = array();
$finalresults=array();
$outputFileType = 'Excel2007';
$objPHPExcel = new PHPExcel();
$objPHPExcel = PHPExcel_IOFactory::load("qot_ti.xlsx");
$id=$_GET['id'];
$sq=mysqli_query($link,"select * from add_knqot where quet_num='$id'");
$r=mysqli_fetch_array($sq);
$invoice_no=$r['invoice_no'];
  $invoice_date=$r['invoice_date'];
$state=$r['state'];
 $po_no=$r['po_no'];
$po_date=$r['po_date'];
$quet_num=$r['quet_num'];
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
 
 if($statefull=='TG')
 $statefull='Telangana';
 else if($statefull=='AP')
 $statefull='Telangana';
 $sqy=mysqli_query($link,"select * from organization where id='1'");
			$r2y=mysqli_fetch_array($sqy);
			 $vendor_name=$r2y['vendor_name'];
			$ap_address=$r2y['kn_address'];
			$ap_pan=$r2y['kn_pan'];
			$gstno=$r2y['kn_gst'];
	//	$objPHPExcel->getActiveSheet()->setTitle('Quotation');		
$objPHPExcel->getActiveSheet()->setCellValue('D11', $r['invoice_no']);
$objPHPExcel->getActiveSheet()->setCellValue('I11', $r2y['state']);
$objPHPExcel->getActiveSheet()->setCellValue('D12', date('d-m-Y',strtotime($r['invoice_date'])));
$objPHPExcel->getActiveSheet()->setCellValue('I12',29);	
$objPHPExcel->getActiveSheet()->setCellValue('D13', $r['po_no']);
$objPHPExcel->getActiveSheet()->setCellValue('I11', KN);
$objPHPExcel->getActiveSheet()->setCellValue('I13', date('d-m-Y',strtotime($r['po_date'])));
$objPHPExcel->getActiveSheet()->setCellValue('C21', KN);
$objPHPExcel->getActiveSheet()->setCellValue('E21', 29);
$objPHPExcel->getActiveSheet()->setCellValue('c15', $vendor_name);
$objPHPExcel->getActiveSheet()->setCellValue('c16', $ap_address);
$objPHPExcel->getActiveSheet()->setCellValue('c19', $ap_pan);
$objPHPExcel->getActiveSheet()->setCellValue('c20', $gstno);
$objPHPExcel->getActiveSheet()->setCellValue('G5', 'Vendor State Code :'.$state_code);	
//$objPHPExcel->getActiveSheet()->setCellValue('A6', 'Quotation No: '.$r['quet_num']);
//$objPHPExcel->getActiveSheet()->setCellValue('G6', 'Quotation Date: '.date('d-m-Y',strtotime($r['inv_date'])));
$objPHPExcel->getActiveSheet()->setCellValue('A7', 'FM Fault No: '.$falt_no);
$objPHPExcel->getActiveSheet()->setCellValue('G7', 'FM Fault Date: '.$falt_date);
$objPHPExcel->getActiveSheet()->setCellValue('A24', 'Fault Description: '.$falt_desc);
$objPHPExcel->getActiveSheet()->setCellValue('H15', $r1['company_name']);
$objPHPExcel->getActiveSheet()->setCellValue('H16', $r1['address']);
$objPHPExcel->getActiveSheet()->setCellValue('H21', $r1['state']);
$objPHPExcel->getActiveSheet()->setCellValue('H20', $r1['gst_in']);
$objPHPExcel->getActiveSheet()->setCellValue('K21', $r1['state_code']);
//$objPHPExcel->getActiveSheet()->setCellValue('c15', $ship_name);
//$objPHPExcel->getActiveSheet()->setCellValue('c16', $store_name.','.$addr1);
//$objPHPExcel->getActiveSheet()->setCellValue('c17', $ship_state);
//$objPHPExcel->getActiveSheet()->setCellValue('c18', $ship_gst);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=".$quet_num."  ".TI.".xlsx");
header('Cache-Control: max-age=0');
include_once('dbconnection/connection.php');
 $aa="select  @acount:=@acount+1 sno,hsn,serv_code,desc1,brand,model,qty,uom,rate,base_amt,serv_amt,(base_amt+serv_amt) as total,gst_amnt  from (SELECT @acount:= 0) AS acount,add_knqot1 where  id1='$bid' ";
// $aa="select  @acount:=@acount+1 sno,desc1,hsn,uom,qty,rate,base_amt from (SELECT @acount:= 0) AS acount,add_qot1 where  id1='$bid' ";
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$rowCount = 24;
while($rk=mysqli_fetch_array($t)){

$objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, $rk['sno']);
$objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $rk['desc1']);
$objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCount, $rk['hsn']);
$objPHPExcel->getActiveSheet()->setCellValue('H'.$rowCount, $rk['uom']);
$objPHPExcel->getActiveSheet()->setCellValue('I'.$rowCount, $rk['qty']);
$objPHPExcel->getActiveSheet()->setCellValue('J'.$rowCount, $rk['rate']);
$objPHPExcel->getActiveSheet()->setCellValue('K'.$rowCount, $rk['total']);
$rowCount++;
}
$i=1;
$gst_amnt1=0;
$tx=0;
$t=mysqli_query($link,$aa); 
while($rows = mysqli_fetch_assoc($t)){$result[]=$rows;}
$finalrowvalue=0;

$noofrecords=sizeof($result);
/*foreach($result as $key => $values) 
{
$finalrowvalue=$rowcount;    
 //start of printing column names as names of MySQL fields 
 $column = 'A';
 foreach($values as $value) 
 {
 echo $value.'<br>';
 echo $column.$rowCount.'<br>';
 
//$objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $value);
 $column++; 
 } 
 
}*/
$objWorksheet = $objPHPExcel->getActiveSheet();
$row_id  = 24+$noofrecords; // deleted row id
$number_rows = 15-($noofrecords); // 
$rowcounts=43;
include_once('dbconnection/connection.php');
 $ak="select @acount:=@acount+1 sno,hsn,gst,sum((base_amt+serv_amt)) as total,sum(gst_amnt) as gst_amnt from (SELECT @acount:= 0) AS acount,add_knqot1 where id1='$bid'   group by hsn,gst order by sno";
$tk=mysqli_query($link,$ak);
$finalamnt=0;
while($rkk=mysqli_fetch_array($tk)){
$objPHPExcel->getActiveSheet()->setCellValue('A'.$rowcounts, $rkk['sno']);
$objPHPExcel->getActiveSheet()->setCellValue('B'.$rowcounts, $rkk['hsn']);
$objPHPExcel->getActiveSheet()->setCellValue('c'.$rowcounts, $rkk['total']);
$objPHPExcel->getActiveSheet()->setCellValue('E'.$rowcounts, $rkk['gst']/2);
$objPHPExcel->getActiveSheet()->setCellValue('F'.$rowcounts, $rkk['gst_amnt']/2);
$objPHPExcel->getActiveSheet()->setCellValue('G'.$rowcounts, $rkk['gst']/2);
$objPHPExcel->getActiveSheet()->setCellValue('H'.$rowcounts, $rkk['gst_amnt']/2);
$objPHPExcel->getActiveSheet()->setCellValue('K'.$rowcounts, $rkk['gst_amnt']);
$finalamnt=$finalamnt+$rkk['total']+$rkk['gst_amnt'];
$rowcounts++;
}
$objPHPExcel->getActiveSheet()->setCellValue('D50', numberTowords2($finalamnt));

if ($objWorksheet != NULL) {
    
    //if ($objWorksheet->removeRow($row_id, $number_rows)) 
    {
        
//$aa="select count(base_amt) as counti  ,sum(base_amt) as base ,sum(serv_amt) as serv,sum(base_amt+serv_amt) as total,sum(gst_amnt) as gst from add_qot1 where  id1='$bid' ";
 
//$t=mysqli_query($link,$aa) or die(mysqli_error($link));

//while($t1=mysqli_fetch_array($t)){
  
//$objPHPExcel->getActiveSheet()->setCellValue('J'.$ROWID,$t1['base']);
//$objPHPExcel->getActiveSheet()->setCellValue('K'.$ROWID,$t1['serv']);
//$objPHPExcel->getActiveSheet()->setCellValue('L'.$ROWID,$t1['total']);
//$objPHPExcel->getActiveSheet()->setCellValue('M'.$ROWID,$t1['gst']);
//$objPHPExcel->getActiveSheet()->setCellValue('M'.$ROWID1,$t1['gst']/2);
//$objPHPExcel->getActiveSheet()->setCellValue('M'.$ROWID2,$t1['gst']/2);
//$objPHPExcel->getActiveSheet()->setCellValue('M'.$ROWID3,0);
//$objPHPExcel->getActiveSheet()->setCellValue('M'.$ROWID4,$t1['gst']);
//$objPHPExcel->getActiveSheet()->setCellValue('M'.$ROWID5,round($t1['gst']+$t1['base']+$t1['serv']));
//$objPHPExcel->getActiveSheet()->setCellValue('A'.$ROWID6,numberTowords2(round($t1['gst']+$t1['base']+$t1['serv'])));

//}

}

}




$objPHPExcelWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,$outputFileType);
$objPHPExcelWriter->save('php://output');

?>