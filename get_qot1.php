<?php
include_once('dbconnection/connection.php');
echo $q=$_GET["q"];


if($q=="AP"){
$sql="SELECT DISTINCT status  FROM `add_qot` ";
}else if($q=="TG"){
    $sql="SELECT DISTINCT status  FROM `add_tgqot` ";
}else if($q=="KL"){
    $sql="SELECT DISTINCT status  FROM `add_klqot` ";
}else if($q=="TN"){
    $sql="SELECT DISTINCT status  FROM `add_tnqot` ";
}


$result = mysqli_query($link,$sql) or die(mysqli_error($link));



echo "<select  class='form-control' onchange='showH1(this.value)' style='width:180px; height:20px;'>";
 echo "<option value=''>Select statusupdate</option>";
while($row = mysqli_fetch_array($result))
  {
  
  echo "<option value='".$row['statusupdate']."'>" . $row['statusupdate'] . "</option>";
   
  }
  // echo "<option value='Any'>" .Any. "</option>";
echo "</select>";
echo ":" . $status;

//mysql_close($con);


?> 

  
