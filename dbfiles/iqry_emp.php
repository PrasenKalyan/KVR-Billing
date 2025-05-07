<?php

/* =========================================================================================== */
#### insert,edit,update operations for add Employee Details and  display form validations ####
#### Author	: 	K Srinivasa Rao						####

/* =========================================================================================== */
//to insert data into testdetails table.if the is no errrors in form then insert data into database. 
include '../dbconnection/connection.php';



//to update data into testdetails table.if the is no errrors in form then insert data into database. 
if (isset($_POST['submit'])) {
    //reading form data
    //$empid=trim($_POST['empid']);
    $emp_name = trim($_POST['empname']);
    $dob = trim($_POST['dob']);
    $gender = trim($_POST['gender']);
    $maritalstatus = trim($_POST['maritalstatus']);
    $contactno = trim($_POST['conno']);
    $alternateno = trim($_POST['aconno']);
    $adharcardno = trim($_POST['adhar']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $qualification = trim($_POST['qua']);
    $experience = trim($_POST['exp']);
    $DOJ = trim($_POST['doj']);
    $designation = trim($_POST['des']);
    $ESI_NO = trim($_POST['esi']);
    $PFNO = trim($_POST['pf']);
    $strcd = trim($_POST['strcd']);
    //$photo= trim($_POST['img1']);
    $iname=$_FILES['empfile']['name'];
   if($iname!= ""){
				// echo "hi";
				 
	$code = md5(rand());
	 //$date=date("Y");
	$iname =$date."-".$_FILES['empfile']['name'];
	$tmp = $_FILES['empfile']['tmp_name'];
	
	 $dir = "photos";
		       $destination =  $dir . '/' . $iname;
		         move_uploaded_file($tmp, $destination);
	//move_uploaded_file($tmp,"../staff/" . $code.$_FILES["sfile"]["name"]);
	 $fileName15 =$date."-".$_FILES['empfile']['name'];
	//$iname = $code.$_FILES["sfile"]["name"];
	$fileName15 = ($fileName15);
	}else{
	 $fileName15 = ($image1);
	}
	$emp_email = trim(($_POST['email']));
	$username = trim(($_POST['uname']));
	$password = trim(($_POST['pwd']));
   $user=trim($_POST['user']);
   
echo $x="insert into employee(emp_name,DOB,gender,maritalstatus,contactno,alternateno,adharcardno,address,city,state,qualification,experience,
 DOJ,designation,ESI_NO,PFNO,photo,emp_email,username,employeeid,password,user,strcd) 
 values('$emp_name','$dob','$gender','$maritalstatus','$contactno','$alternateno','$adharcardno','$address','$city','$state','$qualification','$experience',
 '$DOJ','$designation','$ESI_NO','$PFNO',' $fileName15','$emp_email','$username','$username','$password','$user','$strcd')";
 $res = mysqli_query($link, $x) or die("could not connected" . mysqli_error($link));
 //if the form variables are not empty then update data into database
  
      // $sql = "update bedtype set BEDTYPE='$bname',AUTH_BY='$user',REMARKS='$remarks' where BEDTYPE_ID='$id'";
   // $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

    if ($res) {

//if it is successfully update then display alert box in form
       print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='addemployee.php';";
        print "</script>";
    }
   
            
   

}


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

