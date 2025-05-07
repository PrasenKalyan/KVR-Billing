<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>JTECHNO BILLING</title>
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
<style type="text/css">
    table { page-break-inside:auto;page-break-inside:auto;border-color:#fff;font-family: "Times New Roman", Times, serif;font-size:12px;  }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
    thead,tfoot{border:none !important;border-color:#fff;}
    
    tr.noBorder th {
  border:none !important;
  border-color:#fff;
}
#tds{
    
border:0;
}
table {
border-left:none !important;
border-top: none !important;
border-bottom: none !important;
border-right:none !important;
}
 .pageNumbering
{
display:block;
font-weight: normal;
font-size: 8pt;
color: #666666;
font-style: normal;
font-family: Arial, Helvetica;
text-decoration: none;
text-align: right; 
}
.pagenum:before { content: counter(page); }
footer {
  font-size: 24px;
  color: #f00;
  width:100%;
   text-align: center;
}
header {
  font-size: 9px;
  color: #f00;
  text-align: center;
}

@page {
  size: A4;
  margin: 11mm 9mm 11mm 5mm;
  
  @bottom {
	content: "Page " counter(page) " of " counter(pages)
    }
}

@media print {
  footer {
    position: fixed;
    bottom: 0;
	width:100%;
  }
header {
    position: fixed;
    top: 0;
  }
  .content-block, p {
    page-break-inside: avoid;
  }

  html, body {
    width: 210mm;
    height: 297mm;
  }
}
.pagenum:before { content: counter(page); }
</style>
</head>
<body>
    <div class="page">
<?php //include('config.php');
include('dbconnection/connection.php');
$bid=$_GET['id'];
$loc=$_GET['loc'];
$q=mysqli_query($link,"select * from add_bill1 where id='$bid'") or die(mysqli_error($link));
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

?>





   <header>
   
   
   
   <!-- style="width:100%;height:120px;"-->
      <!-- <img src="jyothi.jpg" style="width:100%;height:120px;"/>-->
    </header>
    <table border='1'  cellpadding="0" cellspacing='0'>
        <thead>
            <tr class="noBorder" ><th   colspan="9" style="padding-top:20px;border-right:none !important;font-size:18px;">JTECHNO ASSOCIATES FACILITY MANAGEMENT PVT.LTD</th></tr>
 <tr><td colspan="9">      
<hr></td></tr>
	   </thead>
        <tfoot>
            <tr class="noBorder " style="border-color:#fff;border-left-color:#fff;"><th class="noBorder " colspan="14" style="padding-top:80px;"></th></tr>
        </tfoot>
        <tbody>
        </tbody>
        <tr><td colspan="8" style="text-align:center;font-size:18px;border:0px;"><b>TG QUOTATIONS LIST</b></td></td></tr>
        <tr><td colspan="14"><fieldset style="    border-right: 1px groove;
    border-left: 0px;
    border-top: 0px;
    border-bottom: 0px;">
 <?php include('dbconnection/connection.php');





 
 
?>    


    <tr style="background-color:#eeece1;">
<th >SNo</th>
 
                                                        <th>Quotation No</th>
                                                         <th>Store Code</th>
                                                        <th>Store Name</th>
														
														<th>Coordinator Name</th>
                                                        <th>Super Wisor</th>
                                                         <th>City</th>
														  <th>Date</th>
														  <th>Status</th>


</tr>



<?php
include_once('dbconnection/connection.php');
$bid=$r['id'];

	 $aa="select * from add_tgqot order by id desc ";
 
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;
$gst_amnt1=0;
$tx=0;
while($rs1=mysqli_fetch_array($t)){
	
	?>
	<tr>
	<th ><?php echo $i; ?></th>
	 <td class="hidden-480"><?php echo $rs1['quet_num']; ?></td>
                                                        <td class="hidden-480"><?php echo $store_code=$rs1['store_code'];
														include('dbconnection/connection1.php');
$ssq1=mysqli_query($link,"select * from dpr where store_code='$store_code'");
$r1=mysqli_fetch_array($ssq1);

														?></td>
                                                        
                                                        <td class="hidden-480"><?php echo $r1['store_name']; ?></td>
                                                        
														
														<td class="hidden-480"><?php echo $r1['coordinator']; ?></td>
                                                        <td class="hidden-480"><?php echo $r1['superwisor']; ?></td>
                                                        <td class="hidden-480"><?php echo $r1['city']; ?></td>
                                                        <td class="hidden-480"><?php  $d= $rs1['inv_date']; echo date('d-m-Y', strtotime($d)); ?></td>
                                                        	<td class="hidden-480"><?php echo $rs1['status']; ?></td>
	
	
	
	</tr>
	
<?php $i++;}?>
 
        <!-- 500 more rows -->
    <!-- <tr>
			<th colspan="5" style="border-bottom-color: #000 !important;">
			
			
			
					Certified that the particulars given above are true and correct.
			
			</th>
        <th colspan="6" style="font-size:14px;  border-right-color: #000 !important; border-bottom-color: #000 !important;">For Jyothi Infra Service,
        <br/><br/>
	   <br/>  <br/>  <br/>
        Authorized Signatory
        
        </th>
 </tr>       
       -->
       
    </tbody>
    </table>
    <table align="center">
     <tr><td height="20px"></td></tr><tr>
    <td></td><td align="center"><input type="button" value="Print" id="prt" class="butt" onclick="printt()"/></td><td><input type="button" value="Close" id="cls" class="butt"  onclick="window.close();"/></td>
</tr></table>
<footer>
 <!--<div class="footer">Page: <span class="pagenum"></span></div>-->
 <!--<span class="pagenum"></span>-->
    <hr/>
  <!-- <div>Regd.Office : Farha Villa, D.No.8-1-22/1/J/1, 7 Tombs Road, Tolichowki, Hyderabad - 500 008. T.S.</div>             
    <div>Email : ospsinfo@ospsindia.com, ospshyd@yahoo.com, Website:www.ospsindia.com</div>
<div>CIN:U64203TG2004PTC042772</div>-->


    </footer>
</div>
</body>
</html>