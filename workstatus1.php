
<?php
include('dbconnection/connection.php');
$rid=$_REQUEST['id'];
// $q=$_REQUEST['q'];
	$s=mysqli_query($link,"update add_klqot set wd ='cancel' where quet_num ='$rid'");
if($s){
        	print "<script>";
			print "alert('Status Sucessfully Updated');";
			print "self.location='klwtsqot_list.php';";
			print "</script>";
}

?>






