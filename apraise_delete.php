<?php
include('dbconnection/connection.php');
$state=$_GET['state'];

    if($state=='AP'){
        $qotbill ='qot_bill';
       
    }
    if($state=='TG'){
        $qotbill ='tgqot_bill'; 
    }
    if($state=='TN'){
      $qotbill ='tnqot_bill';
    
    }
    if($state=='KL'){
        $qotbill ='klqot_bill';
      
    }
    if($state=='KN'){
      $qotbill ='knqot_bill';
          
    }
    if($state=='OD'){
      $qotbill ='odqot_bill';
    }
    
$id=$_REQUEST['id'];
$r=mysqli_query($link,"delete from ".$qotbill." where id='$id'") or die(mysqli_error($link));
if($r){
    header('Location:bill_list2.php?state='.$state.'');
}
?>