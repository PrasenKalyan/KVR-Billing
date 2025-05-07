<?php
include('dbconnection/connection.php');
$id=$_GET['id'];
$id1=$_GET['id1'];
$qry="delete from add_klqot1 where id='$id'";
 $rs= mysqli_query($link, $qry) or die(mysqli_error($link));
if($rs){
	print "<script>";
	print "alert('Record Deleted Sucessfully');";
	print "self.location='edit_klqot.php?id=$id1';";
	print "</script>";
	
}
mysqli_close($link);
?>