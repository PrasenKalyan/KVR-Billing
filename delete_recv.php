<?php
include('dbconnection/connection.php');

$state=$_GET['state'];

if($state=='AP'){

	$payment = 'payment';   
}
elseif($state=='TG'){
	$payment = 'tgpayment';


 
}
 elseif($state=='TN'){
  $payment = 'tnpayment';
}
elseif($state=='KL'){
	$payment = 'klpayment'; 
}
else if($state=='KN'){
  $payment = 'knpayment';	  
}
elseif($state=='OD'){
  $payment = 'odpayment';	
}
$id=$_REQUEST['id'];
$x="delete from ".$payment." where id='$id'";
//exit;
$k=mysqli_query($link,$x) or die(mysqli_error($link));
if($k){
	print "<script>";
	print "alert('Record Deleted Sucessfully');";
	print "self.location='bill_list4.php?state=$state';";
	print "</script>";
	
}
mysqli_close($link);
?>