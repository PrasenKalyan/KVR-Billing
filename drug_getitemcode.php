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
	$serv_amnt=$row['service_fee'];
	$serv_code=$row['service_code'];
}	

$data = "#".$mdescription."#".$hsncode."#".$gst."#".$umo."#".$urate."#".$cap."#".$serv_amnt."#".$serv_code."#".$emp_id;
	echo $data;

?>