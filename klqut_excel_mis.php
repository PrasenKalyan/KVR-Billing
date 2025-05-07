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

$objPHPExcel = PHPExcel_IOFactory::load("klmisciliniustemplate.xlsx");

		$objPHPExcel->getActiveSheet()->setTitle('Miscilinous');		
$id=$_GET['id'];
$sq=mysqli_query($link,"select * from add_klqot where id='$id'");
$r=mysqli_fetch_array($sq);
 $store_code=$r['store_code'];
$quet_num=$r['quet_num'];
include('dbconnection/connection.php');
$bid=$_GET['id'];
$loc=$_GET['loc'];
 $a="select * from dpr where store_code='$store_code'";
$ssq1=mysqli_query($link,$a);
$r1=mysqli_fetch_array($ssq1);
 $state_code=$r1['state_code'];
 $company_name1=$r1['company_name'];
 $addr1=$r1['ship_ddress'];
 $state1=$r1['state'];
  $format_type=$r1['format_type'];
 $city=$r1['city'];
 $gst_in1=$r1['gst_in'];
 $ship_name=$r1['ship_name'];
 $ship_state=$r1['ship_state'];
 $ship_gst=$r1['ship_gst'];
 $objPHPExcel->getActiveSheet()->setCellValue('B7', 'JYOTHI FACILITY MANAGEMENT PVT.LTD');
/*if(date('m') >= 03) {
   $d = date('Y-m-d', strtotime('+1 years'));
   $objPHPExcel->getActiveSheet()->setCellValue('B8', date('Y') .'-'.date('Y', strtotime($d)));
} else {
  $d = date('Y-m-d', strtotime('-1 years'));
  echo   date('Y', strtotime($d)).'-'.date('Y');
  $objPHPExcel->getActiveSheet()->setCellValue('B8',date('Y', strtotime($d)).'-'.date('Y'));
}*/
$m=date('m');
if($m > '03'){
$currentDate = date("Y-m-d");
 $dateOneYearAdded = strtotime(date("Y-m-d", strtotime($currentDate)) . " +1 year");
$ny=date('Y', $dateOneYearAdded);
$nyd= date('Y')."-".$ny;
}else{
     $currentDate = date("Y-m-d");
 $dateOneYearAdded = strtotime(date("Y-m-d", strtotime($currentDate)) . " -1 year");
 $ny=date('Y', $dateOneYearAdded);
 $nyd= $ny."-".date('Y');
}
 $objPHPExcel->getActiveSheet()->setCellValue('B8',$nyd);
$objPHPExcel->getActiveSheet()->setCellValue('B9','Kerala State');
$objPHPExcel->getActiveSheet()->setCellValue('B10',$format_type);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=Kerala Summary sheet Miscellenious ".$quet_num." ".date('d-m-Y').".xlsx");
header('Cache-Control: max-age=0');
include_once('dbconnection/connection.php');
$aa="select  @acount:=@acount+1 sno,'$city','$store_code',falt_no,falt_date,falt_desc,quet_num,'',tot_base,tot_ser,tot_gst,(tot_base+tot_ser+tot_gst) as total  from (SELECT @acount:= 0) AS acount,add_klqot where id='$id' ";
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
while($rows = mysqli_fetch_assoc($t)){$result[]=$rows;}
$rowCount = 12;
$noofrecords=sizeof($result);
foreach($result as $key => $values) 
{
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
$row_id  = 12+$noofrecords; // deleted row id
$number_rows = 50-$noofrecords; 

if ($objWorksheet != NULL) {
    
    if ($objWorksheet->removeRow($row_id, $number_rows)) {
$objPHPExcelWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,$outputFileType);
$objPHPExcelWriter->save('php://output');
}

}


?>