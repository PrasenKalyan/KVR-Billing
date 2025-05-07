<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
 $name=$_SESSION['user'];
//include('org1.php');
include'dbfiles/org.php';
//include'dbfiles/iqry_acyear.php';a
?>
<!DOCTYPE html>
<html lang="en">
<?php include'template/headerfile.php'; ?>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> 
<style>
strong{
color:red;
}
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}

    </style>
    <script>
	function s2(i){
	    var curval= document.getElementById("pname"+i).value;
	$.ajax({          
        	type: "GET",
        	url: "getkldescriptionauto.php",
        	data:{keyword:curval, id: i},
        	success: function(data){
        		$("#suggesstion-box"+i).show();
			$("#suggesstion-box"+i).html(data);
			$("#pname"+i).css("background","#FFF");
        	}
	});
}
	function selectCountry(val,i) {
document.getElementById("pname"+i).value=val;
$("#suggesstion-box"+i).hide();
}
	</script>
	
	<script>
	
	function deleteRow()
   {	
var rr=document.getElementById("rows1").value

if(rr!=0){
   // var oRow = rr.parentNode.parentNode;
    document.getElementById("dynamic-table1").deleteRow(rr);  
	var row=document.getElementById("rows1").value
	document.getElementById("rows").value=row-1;
total();
	}
	else{
	alert('Please Select Atleast One Row');
	return false;
	}
   }
	
	
   
        function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
    }
    </script>
	<script>
function showHint22(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	//document.getElementById("state").value=strar[1];
	
	//document.getElementById("city").value=strar[2];	
	document.getElementById("store_name").value=strar[1];	
	document.getElementById("state").value=strar[2];
    document.getElementById("state_code").value=strar[3];
	//document.getElementById("addr").value=strar[4];	
	document.getElementById("gst_in").value=strar[4];
	document.getElementById("store_type").value=strar[5];
	
	document.getElementById("supervisor").value=strar[6];
	document.getElementById("cordinator").value=strar[7];
	document.getElementById("afm").value=strar[8];
	document.getElementById("company").value=strar[9];
    }
  }
xmlhttp.open("GET","get-apdata3.php?q="+str,true);
xmlhttp.send();
}
</script>
	
<script>
function showUser(str,id)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	//document.getElementById("state").value=strar[1];
	
	//document.getElementById("city").value=strar[2];	
	document.getElementById("serv_num"+id).value=strar[1];	
	document.getElementById("hsn"+id).value=strar[2];
    document.getElementById("gst"+id).value=strar[3];
	//document.getElementById("addr").value=strar[4];	
	document.getElementById("uom"+id).value=strar[4];
	document.getElementById("price"+id).value=strar[5];
	document.getElementById("serv_amt"+id).value=strar[6];
	
	
    }
  }
xmlhttp.open("GET","get_kitems.php?q="+encodeURI(str),true);
xmlhttp.send();
}
</script>	  
	
	
	
	
	<script>
 $(document).on('keyup', '.txt1', function(){
 var id=$(this).attr('data-row');
 
 var qty=document.getElementById('qty'+id).value;
 var price=document.getElementById('price'+id).value;
 
 
 bal=parseFloat(qty)*parseFloat(price);
 document.getElementById('amnt'+id).value=bal;
 calculateTotal1();
 calculateTotal1k();
 calculateTotal1kk();
 calculateTotal1kv();
 
 });
 
 
 $(document).on('keyup', '.txt20', function(){
 var id=$(this).attr('data-row');
 
 var amt=document.getElementById('amnt'+id).value;
 var sgst=document.getElementById('sgst'+id).value;
  var serv_amt=document.getElementById('serv_amt'+id).value;
 
 
 bal=(parseFloat(amt)*parseFloat(sgst))/100;
 alert(sgst);
  ser=(parseFloat(amt)*parseFloat(serv_amt))/100;
 document.getElementById('sgstamt'+id).value=bal;
  document.getElementById('serv_amnt'+id).value=ser;
 calculateTotal2();
 
 });
 
 $(document).on('keyup', '.txt21', function(){
 var id=$(this).attr('data-row');
 
 var amt=document.getElementById('amnt'+id).value;
 var cgst=document.getElementById('sgst'+id).value;
 
 
 bal=(parseFloat(amt)*parseFloat(cgst))/100;
 document.getElementById('cgstamt'+id).value=bal;
 calculateTotal3();
 
 });
 
 
 function calculateTotal1(){
	subTotal = 0 ; total = 0; 
	$('.txt').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
 
 function calculateTotal1kv(){
	subTotal = 0 ; total = 0; 
	$('.txt7').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot_serv').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
  function calculateTotal1k(){
	subTotal = 0 ; total = 0; 
	$('.txt4').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot_gst').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 function calculateTotal1kk(){
	subTotal = 0 ; total = 0; 
	$('.txt5').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#net').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
 function calculateTotal2(){
	subTotal = 0 ; total = 0; 
	$('.txt50').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#sgsttotal').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 function calculateTotal3(){
	subTotal = 0 ; total = 0; 
	$('.txt51').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#cgsttotal').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
 </script>
 
    <body class="no-skin">
        <?php include'template/logo.php'; ?>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')} catch (e) {
                    }
                </script>

                <!-- /.sidebar-shortcuts -->
                <?php include'template/sidemenu.php' ?>
                <!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>
         

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
								<li>
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="qot_list"> Quotations</a>
                            </li>
                            <li>
                                <a href=""> Add Quotations</a>
                            </li>
                           
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Add Quotations

                            </h1>
                        </div>
                        
                                <?php 
						 $a="select `count` as cnt from qutcount where state='KL' ";
						$ssq=mysqli_query($link,$a);
						 $r=mysqli_fetch_array($ssq);
						$cnt1=$r['cnt'];
						
						 $cnt=  23240000+1+$cnt1;
						
						?>
                
                        
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       <a onclick="window.open('add_stock.php','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')" ><b style="color:red;">Add Store</b></a>
 <form name="frm" method="post" action="klqot_suc.php" enctype="multipart/form-data">
 <input type="hidden" name="id" value="<?php echo $id?>">
  <input type="hidden" name="ses" value="<?php echo $name;?>">
                                            <table class="table table-striped table-bordered table-hover">
											
											<tr>
											    <td align="right">Quote No</td>
											    <td> <input  type="text" readonly  class="form-control" value="QJFMKL<?php echo $cnt;?>" required name="qt_no" id="qt_no"></td>
											    <td align="right">Manual Quote NO</td>
											     <td><input  type="text"   class="form-control" value=""  name="qt_no1" id="qt_no1"></td>
											</tr>
											
											
											
											
											
											  <tr><td align="right">Store Code</td><td align="left">
											
											 <input id=\"store_code\" list=\"city1\" class="form-control" name="store_code" onChange="showHint22(this.value)" >
<datalist id=\"city1\" >

<?php 
include_once('dbconnection/connection1.php');
$sql="select distinct store_code from dpr where state='KL' or state='Kerala' ";  // Query to collect records
$r1=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r1)) {
echo  "<option value=\"$row[store_code]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";
include_once('dbconnection/connection.php');
?>
											</td>
											 
                                        <td align="right">Quote Date</td><td><input type="date" value="<?php echo date('Y-m-d');?>"  required name="inv_date" id="inv_date" class="form-control"></td>
                                        </tr>
											
                                            <tr>
											
											<td align="right">State</td><td align="left"><input  type="text" value=""  class="form-control" name="state" id="state"></td>
                                      
											
											<td align="right">Store Name</td><td align="left">
											<input type="text" class="form-control"  value="" id="store_name" name="store_name">
											
											</td>
</tr>
                                        
                                        <tr><td align="right">Store Type</td><td align="left">
										 <input  type="text" value=""  class="form-control" name="store_type" id="store_type"></td>
                                        <td align="right">State Code</td><td><input type="text"  name="state_code" id="state_code" class="form-control"></td>
                                        </tr>
                                        
										
										 <tr><td align="right">Supervisor</td><td align="left">
										 <input  type="text" value=""  class="form-control" name="supervisor" id="supervisor"></td>
                                        <td align="right">Company Name</td><td>
										<input type="text" required name="company" id="company" class="form-control"></td>
                                        </tr>
										
										
										 <tr><td align="right">AFM</td><td align="left">
										<input type="text" required name="afm" id="afm" class="form-control"></td>
                                       <td align="right">Coordinator</td><td>
										<input type="text" requried name="cordinator" id="cordinator" class="form-control"></td>
                                        </tr>
										
                                         <tr><td align="right">FM Fault No</td><td align="left">
										<input type="text" required name="falt_no" id="falt_no" class="form-control"></td>
                                          <td align="right">GSTIN/UIN</td><td><input type="text" name="gst_in" id="gst_in" required class="form-control"></td>
                                        </tr>
										
										   <tr><td align="right">Fault Description</td><td align="left">
										<textarea  required name="falt_desc" id="falt_no" class="form-control"></textarea></td>
                                        <td align="right">FM Fault date</td><td><input type="date" name="falt_date" 
										id="falt_date" required  class="form-control" value="<?php echo date('Y-m-d');?>"></td>
                                        </tr>
                                        <tr><td align="right">Photo1</td><td align="left">
										<input type="file"   required  name="img1" id="img1" class="form-control"/></td>
                                        <td align="right">Photo2</td><td><input type="file" name="img2" 
										id="img2"  class="form-control" value=""/></td>
                                        </tr>
										
										<tr><td align="right">Photo3</td><td align="left">
										<input type="file"   name="img3" id="img3" class="form-control"/></td>
                                        
                                        </tr>
																				
										  
                                        <!--<tr><td align="right">Indus ID</td><td align="left"><input type="text" value="<?php echo $r['indus_id'];?>" required class="form-control" name="indus_id" id="indus_id"></td>
                                        <td align="right">Req.Ref.No</td><td><input type="text" name="req_ref" id="req_ref" value="<?php echo $r['req_ref'];?>" required class="form-control" onblur="showHint22(this.value)"></td>
                                        </tr>
                                         <tr><td align="right">Seeking Opco ID</td><td align="left"><input type="text" value="<?php echo $r['seeking_id'];?>" required class="form-control" name="seeking_id" id="seeking_id"></td>
                                        <td align="right">State</td><td><input type="text" name="state" required value="<?php echo $r['state'];?>" class="form-control"></td>
                                        </tr>
                                        <tr><td align="right">Seeking Opco</td><td align="left"><input type="text" value="<?php echo $r['seeking_opt'];?>" required class="form-control" name="seeking_opt" id="seeking_opt"></td>
                                        <td align="right">RFAID date</td><td><input type="date" name="rfaid_date" id="rfaid_date" value="<?php echo $r['rfaid_date'];?>"  class="form-control"></td>
                                        </tr>
                                        <tr><td align="right">Allocation Date</td><td align="left"><input type="date" value="<?php echo $r['allcoation_date'];?>" required class="form-control" name="allcoation_date" id="allcoation_date"></td>
                                        <td align="right">WCC NO</td><td><input type="text" name="wcc_num"  id="wcc_num"value="<?php echo $r['wcc_num'];?>" required class="form-control"></td>
                                        </tr>
                                         <tr>
                                        <td align="right">WCC Reciept NO</td><td><input type="text" value="<?php echo $r['wcc_rec_num'];?>" name="wcc_rec_num" required class="form-control"></td>
                                         <td align="right">Type of Work</td><td><input type="text" name="type_work" id="type_work" value="<?php echo $r['type_work'];?>"   class="form-control"></td>
                                        </tr>
                                         <tr>
                                         <td align="right">Bar Code</td><td><input type="text" value="<?php echo $r['qr_code'];?>" name="bar_code"  class="form-control"></td>
                                        
                                        <td align="right">Submited Date</td><td>
										<input type="date" class="form-control"  value="" required name="inv_date">
										
										<input type="date" value="<?php echo $r['bill_submit_date'];?>" name="sub_date"  class="form-control"></td>
                                        
                                        </tr>
                                         <tr>
                                         <td align="right">Payment Document No</td><td><input type="text" value="<?php echo $r['payment_doc_no'];?>" name="payment_doc_no"  class="form-control"></td>
                                        
                                        <td align="right">Payment Documen Date</td><td><input type="date" value="<?php echo $r['payment_doc_date'];?>" name="payment_doc_date"  class="form-control"></td>
                                        
                                        </tr>-->
                                        
                                        </table>
                                        <?php  $tt=$r['total_amnt'];
										$tt1=$r['total_sgst'];
										
										?>
                                        
                                        <div class="table-header">
                                         Items  List
                                        </div>
                                        
                                        <?php 
										//$aa="select * from add_bill where id1='$id'";
										/*$aa="select a.item_desc,a.hsn,a.sac,b.qty,b.price,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst,
										sum(b.tax_amnt) as tax,sum(b.gst_amnt) as gs
 from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code and a.category=b.temp_type";*/
//$/t=mysqli_query($link,$aa) or die(mysqli_error($link));?>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                       
                                      
                                          
                                            <div align="right">

<button type="button" class='btn btn-success addmore'>+</button>
<button type="button" class='btn btn-danger delete'>-</button>
	</div>
                                            <div class="table-responsive">
                                            <table id="dynamic-table1" class="table table-striped table-bordered table-hover">
 <tr><td colspan="3"><a onclick="window.open('addkluitems.php','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')" ><b style="color:red;">Add Items</b></a></td>
 <td colspan="9"><b style="color:red;">for getting the values after selecting the description column please click on descripton text box once</b></td></tr>
 </tr>
                                             <tr>
														<th>C</th>
														<th>ID</th>
													
														  <th> Description</th>
                                                       <th> Service Id</th>
                                                 <th> Brand/Make</th>
														 <th> Model</th>
                                                        <th>HSN<br/> /SAN Code</th>
                                                       
                                                        <th>GST</th>
                                                          <th>UOM</th>
                                                        <th>RATE</th>
                                                           <th>QTY</th>
                                                        
														  <th>BASE AMOUNT</th>
                                                       <th>SERVICE FEE(6%)</th>
													    <th>GST AMOUNT(18%)</th>
                                                     <th>Service AMOUNT</th>
                                                     
														</tr>
														<tbody>
                                                        <!--<th>HSN</th>
                                                        <th>SAC</th>
                                                        <th>Item Category</th>-->
                                              
											
                                                        
                                                    
                                                    
                                        <tr>
										
									
										<td colspan="11" align="right"><strong>NET AMOUNT</strong></td>
										<td>
										<input style="width:60px;" type="text"  placeholder="Total Amount" readonly name="tot" class="txt5" value="<?php echo $tt;?>" id="tot" />+
                                       
									</td>
									<td><input style="width:60px;" type="text" readonly placeholder="Total Serv" name="tot_serv" class="txt5" value="<?php echo $r['total_sgst'];?>" id="tot_serv" />+
									</td>
                                        <td colspan="1">
										
										<input style="width:60px;" type="text" readonly placeholder="Total Gst" name="tot_gst" class="txt5" value="<?php echo $r['total_sgst'];?>" id="tot_gst" />=
									
										 <input type="hidden" name="tot1" id="tot1" value="<?php echo $tt1?>" />
                                        </td>
											
										<td colspan=""><input style="width:60px;" type="text" placeholder="Total Net Amount" readonly name="net" value="<?php echo $r['total_cgst'];?>" id="net" /></td>
										</tr>
										</tbody>
                                        </table>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                          
                                        
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
                                            </button>
										
										
			

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="klqot_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div></div></div></div>
                                    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>   
                                    <script src="assets/js/jquery-2.1.4.min.js"></script>  
                                      <script type="text/javascript">
$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal1();
	calculateTotal2();
	calculateTotal3();
});
var i=100;

$(".addmore").on('click',function(){
    i++; 
	var data ="<tr>";
    data +="<td><input type='checkbox' class='case'/></td>";
	data +="<td>"+i+"</td>"; 
   // data +="<td><input type='hidden' name='id1[]'  id='id1"+i+"' style='width:30px;' data-row='"+i+"' value='<?php echo $id ?>'><input type='hidden' name='id5[]' id='id5"+i+"' style='width:30px;' data-row='"+i+"' value=''><input data-row='"+i+"' type='text' name='sno[]' id='sno"+i+"' style='width:30px;' value=''></td>";          
   	 
data +="<td><input type='text' name='pname[]'  id='pname"+i+"' data-row='"+i+"' style='width:150px;' class='form-control pname"+i+"' onkeyup='s2("+i+")'  onClick='showUser(this.value,"+i+")'><div id='suggesstion-box"+i+"'></div>";
	
	data +="</td>";
data +="<td><input type='text' name='serv_num[]' data-row='"+i+"' value='' style='width:60px;'  class='' id='serv_num"+i+"' /> </td>";          
  data +="<td><input type='text' name='brand[]' required  value='' style='width:50px;'  id='brand"+i+"' />	   </td>";
	   data +="<td> <input type='text' name='model[]' required  data-row='"+i+"'  value='' style='width:60px;' class=''   id='model"+i+"' /></td>";          
 
	  data +="<td><input type='text' name='hsn[]'  value='' style='width:50px;'  id='hsn"+i+"' />	   </td>";
	   data +="<td> <input type='text' name='gst[]'  data-row='"+i+"'  value='' style='width:60px;' class='txt20'   id='gst"+i+"' /></td>";          
     
    data +="<td><input type='text' name='uom[]'  id='uom"+i+"' value='' style='width:70px;' data-row='"+i+"'></td>";
	data +="<td><input type='text' name='price[]'  data-row='"+i+"' id='price"+i+"' style='width:70px;' value=''   /></td>";
	 data +="<td><input type='text' name='qty[]'  data-row='"+i+"' onkeyup='qval(this.value,"+i+")' value='' class='txt1 ' style='width:60px;' class=' ' id='qty"+i+"'  /> </td>"; 
	 

    data +="<td><input type='text' name='amnt[]' data-row='"+i+"' value='' style='width:60px;' readonly class='txt tx6' id='amnt"+i+"' /> </td>";          
      data +="<td><input type='text' name='serv_amnt[]' data-row='"+i+"' readonly value='' style='width:60px;' class='txt7 '   id='serv_amnt"+i+"' /> </td>";          
   
   data +="<td><input type='text' name='gst_amnt[]' data-row='"+i+"' value='' style='width:60px;' class='txt4 ' readonly  id='gst_amnt"+i+"' /> </td>";          
   
   	data +="<td><input type='text' name='serv_amt[]' data-row='"+i+"'  style='width:60px;'  class='' id='serv_amt"+i+"' value='6'/> </td>";   
   	data +="<td><input type='hidden' name='id[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='id"+i+"' /> </td>";          
   	data +="<td><input type='hidden' name='cap[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='cap"+i+"' /> </td>";          
   	       
   	data +="<td><input type='hidden' name='serv_code[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='serv_code"+i+"' /> </td>";          
   
	 
	data +="</tr>";
	$('#dynamic-table1 ').append(data).find('#dynamic-table1>tbody>tr:nth-child(2)');
	

	});
function select_all() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=check_all]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
}
</script>
<!--<script>
$(document).ready(function(){
$(".txt1").each(function(){
$(this).keyup(function(){
calculateSum();
});
});
});
function calculateSum(){
var sum=0;
$(".txt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot").val(sum.toFixed(2));

}
</script> 

<script>
$(document).ready(function(){
$(".txt2").each(function(){
$(this).keyup(function(){
calculateSum1();
});
});
});
function calculateSum1(){
var sum=0;
$(".txt3").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot1").val(sum.toFixed(2));

}
</script> 

<script>
$(document).ready(function(){
$(".txt4").each(function(){
$(this).keyup(function(){
calculateSumk();
});
});
});
function calculateSumk(){
var sum=0;
$(".txt4").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot_gst").val(sum.toFixed(2));

}
</script> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
                            if ('ontouchstart' in document.documentElement)
                                document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="assets/js/dataTables.buttons.min.js"></script>
        <script src="assets/js/buttons.flash.min.js"></script>
        <script src="assets/js/buttons.html5.min.js"></script>
        <script src="assets/js/buttons.print.min.js"></script>
        <script src="assets/js/buttons.colVis.min.js"></script>
        <script src="assets/js/dataTables.select.min.js"></script>

        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
		<script type="text/javascript">

function val(str,id)
{
cal=0;
cal1=0;
cal12=0;
//alert(id);
var price=document.getElementById("price"+id).value;
var qty=document.getElementById("qty"+id).value;
var gst=document.getElementById("gst"+id).value;
var serv_amt=document.getElementById("serv_code"+id).value;
//var serv_amtk=document.getElementById("serv_amnt"+id).value;
//alert(serv_amtk);

//var cgst=document.getElementById("cgst"+id).value;
//var gst=Math.abs(sgst)+Math.abs(cgst);
cal=eval(price)*eval(qty);
//alert(cal);
//document.getElementById("amnt"+id).value+document.getElementById("serv_amtk"+id).value=Math.abs(cal);	
cal12=eval(price)*eval(qty)*eval(serv_amt)/100;
//alert(cal12);
calk=(cal)+(cal12);
//alert(calk);
cal1=eval(calk)*eval(gst)/100;	






//document.getElementById("gst_amnt"+id).value=cal1;
//alert(cal12);
document.getElementById("serv_amnt"+id).value=Math.abs(cal12);	
//document.getElementById("serv_amnt"+id).value=cal12;


document.getElementById("gst_amnt"+id).value=Math.abs(cal1);	



}

function qval(str,id)
{
cal=0;
cal1=0;
cal12=0;
//alert(id);
var price=document.getElementById("price"+id).value;
var qty=document.getElementById("qty"+id).value;
var gst=document.getElementById("gst"+id).value;
var serv_amt=document.getElementById("serv_amt"+id).value;
//var serv_amtk=document.getElementById("serv_amnt"+id).value;
//alert(serv_amtk);

//var cgst=document.getElementById("cgst"+id).value;
//var gst=Math.abs(sgst)+Math.abs(cgst);
cal=eval(price)*eval(qty);
document.getElementById("amnt"+id).value=cal;

//alert(cal);
//document.getElementById("amnt"+id).value+document.getElementById("serv_amtk"+id).value=Math.abs(cal);	
cal12=eval(price)*eval(qty)*eval(serv_amt)/100;
//alert(cal12);
calk=(cal)+(cal12);
//alert(calk);
cal1=eval(calk)*eval(gst)/100;	






//document.getElementById("gst_amnt"+id).value=cal1;
//alert(cal12);
document.getElementById("serv_amnt"+id).value=Math.abs(cal12);	
//document.getElementById("serv_amnt"+id).value=cal12;


document.getElementById("gst_amnt"+id).value=Math.abs(cal1);	

calculateTotal1();
 calculateTotal1k();
 calculateTotal1kk();
 calculateTotal1kv();

}



</script>



</body>
</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>
