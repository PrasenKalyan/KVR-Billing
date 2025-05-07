<!DOCTYPE HTML>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>JTECHNO ASSOCIATES</title>
<style>
    .first-half {
    float: left;
    width: 50%;
}
.second-half {
    float: right;
    width: 50%;
}
</style>

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
<link rel="stylesheet" href="http://mission2cr.org/admin/qot.css1">		
</head>
<body>
    <div class="page">
<?php 
ob_start();
 //include('config.php');
include('dbconnection/connection.php');
	$state=$_GET['state'];

	if($state=='AP'){
		$qottable ='add_qot';
        $qottable1 ='add_qot1';
		$qotbill ='qot_bill';
		$request_amnt ='request_amnt';
       
	}
	elseif($state=='TG'){
		$qottable ='add_tgqot';
        $qottable1 ='add_tgqot1';
		$qotbill ='tgqot_bill';
		$request_amnt ='tgrequest_amnt';

	 
	}
	 elseif($state=='TN'){
	  $qottable ='add_tnqot';
      $qottable1 ='add_tnqot1';
	  $qotbill ='tnqot_bill';
	  $request_amnt ='tnrequest_amnt';
	
	}
	elseif($state=='KL'){
		$qottable ='add_klqot';
        $qottable1 ='add_klqot1';
		$qotbill ='klqot_bill';
		$request_amnt ='klrequest_amnt';	
	  
	}
	else if($state=='KN'){
	  $qottable ='add_knqot';
      $qottable1 ='add_knqot1';
	  $qotbill ='knqot_bill';
	  $request_amnt ='knrequest_amnt';
      	
	}
	elseif($state=='OD'){
	  $qottable ='add_odqot';
      $qottable1 ='add_odqot1';
	  $qotbill ='odqot_bill';
	  $request_amnt ='odrequest_amnt';	
	}
?>
<div style="page-break-after: always;">
<div class="noBorder"  ><th   colspan="14"style="border-right:none !important;font-size:18px;">
			<img src="images/excel_logo.png" height="100"/></div>
<table border='1' style="width:100%" align="center"  cellpadding="0" cellspacing='0'>
        
            
        
        <tfoot>
            <tr class="noBorder " style="border-color:#fff;border-left-color:#fff;"><th class="noBorder " colspan="14" ></th></tr>
        </tfoot>
        <tbody>
        </tbody>
         <tr ><td colspan="14" align="right">ORIGINAL FOR RECIPIENT</td></tr> 
        <tr><td colspan="14" style="text-align:center;font-size:18px;border:0px;"><b>TAX INVOICE</b><br /></td></td></tr>
        <tr><td colspan="14"><fieldset style="    border-right: 1px groove;
    border-left: 0px;
    border-top: 0px;
    border-bottom: 0px;">
  <?php $id=$_GET['id'];
$sq=mysqli_query($link,"select * from ".$qottable." where quet_num='$id'");
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
 $store_name=$r1['store_name'];
?> 
<?php $sqy=mysqli_query($link,"select * from organization where id='1'");
			$r2y=mysqli_fetch_array($sqy);
            $state=$_GET['state'];
            $vendor_name=$r2y['vendor_name'];

            if($state=='AP'){
            $address=$r2y['ap_address'];
            $gst=$r2y['ap_gst'];
            $pan=$r2y['ap_pan'];
            $vendor_code=$r2y['vendor_code'];
            }
            elseif($state=='TG'){
                $address=$r2y['tg_address'];
                $gst=$r2y['tg_gst'];
                $pan=$r2y['tg_pan'];
                $vendor_code=$r2y['vendor_code1'];
            }
            elseif($$tate=='TN'){
                $address=$r2y['tn_address'];
                $gst=$r2y['tn_gst'];
                $pan=$r2y['tn_pan'];
                $vendor_code=$r2y['vendor_code2'];
            }
            elseif($state=='KL'){
                $address=$r2y['kl_address'];
                $gst=$r2y['kl_gst'];
                $pan=$r2y['kl_pan'];
                $vendor_code=$r2y['vendor_code3'];
            }
            elseif($state=='KN'){
                $address=$r2y['kn_address'];
                $gst=$r2y['kn_gst'];
                $pan=$r2y['kn_pan'];
                $vendor_code=$r2y['vendor_code4'];
            }
            elseif($state=='OD'){
                $address=$r2y['od_address'];
                $gst=$r2y['od_gst'];
                $pan=$r2y['od_pan'];
                $vendor_code=$r2y['vendor_code5'];
            }
                
			?>
           <div style="border:0px solid #000;">

			
</div>
</td></tr>
<tr>

<td colspan="14">
   
<table  width="100%" border ='1'  cellpadding="0" cellspacing='0'>
    <tr><td style="color:#FFFFFF" colspan="1" >Invoice Number kkjkkkllkl;l;l;l;l;ll;l;InvoiceNumberuiiii</td>

<td style="color:#FFFFFF" colspan="1"><b>nvoice Number kkjkkkllkl;l;l;l;l;ll;l;InvoiceNumberuiiii</td>
</tr>

<tr><td colspan="1" ><b>Invoice Number: </b><?php echo $qt=$r['invoice_no'];?></td>

<td colspan="1"><b >State: </b><?php if($state1==$state) echo $state;?></td>
</tr>
<tr>
    <td colspan="1" ><b>Invoice Date:</b><?php $d=$r['inv_date']; echo date('d-m-Y', strtotime($d));?></td>
    <td colspan="1" ><b>State Code:</b><?php echo $state_code;?></td>
</tr>

<tr><td>
    <b>PO No:</b><?php echo $r['ro_no']?>
</td>
<!-- <td>
   <b>PO Date:</b><?php echo $r['po_date'];?>
</td>-->
</tr>

</table>



</td></tr>

<tr><td colspan="14">

	  <table >
<tr>
<td  >




<table  width="100%" border ='1' cellpadding="0" cellspacing='0'><tr>
<th colspan="2"><b>SUPPLIER ADDRESS </b></th>
<th  colspan="2"><b>SHIPPING / BILLING ADDRESS </b></th>

</tr>

<tr><td ><b>Name:</b></td>
<td><?php echo $vendor_name;?></td>
<td ><b>Name:</b></td>
<td><?php echo $r1['company_name'];?></td>
</tr>
<tr>
    <td ><b>Address:</b></td>
    <td><?php echo $address;?></td>
    <td ><b>Address:</b></td>
    <td><?php echo $r1['address'];?></td>
</tr>
<tr><td colspan="2"> 
    <b>PAN:</b><?php echo  $pan; ?>
</td>
</tr>
<tr><td colspan="2"> 
    <b>GSTIN:</b><?php echo  $gst; ?>
</td>
<td colspan="2">
    <b>GSTIN:</b><?php echo $r1['gst_in'];?>
</td>
</tr>
<tr><td colspan="2"> 
    <b>State:</b><?php echo  $state; ?>
</td>
<td colspan="2">
    <b>State: </b><?php echo $state;?>
</td>
</tr>
<tr><td colspan="2"> 
    <b>State Code: </b><?php echo $r1['state_code']; ?>
</td>
<td colspan="2">
    <b>State Code:</b><?php echo  $r1['state_code']; ?>
</td>
</tr>
<tr>
    <td colspan="2"><b>Period of Service:</b> <?php $time=strtotime($r['po_date']);
$month1=date("F",$time);
$year1=date("Y",$time);

echo $month1.' '.$year1 ?></td>
</tr>

</table>
<!--<div style="height:10px;" ></div>
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
		<?php echo $vendor_name;?><br/>
		<?php echo $address;?><br/>
				<?php echo  $r1['state']; ?><br/>
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
<td><b>SERVICE RECIPENT DETAILS</b><hr /></td></tr>



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
				<?php echo  $st=$r1['state']; if($st=='AP'){ echo "ANDHRA PRADESH "; } else if($st=='TG'){ echo "TELANGANA STATE"; } else if($st=='KL'){ echo "KERALA STATE"; }
                else if($st=='TN'){ echo "TAMILNADU STATE"; } else if($st=='KN'){ echo "KARNATAKA STATE"; } else if($st=='OD'){ echo "ODISSA STATE"; }
                ?><br/>
			<?php echo $r1['gst_in'];?>
			</b>
		
		
			<?php //echo $r1['ship_ddress'];?>
			</td>
			</tr>
		  

          </table>
			
</div>
</td>	-->
			
			
			
			</tr>
			

          </table>
		  </div>

</td>
</tr>


<table  border ='1' style="width:90%" align="center"  cellpadding="0" cellspacing='0'>   

        <tr>
<th colspan="1" style="width:5%; text-align: center;" >SNo</th>
<th  style="width:30%; text-align: center;"  colspan="2">Description of Material/Service</th>
<th style="width:12%; text-align: center;" colspan="1">HSN/ SAC Codes</th>

<th style="width:10%; text-align: center;" colspan="1">Tax Rate</th>
<th style="width:10%; text-align: center;" colspan="1">UOM</th>
<th style="width:10%; text-align: center;" colspan="1">QTY</th>
<th style="width:10%; text-align: center;" colspan="1">RATE</th>

<th style="width:10%; text-align: center;" colspan="1">Amount (Rs.)</th>
</tr>



<?php
$bid=$r['id'];
$state=$_GET['state'];

	 $aa="select * from ".$qottable1." where  id1='$bid' ";
 
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;
$gst_amnt1=0;
$tx=0;
while($t1=mysqli_fetch_array($t)){
	
	?>
	<tr>
	<td colspan="1" style="width:5px; text-align: center;" ><?php echo $i; ?></th>
	<td colspan="2" style="width:200px; "><?php echo $t1['desc1']; ?></td>
	<td style="width:120px; text-align: center;" colspan="1">
	<?php 

	echo $t1['hsn'];
	?>
	</td>
	<td style="width:60px; text-align: center;" colspan="1"> <?php echo $t1['gst'].'%';?></td>
		<td style="width:60px; text-align: center;" colspan="1"> <?php echo $t1['uom']; ?></td>
		<td style="width:60px; text-align: center;" colspan="1"><?php echo $t1['qty']; ?></td>
	<?php  $bas=$t1['base_amt']; ?>
	<?php  $ser=$t1['serv_amt']; $tax=number_format((float)$t1['gst_amnt'],1, '.', '');  ?>
		<td style="width:60px; text-align: center;" colspan="1"><?php echo $t1['rate']; ?></td>
		
		
	<td style="width:100px; text-align: center;" colspan="1"><?php echo $ser+$bas; ?></td>
	
	
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
	<th  colspan="8" style="text-align: right;"> Sub Total</th>
	<td style="width:100px; text-align: center;"><?php echo $ser1+$bas1;?></td>
	</tr>

</table>
<br/>
<table border ='1' style="width:90%" align="center"  cellpadding="0" cellspacing='0'>
	 <tr>
     <th colspan="11">Tax Summary</th></br>
 </tr>

	 <tr>
<th style="width:5px; text-align: center; " colspan="1" >SNo</th>
<th style="width:120px; text-align: center;" colspan="1">HSN/ SAC Codes</th>


<th style="width:60px; text-align: center;" colspan="1">Amount</th>
<th style="width:120px;text-align: center;" colspan="2">SGST</th>
<th style="width:120px; text-align: center;" colspan="2">CGST</th>
<th style="width:120px; text-align: center;" colspan="2">IGST</th>

<th style="width:100px;" colspan="2">Tax Amount</th>
</tr>
 <tr>
<th style="width:5px;" colspan="1"></th>
<th style="width:120px;" colspan="1"></th>


<th style="width:60px; text-align: center;" colspan="1"></th>
<th style="width:60px; text-align: center;" colspan="1">
                    Rate %
                </th>
<th style="width:60px; text-align: center;" colspan="1"> Amount</th>
<th style="width:60px; text-align: center;" colspan="1">
                    Rate %
                </th>
<th style="width:60px; text-align: center;" colspan="1"> Amount</th>
<th style="width:60px; text-align: center;" colspan="1">
                    Rate %
                </th>
<th style="width:60px; text-align: center;" colspan="1"> Amount</th>
<!--<th style="width:120px;;" colspan="1"><div class="first-half">
                    Rate %
                </div>
                <div class="second-half">
                    Amount
                </div></th>
<th style="width:120px;;" colspan="1"><div class="first-half">
                    Rate %
                </div>
                <div class="second-half">
                    Amount
                </div></th>-->

<th style="width:100px;" colspan="2"></th>
</tr>
<?php include_once('dbconnection/connection.php');
 $ak="select @acount:=@acount+1 sno,hsn,gst,sum((base_amt+serv_amt)) as total,sum(gst_amnt) as gst_amnt from (SELECT @acount:= 0) AS acount,".$qottable1." where id1='$bid'   group by hsn,gst order by sno";
$tk=mysqli_query($link,$ak);
while($rkk=mysqli_fetch_array($tk)){ ?>
<tr>
<td style="width:5px; text-align: center;" colspan="1"><?php echo $rkk['sno'];?></td>
<td style="width:120px;text-align: center; " colspan="1"><?php echo $rkk['hsn'];?></td>


<td style="width:60px; text-align: center;" colspan="1"><?php echo $rkk['total'];?></td>
<td style="width:60px; text-align: center;" colspan="1">
                   <?php echo ($rkk['gst']/2).'%';?>
                </td>
<td style="width:60px; text-align: center;" colspan="1"> <?php echo $rkk['gst_amnt']/2;?></td>
<td style="width:60px; text-align: center;" colspan="1">
                    <?php echo ($rkk['gst']/2).'%';?>
                </td>
<td style="width:60px; text-align: center;" colspan="1"> <?php echo $rkk['gst_amnt']/2;?></td>
<td style="width:60px; text-align: center;" colspan="1">
                    0
                </td>
<td style="width:60px; text-align: center;" colspan="1"> 0</td>
<!--<th style="width:120px;;" colspan="1"><div class="first-half">
                   <?php echo $rkk['gst']/2;?>
                </div>
                <div class="second-half">
                    <?php echo $rkk['gst_amnt']/2;?>
                </div></th>
<th style="width:120px;;" colspan="1"><div class="first-half">
                   <?php echo $rkk['gst']/2; ?>
                </div>
                <div class="second-half">
                   <?php echo $rkk['gst_amnt']/2 ;?>
                </div></th>
<th style="width:120px;;" colspan="1"><div class="first-half">
                    0
                </div>
                <div class="second-half">
                    0
                </div></th>-->

<td style="width:100px; text-align: center;" colspan="2"><?php echo $rkk['gst_amnt'] ;?></td>
</tr>
<?php $finalamnt=$finalamnt+$rkk['total']+$rkk['gst_amnt'];} $tamt=$tx1+$ser1+$bas1; ?>
 
<tr>
	<th  colspan="10" style="text-align: right;"> Total Tax Value</th>
	<th style="width:80px;"><?php echo $tx1;?></th>
	</tr>
	<tr>
	<th  colspan="10" style="text-align: right;">Total Invoice Value</th>
	<th style="width:80px;"><?php echo round($tamt);?></th>
	</tr>
 <tr>
	<th  colspan="11"> Total Invoice Amount in Words
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

	<tr><th  align="left" colspan="5">  BANK DETAILS	</th><td  align="left" colspan="6">  Certified that the particulars given above are true and correct.	</td></tr>	
	<tr><th  align="left" colspan="5"> Acc No.120000786998		</th></tr>	
	<tr><th align="left" colspan="5"> Bank Name:Canara Bank</th></tr>		
	<tr><th  align="left" colspan="5">Branch Name: Bharathi Nagar,VJY</th></tr>	
	<tr><th align="left" colspan="5">IFSC: CNRB0013749 </th></tr>	
	
	
      </tbody>
    </table></td></tr></table>
    <div style="border-right:none !important;font-size:18px;position: fixed;bottom: 0;">
			<img src="footerraisedinvoice.jpeg" height="200"/></div>
</div>    
  <?php  include('dbconnection/connection.php');
$result = array();
$finalresults=array();
$id=$_GET['id'];
$sq=mysqli_query($link,"select * from ".$qottable." where quet_num='$id'");
$r=mysqli_fetch_array($sq);
$store_code=$r['store_code'];
$quet_num=$r['quet_num'];
$falt_date=date('d-m-Y',strtotime($r['falt_date']));
$falt_no=$r['falt_no'];
$falt_desc=$r['falt_desc'];
$rono=$r['ro_no'];
$rodate=$r['ro_date'];
$finalbase_amnt=0;
$bid=$r['id'];
include('dbconnection/connection1.php');
$a="select * from dpr where store_code='$store_code'";
$ssq1=mysqli_query($link,$a);
$r1=mysqli_fetch_array($ssq1);
 $state_code=$r1['state_code'];
 $company_name1=$r1['company_name'];
 $addr1=$r1['ship_ddress'];
 $state1=$r1['state'];
 $statefull=$r1['state'];
 $gst_in1=$r1['gst_in'];
 $ship_name=$r1['ship_name'];
 $ship_state=$r1['ship_state'];
 $ship_gst=$r1['ship_gst'];
 $store_name=$r1['store_name'];
 $store_type=$r1['format_type'];
 $city=$r1['city'];
 if($statefull=='TG')
 $statefull='Telangana';
 else if($statefull=='AP')
 $statefull='Andhra Pradesh';
 else if($statefull=='kl')
 $statefull='Kerala'; 
 else if($statefull=='KN')
 $statefull='Karnataka';
 else if($statefull=='TN')
 $statefull='Tamilnadu';
 else if($statefull=='OD')
 $statefull='Odissa';
 $sqy=mysqli_query($link,"select * from organization where id='1'");
			$r2y=mysqli_fetch_array($sqy);
			$vendor_name=$r2y['vendor_name'];
            $state=$_GET['state'];
                if($state=='AP'){
                $address=$r2y['ap_address'];
                $gst=$r2y['ap_gst'];
                $pan=$r2y['ap_pan'];
                $vendor_code=$r2y['vendor_code'];
                }
                elseif($state=='TG'){
                    $address=$r2y['tg_address'];
                    $gst=$r2y['tg_gst'];
                    $pan=$r2y['tg_pan'];
                    $vendor_code=$r2y['vendor_code1'];
                }
                elseif($$tate=='TN'){
                    $address=$r2y['tn_address'];
                    $gst=$r2y['tn_gst'];
                    $pan=$r2y['tn_pan'];
                    $vendor_code=$r2y['vendor_code2'];
                }
                elseif($state=='KL'){
                    $address=$r2y['kl_address'];
                    $gst=$r2y['kl_gst'];
                    $pan=$r2y['kl_pan'];
                    $vendor_code=$r2y['vendor_code3'];
                }
                elseif($state=='KN'){
                    $address=$r2y['kn_address'];
                    $gst=$r2y['kn_gst'];
                    $pan=$r2y['kn_pan'];
                    $vendor_code=$r2y['vendor_code4'];
                }
                elseif($state=='OD'){
                    $address=$r2y['od_address'];
                    $gst=$r2y['od_gst'];
                    $pan=$r2y['od_pan'];
                    $vendor_code=$r2y['vendor_code5'];
                }
             
                
			
			
			?>
<div>
    <table  width="100%" border ='1'  cellpadding="0" cellspacing='0'>

<tr><td ><b>Vendor Name:</b><?php echo $vendor_name?></td>
<td ><b>Customer Name:</b><?php echo $r1['company_name'];?></td>
</tr>
<tr>
    
  <td ><b>State:</b><?php echo $statefull;?></td>
  <td ><b>Vendor Code:</b><?php echo $vendor_code;?></td>
</tr>

</table>
<table  border ='1' style="width:90%" align="center"  cellpadding="0" cellspacing='0'>   

        <tr>
<th colspan="1" style="width:5%;" >SNo</th>
<th  style="width:10%;"  colspan="1">Store Name</th>
<th style="width:10%;" colspan="1">Store Code</th>


<th style="width:10%;" colspan="1">Store Type</th>
<th style="width:10%;" colspan="1">Location</th>
<th style="width:30%;" colspan="2">Fault Description</th>
<th style="width:10%;" colspan="1">PO Number</th>
<th style="width:10%;" colspan="1">HSN/SAC Code</th>
<th style="width:10%;" colspan="1">GST Rate</th>
<th style="width:30%;" colspan="2">Material Description</th>
<th style="width:10%;" colspan="1">Unit Rate</th>
<th style="width:10%;" colspan="1">UOM</th>
<th style="width:10%;" colspan="1">Qty</th>
<th style="width:10%;" colspan="1">Base Amnt</th>
</tr>
<?php 
include_once('dbconnection/connection.php');
 $aa="select  @acount:=@acount+1 sno,hsn,gst,serv_code,desc1,brand,model,qty,uom,rate,base_amt,serv_amt,(base_amt+serv_amt) as total,gst_amnt  from (SELECT @acount:= 0) AS acount,".$qottable1." where  id1='$bid' ";
// $aa="select  @acount:=@acount+1 sno,desc1,hsn,uom,qty,rate,base_amt from (SELECT @acount:= 0) AS acount,".$qottable1." where  id1='$bid' ";
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
while($rk=mysqli_fetch_array($t)){?>
 <tr>
<td colspan="1" style="width:5%;" ><?php echo $rk['sno'];?></td>
<td  style="width:10%;"  colspan="1"><?php echo $store_name;?></td>
<td style="width:10%;" colspan="1"><?php echo $store_code;?></td>


<td style="width:10%; text-align: center;" colspan="1"><?php echo $store_type;?></td>
<td style="width:10%;text-align: center;" colspan="1"><?php echo $city;?></td>
<td style="width:30%; " colspan="2"><?php echo $falt_desc;?></td>
<td style="width:10%; text-align: center;" colspan="1"><?php echo $rono;?></td>
<td style="width:10%; text-align: center;" colspan="1"><?php echo $rk['hsn'];?></td>
<td style="width:10%; text-align: center;" colspan="1"><?php echo $rk['gst'].'%';?></td>
<td style="width:30%; " colspan="2"><?php echo $rk['desc1'];?></td>
<td style="width:10%; text-align: center;" colspan="1"><?php echo $rk['rate'];?></td>
<td style="width:10%; text-align: center;" colspan="1"><?php echo $rk['uom'];?></td>
<td style="width:10%; text-align: center;" colspan="1"><?php echo $rk['qty'];?></td>

<td style="width:10%; text-align: center;" colspan="1"><?php echo $rk['base_amt']; $finalbase_amnt=($finalbase_amnt+$rk['base_amt']);?></td>

</tr>



<?php }
?>
<tr>
    <td style="width:90%;" colspan="10"></td>
    <td style="width:90%;" colspan="5"><b>Total</b></td>
    <td style="width:10;" colspan="1"><?php echo $finalbase_amnt?></td>
</tr>
</table>
</div>

   
<?php
  $qtno=$id.".pdf";
    $body=ob_get_clean();
$body=iconv("UTF-8","UTF-8//IGNORE",$body);

include('mpdf/mpdf.php');
$mpdf=new \mPDF('c','A4','','',10,10,10,10,0,0);
$mpdf->writeHTML($body);
//$mpdf->Output('demo.pdf','F');
$mpdf->Output($qtno,'F');
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo  "<script type=\"text/javascript\"> 
 

   location.href = 'download.php?qt=$qtno';
   setTimeout(\"DoTheRedirect('bill_list2.php?state=$state')\",parseInt(2*1000));
function DoTheRedirect(url) { window.location=url; }

</script>";
?>
 