<?php
include_once('dbconnection/connection.php');
 $q= substr($_GET["q"],0,-2);
 $statetable=$_GET["statetable"];

if($q=='store_code')
$sql="SELECT distinct a.$q as value FROM $statetable a ;";
else
$sql="SELECT distinct a.$q as value FROM $statetable b inner join dpr a where b.store_code=a.store_code";
  // Query to collect records
$result = mysqli_query($link,$sql) or die(mysqli_error($link));
while ($row=mysqli_fetch_array($result)) {
 echo "<option value='".$row['value']."'>" . $row['value'] . "</option>";
   
  }
  // echo "<option value='Any'>" .Any. "</option>";

//mysql_close($con);


?> 

  
