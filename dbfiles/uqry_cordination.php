<?php

/* =========================================================================================== */
#### insert,edit,update operations for add Employee Details and  display form validations ####
#### Author	: 	K Srinivasa Rao						####

/* =========================================================================================== */
//to insert data into testdetails table.if the is no errrors in form then insert data into database. 
//include '../dbconnection/connection.php';



//to update data into testdetails table.if the is no errrors in form then insert data into database. 
if (isset($_POST['submit'])) {
    //reading form data
    $bname = trim($_POST['bname']);
    $acyear = trim($_POST['acyear']);
	$email=$_POST['email'];
	$billingto = trim(addslashes($_POST['billingto']));
	$shippingto = trim(addslashes($_POST['shippingto']));
   $user=trim($_POST['user']);
   $id=trim($_POST['id1']);
   $e1 = trim(addslashes($_POST['e1']));
   $e2 = trim(addslashes($_POST['e2']));
   $e3 = trim(addslashes($_POST['e3']));

 //$res = mysqli_query($link, "insert into acyear(year,user) values('$acyear','$user')") or die("could not connected" . mysqli_error());
 //if the form variables are not empty then update data into database
   
       $sql = "update coordination set name='$acyear',email='$email' where id='$id'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error($link));

    if ($res) {

//if it is successfully update then display alert box in form
       print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='coordination.php';";
        print "</script>";
    }
   
            
   

}else{
	
	$id=$_GET['id'];
	
	$sql = "select * from coordination where id='$id'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());
$t=mysqli_fetch_array($res);
	$acyear=$t['name'];
	$email=$t['email'];
	$id1=$t['id'];
	$billingto=$t['billingto'];
	$shippingto=$t['shippingto'];
	$e1 = trim(addslashes($t['e1']));
   $e2 = trim(addslashes($t['e2']));
   $e3 = trim(addslashes($t['e3']));
	
}


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
	
    $data = htmlspecialchars($data);
    return $data;
}

