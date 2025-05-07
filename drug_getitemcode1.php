<?php
//include("config.php");
include("dbconnection/connection.php");
$emp_id = $_REQUEST['emp_id'];
 $cc="select mdescription,hsncode,gst,umo,urate,cap,service_fee,service_code from ritems  where id='$emp_id' ";

$query =  mysqli_query($link,$cc);
if($query)
{
	$row = mysqli_fetch_array($query);
	$mdescription=$row[0];
	$hsncode=$row[1];
	$gst=$row[2];
	$umo=$row['umo'];
	$urate=$row[4];
	$cap=$row['cap'];
	$service_fee=$row['service_fee'];
		$service_code=$row['service_code'];
		$service_code1=$row['service_code'];
}	

$data = "#".$mdescription."#".$hsncode."#".$gst."#".$umo."#".$urate."#".$emp_id."#".$cap."#".$service_fee."#".$service_code."#".$service_code1;
	echo $data;

?>