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
include('dbconnection/connection.php');
$result = array();
$finalresults=array();
$id=$_GET['id'];
$sq=mysqli_query($link,"select * from add_qot where quet_num='$id'");
$r=mysqli_fetch_array($sq);
$store_code=$r['store_code'];
$quet_num=$r['quet_num'];
$falt_date=date('d-m-Y',strtotime($r['falt_date']));
$falt_no=$r['falt_no'];
$falt_desc=$r['falt_desc'];
$rono=$r['ro_no'];
$rodate=$r['ro_date'];
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
 $store_type=$r1['format_type'];
 $city=$r1['city'];
 if($statefull=='TG')
 $statefull='Telangana';
 else if($statefull=='AP')
 $statefull='Andhra Pradesh';
 $sqy=mysqli_query($link,"select * from organization where id='1'");
			$r2y=mysqli_fetch_array($sqy);
			$vendor_name1=$r2y['vendor_name'];
			$ap_address=$r2y['ap_address'];
			$gstno=$r2y['ap_gst'];
	//	$objPHPExcel->getActiveSheet()->setTitle('Quotation');	
?>

<html>
    <body>
     <?php    ob_start();?>
    <table  width="100%" border ='1'  cellpadding="0" cellspacing='0'>

<tr><td ><b>Vendor Name:</b><?php echo $vendor_name1?></td>
<td ><b>Customer Name:</b><?php echo $r1['company_name'];?></td>
</tr>
<tr>
    
  <td ><b>State:</b><?php echo $statefull;?></td>
</tr>

</table>
<table  border ='1' style="width:90%" align="center"  cellpadding="0" cellspacing='0'>   

        <tr>
<th colspan="1" style="width:5%;" >SNo</th>
<th  style="width:10%;"  colspan="1">Store Name</th>
<th style="width:10%;" colspan="1">Store Code</th>


<th style="width:10%;" colspan="1">Store Type</th>
<th style="width:10%;" colspan="1">Location</th>
<th style="width:30%;" colspan="2">Fault Description</th>
<th style="width:10%;" colspan="1">RO Number</th>
<th style="width:10%;" colspan="1">RO Date</th>
<th style="width:10%;" colspan="1">Period of Service</th>
<th style="width:10%;" colspan="1">HSN/SAC Code</th>
<th style="width:10%;" colspan="1">GST Rate</th>
<th style="width:30%;" colspan="2">Material Description</th>
<th style="width:10%;" colspan="1">Unit Rate</th>
<th style="width:10%;" colspan="1">UOM</th>
<th style="width:10%;" colspan="1">Qty</th>
<th style="width:10%;" colspan="1">Base Amnt</th>
</tr>
<?php 
include_once('dbconnection/connection.php');
 $aa="select  @acount:=@acount+1 sno,hsn,serv_code,desc1,brand,model,qty,uom,rate,base_amt,serv_amt,(base_amt+serv_amt) as total,gst_amnt  from (SELECT @acount:= 0) AS acount,add_qot1 where  id1='$bid' ";
// $aa="select  @acount:=@acount+1 sno,desc1,hsn,uom,qty,rate,base_amt from (SELECT @acount:= 0) AS acount,add_qot1 where  id1='$bid' ";
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
while($rk=mysqli_fetch_array($t)){?>
 <tr>
<td colspan="1" style="width:5%;" ><?php echo $rk['sno'];?></td>
<td  style="width:10%;"  colspan="1"><?php echo $store_name;?></td>
<td style="width:10%;" colspan="1"><?php echo $store_code;?></td>


<td style="width:10%;" colspan="1"><?php echo $store_type;?></td>
<td style="width:10%;" colspan="1"><?php echo $city;?></td>
<td style="width:30%;" colspan="2"><?php echo $falt_desc;?></td>
<td style="width:10%;" colspan="1"><?php echo $rono;?></td>
<td style="width:10%;" colspan="1"><?php echo $rodate;?></td>
<td style="width:10%;" colspan="1"><?php ?></td>
<td style="width:10%;" colspan="1"><?php echo $rk['hsn'];?></td>
<td style="width:10%;" colspan="1"><?php ?></td>
<td style="width:30%;" colspan="2"><?php echo $rk['desc1'];?></td>
<td style="width:10%;" colspan="1"><?php echo $rk['uom'];?></td>
<td style="width:10%;" colspan="1"><?php echo $rk['qty'];?></td>
<td style="width:10%;" colspan="1"><?php echo $rk['rate'];?></td>
<td style="width:10%;" colspan="1"><?php echo $rk['base_amt'];?></td>

</tr>

<?php }
?>

</table>
</body>
</html>
<?php
 $qtno=$id."_breakage.pdf";
    $body=ob_get_clean();
$body=iconv("UTF-8","UTF-8//IGNORE",$body);

include('mpdf/mpdf.php');
$mpdf=new \mPDF('c','A4','','',10,10,10,10,0,0);
$mpdf->writeHTML($body);
$mpdf->Output($qtno,'F');
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo  "<script type=\"text/javascript\"> 
 

   location.href = 'download.php?qt=$qtno';
   setTimeout(\"DoTheRedirect('bill_list31.php')\",parseInt(2*1000));
function DoTheRedirect(url) { window.location=url; }

</script>";
	
?>