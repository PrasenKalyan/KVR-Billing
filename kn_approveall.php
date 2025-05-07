<?php
include('dbconnection/connection.php');
$data = $_POST['data'];

  // here i would like use foreach:

  foreach($data as $d){
     $quetnum = explode("::", $d); 
     $qotnum=$quetnum[0];
     $amnt=$quetnum[1];
    $sql=mysqli_query($link,"update knrequest_amnt set approve_amnt='$amnt' ,confirm='Yes' where quet_num = '$qotnum'") or die(mysqli_error($link));
     $sql=mysqli_query($link,"update add_knqot set status='Approved Amount' where quet_num = '$qotnum'") or die(mysqli_error($link));
  }
  
?> 

