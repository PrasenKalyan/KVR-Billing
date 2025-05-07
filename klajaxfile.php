<?php
include('dbconnection/connection.php');
if(!empty($_POST["username"])) {
   $query = "SELECT COUNT(*) as count FROM klqot_bill WHERE inv_num='" . $_POST["username"] . "'";
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