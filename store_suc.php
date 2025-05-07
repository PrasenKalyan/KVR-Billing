<?php //include('config.php');
include('dbconnection/connection.php');
include('dbconnection/connectionconcept.php');
if(isset($_POST['submit'])){

$state=$_POST['state'];	
$city=$_POST['city'];	
$format_type=$_POST['format_type'];
$store_code=$_POST['store_code'];	
$store_name=$_POST['store_name'];
$comp_name=$_POST['comp_name'];
$gst_in=$_POST['gst_in'];
$state_code=$_POST['state_code'];
$addr=$_POST['addr'];
$cordinator=$_POST['cordinator'];
$afm=$_POST['afm'];
$super=$_POST['super'];
$ship_name=$_POST['ship_name'];
$ship_state=$_POST['ship_state'];
$ship_gst=$_POST['ship_gst'];
$addr1=$_POST['addr1'];
$costcenter=$_POST['costcenter'];
	//include('dbconnection/connection1.php');
	$sql="INSERT INTO `dpr`( `state`, `city`, `format_type`, `store_code`, `store_name`, `company_name`,gst_in,state_code,address,superwisor,coordinator,
	afm,ship_ddress,ship_name,ship_state,ship_gst,costcenter)
	 VALUES ( '$state', '$city', '$format_type', '$store_code', '$store_name', '$comp_name','$gst_in',
	 '$state_code','$addr','$super','$cordinator','$afm','$addr1','$ship_name','$ship_state','$ship_gst','$costcenter')";

	 
	 
	 $servername = "localhost";
   $username = "a16673ai_payamath";
   $password = "Payamath@2016";
   $dbname = "a16673ai_jtechno";

    $servernameS = "localhost";
   $usernameS = "a16673ai_payamath";
   $passwordS = "Payamath@2016";
   $dbnameS = "a16673ai_jtechnoapp";

$conn=$link;
$connS=$link2;
   // Create connection
   //$conn = new mysqli($servername, $username, $password, $dbname);
  // $connS = new mysqli($servernameS, $usernameS, $passwordS, $dbnameS);

   // Check connection
  if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   if ($connS->connect_error) {
       die("Connection failed: " . $connS->connect_error);
   }

   //escape variables for security
  // $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  // $lname = mysqli_real_escape_string($conn, $_POST['lname']);

   //$sql = "INSERT INTO mytable (fname,lname) 
  // VALUES ('$fname','$lname')";

    if ($conn->query($sql) === TRUE) {
     echo "Successfully Saved";

    } else {
      echo "Error: Go back and Try Again ! " . $sql . "<br>" . $conn->error;
    }

    if ($connS->query($sql) === TRUE) {
     print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='store_list.php';";
	print "</script>";
    } else {
      echo "Error: Go back and Try Again ! " . $sql . "<br>" . $connS->error;
    }
    $conn->close();
    $connS->close();
	 
	 
	 
	
/*	if($sq){
	print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='store_list.php';";
	print "</script>";

}*/
}





if(isset($_POST['update'])){

	$id=$_POST['id'];
$state=$_POST['state'];	
$city=$_POST['city'];	
$format_type=$_POST['format_type'];
$store_code=$_POST['store_code'];	
$store_name=$_POST['store_name'];
$comp_name=$_POST['comp_name'];
$gst_in=$_POST['gst_in'];
$state_code=$_POST['state_code'];
$addr=$_POST['addr'];
$cordinator=$_POST['cordinator'];
$afm=$_POST['afm'];
$super=$_POST['super'];
$ship_name=$_POST['ship_name'];
$ship_state=$_POST['ship_state'];
$ship_gst=$_POST['ship_gst'];
$addr1=$_POST['addr1'];
$costcenter=$_POST['costcenter'];
  $a="update  `dpr` set `state`='$state', `city`='$city', `format_type`='$format_type',
	 `store_code`='$store_code', `store_name`='$store_name', `company_name`='$comp_name',address='$addr',state_code='$state_code',gst_in='$gst_in',
	 superwisor='$super',coordinator='$cordinator',afm='$afm',
	 ship_ddress='$addr1',ship_name='$ship_name',ship_state='$ship_state',ship_gst='$ship_gst',costcenter='$costcenter' where id='$id'";
	
/*	$sq=mysql_query($a,$dbh1);
	
	 $a1="update  `dpr` set `state`='$state', `city`='$city', `format_type`='$format_type',
	 `store_code`='$store_code', `store_name`='$store_name', `company_name`='$comp_name',address='$addr',state_code='$state_code',gst_in='$gst_in',
	 superwisor='$super',coordinator='$cordinator',afm='$afm',
	 ship_ddress='$addr1',ship_name='$ship_name',ship_state='$ship_state',ship_gst='$ship_gst' where id='$id'";
	
	$sq=mysql_query($a1,$dbh2);
	*/
	
	
$servername = "localhost";
   $username = "a16673ai_payamath";
   $password = "Payamath@2016";
   $dbname = "a16673ai_jfm2324";



   $servernameS = "conceptgrammarschool.com";
   $usernameS = "a16673ai_payamath";
   $passwordS = "Payamath@2016";
   $dbnameS = "a16673ai_jyothi";

   // Create connection
  // $conn = new mysqli($servername, $username, $password, $dbname);
 //  $connS = new mysqli($servernameS, $usernameS, $passwordS, $dbnameS);

$conn=$link;
$connS=$link2;
   // Check connection
  if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   if ($connS->connect_error) {
       die("Connection failed: " . $connS->connect_error);
   }

   //escape variables for security
  // $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  // $lname = mysqli_real_escape_string($conn, $_POST['lname']);

   //$sql = "INSERT INTO mytable (fname,lname) 
  // VALUES ('$fname','$lname')";

    if ($conn->query($a) === TRUE) {
     echo "Successfully Saved";

    } else {
      echo "Error: Go back and Try Again ! " . $sql . "<br>" . $conn->error;
    }

    if ($connS->query($a) === TRUE) {
     print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='store_list.php';";
	print "</script>";
    } else {
      echo "Error: Go back and Try Again ! " . $sql . "<br>" . $connS->error;
    }
    $conn->close();
    $connS->close();
	 

/*	if($sq){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='store_list.php';";
	print "</script>";
	}*/




}

?>
