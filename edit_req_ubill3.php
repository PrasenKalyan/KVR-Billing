<?php
include('dbconnection/connection.php');
$rid=$_REQUEST['id1'];
$q=$_REQUEST['q'];
$k=mysqli_query($link,"update qot_bill set status='Un Paid' where id='$rid'") or die(mysqli_error($link));
	$s=mysqli_query($link,"update qot_bill set status='Payment Pending' where quet_num='$q'");
if($k){
        	print "<script>";
			print "alert('Invoice Sucessfully Updated');";
			print "self.location='bill_list31.php';";
			print "</script>";
}

?>
