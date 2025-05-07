<?php
include('dbconnection/connection.php');
$id=$_REQUEST['id'];
$r=mysqli_query($link,"delete from odqot_bill where id='$id'") or die(mysqli_error($link));
if($r){
    header('Location:odbill_list2.php');
}
?>