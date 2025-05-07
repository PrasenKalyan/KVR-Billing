<?php
include('dbconnection/connection.php');
$id=$_REQUEST['id'];
$r=mysqli_query($link,"delete from tgqot_bill where id='$id'") or die(mysqli_error($link));
if($r){
    header('Location:tgbill_list2.php');
}
?>