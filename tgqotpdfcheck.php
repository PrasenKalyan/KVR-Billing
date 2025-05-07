<!DOCTYPE HTML>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>JYOTHI BILLING</title>
 <script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
            window.print();
            }
            function closs()
            {
                window.close();
            }
        </script>
	
</head>
<body>
    <div class="page">
<?php 
ob_start();
 //include('config.php');
include('dbconnection/connection.php');
$bid=$_GET['id'];
 $name1=$_GET['name1'];
  $name2=$_GET['name2'];
$loc=$_GET['loc'];
$q=mysqli_query($link,"select * from add_tgqot where id='$bid'") or die(mysqli_error($link));
$r=mysqli_fetch_array($q);
 $service_no=$r['service_no'];
$invdate1=$r['date'];

$invdate = date('d-M-y', strtotime( $invdate1 ));


 $store_name=$r['store_name']; 
    $state=$r['state'];
	$state_code=$r['state_code'];
	$addr=$r['addr'];
	$ses=$r['ses'];
	$gst_in=$r['gst_in'];
	$tot=$r['tot'];
	$tot_gst=$r['tot_gst'];
	$net=$r['net'];
	$date=$r['date'];
	$store_code=$r['store_code'];
	$inv_no=$r['inv_no'];
	$mnth=date('M', strtotime( $date ));
	$y=date('y', strtotime( $date ));


$dt=date('m-d-Y');
 

//echo"<table border='1'><tr><th></th><th width='2%'>Location:</th><th>$val4</th><th >From Date:</th><th>$val5</th><th>Todate:</th><th>$val7</th></tr></table>";

?>

<table border='1' style="width:90%" align="center"  cellpadding="0" cellspacing='0'>
        <thead>
            <tr class="noBorder" ><th   colspan="14"style="padding-top:120px;border-right:none !important;font-size:18px;">
			<img src="images/exel_logo.jpg"/>
			</th></tr>
        </thead>
        <tfoot>
            <tr class="noBorder " style="border-color:#fff;border-left-color:#fff;"><th class="noBorder " colspan="14" style="padding-top:80px;"></th></tr>
        </tfoot>
        <tbody>
        </tbody>
        <tr><td colspan="8" style="text-align:center;font-size:18px;border:0px;"><b>QUOTATION</b><br /></td></td></tr>
        <tr><td colspan="14"><fieldset style="    border-right: 1px groove;
    border-left: 0px;
    border-top: 0px;
    border-bottom: 0px;">
  <?php $id=$_GET['id'];
$sq=mysqli_query($link,"select * from add_tgqot where id='$id'");
$r=mysqli_fetch_array($sq);
$store_code=$r['store_code'];

$ssq1=mysqli_query($link,"select * from dpr where store_code='$store_code'");
$r1=mysqli_fetch_array($ssq1);
 $state_code=$r1['state_code'];
 $company_name1=$r1['company_name'];
 $addr1=$r1['ship_ddress'];
 $state1=$r1['state'];
 $gst_in1=$r1['gst_in'];
 $ship_name=$r1['ship_name'];
 $ship_state=$r1['ship_state'];
 $ship_gst=$r1['ship_gst'];
 $superwisor=$r1['superwisor'];
 $coordinator=$r1['coordinator'];
 $sq1=mysqli_query($link,"SELECT * FROM `coordination` where name='$coordinator'");
 $r3=mysqli_fetch_array($sq1);
 $cor_email=$r3['email'];
  $sq11=mysqli_query($link,"SELECT * FROM `super` where name='$superwisor'");
 $r4=mysqli_fetch_array($sq11);
 $sup_email=$r4['email'];
 
?> 

           <div style="border:0px solid #000;">
 <table >
		  
		  <tr>
            <td>
		<b>	Name of Vendor :<br/>
			Vendor Address  :<br/>
		
			Vendor State  :<br/>
			Vendor GSTIN :<br />
		Vendor State Code :<br />
			</td>
			<td>
			<b> JYOTHI INFRA SERVICE<br/>
			H.No.8-3-673, Flat No.302, Sai Datta Residency, Shardha Nagar , Yellareddy Guda, Hyderabad, TS-500073.<br/>
			<?php echo $r1['state'];?> STATE<br/>
			36APSPS9687Q1Z5<br/>
			<?php echo $r1['state_code'];?></b>
			</td>
			</tr>
		  
		
          </table>
			
</div>
</td></tr>
<tr><td colspan="14">



<table width="800"  style="border:1px solid #000;" align="left">
<tr><td ><b>Quotation Date:</b><?php $d=$r['inv_date']; echo date('d-m-Y', strtotime($d));?></td>

<td ><b>Quotation Number:</b><?php echo $qut=$r['quet_num'];?></tr>


<tr><td ><b>FM Fault No:</b><?php echo $r['falt_no'];?></td>
<td ><b>FM Fault date :</b><?php $d1=$r['falt_date']; echo date('d-m-Y', strtotime($d1));?></tr>

<br></table>
</td></tr>
<tr><td colspan="14">
<table width="800"  style="border:1px solid #000;" align="left">

<tr><td colspan="2"><b>Fault Description:</b><?php echo $r['falt_desc'];?></b></td></tr>
</table>
</td></tr>

<tr><td colspan="14">

	  <table  >
<tr>
<td   >




<table  width="500" ><tr>
<td><b>Bill to Party</b><hr /></td></tr>



</table>
<div style="height:10px;" ></div>
<div style="border:1px solid #000;">
 <table >
		  
		  <tr>
            <td>
		<b>	Name :<br/>
			Address :<br/>
		
		
			State :<br/>
			GSTN :</b>
			</td>
			<td>
			
			
			<b>
		<?php echo $r1['company_name'];?><br/>
		<?php echo $r1['address'];?><br/>
				<?php echo  $st=$r1['state']; if($st=='AP'){ echo "ANDHRA PRADESH "; } else if($st=='TG'){ echo "TELANGANA STATE"; }?><br/>
			<?php echo $r1['gst_in'];?>
			</b>
			
			
			
			
			</td>
			</tr>
		  
		
          </table>
			
</div>
</td>
<td width="20"></td>

			
		<td >

<table  width="500" ><tr>
<td><b>Ship to Party</b><hr /></td></tr>



</table>
<div style="height:10px;" ></div>
<div style="border:1px solid #000;">
 <table >
		  
		  
		  <tr>
            <td>
		<b>	Name :<br/>
			Address :<br/>
		
		
			State :<br/>
			GSTN :</b>
			</td>
			<td>
			<b>
		<?php echo $ship_name;?><br/>
			<?php echo $addr1;?><br/>
			<?php echo $ship_state;?><br/>
			<?php echo $ship_gst;?>
			</b>
			<!--
			M/S Reliance Digital.<br/>
			Suchithra Digital, <br/>
			Store Code-8661.<br/>
			TELANGANA STATE<br/>
			36AABCD7169H1ZH</b>-->
		
			<?php //echo $r1['ship_ddress'];?>
			</td>
			</tr>
		  

          </table>
			
</div>
</td>	
			
			
			
			
			
			
			
			
			
			
			</tr>
			
		<!--	<tr><td><b>Service Period: <?php echo $mnth;?>'<?php echo $y;?></b></td></tr>-->
          </table>
		  </div>

</td>
</tr>




        
       

<table border='1' style="width:100%" align="center"  cellpadding="0" cellspacing='0'>   
        <tr>
<th style="width:5px;">SNo</th>
<th style="width:120px;">HSN/ SAC Codes</th>
<th style="width:75px;">Article/ Service Codes</th>
<th  style="width:200px;"  colspan="2">Description of Material/Service</th>
<th style="width:60px;" colspan="1">Brand/Make</th>
<th style="width:60px;" colspan="1">Model</th>
<th style="width:60px;" colspan="1">QTY</th>
<th style="width:60px;" colspan="1">UOM</th>
<th style="width:60px;">RATE</th>


<th style="width:100px;" colspan="1">Base Amount</th>
<th style="width:100px;" colspan="1">Service
Fee -6% (In Rs)</th>
<th style="width:100px;" colspan="1">Total Base Amount</th>
<th style="width:100px; border-right-color: #000 !important;">GST Rate (18 %)</th>
</tr>
<?php
$bid=$r['id'];

	 $aa="select * from add_tgqot1 where  id1='$bid' ";
 
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;
$gst_amnt1=0;
$tx=0;
while($t1=mysqli_fetch_array($t)){
	
	?>
	<tr>
	<th style="width:5px;"><?php echo $i; ?></th>
	<th style="width:120px;">
	<?php 

	echo $t1['hsn'];
	?>
	</th>
	<th style="width:120px;">
	<?php 

	echo $t1['serv_code'];
	?>
	</th>
	<th colspan="2" style="width:200px;"><?php echo '<b>'.$t1['desc1'].'</b>'; ?></th>
	<th style="width:60px;" colspan="1"><?php echo $t1['brand']; ?></th>
	<th style="width:60px;" colspan="1"><?php echo $t1['model']; ?></th>
		<th style="width:60px;" colspan="1"><?php echo $t1['qty']; ?></th>
		<th style="width:60px;" colspan="1"> <?php echo $t1['uom']; ?></th>
		<th style="width:60px;"><?php echo $t1['rate']; ?></th>
		
		<th style="width:100px;" colspan="1"><?php echo $bas=$t1['base_amt']; ?></th>
				<th style="width:100px;" colspan="1"><?php echo $ser=$t1['serv_amt']; ?></th>
				<th style="width:100px;" colspan="1"><?php echo $ser+$bas; ?></th>
	<th style="width:100px; border-right-color: #000 !important;">
	<?php echo $tax=number_format((float)$t1['gst_amnt'],1, '.', ''); ?></th>
	</tr>
	
<?php 

$gst_amnt=$t1['gst_amnt'];
$gst_amnt1=$gst_amnt+$gst_amnt1;


$tt_amt=$t1['total_price'];
$tt_amt1=$tt_amt+$tt_amt1;


$tx=$t1['tax_amnt'];
 $tx1=$tax+$tx1;
$total_price=$t1['total_price'];

 $gst_amnt2=$gst_amnt+$gst_amnt2;
$bas1=$bas+$bas1;
$ser1=$ser+$ser1;


$i++; }

 ?>
 
 <tr>
	<th  colspan="10"> Total Amount</th>
	
	
	
	<th style="width:100px;"><?php echo $bas1;?></th>
	

		<th style="width:100px;"><?php echo $ser1;?></th>
	<th style="width:100px;"><?php echo $ser1+$bas1;?></th>
	<th style="width:100px;"><?php echo $tx1;?></th>
	</tr>



 <tr>
	<th  colspan="13"> SGST/UGST Amt (In Rs)</th>
	
	
	
	
	
	<th style="width:100px;"><?php echo $tx1/2;?></th>
	</tr>
<tr>
	<th  colspan="13"> CGST Amt (In Rs)</th>
	
	
	
	
	
	<th style="width:100px;"><?php echo $tx1/2;?></th>
	</tr>
 <tr>
	<th  colspan="13"> IGST Amt (In Rs)</th>
	
	
	
	
	
	<th style="width:100px;">0</th>
	</tr>
	<tr>
	<th  colspan="13"> Total GST  (In Rs)</th>
	
	
	
	
	
	<th style="width:100px;"><?php echo $tx1;?></th>
	</tr>
		<tr>
	<th  colspan="13"> Total Amount (In Rs)</th>
	
	
	
	
	
	<th style="width:100px;"><?php echo $tamt=$tx1+$ser1+$bas1;?></th>
	</tr>
	
 
 

 
 
 
 
 <tr>
	<th  colspan="14"> Total Invoice Amount in Words
	
	
	
	
	

		
		
		<?php
     $tmt=round($tamt);
      
     
     $number = round($tmt);
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  echo  "- ".strtoupper($result) .  $points . " RUPEES ONLY";
 ?> 
 
		
		<?php //echo $taxx1+$tx1;?></th>
	
	
	</tr>
	<tr>
	<th  colspan="14" style="text-align:right;padding-right:10px;font-size:20px;"> For Jyothi Infra Services<br/><img src="sign.jpeg" height="70"/><br/>Authorised Signatory
</th>
</tr>

<?php //exit;?>
      </tbody>
    </table></td></tr></table>
   <!-- <table align="center">
     <tr><td height="20px"></td></tr><tr>
    <td></td><td align="center"><input type="button" value="Print" id="prt" class="butt" onclick="printt()"/></td><td><input type="button" value="Close" id="cls" class="butt"  onclick="window.close();"/></td>
</tr></table>-->
   <!-- <form  method="post">
   <p>First name: <input type="text" name="firstname" /></p>

   <p>Last name: <input type="text" name="firstname" /></p>

   <input type="submit" name="submit" value="Submit" />

</form>-->

    
<?php
    
    $body=ob_get_clean();
$body=iconv("UTF-8","UTF-8//IGNORE",$body);

include('mpdf/mpdf.php');
$mpdf=new \mPDF('c','A4','','',10,10,10,10,10,10);
$mpdf->writeHTML($body);
$mpdf->Output('demo.pdf','F');
	
		print "<script>";
	print "self.location='tgemailqot.php?cord=$cor_email&supr=$sup_email&qot=$qut';";
	print "</script>";
	
 
?>