<?php 
include('dbconnection/connection.php');
$id=$_GET['id'];
											
											$transfer='0.00';
											
											
												$confirm="Cancel";
											
											  //$dd="update tgrequest_amnt set confirm='$confirm',approve_amnt='$transfer',gstamt='0.00',req_amnt='0.00',req_date='0000-00-00',transfer='0.00',ac_det='',gsttype='',
										//	  status='Cancel' where quet_num='$id'";
										$dd="delete from tgrequest_amnt where quet_num='$id'";
											$ssq=mysqli_query($link,$dd) or die(mysqli_error($link));
											
											//exit;
											 $dd1="update add_tgqot set adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_date='0000-00-00',adv_date1='0000-00-00',adv_date2='0000-00-00',
											 ac_det1='',ac_det2='',ac_det3='', gst_type='', gst_type1='',bal='',status='work to be started', gst_type2='',gst_amount='0.00',gst_amount1='0.00',gst_amount2='0.00' where quet_num='$id'";
											$ssq1=mysqli_query($link,$dd1) or die(mysqli_query($link));
											
											print "<script>";
			print "alert('Amount Approved Cancel');";
			print "self.location='tgreq_list.php';";
			print "</script>";
										?>
									