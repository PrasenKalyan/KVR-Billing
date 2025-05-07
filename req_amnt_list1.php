<?php 
include('dbconnection/connection.php');
 $id=$_GET['id'];
	$state=$_GET['state'];

	if($state=='AP'){
		$qottable ='add_qot';
		$request_amnt ='request_amnt';
        $stn='ap';
	 
	}
	elseif($state=='TG'){
		$qottable ='add_tgqot';
		$qottable1 ='add_tgqot1';
		$request_amnt ='tgrequest_amnt';
        $stn='tg';

	 
	}
	 elseif($state=='TN'){
	  $qottable ='add_tnqot';
	  $qottable1 ='add_tnqot1';
	  $request_amnt ='tnrequest_amnt';
      $stn='tn';

	
	}
	elseif($state=='KL'){
		$qottable ='add_klqot';
		$qottable1 ='add_klqot1';
		$request_amnt ='klrequest_amnt';
        $stn='kl';

	
	  
	}
	else if($state=='KN'){
	  $qottable ='add_knqot';
	  $qottable1 ='add_knqot1';
	  $request_amnt ='knrequest_amnt';
      $stn='kn';

	
	
	}
	elseif($state=='OD'){
	  $qottable ='add_odqot';
	  $qottable1 ='add_odqot1';
	  $request_amnt ='odrequest_amnt';	
      $stn='od';

	}
				/*  $str_arr = explode (",", $id);  
				  $array=explode(",",$id);


foreach($array as $value)
{

    $data=explode(":",$value);

       $id=$data[0];
*/
			 if($id!=''){
						$sq=mysqli_query($link,"select * from ".$request_amnt." where id='$id'");
						$r=mysqli_fetch_array($sq);
						 $ac=$r['ac_det'];
											
											$transfer=$r['req_amnt'];
											$state=$r['state'];
											$qt_no=$r['quet_num'];
											$transfer_date=date('Y-m-d');
										
										
											
												$sq=mysqli_query($link,"select * from  ".$qottable." where where quet_num='$qt_no' ");
												$r2=mysqli_fetch_array($sq);
												$req_amnt_settled1=$r2['req_amnt_settled'];
												$req_amnt_settled=$req_amnt_settled1+$transfer;
											
											$uy="update ".$qottable." set req_amnt_settled='$req_amnt_settled',status='Document Required' where quet_num='$qt_no'";
											$sq=mysqli_query($link,$uy) or die(mysqli_error($link));
																		
				
    									 $kk="update ".$request_amnt." set transfer='$transfer',transfer_date='$transfer_date',status='Amount Transferred' where id='$id'";
									//	exit;
											$ssq=mysqli_query($link,$kk) or die(mysqli_error($link));
											
				 }
//}							
											
											
											
									
											
												print "<script>";
			print "alert('Amount Transferred Successfully');";
			print "self.location='req_list1.php?state=$state';";
			print "</script>";
										?>
									