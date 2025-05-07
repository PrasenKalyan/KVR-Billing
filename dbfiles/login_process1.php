<?php
///ob_start();
ini_set ('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'dbconnection/connection.php';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$myusername=addslashes($_POST['uname']);
$mypassword=addslashes($_POST['pwd']);
$password = md5($mypassword);
$sql = "SELECT user,pwd FROM admin_login WHERE user='$myusername'  and pwd='$password' ";
$result=mysqli_query($link,$sql) or die(mysqli_error($link));
$row=mysqli_fetch_array($result);
//$active=$row['active'];
 $count=mysqli_num_rows($result);
 $user=$row['user'];

if($count==1)
{
session_start();
$_SESSION['user']=$user;
//$_SESSION['ename1']=$empname;
header("location:dashboard.php");
//echo '<script type="text/javascript">
   //       window.location = "dashboard1.php"
     //</script>';
}
else
{
print "<script>";
	print "alert('Enter Wrong User Name or Password');";
	print "self.location='index.php';";
	print "</script>";

}
}
?>