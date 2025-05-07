<?php //include('config.php');
session_start();
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
     <style>
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
</style>

	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> 

    <style>
        strong{
            color:red;
        }
    </style>
	<script>
	function s3(i){
	    var curval= document.getElementById("ftype"+i).value;
	$.ajax({          
        	type: "GET",
        	url: "getftypedescriptionauto.php",
        	data:{keyword: curval, id: i},
        	success: function(data){
        		$("#suggesstion-box"+i).show();
			$("#suggesstion-box"+i).html(data);
			$("#ftype"+i).css("background","#FFF");
        	}
	});
}
	function selectCountry(val,i) {
document.getElementById("ftype"+i).value=val;
$("#suggesstion-box"+i).hide();
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
 
 $(document).on('keyup', '.tet2', function(){
 calculateTotal31();
 
 });
 
 
 function calculateTotal31(){
	subTotal = 0 ; total = 0; 
	$('.tet2').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tbase').val( subTotal.toFixed(2) );
	test();
	test1();
	test2();
	test3();
	test4();
	
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
function test6(){
     var tbase=$('#tbase').val();
     var tbase=$('#tbase').val();
     var c=(gst28*28)/100;
    $('#gst280').val(c.toFixed(2));
    }
 

 function test(){
     var gst28=$('#gst28').val();
     var c=(gst28*28)/100;
    $('#gst280').val(c.toFixed(2));
    calculateTotal33();
    }
 
 
 
 function test1(){
     var gst28=$('#gst18').val();
     var c=(gst28*18)/100;
     //alert(c);
     		$('#gst180').val(c.toFixed(2));
     //alert('hi');
 }
 function test2(){
     var gst28=$('#gst12').val();
     var c=(gst28*12)/100;
     //alert(c);
     		$('#gst120').val(c.toFixed(2));
     //alert('hi');
 }
 function test3(){
     var gst28=$('#gst5').val();
     var c=(gst28*5)/100;
     //alert(c);
     		$('#gst50').val(c.toFixed(2));
     //alert('hi');
 }
 function test4(){
     var gst28=$('#gst0').val();
     var c=(gst28*0)/100;
     //alert(c);
     		$('#gst00').val(c.toFixed(2));
     //alert('hi');
 }
 

 function calculateTotal33(){
	subTotal = 0 ; total = 0; 
	$('.tet3').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	
	$('#totamount').val( subTotal.toFixed(2) );
    var tbase=$('#tbase').val();
     var totamount=$('#totamount').val();
     var kk=parseFloat(tbase)+parseFloat(totamount);
     $('#totamount1').val( kk.toFixed(2) );
     
}


 
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
 <script>
 function checkAvailability() {
//$("#loaderIcon").show();
jQuery.ajax({
url: "tgajaxfile.php",
data:'username='+$("#inv_no").val(),
type: "POST",
success:function(data){
$("#uname_response").html(data);
//$("#loaderIcon").hide();
},
error:function (){}
});
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
                                <a href="#">To be raised Invoice</a>
                            </li>
                            <li>
                                <a href="bill_list2.php"> To be raised Invoice</a>
                            </li>
                            <li>
                                <a href="">To be raised Invoice</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                         TG  Edit To be raised Invoice

                            </h1>
                        </div>
                        
                      
                        
                 <?php  $id=$_GET['id'];
						$sq=mysqli_query($link,"select * from tgrequest_amnt where quet_num='$id'");
						$r=mysqli_fetch_array($sq);
						
						?>             <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <?php //$ssq=mysqli_query($link,"select * from tgqot_bill where quet_num='$id'");
												//	   $r1=mysqli_fetch_array($ssq);?>
 <form name="frm" method="post" action="" enctype="multipart/form-data">
 <input type="hidden" name="ids" value="<?php echo $id?>">
  <input type="hidden" name="state" value="<?php echo $r['state'];?>">
                                            <table class="table table-striped table-bordered table-hover">
											
											  <tr><td align="right">QuoteNumber</td><td align="left">
											  <input  type="text" readonly  class="form-control" value="<?php echo $id?>"  name="qt_no" id="qt_no"></td>
                                        <td align="right">Bill Received Date</td><td><input type="date" value="<?php echo date('Y-m-d');?>"   name="bill_date" id="inv_date" class="form-control"></td>
                                        </tr>
											
                                           
										
										
										  <tr><td align="right">Invoice Num</td><td align="left">
										<input type="text" name="inv_no" 
										id="inv_no"  class="form-control" value="<?php echo $r1['inv_num'];?>" onkeyup="checkAvailability()">
										<div id="uname_response"></div>
										</td>	
                                        <td align="right">Invoice Date</td><td><input type="date" name="inv_date" 
										id="sub_type"  class="form-control" value="<?php echo date('Y-m-d');?>"></td>
                                        </tr>
										
										  <tr><td align="right">Note</td><td align="left">
										<textarea name="note" class="form-control"><?php echo $r1['note1'];?></textarea></td>	
                                        <td align="right">Invoice Submited Date</td><td>
										<input type="date" name="inv_sub_date" 
										id="sub_type"  class="form-control" value="<?php echo date('Y-m-d');?>">
										</td>
                                        </tr>
											<tr><td align="right">Service Period</td><td align="left">
										<input type="text" name="speriod" id="speriod" class="form-control" /></td>	
                                        <td align="right">Format Type</td><td>
										<input id="ftype1" type="text" class="form-control" name="ftype" onkeyup='s3(1)' >
										<div id='suggesstion-box1'>

										</td>
                                        </tr>
										<tr><td align="right">Total Base Amount</td><td align="left">
										<input type="text" name="tbase" id="tbase" class="form-control" readonly /></td>	
										<td align="right">File Upload</td>
										<td><input type="file" name="img3" id="img3" class="form-control" /></td>
                                        </tr>
									<tr><td align="right">28 % Gst</td><td align="left">
										<input type="text" name="gst28" id="gst28" class="form-control tet2" onchange="test()" /></td>
										<td align="left">
										<input type="text" name="gst280" id="gst280" class="form-control tet3" readonly/></td>
										
                                        </tr>
										<tr><td align="right">18 % Gst</td><td align="left">
										<input type="text" name="gst18" id="gst18" class="form-control tet2" onchange="test1()" /></td>
										<td align="left">
										<input type="text" name="gst180" id="gst180" class="form-control tet3" readonly/> </td>
										
                                        </tr>
										<tr><td align="right">12 % Gst</td><td align="left">
										<input type="text" name="gst12" id="gst12" class="form-control tet2" onchange="test2()" /></td>
										<td align="left">
										<input type="text" name="gst120" id="gst120" class="form-control tet3" readonly/></td>	
                                        </tr>
										<tr><td align="right">5 % Gst</td><td align="left">
										<input type="text" name="gst5" id="gst5" class="form-control tet2" onchange="test3()" /></td>
										<td align="left">
										<input type="text" name="gst50" id="gst50" class="form-control tet3" readonly/></td>	
                                        </tr>
										<tr><td align="right">0 % Gst</td><td align="left">
										<input type="text" name="gst0" id="gst0" class="form-control tet2" onchange="test4()" /></td>
										<td align="left">
										<input type="text" name="gst00" id="gst00" class="form-control tet3" readonly/></td>	
                                        </tr>
									
									
									<tr><td></td>
									    <td align="right">Total Gst</td><td align="left">
									<input type="text"  id="totamount" class="form-control" readonly/></td>
									</tr>
									
									<tr><td></td>
									    <td align="right">Final Amount</td>
									<td>	<input type="text"  id="totamount1" class="form-control" readonly/></td>
									</tr>
									
										
									<input type="hidden" name="id1" 
										id="adv_amnt"  class="form-control" value="<?php echo $r1['id'];?>">
                                        </table>
                                        
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                          
                                        
									
										<button class="btn btn-info" type="submit" name="update" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>
										
										<?php 
										if(isset($_POST['update'])){
											$id=$_POST['ids'];
										
											$qt_no=$_POST['qt_no'];
											$bill_date=$_POST['bill_date'];
											$inv_no=$_POST['inv_no'];
											$inv_date=$_POST['inv_date'];
											$id1=$_POST['id1'];
											$state=$_POST['state'];
											$note=$_POST['note'];
																						$speriod=$_POST['speriod'];
											$ftype=$_POST['ftype'];
											$tbase=$_POST['tbase'];
											$gst28=$_POST['gst28'];
											$gst18=$_POST['gst18'];
											$gst12=$_POST['gst12'];
											$gst5=$_POST['gst5'];
											$gst0=$_POST['gst0'];

											
											
											$inv_sub_date=$_POST['inv_sub_date'];
											if($inv_sub_date!=''){ $st="Paid"; }
										else {
											$st="Un Paid";
										}
											$iname4 = $_FILES['img3']['name'];
			 if($iname4!= ""){
	$code2 = md5(rand());
	 $iname4 =$code2. $_FILES['img3']['name'];
	$tmp = $_FILES['img3']['tmp_name'];
	 $dir2 = "iupload";
		       $destination =  $dir2 . '/' . $iname4;
		         move_uploaded_file($tmp, $destination);
	 $iname5 =$code2. $_FILES['img3']['name'];
	$iname5 = ($iname5);
	}else{
	 $iname5 = ($img3);
	}
											
												$sq1="insert into tgqot_bill(bill_date,inv_num,inv_date,note1,inv_sub_date,status,speriod,ftype,tbase,gst28,gst18,gst12,gst5,gst0,user,file)
												values('$bill_date','$inv_no','$inv_date','$note','$inv_sub_date','RUn Paid','$speriod','$ftype','$tbase','$gst28','$gst18','$gst12','$gst5','$gst0','$name','$iname5')";
												
											
												$sq=mysqli_query($link,$sq1) or die(mysqli_error($link));
												
											
										/*
												$s=mysqli_query($link,"update add_klqot set
												bill_rec_date='$bill_date',invoice_no='$inv_no',invoice_date='$inv_date',inv_sub_date='$inv_sub_date',invoice_status='$st' where quet_num='$qt_no'");
											*/
											if($sq){
											    
											print "<script>";
			print "alert('Invoice Sucessfully Updated');";
			print "self.location='tgbill_list2.php';";
			print "</script>";
											}
											
										}?>
									

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="tgbill_list2.php"><button class="btn btn-danger" type="button" name="button" id="Close">
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
   data +="<td><input type='text' name='pname[]' id='pname"+i+"' style='width:100px;' data-row='"+i+"' value=''  onclick=window.open('Drug_itemcode_pop1.php?rowid="+i+"','mywindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no')></td>";
data +="<td><input type='text' name='serv_num[]' data-row='"+i+"' value='' style='width:60px;'  class='' id='serv_num"+i+"' /> </td>";          
  
	  data +="<td><input type='text' name='hsn[]' readonly value='' style='width:50px;'  id='hsn"+i+"' />	   </td>";
	   data +="<td> <input type='text' name='gst[]' readonly data-row='"+i+"'  value='' style='width:60px;' class='txt20'   id='gst"+i+"' /></td>";          
     
    data +="<td><input type='text' name='uom[]' readonly id='uom"+i+"' value='' style='width:70px;' data-row='"+i+"'></td>";
	 data +="<td><input type='text' name='qty[]'  data-row='"+i+"' value='' style='width:60px;' class=' ' id='qty"+i+"' onkeyup='val(this.value)' /> </td>"; 
	 
	data +="<td><input type='text' name='price[]' readonly data-row='"+i+"' id='price"+i+"' style='width:70px;' value='' class='txt1 ' onkeyup='val(this.value,"+i+")' /></td>";
data +="<td><input type='text' name='amnt[]' data-row='"+i+"' value='' style='width:60px;' readonly class='txt tx6' id='amnt"+i+"' /> </td>";          
      data +="<td><input type='text' name='serv_amnt[]' data-row='"+i+"' value='' style='width:60px;' class='txt7 ' readonly  id='serv_amnt"+i+"' /> </td>";          
   
   data +="<td><input type='text' name='gst_amnt[]' data-row='"+i+"' value='' style='width:60px;' class='txt4 ' readonly  id='gst_amnt"+i+"' /> </td>";          
   
   	data +="<td><input type='hidden' name='id[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='id"+i+"' /> </td>";          
   	data +="<td><input type='hidden' name='cap[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='cap"+i+"' /> </td>";          
   	data +="<td><input type='hidden' name='serv_amt[]' data-row='"+i+"' value='' style='width:60px;' readonly class='' id='serv_amt"+i+"' /> </td>";          
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
