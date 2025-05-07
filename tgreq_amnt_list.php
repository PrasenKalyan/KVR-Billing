<?php 
include('dbconnection/connection.php');
$id=$_GET['id'];

$k=mysqli_query($link,"select * from tgrequest_amnt where quet_num='$id'") or die(mysqli_error($link));
while($k1=mysqli_fetch_array($k)){
    $id1=$k1['id'];
    $amt=$k1['req_amnt']+$k1['gstamt'];
    
    	$confirm="Yes";
							  $dd="update tgrequest_amnt set confirm='$confirm',approve_amnt='$amt' where id='$id1'";
											$ssq=mysqli_query($link,$dd);
											
											
}
	mysqli_query($link,"update add_tgqot set status='Approved Amount' where quet_num='$id'") or die(mysqli_error($link));
											print "<script>";
			print "alert('Amount Approved Successfully');";
			print "self.location='tgreq_list.php';";
			print "</script>";
										?>
									