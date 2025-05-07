<?php
include('dbconnection/connection.php');
$state=$_GET['state'];

if($state=='AP'){
  $qottable ='add_qot';
  $qotbill ='qot_bill';
     
}
elseif($state=='TG'){
  $qottable ='add_tgqot';
  $qotbill ='tgqot_bill';

 
}
 elseif($state=='TN'){
  $qottable ='add_tnqot';
  $qotbill ='tnqot_bill';

}
elseif($state=='KL'){
  $qottable ='add_klqot';
  $qotbill ='klqot_bill';
  
}
else if($state=='KN'){
  $qottable ='add_knqot';
  $qotbill ='knqot_bill';
      
}
elseif($state=='OD'){
  $qottable ='add_odqot';
  $qotbill ='odqot_bill';
}
$rid=$_REQUEST['id1'];
$q=$_REQUEST['q'];
$k=mysqli_query($link,"update ".$qotbill." set status='Un Paid' where id='$rid'") or die(mysqli_error($link));
	$s=mysqli_query($link,"update ".$qottable." set status='Payment Pending' where quet_num='$q'");
if($k){
        	print "<script>";
			print "alert('Invoice Sucessfully Updated');";
			print "self.location='bill_list31.php?state=$state';";
			print "</script>";
}

?>