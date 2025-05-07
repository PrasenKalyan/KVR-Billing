<?php //include('config.php');
include('dbconnection/connection.php');

if(isset($_POST['update'])){
	  $id=$_POST['ids'];
	    $qt_no=$_POST['qt_no']; 
   // $inv_date=$_POST['inv_date'];
	//$store_code=$_POST['store_code'];
	
	$ses=$_POST['ses'];
	
$adv_amnt=$_POST['adv_amnt'];
$adv_amnt1=$_POST['adv_amnt1'];
$adv_amnt2=$_POST['adv_amnt2'];
$adv_amnt3=$_POST['adv_amnt3'];
$adv_amnt4=$_POST['adv_amnt4'];
$adv_date=$_POST['adv_date'];
$adv_date1=$_POST['adv_date1'];
$adv_date2=$_POST['adv_date2'];
$adv_date3=$_POST['adv_date3'];
$adv_date4=$_POST['adv_date4'];
$ac_num=$_POST['ac_num'];
$ac_name=$_POST['ac_name'];
$ifsc=$_POST['ifsc'];
$ac_det1=$_POST['ac_det1'];
$ac_det2=$_POST['ac_det2'];
$ac_det3=$_POST['ac_det3'];
$ac_det4=$_POST['ac_det4'];
$ac_det5=$_POST['ac_det5'];
$bal=$_POST['bal'];
$gst_type=$_POST['gst_type'];
$gst_type1=$_POST['gst_type1'];
$gst_type2=$_POST['gst_type2'];
$gst_type3=$_POST['gst_type3'];
$gst_type4=$_POST['gst_type4'];

$gst_amount=$_POST['gst_amount'];
$gst_amount1=$_POST['gst_amount1'];
$gst_amount2=$_POST['gst_amount2'];
$gst_amount3=$_POST['gst_amount3'];
$gst_amount4=$_POST['gst_amount4'];
$kl1=$_POST['kl1'];
$kl2=$_POST['kl2'];
$kl3=$_POST['kl3'];
$kl4=$_POST['kl4'];
$kl5=$_POST['kl5'];
//$ssq1=mysqli_query($link,"select * from add_klqot where id='$id'");
//$r=mysqli_fetch_array($ssq1);
//$ad=$r['adv_amnt'];
// $ad1=$r['adv_amnt1'];
//$ad2=$r['adv_amnt2'];
if($adv_amnt >0  or $gst_amount > 0){
	if($kl1!=''){ 
	}else{
	$ssq2=mysqli_query($link,"insert into odrequest_amnt(quet_num,req_amnt,req_date,user,state,ac_det,confirm,gstamt,gsttype)
	values('$qt_no','$adv_amnt','$adv_date','$ses','OD','$ac_det1','Pending','$gst_amount','$gst_type')");
	}
}
if($adv_amnt1 > 0 or  $gst_amount1 > 0){
	if($kl2!=''){ 
	}else{
	$ssq2=mysqli_query($link,"insert into odrequest_amnt(quet_num,req_amnt,req_date,user,state,ac_det,confirm,gstamt,gsttype)
	values('$qt_no','$adv_amnt1','$adv_date1','$ses','OD','$ac_det2','Pending','$gst_amount1','$gst_type1')");
	}
}
if($adv_amnt2 > 0 or $gst_amount2 >0){
	if($kl3!=''){ 
	}else{
	$ssq2=mysqli_query($link,"insert into odrequest_amnt(quet_num,req_amnt,req_date,user,state,ac_det,confirm,gstamt,gsttype)
	values('$qt_no','$adv_amnt2','$adv_date2','$ses','OD','$ac_det3','Pending','$gst_amount2','$gst_type2')");
}
	    
	}

if($adv_amnt3 > 0 or $gst_amount3 >0){
	if($kl4!=''){ 
	}else{
	$ssq2=mysqli_query($link,"insert into odrequest_amnt(quet_num,req_amnt,req_date,user,state,ac_det,confirm,gstamt,gsttype)
	values('$qt_no','$adv_amnt3','$adv_date3','$ses','OD','$ac_det4','Pending','$gst_amount3','$gst_type3')");
}
	    
	}
	
	
if($adv_amnt4 > 0 or $gst_amount4 >0){
	if($kl5!=''){ 
	}else{
	$ssq2=mysqli_query($link,"insert into odrequest_amnt(quet_num,req_amnt,req_date,user,state,ac_det,confirm,gstamt,gsttype)
	values('$qt_no','$adv_amnt4','$adv_date4','$ses','OD','$ac_det5','Pending','$gst_amount4','$gst_type4')");
}
	    
	}	
	







		    $v="update add_odqot set status='Document Required',
		 adv_amnt='$adv_amnt',adv_amnt1='$adv_amnt1',adv_amnt2='$adv_amnt2',adv_amnt3='$adv_amnt3',adv_amnt4='$adv_amnt4',adv_date='$adv_date',
		 adv_date1='$adv_date1',adv_date2='$adv_date2',adv_date3='$adv_date3',adv_date4='$adv_date4',ac_det1='$ac_det1',ac_det2='$ac_det2',ac_det3='$ac_det3',ac_det4='$ac_det4',ac_det5='$ac_det5',bal='$bal',
		 gst_type='$gst_type',gst_type1='$gst_type1',gst_type2='$gst_type2',gst_type3='$gst_type3',gst_type4='$gst_type4',gst_amount='$gst_amount',gst_amount1='$gst_amount1',
gst_amount2='$gst_amount2',gst_amount3='$gst_amount3',gst_amount4='$gst_amount4'		
	
	  where id='$id' ";
	
	//ro_no='$ro_no',ro_date='$ro_date', po_no='$po_no',po_date='$po_date',po_type='$po_type',status='$status',
	$sq=mysqli_query($link,$v) or die(mysqli_error($link));

	if($sq){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='odwtsqot_list.php';";
	print "</script>";

}
}



?>
