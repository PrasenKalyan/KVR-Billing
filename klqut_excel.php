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
require_once 'PHPExcel-1.8/Classes/PHPExcel.php';
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
include('dbconnection/connection.php');
$result = array();
$finalresults=array();
$outputFileType = 'Excel2007';
$objPHPExcel = new PHPExcel();

$objPHPExcel = PHPExcel_IOFactory::load("klqutoationtemplate.xlsx");
$id=$_GET['id'];
$sq=mysqli_query($link,"select * from add_klqot where id='$id'");
$r=mysqli_fetch_array($sq);
$store_code=$r['store_code'];
$quet_num=$r['quet_num'];
$falt_date=date('d-m-Y',strtotime($r['falt_date']));
$falt_no=$r['falt_no'];
$falt_desc=$r['falt_desc'];
$bid=$r['id'];
include('dbconnection/connection1.php');
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
 $statefull='Andhra Pradesh';
 else if($statefull=='KL')
 $statefull='KERALA';
 $sqy=mysqli_query($link,"select * from organization where id='1'");
			$r2y=mysqli_fetch_array($sqy);
			$vendor_name1=$r2y['vendor_name2'];
			$ap_address=$r2y['kl_address'];
			$gstno=$r2y['kl_gst'];
		$objPHPExcel->getActiveSheet()->setTitle('Quotation');		
$objPHPExcel->getActiveSheet()->setCellValue('c2', $vendor_name1);	
$objPHPExcel->getActiveSheet()->setCellValue('c3', $ap_address);	
$objPHPExcel->getActiveSheet()->setCellValue('c4', $statefull);
$objPHPExcel->getActiveSheet()->setCellValue('A5','Vendor GSTIN: '.$gstno);
$objPHPExcel->getActiveSheet()->setCellValue('G5', 'Vendor State Code :'.$state_code);	
$objPHPExcel->getActiveSheet()->setCellValue('A6', 'Quotation No: '.$r['quet_num']);
$objPHPExcel->getActiveSheet()->setCellValue('G6', 'Quotation Date: '.date('d-m-Y',strtotime($r['inv_date'])));
$objPHPExcel->getActiveSheet()->setCellValue('A7', 'FM Fault No: '.$falt_no);
$objPHPExcel->getActiveSheet()->setCellValue('G7', 'FM Fault Date: '.$falt_date);
$objPHPExcel->getActiveSheet()->setCellValue('A8', 'Fault Description: '.$falt_desc);
$objPHPExcel->getActiveSheet()->setCellValue('c10', $r1['company_name']);
$objPHPExcel->getActiveSheet()->setCellValue('c11', $r1['address']);
$objPHPExcel->getActiveSheet()->setCellValue('c12', $statefull);
$objPHPExcel->getActiveSheet()->setCellValue('c13', $r1['gst_in']);
$objPHPExcel->getActiveSheet()->setCellValue('c15', $ship_name);
$objPHPExcel->getActiveSheet()->setCellValue('c16', $store_name.','.$addr1);
$objPHPExcel->getActiveSheet()->setCellValue('c17', $ship_state);
$objPHPExcel->getActiveSheet()->setCellValue('c18', $ship_gst);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=".$quet_num." ".$city." ".BSP.".xlsx");
header('Cache-Control: max-age=0');
include_once('dbconnection/connection.php');
	 $aa="select  @acount:=@acount+1 sno,hsn,serv_code,desc1,brand,model,qty,uom,rate,base_amt,serv_amt,(base_amt+serv_amt) as total,gst_amnt  from (SELECT @acount:= 0) AS acount,add_klqot1 where  id1='$bid' ";
 
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;
$gst_amnt1=0;
$tx=0;
while($rows = mysqli_fetch_assoc($t)){$result[]=$rows;}
$finalrowvalue=0;
$rowCount = 20;
$noofrecords=sizeof($result);
foreach($result as $key => $values) 
{
$finalrowvalue=$rowcount;    
 //start of printing column names as names of MySQL fields 
 $column = 'A';
 foreach($values as $value) 
 {
 //echo $value.'<br>';
 //echo $column.$rowCount.'<br>';
 
 $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $value);
 $column++; 
 } 
 $rowCount++;
}


$objWorksheet = $objPHPExcel->getActiveSheet();
$row_id  = 20+$noofrecords; // deleted row id
$number_rows = 51-$noofrecords; // number of rows count 

if ($objWorksheet != NULL) {
    
    if ($objWorksheet->removeRow($row_id, $number_rows)) {
        
$aa="select count(base_amt) as counti  ,sum(base_amt) as base ,sum(serv_amt) as serv,sum(base_amt+serv_amt) as total,sum(gst_amnt) as gst from add_klqot1 where  id1='$bid' ";
 
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$ROWID=$row_id;
$ROWID1=$row_id+1;
$ROWID2=$row_id+2;
$ROWID3=$row_id+3;
$ROWID4=$row_id+4;
$ROWID5=$row_id+5;
$ROWID6=$row_id+6;

 while($t1=mysqli_fetch_array($t)){
           
$objPHPExcel->getActiveSheet()->setCellValue('J'.$ROWID,$t1['base']);
$objPHPExcel->getActiveSheet()->setCellValue('K'.$ROWID,$t1['serv']);
$objPHPExcel->getActiveSheet()->setCellValue('L'.$ROWID,$t1['total']);
$objPHPExcel->getActiveSheet()->setCellValue('M'.$ROWID,$t1['gst']);
$objPHPExcel->getActiveSheet()->setCellValue('M'.$ROWID1,$t1['gst']/2);
$objPHPExcel->getActiveSheet()->setCellValue('M'.$ROWID2,$t1['gst']/2);
$objPHPExcel->getActiveSheet()->setCellValue('M'.$ROWID3,0);
$objPHPExcel->getActiveSheet()->setCellValue('M'.$ROWID4,$t1['gst']);
$objPHPExcel->getActiveSheet()->setCellValue('M'.$ROWID5,round($t1['gst']+$t1['base']+$t1['serv']));
$objPHPExcel->getActiveSheet()->setCellValue('A'.$ROWID6,numberTowords2(round($t1['gst']+$t1['base']+$t1['serv'])));


}
        
        
$objPHPExcelWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,$outputFileType);
$objPHPExcelWriter->save('php://output');
}

}


?>