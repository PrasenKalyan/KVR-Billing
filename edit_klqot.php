<?php //include('config.php');
session_start();
$stn="KL";
include('dbconnection/connection.php');
if($_SESSION['user'])
{
 $name=$_SESSION['user'];
//include('org1.php');
include'dbfiles/org.php';
//include'dbfiles/iqry_acyear.php';
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
xmlhttp.open("GET","get_kitems.php?q="+str,true);
xmlhttp.send();
}
	  




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
function myFunction() {
	var adv=document.getElementById('adv_amnt').value;
	//alert(adv);
	var adv1=document.getElementById('adv_amnt1').value;
	var adv2=document.getElementById('adv_amnt2').value;
	var p=parseFloat(adv)+parseFloat(adv1)+parseFloat(adv2);
	var tot=document.getElementById('tot').value;
	if(tot < p){
alert('your advance amount is greater than total amount');
$("#submit").prop('disabled',true);
	}else{
		$("#submit").prop('disabled',false);
		
	}
}
</script>
	<script>
   
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
 $(document).on('keyup', '.txt1', function(){
 var id=$(this).attr('data-row');
 
 var qty=document.getElementById('qty'+id).value;
 var price=document.getElementById('price'+id).value;
 
 //alert(price);
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
 //alert(sgst);
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
                                <a href="#">KL Quotations</a>
                            </li>
                            <li>
                                <a href="qot_list.php"> Quotations List</a>
                            </li>
                            <li>
                                <a href="">Edit Quotations</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Edit Quotations

                            </h1>
                        </div>
                        
                      
                        
                 <?php  $id=$_GET['id'];
						$sq=mysqli_query($link,"select * from add_klqot where id='$id'");
						$r=mysqli_fetch_array($sq);
						$rono=$r['ro_no'];
						?>             <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       
 <form name="frm" method="post" action="klqot_suc.php" enctype="multipart/form-data">
 <input type="hidden" name="ids" value="<?php echo $id?>">
  <input type="hidden" name="ses" value="<?php echo $name;?>">
                                            <table class="table table-striped table-bordered table-hover">
											
											  <tr><td align="right">QuoteNumber</td><td align="left">
											  <input  type="text" readonly  class="form-control" value="<?php echo $r['quet_num'];?>"  name="qt_no" id="qt_no"></td>
                                        <td align="right">Quote Date</td><td><input type="text" value="<?php echo $r['inv_date'];?>" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>   name="inv_date" id="inv_date" class="form-control"></td>
                                        </tr>
											
                                            <tr>
											
											<td align="right">Store Code</td><td align="left">
											
											 <input id=\"store_code\" list=\"city1\"  <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> class="form-control" name="store_code" value="<?php echo $str=$r['store_code'];?>" onblur="showHint22(this.value)" >
<datalist id=\"city1\" >

<?php 
include_once('dbconnection/connection1.php');
$sql="select distinct store_code from dpr where state='KL' or state='Kerala' ";  // Query to collect records
$r1=mysqli_query($link,$sql) or die(mysqli_error($link));
while ($row=mysqli_fetch_array($r1)) {
echo  "<option value=\"$row[store_code]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";
include_once('dbconnection/connection.php');
$a="select * from dpr where store_code='$str'";
	$ssq=mysqli_query($link,$a);
	$r2=mysqli_fetch_array($ssq);
?>
											</td>
											
										<td align="right">Store Name</td><td align="left">
											<input type="text" class="form-control"  value="<?php echo $r2['store_name'];?>" id="store_name" name="store_name" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>>
											
											</td>
</tr>
                                        
                                        <tr><td align="right">State</td><td align="left"><input <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>  type="text" value="<?php echo $r2['state'];?>"  class="form-control" name="state" id="state"></td>
                                        <td align="right">State Code</td><td><input type="text"  name="state_code" value="<?php echo $r2['state_code'];?>" id="state_code" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> class="form-control"></td>
                                        </tr>
                                        
										
										 <tr><td align="right">Store Type</td><td align="left">
										 <input  type="text" value="<?php echo $r2['format_type'];?>"  class="form-control" name="store_type" id="store_type" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>></td>
                                        <td align="right">Company Name</td><td>
										<input type="text" required name="company" id="company" value="<?php echo $r2['company_name'];?>" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> class="form-control"></td>
                                        </tr>
										
										
										 <tr><td align="right">Supervisor</td><td align="left">
										 <input  type="text"   class="form-control"  value="<?php echo $r2['superwisor'];?>" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> name="supervisor" id="supervisor"></td>
                                        <td align="right">Coordinator</td><td>
										<input type="text" required name="cordinator" id="cordinator" value="<?php echo $r2['coordinator'];?>" class="form-control" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>></td>
                                        </tr>
										
                                         <tr><td align="right">AFM</td><td align="left">
										<input type="text" required name="afm" id="afm" value="<?php echo $r2['afm'];?>" class="form-control" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>></td>
                                        <td align="right">GSTIN/UIN</td><td><input type="text" name="gst_in" id="gst_in" value="<?php echo $r2['gst_in'];?>" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>  class="form-control"></td>
                                        </tr>
										
										   <tr><td align="right">FM Fault No</td><td align="left">
										<input type="text" required name="falt_no" id="falt_no" value="<?php echo $r['falt_no'];?>" class="form-control"></td>
                                        <td align="right">FM Fault date</td><td><input type="text" name="falt_date" 
										id="falt_date" required class="form-control" value="<?php echo $r['falt_date'];?>"   <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>    ></td>
                                        </tr>
										
										   <tr><td align="right">Fault Description</td><td align="left">
										<textarea  required name="falt_desc" id="falt_no" class="form-control" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>><?php echo $r['falt_desc'];?></textarea></td>
                                       
                                        </tr>
										 <tr><td align="right">Type of Work</td><td align="left">
										<input type="text" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> name="type_of_work" 
										id="type_of_work"  class="form-control" value="<?php echo $r['type_of_work'];?>"></td>	
                                        <td align="right">Sub Type</td><td><input type="text" name="sub_type" 
										id="sub_type" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?>  class="form-control" value="<?php echo $r['sub_type'];?>"></td>
                                        </tr>
									    <tr><td colspan="2"><b>Before Images</b></td></tr>
										<tr>
                                        <td align="right">Image1 </td><td>
										<input type="file" name="image">
										<input type="hidden" name="img1" value="<?php echo $r['img1'];?>">
										<input type="hidden" name="img2" value="<?php echo $r['img2'];?>">
										<input type="hidden" name="img3" value="<?php echo $r['img3'];?>">
											<input type="hidden" name="img4" value="<?php echo $r['img4'];?>">
										<input type="hidden" name="img5" value="<?php echo $r['img5'];?>">
										<input type="hidden" name="img6" value="<?php echo $r['img6'];?>">
										
										<a href="upload/<?php echo $r['img1'];?>" target="_blank" >View Image/File</a>
										</td>
										<td align="right">Image2</td><td align="left">
										<input type="file" name="imagea">
										<a href="upload/<?php echo $r['img2'];?>" target="_blank" >View Image/File</a></td>
                                        </tr>
										<tr>	
                                        <td align="right">Image3 </td><td>
										<input type="file" name="imageb">
											<a href="upload/<?php echo $r['img3'];?>" target="_blank" >View Image/File</a>
										</td>
                                        </tr>
                                    <tr><td colspan="2"><b>After Images</b></td></tr>
                                    	<tr>
                                        <td align="right">Image4 </td><td>
										<input type="file" name="image4">
									
										
											<a href="upload/<?php echo $r['img4'];?>" target="_blank" >View Image/File</a>
										</td>
										<td align="right">Image5</td><td align="left">
										<input type="file" name="image5">
											<a href="upload/<?php echo $r['img5'];?>" target="_blank" >View Image/File</a></td>
                                        </tr>
										<tr>	
                                        <td align="right">Image6 </td><td>
										<input type="file" name="image6">
											<a href="upload/<?php echo $r['img6'];?>" target="_blank" >View Image/File</a>
										</td>
                                        </tr>
                                    
                                        </table>
                                        <?php  $tt=$r['total_amnt'];
										$tt1=$r['total_sgst'];
										$inv_no=$r['invoice_no'];
										
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
                                       
                                      
                                          <?php if($rono!=''){ }else { ?>
                                        <div align="right">
	
<button type="button" class='btn btn-success addmore'>+</button>
<button type="button" class='btn btn-danger delete'>-</button>
	</div>
                                          <?php } ?>
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
                                                    <th>Serv AMOUNT</th>
                                                     
														</tr>
														<tbody>
                                                        <!--<th>HSN</th>
                                                        <th>SAC</th>
                                                        <th>Item Category</th>-->
                                              
											<?php   $id=count($_POST['id']);
											 $id1=$_GET['id'];
											 $aa="select * from add_klqot1 where id1='$id1'";
												$sq=mysqli_query($link,$aa);
												$i=1;
												while($rs1=mysqli_fetch_array($sq)){
												
													?>
                                                    <tr>
													
													<td><?php echo $i;?> <input type="hidden" name="cnt" id="cnt" value="<?php echo $cnt; ?>"></td>
                                                    <td width="20px;">
													
												
													<a onclick="return confirm('Are you sure you want to delete this item?');" href='delete_klline.php?id=<?php echo $rs1['id']; ?>&id1=<?php echo $rs1['id1'];?>'><input type="button" class="btn btn-danger" value="Delete"></button>
							</a>
							
							
							
							
							
							<input type="hidden" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> name="sno[]" style="width:30px;" value="<?php echo $rs1['sno']; ?>">
							<input type="hidden"  name="id1[]" style="width:30px;" value="<?php echo $rs1['id1']; ?>">
							<input type="hidden" name="id5[]" style="width:30px;" value="<?php echo $rs1['id']; ?>">
													
													</td>
													    <td class="hidden-480">
														
                            <input type="text" name="pname[]" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> style="width:100px;" value="<?php echo $rs1['desc1']; ?>">
                                                        </td>
                                                        <td <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> class="hidden-480">
														<input type="text" name="serv_num[]" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> style="width:100px;" value="<?php echo $rs1['serv_code']; ?>"></td>
                                          <td class="hidden-480">
														<input type="text" name="brand[]" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> style="width:100px;" value="<?php echo $rs1['brand']; ?>"></td>
														<td class="hidden-480">
														<input type="text" name="model[]" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> style="width:100px;" value="<?php echo $rs1['model']; ?>"></td>
														          
                                                        <td class="hidden-480">
							<input type="text" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> name="hsn[]" value="<?php echo $rs1['hsn']; ?>" style="width:70px;">
														</td>
														
														  <td class="hidden-480">
							<input type="text" name="gst[]" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> value="<?php echo $rs1['gst']; ?>" id="gst<?php echo $i?>" style="width:70px;">
														</td>
                                                         <td>
							<input type="text" name="uom[]" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> value="<?php echo $rs1['uom']; ?>" style="width:60px;" data-row="<?php echo $i?>" class=""  /> 
														</td>
														 <td class="hidden-480">
                            <input type="text" name="price[]" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> id="price<?php echo $i?>" style="width:70px;" data-row="<?php echo $i?>" value="<?php echo $rs1['rate']; ?>"   />
                                                        </td>
                                                        <td>
							<input type="text" name="qty[]" <?php if($rono!=''){ echo 'readonly'; }else { echo '';} ?> value="<?php echo $rs1['qty']; ?>" style="width:60px;" data-row="<?php echo $i?>" class="txt1" id="qty<?php echo $i?>" onkeyup='qval(this.value,<?php echo $i?>)' /> 
														</td>
														
                                                       
														  <td>
						<input type="text" name="amnt[]" value="<?php echo $rs1['base_amt']; ?>" style="width:60px;" readonly class='txt tx6' data-row="<?php echo $i?>" id="amnt<?php echo $i?>" />
														</td>
														
														 <td>
						<input type="text" name="serv_amnt[]" value="<?php echo $rs1['serv_amt']; ?>" style="width:60px;" readonly class='txt7 ' data-row="<?php echo $i?>" id="serv_amnt<?php echo $i?>" />
														</td>
														
														 <td>
						<input type="text" name="gst_amnt[]" value="<?php echo $rs1['gst_amnt']; ?>" style="width:60px;" readonly class='txt4 ' data-row="<?php echo $i?>" id="gst_amnt<?php echo $i?>" />
														</td>
														<td>
						<input type="text" name="serv_amt[]" value="<?php echo $rs1['serv_fee']; ?>" style="width:60px;" class="txt21" data-row="<?php echo $i?>"    id="serv_amt<?php echo $i?>" />
														</td>
                                                     	
                                                       <td>
						<input type="hidden" name="cap[]" value="<?php echo $rs1['cap']; ?>" style="width:60px;" class="txt20"  data-row="<?php echo $i?>"  id="cap<?php echo $i?>" />
														</td>
													   
                                                      
                                                       <td>
						<input type="hidden" name="serv_code[]" value="<?php echo $rs1['serv_cap']; ?>" style="width:50px;" class="" id="serv_code<?php echo $i?>" />	   
													   </td>
                                                        
                                                       <?php /*?>  <input type="hidden" name="gst[]" readonly  value="<?php echo $rs1['cgst']; ?>" id="gst<?php echo $i?>" /><?php */?>
                                                      
                                                      

                                                      
                                                      
                                                     
                                                        </tr>
                                                        
                                                    
                                                    <?php 
													
											$i++;
											}
											 //$id=$_POST['id'];
											
									?>
                                        <tr><td colspan="11" align="right"><strong>NET AMOUNT</strong></td>
										<td>
										<input style="width:60px;" type="text"  placeholder="Total Amount" readonly name="tot" class="txt5" value="<?php echo $r['tot_base'];?>" id="tot" />+
                                       
									</td>
									<td><input style="width:60px;" type="text" readonly placeholder="Total Serv" name="tot_serv" class="txt5" value="<?php echo $r['tot_ser'];?>" id="tot_serv" />+
									</td>
                                        <td colspan="1">
										
										<input style="width:60px;" type="text" readonly placeholder="Total Gst" name="tot_gst" class="txt5" value="<?php echo $r['tot_gst'];?>" id="tot_gst" />=
									
										 <input type="hidden" name="tot1" id="tot1" value="<?php echo $tt1?>" />
                                        </td>
											
										<td colspan=""><input style="width:60px;" type="text" placeholder="Total Net Amount" readonly name="net" value="<?php echo $r['net'];?>" id="net" /></td>
										</tr>
										</tbody>
                                        </table>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                          
                                        <?php if($inv_no==''){?>
									
										<button class="btn btn-info" type="submit" name="update" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>
										
										<?php }?>
									

                                            
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
var i=100;

$(".addmore").on('click',function(){
    i++; 
	var data ="<tr>";
    data +="<td><input type='checkbox' class='case'/></td>";
	
    data +="<td><input type='hidden' name='id1[]' id='id1"+i+"' style='width:30px;' data-row='"+i+"' value='<?php echo $id ?>'><input type='hidden' name='id5[]' id='id5"+i+"' style='width:30px;' data-row='"+i+"' value=''><input data-row='"+i+"' type='text' name='sno[]' id='sno"+i+"' style='width:30px;' value=''></td>";          
   data +="<td><input type='text' name='pname[]'  id='pname"+i+"' data-row='"+i+"' style='width:150px;' class='form-control pname"+i+"' onkeyup='s2("+i+")'  onClick='showUser(this.value,"+i+")'><div id='suggesstion-box"+i+"'></div>";
	data +="</td>";
data +="<td><input type='text' name='serv_num[]' data-row='"+i+"' value='' style='width:60px;'  class='' id='serv_num"+i+"' /> </td>";          
  data +="<td><input type='text' name='brand[]' required data-row='"+i+"' value='' style='width:60px;'  class='' id='brand"+i+"' /> </td>";          
data +="<td><input type='text' name='model[]' required data-row='"+i+"' value='' style='width:60px;'  class='' id='model"+i+"' /> </td>";                   
 
	  data +="<td><input type='text' name='hsn[]'  value='' style='width:50px;'  id='hsn"+i+"' />	   </td>";
	   data +="<td> <input type='text' name='gst[]'  data-row='"+i+"'  value='' style='width:60px;' class='txt20'   id='gst"+i+"' /></td>";          
     
    data +="<td><input type='text' name='uom[]'  id='uom"+i+"' value='' style='width:70px;' data-row='"+i+"'></td>";
	data +="<td><input type='text' name='price[]'  data-row='"+i+"' id='price"+i+"' style='width:70px;' value=''   /></td>";
	 data +="<td><input type='text' name='qty[]'  data-row='"+i+"' value='' style='width:60px;' class='txt1' id='qty"+i+"' onkeyup='qval(this.value,"+i+")' /> </td>"; 
	 

data +="<td><input type='text' name='amnt[]' data-row='"+i+"' value='' style='width:60px;' readonly class='txt tx6' id='amnt"+i+"' /> </td>";          
      data +="<td><input type='text' name='serv_amnt[]' data-row='"+i+"' value='' style='width:60px;' class='txt7 ' readonly  id='serv_amnt"+i+"' /> </td>";          
   
   data +="<td><input type='text' name='gst_amnt[]' data-row='"+i+"' value='' style='width:60px;' class='txt4 ' readonly  id='gst_amnt"+i+"' /> </td>";          
   	data +="<td><input type='text' name='serv_amt[]' data-row='"+i+"' value='6' style='width:60px;'  class='' id='serv_amt"+i+"' /> </td>";
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

<script type="text/javascript">

function val(str,id)
{
cal=0;
cal1=0;
cal12=0;
var price=document.getElementById("price"+id).value;

var qty=document.getElementById("qty"+id).value;
var gst=document.getElementById("gst"+id).value;
//alert(gst);
var serv_amt=document.getElementById("serv_code"+id).value;
//alert(serv_amt);

//var cgst=document.getElementById("cgst"+id).value;
//var gst=Math.abs(sgst)+Math.abs(cgst);
cal=eval(price)*eval(qty);
//alert(cal);
document.getElementById("amnt"+id).value=Math.abs(cal);	
cal12=eval(price)*eval(qty)*eval(serv_amt)/100;
cal1=eval(price)*eval(qty)*eval(gst)/100;
calk=(cal)+(cal12);
//alert(calk);
cal1=eval(calk)*eval(gst)/100;


document.getElementById("gst_amnt"+id).value=Math.abs(cal1);	


//document.getElementById("gst_amnt"+id).value=cal1;
//alert(cal12);
document.getElementById("serv_amnt"+id).value=Math.abs(cal12);	
//document.getElementById("serv_amnt"+id).value=cal12;



}


$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal1();
	calculateTotal2();
	calculateTotal3();
});

</script>
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
