<?php
include('dbconnection/connection.php');
$id=$_GET['id'];
$id1=$_GET['id1'];
	$state=$_GET['state'];

	if($state=='AP'){
		$qottable1 ='add_qot1';
       
	}
	elseif($state=='TG'){
		$qottable1 ='add_tgqot1';

	 
	}
	 elseif($state=='TN'){
	  $qottable1 ='add_tnqot1';
	
	}
	elseif($state=='KL'){
		$qottable1 ='add_klqot1';
	  
	}
	else if($state=='KN'){
	  $qottable1 ='add_knqot1';
      	
	}
	elseif($state=='OD'){
	  $qottable1 ='add_odqot1';
	}
$qry="delete from ".$qottable1." where id='$id'";
 $rs= mysqli_query($link, $qry) or die(mysqli_error($link));
if($rs){
	print "<script>";
	print "alert('Record Deleted Sucessfully');";
	print "self.location='edit_qot.php?id=$id1%state=$state';";
	print "</script>";
	
}
mysqli_close($link);
?>