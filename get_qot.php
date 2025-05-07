<?php
include_once('dbconnection/connection.php');
echo $q=$_GET["q"];


if($q=="AP"){
$sql="SELECT quet_num  FROM `add_qot` ";
}else if($q=="TG"){
    $sql="SELECT quet_num  FROM `add_tgqot` ";
}else if($q=="KL"){
    $sql="SELECT quet_num  FROM `add_klqot` ";
}else if($q=="TN"){
    $sql="SELECT quet_num  FROM `add_tnqot` ";
}
else if($q=="KN"){
    $sql="SELECT quet_num  FROM `add_knqot` ";
}


$result = mysqli_query($link,$sql) or die(mysqli_error($link));



echo "<select  class='form-control' onchange='showH(this.value)' style='width:180px; height:20px;'>";
 echo "<option value=''>Select Quotation</option>";
while($row = mysqli_fetch_array($result))
  {
  
  echo "<option value='".$row['quet_num']."'>" . $row['quet_num'] . "</option>";
   
  }
  // echo "<option value='Any'>" .Any. "</option>";
echo "</select>";
echo ":" . $status;

//mysql_close($con);


?> 

  
