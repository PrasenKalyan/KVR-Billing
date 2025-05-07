<?php //include('config.php');

include('dbconnection/connection.php');
if(isset($_POST['submit'])){
$mdesc=$_POST['mdesc'];	
$umo=$_POST['umo'];	
$hsn=$_POST['hsn'];
$urate=$_POST['urate'];	
$gst=$_POST['gst'];
$user=$_POST['user'];
$Product_id=$_POST['Product_id'];
$cap=$_POST['cap'];
$s_fee=$_POST['s_fee'];
$s_code=$_POST['s_code'];	
  
	$sq=mysqli_query($link,"INSERT INTO `ritems`(`mdescription`, `umo`, `hsncode`, `urate`, `gst`, 
	`user`,product_code,cap,service_fee,service_code)
	 VALUES ('$mdesc', '$umo', '$hsn', '$urate', '$gst', '$user','$Product_id','$cap','$s_fee','$s_code')");
	
	if($sq){
	print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='uploaditems_list.php';";
	print "</script>";

}
}




if(isset($_POST['update'])){
	$id=$_POST['id1'];
	$mdesc=$_POST['mdesc'];	
$umo=$_POST['umo'];	
$hsn=$_POST['hsn'];
$urate=$_POST['urate'];	
$gst=$_POST['gst'];
$user=$_POST['user'];
$Product_id=$_POST['Product_id'];
$cap=$_POST['cap'];
$s_fee=$_POST['s_fee'];
$s_code=$_POST['s_code'];		
	$sq=mysqli_query($link,"update  `ritems` set `mdescription`='$mdesc', `umo`='$umo', `hsncode`='$hsn',
	 `urate`='$urate', `gst`='$gst', `user`='$user' ,product_code='$Product_id',cap='$cap'
	 ,service_fee='$s_fee',service_code='$s_code' where id='$id'");
	
	if($sq){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='uploaditems_list.php';";
	print "</script>";
	}
}

?>
