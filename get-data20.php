<?php
include('dbconnection/connection.php');
?>

<?php
$q=$_GET["q"];
$state=$_GET["state"];
if($state=="AP"){
	$sql="SELECT *  FROM add_qot WHERE quet_num = '$q'";
	$result = mysqli_query($link,$sql) or die(mysqli_error($link));
	$r1= mysqli_fetch_array($result);
	$status=$r1['status'];
	
}
elseif($state=="TG"){
	$sql="SELECT *  FROM add_tgqot WHERE quet_num = '$q'";
	$result = mysqli_query($link,$sql) or die(mysqli_error($link));
	$r2= mysqli_fetch_array($result);
	$status=$r2['status'];
	
}elseif($state=="KL"){
	$sql="SELECT *  FROM add_klqot WHERE quet_num = '$q'";
	$result = mysqli_query($link,$sql) or die(mysqli_error($link));
	$r3= mysqli_fetch_array($result);
	$status=$r3['status'];
	
}elseif($state=="TN"){
	$sql="SELECT *  FROM add_tnqot WHERE quet_num = '$q'";
	$result = mysqli_query($link,$sql) or die(mysqli_error($link));
	$r4= mysqli_fetch_array($result);
	$status=$r4['status'];
	
}
elseif($state=="KN"){
	$sql="SELECT *  FROM add_knqot WHERE quet_num = '$q'";
	$result = mysqli_query($link,$sql) or die(mysqli_error($link));
	$r3= mysqli_fetch_array($result);
	$status=$r3['status'];
	
}
else{
exit;
}



 
  
   //echo ":" . $row['city'];
   echo ":" . $status;
   
   
   
   
   
  

?>   











