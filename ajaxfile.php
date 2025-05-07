<?php
if(!empty($_POST["username"])) {
include('dbconnection/connection.php');
$state=$_GET['state'];
$qotbill ='qot_bill';
$qotbill ='tgqot_bill'; 
$qotbill ='tnqot_bill';
$qotbill ='klqot_bill';
$qotbill ='knqot_bill';
$qotbill ='odqot_bill';
// if($state=='AP'){
//     $qotbill ='qot_bill';
   
// }
// if($state=='TG'){
//     $qotbill ='tgqot_bill'; 
// }
// if($state=='TN'){
//   $qotbill ='tnqot_bill';

// }
// if($state=='KL'){
//     $qotbill ='klqot_bill';
  
// }
// if($state=='KN'){
//   $qotbill ='knqot_bill';
      
// }
// if($state=='OD'){
//   $qotbill ='odqot_bill';
// }



   $query = "SELECT COUNT(*) as count FROM ".$qotbill." WHERE inv_num='" . $_POST["username"] . "'";
  $user_count = mysqli_query($link,$query) or die(mysqli_error($link));
  $c=mysqli_fetch_assoc($user_count);
  $m= $c['count'];
  if($m > 0){
      $response = "<span style='color: red;'>Inv No already Exist.</span>";
  }else{
      $response = "<span style='color: green;'>Inv No Available.</span>";
  }
}
echo $response;
   die;
//}
?>