<!DOCTYPE HTML>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>JYOTHI FACILITY MANAGEMENT PVT.LTD</title>
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
?>
<div class="noBorder" ><th   colspan="14"style="border-right:none !important;font-size:18px;">
			<img src="images/excel_logo.png" height="100"/></div>
<table border='1' style="width:90%" align="center"  cellpadding="0" cellspacing='0'>
        
            
        
        <tfoot>
            <tr class="noBorder " style="border-color:#fff;border-left-color:#fff;"><th class="noBorder " colspan="14" ></th></tr>
        </tfoot>
        <tbody>
        </tbody>
         <tr ><td align="right">ORIGINAL FOR RECIPIENT</td></tr> 
        <tr><td colspan="8" style="text-align:center;font-size:18px;border:0px;"><b>TAX INVOICE</b><br /></td></td></tr>
        <tr><td colspan="14"><fieldset style="    border-right: 1px groove;
    border-left: 0px;
    border-top: 0px;
    border-bottom: 0px;">
  <?php $id=$_GET['id'];
$sq=mysqli_query($link,"select * from add_tgqot where quet_num='$id'");
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
			$vendor_name1=$r2y['vendor_name1'];
			$ap_address=$r2y['tg_address'];
			$ap_pan=$r2y['ap_pan'];
			$ap_gst=$r2y['ap_gst'];
			?>
           <div style="border:0px solid #000;">

			
</div>
</td></tr>
<tr><td colspan="14">
<table  border-collapse: "collapse" width="100px" border ='1'  cellpadding="0" cellspacing='0'>

<tr ><td ><b>Invoice Number:</b><?php echo $qt=$r['invoice_no'];?></td>
<td ><b>State:</b><?php echo $state1;?></td>
</tr>
<tr >
    <td ><b>Invoice Date:</b><?php $d=$r['inv_date']; echo date('d-m-Y', strtotime($d));?></td>
    <td ><b>State Code:</b><?php echo $state_code;?></td>
</tr>

<tr ><td>
    <b>PO No:</b><?php echo $r['po_no']?>
</td>
<td>
    <b>PO Date:</b><?php echo $r['po_date'];?>
</td>
</tr>

</table>

<!--<table width="100%" colspan="8"   style="border:1px solid black;
  border-collapse: collapse;" align="left">
  
<tr ><td colspan="4" ><b>Invoice Number:</b><?php echo $qt=$r['invoice_no'];?></td>

<td colspan="4"><b>State:</b><?php echo $state1;?></td></tr>


<tr ><td colspan="4"><b>InvoiceDate:</b><?php $d=$r['inv_date']; echo date('d-m-Y', strtotime($d));?></td>
<td colspan="4" ><b>State Code :</b><?php echo $state_code;?></td></tr>

<tr ><td colspan="4"><b>PO No:</b><?php echo $r['po_no']?></td>
<td colspan="4" ><b>PO Date :</b><?php echo $r['po_date'];?></td></tr>

<br></table>-->


</td></tr>

<tr><td colspan="14">

	  <table >
<tr>
<td  >




<table  width="100%" border ='1' cellpadding="0" cellspacing='0'><tr>
<th><b>SERVICE PROVIDER DETAILS</b></th>
<th><b>SERVICE RECIPENT DETAILS</b></th>
</tr>

<tr><td ><b>Name:</b><?php echo $vendor_name1;?></td>
<td ><b>Name:</b><?php echo $r1['company_name'];?></td>
</tr>
<tr>
    <td ><b>Address:</b><?php echo $ap_address;?></td>
    <td ><b>Address:</b><?php echo $r1['address'];?></td>
</tr>
<tr><td>
    <b>PAN:</b><?php echo  $ap_pan; ?>
</td>
<td></td>
</tr>
<tr><td>
    <b>GSTIN:</b><?php echo  $ap_gst; ?>
</td>
<td>
    <b>GSTIN:</b><?php echo $r1['gst_in'];?>
</td>
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
		<?php echo $vendor_name1;?><br/>
		<?php echo $ap_address;?><br/>
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
				<?php echo  $st=$r1['state']; if($st=='AP'){ echo "ANDHRA PRADESH "; } else if($st=='TG'){ echo "TELANGANA STATE"; }?><br/>
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
<th colspan="1" style="width:5%;" >SNo</th>
<th  style="width:30%;"  colspan="2">Description of Material/Service</th>
<th style="width:12%;" colspan="1">HSN/ SAC Codes</th>


<th style="width:10%;" colspan="1">UOM</th>
<th style="width:10%;" colspan="1">QTY</th>
<th style="width:10%;" colspan="1">RATE</th>

<th style="width:10%;" colspan="1">Amount (Rs.)</th>
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
	<th colspan="1" style="width:5px;" ><?php echo $i; ?></th>
	<th colspan="2" style="width:200px;"><?php echo '<b>'.$t1['desc1'].'</b>'; ?></th>
	<th style="width:120px;" colspan="1">
	<?php 

	echo $t1['hsn'];
	?>
	</th>
		<th style="width:60px;" colspan="1"> <?php echo $t1['uom']; ?></th>
		<th style="width:60px;" colspan="1"><?php echo $t1['qty']; ?></th>
	<?php  $bas=$t1['base_amt']; ?>
	<?php  $ser=$t1['serv_amt']; $tax=number_format((float)$t1['gst_amnt'],1, '.', '');  ?>
		<th style="width:60px;" colspan="1"><?php echo $t1['rate']; ?></th>
		
		
	<th style="width:100px;" colspan="1"><?php echo $ser+$bas; ?></th>
	
	
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
	<th  colspan="7"> Sub Total</th>
	<th style="width:100px;"><?php echo $ser1+$bas1;?></th>
	</tr>
	 <tr>
     <th colspan="8">Tax Summary</th></br>
 </tr>

	 <tr>
<th style="width:5px;" colspan="1">SNo</th>
<th style="width:120px;" colspan="1">HSN/ SAC Codes</th>


<th style="width:60px;" colspan="1">Amount</th>
<th style="width:120px;;" colspan="1">SGST</th>
<th style="width:120px;;" colspan="1">CGST</th>
<th style="width:120px;;" colspan="1">IGST</th>

<th style="width:100px;" colspan="2">Tax Amount</th>
</tr>
 <tr>
<th style="width:5px;" colspan="1"></th>
<th style="width:120px;" colspan="1"></th>


<th style="width:60px;" colspan="1"></th>
<th style="width:120px;;" colspan="1"><div class="first-half">
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
                </div></th>
<th style="width:120px;;" colspan="1"><div class="first-half">
                    Rate %
                </div>
                <div class="second-half">
                    Amount
                </div></th>

<th style="width:100px;" colspan="2"></th>
</tr>
<?php include_once('dbconnection/connection.php');
 $ak="select @acount:=@acount+1 sno,hsn,gst,sum((base_amt+serv_amt)) as total,sum(gst_amnt) as gst_amnt from (SELECT @acount:= 0) AS acount,add_tgqot1 where id1='$bid'   group by hsn,gst order by sno";
$tk=mysqli_query($link,$ak);
while($rkk=mysqli_fetch_array($tk)){ ?>
<tr>
<th style="width:5px;" colspan="1"><?php echo $rkk['sno'];?></th>
<th style="width:120px;" colspan="1"><?php echo $rkk['hsn'];?></th>


<th style="width:60px;" colspan="1"><?php echo $rkk['total'];?></th>
<th style="width:120px;;" colspan="1"><div class="first-half">
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
                </div></th>

<th style="width:100px;" colspan="2"><?php echo $rkk['gst_amnt'] ;?></th>
</tr>
<?php $finalamnt=$finalamnt+$rkk['total']+$rkk['gst_amnt'];} $tamt=$tx1+$ser1+$bas1; ?>
 
<tr>
	<th  colspan="7"> Total Tax Value</th>
	<th style="width:80px;"><?php echo $tx1;?></th>
	</tr>
	<tr>
	<th  colspan="7">Total Invoice Value</th>
	<th style="width:80px;"><?php echo $tamt;?></th>
	</tr>
 <tr>
	<th  colspan="9"> Total Invoice Amount in Words
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

	<tr><th  align="left" colspan="4">  BANK DETAILS	</th><td  align="left" colspan="4">  Certified that the particulars given above are true and correct.	</td></tr>	
	<tr><th  align="left" colspan="4"> Acc No.120000786998		</th></tr>	
	<tr><th align="left" colspan="4"> Bank Name:Canara Bank</th></tr>		
	<tr><th  align="left" colspan="4">Branch Name: Bharathi Nagar,VJY</th></tr>	
	<tr><th align="left" colspan="4">IFSC: CNRB0013749 </th></tr>	
	
	
      </tbody>
    </table></td></tr></table>
   <div style="border-right:none !important;font-size:18px;">
			<img src="footerraisedinvoice.jpeg" height="200"/></div>
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
   setTimeout(\"DoTheRedirect('tgbill_list31.php')\",parseInt(2*1000));
function DoTheRedirect(url) { window.location=url; }

</script>";
?>
 