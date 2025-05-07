<?php
include('dbconnection/connection1.php');
//require_once("config.php");
//header("Content-Type: application/vnd.ms-excel");
//header("Content-disposition: attachment; filename=marks_report_printexcel".date('d-m-Y').".xls");

header('Content-type: application/vnd.ms-excel');

// It will be called file.xls
header("Content-Disposition: attachment; filename=Attendence_Exel".date('d-m-Y').".xls");

header('Cache-Control: max-age=0');
//$objWriter->save('php://output');

 //$val4=$_REQUEST['loc'];
				         // $val6=$_REQUEST['d1'];
						//	$val5=date('Y-m-d',strtotime($val6));
						//	 $val8=$_REQUEST['d2'];
						//	 $val7=date('Y-m-d',strtotime($val8));
						//	$roll_type=$_REQUEST['type'];
$fdate1 = $_REQUEST['fdate'];
 
	$tdate1 = $_REQUEST['tdate'];
	$emp=$_REQUEST['emp'];
		function daysInMonth($year, $month) {
    return date("t", mktime (0,0,0,$month,1,$year));
}
$year  = date('Y',strtotime($tdate1));
$month = date('m',strtotime($tdate1));//"3";    // March

$tot= " ". daysInMonth($year, $month);
 $tot;	
  
  //$roll_type=$_REQUEST['type'];

//echo"<table border='1'><tr><th></th><th width='2%'>Location:</th><th>$val4</th><th >From Date:</th><th>$val5</th><th>Todate:</th><th>$val7</th></tr></table>";
echo"<table width='100%' border='1'><tr><th>S.No</th>
<th>Id Card</th>
<th>State</th>
<th>Contact No</th>";
 
							
							  // $fath=$row['fname'];
?>
                            


<?php 



 $strSQL2 = "SELECT  distinct date1 FROM  attendence 
						  where date1 between '$fdate1' and '$tdate1'   order by date1 ";
							
							
						 //$strSQL2 = "SELECT DISTINCT date2,month FROM  attendence where loc='$val4'  and date2 between '$val5' and '$val7' order by date2  ";

                              $cnt = mysqli_num_rows($link,$strSQL);
							 $res=mysqli_query($link,$strSQL2) ;
							 
	while($row=mysqli_fetch_array($res)){
	
								$date2=$row['date1'];
								//$mn=$row['month'];
						
								$orderdate = explode('-', $date2);
								//$mn=04;
//$month = $orderdate[0];
 $day   = $orderdate[1];
 $year  = $orderdate[2];
 $day=date('D', strtotime($date2));
}

$start_date = strtotime($fdate1); 
$end_date = strtotime($tdate1);
   $diff1=($end_date - $start_date)/60/60/24;
  $diff=$diff1+1;
 

for ($i=0; $i<$diff; $i++) {
    $NewDate = date('Y-m-d', strtotime($fdate1 . " +$i days"));
//$date2=$NewDate;
//$subj[] = $date2;
								$orderdate = explode('-', $date2);
								//$mn=04;
//$month = $orderdate[0];
 $day   = $orderdate[1];
 $year  = $orderdate[2];
 $day=date('D', strtotime($date2));?>

<?php //echo $row['datecheck']; ?>
<th>
<?php echo  $NewDate ;

	 $subj[] = $NewDate;
?>

</th>
	<?php }?>
	


	
</tr>
<?php 
 //$y="select * from request where (date between '$fdate' and '$tdate') and (status='aprvd' and com!='pmfund') ";

if($emp!='All'){
  $y="SELECT DISTINCT empid,sstate,phoneno FROM `request` where empid='$emp' ";
}else {
  
   $y="SELECT DISTINCT empid,sstate,phoneno FROM `request`";
}
$q=mysqli_query($link,$y) or die(mysqli_error($link));

$c=mysqli_num_rows($q);
if($c>0){


	$k=1;
while($r=mysqli_fetch_array($q)){
?>
<tr>
<td><?php echo $k; ?></td>
<td><?php echo $emp=$r['empid']; ?></td>
<td><?php echo $r['sstate']; ?></td>
<td><?php echo $r['phoneno']; ?></td>
<!--<td><?php echo $r['sname']; ?></td>-->
<?php 
if($subj[0]!=''){
  $s="SELECT  *
						FROM  attendence where date1='$subj[0]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt=mysqli_num_rows($qry);
							 $r1=mysqli_fetch_array($qry);
							  $atten1 = $r1['id'];
							  $atten=$r1['atten'];
							  
							
						
if($atten1!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[0]<=$tdate1){
						?>


	<td>A</td><?php  }}}?>

<?php if($subj[1]!=''){
  $s="SELECT  *
						FROM  attendence where date1='$subj[1]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt1=mysqli_num_rows($qry);
						$r1=mysqli_fetch_array($qry);
							  $atten2 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten2!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[1]<=$tdate1){
						?>


	<td>A</td><?php  }}}?>

<?php if($subj[2]!=''){
  $s="SELECT  *
						FROM  attendence where date1='$subj[2]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt2=mysqli_num_rows($qry);
						$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[2]<=$tdate1){
						?>


	<td>A</td><?php  }}}?>
<?php if($subj[3]!=''){
  $s="SELECT  *
						FROM  attendence where date1='$subj[3]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt3=mysqli_num_rows($qry);
						$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[3]<=$tdate1){
						?>
<td>A</td><?php  }}}?>
<?php if($subj[4]!=''){
  $s="SELECT  *
						FROM  attendence where date1='$subj[4]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt4=mysqli_num_rows($qry);
						$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[4]<=$tdate1){
						?>
						<td>A</td><?php  }}}?>
<?php if($subj[5]!=''){
  $s="SELECT  *
						FROM  attendence where date1='$subj[5]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt5=mysqli_num_rows($qry);
						$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[5]<=$tdate1){
						?>
						<td>A</td><?php  }}}?>
<?php if($subj[6]!=''){
  $s="SELECT  *
						FROM  attendence where date1='$subj[6]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt6=mysqli_num_rows($qry);
						$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[6]<=$tdate1){
						?>
						<td>A</td><?php  }}}?>

<?php if($subj[7]!=''){
  $s="SELECT  *
						FROM  attendence where date1='$subj[7]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt7=mysqli_num_rows($qry);
						$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[7]<=$tdate1){
						?>
						<td>A</td><?php  }}}?>

<?php if($subj[8]!=''){
  $s="SELECT  *
						FROM  attendence where date1='$subj[8]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt8=mysqli_num_rows($qry);
						$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[8]<=$tdate1){
						?>
						<td>A</td><?php  }}}?>

<?php if($subj[9]!=''){
  $s="SELECT  *
						FROM  attendence where date1='$subj[9]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt8=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[9]<=$tdate1){
						?>
						<td>A</td><?php  }}}?>


<?php if($subj[10]!=''){
  $s="SELECT  *
						FROM  attendence where date1='$subj[10]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt9=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
							 
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[10]<=$tdate1){
						?>
						<td>A</td><?php  }}}?>


<?php if($subj[11]!=''){
   $s="SELECT  *	FROM  attendence where date1='$subj[11]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt10=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[11]<=$tdate1){
						?>
						<td>A</td><?php  }}}?>


<?php if($subj[12]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[12]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt11=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[12]<=$tdate1){
						?>
						<td>A</td><?php  }}}?>
<?php if($subj[13]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[13]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt12=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[13]<=$tdate1){
						?>
						<td>A</td><?php  }}}?>

<?php if($subj[14]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[14]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt13=mysqli_num_rows($qry);
							$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[14]<=$tdate1){
						?>
						<td>A</td><?php  }}}?>
						<?php if($subj[15]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[15]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt14=mysqli_num_rows($qry);
							$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[15]<=$tdate1){
						?>
						<td>A</td><?php  }}}?>
<?php if($subj[16]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[16]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt15=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[16]<=$tdate1){
						?>
						<td>A</td><?php  }}}?><?php if($subj[17]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[17]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt16=mysqli_num_rows($qry);
								$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[17]<=$tdate1){
						?>
						<td>A</td><?php  }}}?><?php if($subj[18]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[18]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt17=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[18]<=$tdate1){
						?><td>A</td><?php  }}}?>
<?php if($subj[19]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[19]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt18=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[19]<=$tdate1){
						?><td>A</td><?php  }}}?><?php 
						
						if($subj[20]!=''){
   $s="SELECT  *	FROM  attendence where date1='$subj[20]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt20=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[20]<=$tdate1){
						?><td>A</td><?php  }} }?><?php 
						if($subj[21]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[21]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt21=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[21]<=$tdate1){
						?><td>A</td><?php  }}}?><?php 	if($subj[22]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[22]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt22=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[22]<=$tdate1){
						?><td>A</td><?php  }} }?><?php 	if($subj[23]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[23]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt23=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[23]<=$tdate1){
						?><td>A</td><?php  }}}?><?php 	if($subj[24]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[24]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt24=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[24]<=$tdate1){
						?><td>A</td><?php  }}}?><?php 	if($subj[25]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[25]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt25=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[25]<=$tdate1){
						?><td>A</td><?php  }}}?><?php 	if($subj[26]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[26]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt26=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[26]<=$tdate1){
						?><td>A</td><?php  }}}?><?php 	if($subj[27]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[27]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt27=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[27]<=$tdate1){
						?><td>A</td><?php  }}}?><?php 	if($subj[28]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[28]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt28=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[28]<=$tdate1){
						?><td>A</td><?php  }}}?><?php 	if($subj[29]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[29]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt29=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[29]<=$tdate1){
						?><td>A</td><?php  }}}?><?php 	if($subj[30]!=''){
  $s="SELECT  *	FROM  attendence where date1='$subj[30]' and emp_id='$emp' ";
						$qry=mysqli_query($link,$s);
					
							$i=1;
							 $qt30=mysqli_num_rows($qry);
												$r1=mysqli_fetch_array($qry);
							  $atten3 = $r1['id'];
							   $atten=$r1['atten'];
						
if($atten3!=''){?>

<td>
<?php 
echo $atten;?>
</td>
<?php } else {
	if($subj[30]<=$tdate1){
						?><td>A</td><?php  }}}?>
</tr>
<?php $k++; } }else{?>
<tr>
<td colspan="12" align="center"> No Records Found</td>
</tr>

<?php }?>
</table>
          
					   
					     </table>

