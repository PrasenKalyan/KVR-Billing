<?php //include('config.php');
session_start();
$stn="KN";
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
    <style>
        strong{
            color:red;
        }
    </style>
	
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
                                <a href="#">Document Required List </a>
                            </li>
                            <li>
                                <a href="qot_list.php"> Document Required List</a>
                            </li>
                            <li>
                                <a href="">Edit Document Required </a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                              KN  Edit Document Required

                            </h1>
                        </div>
                        
                      
                        
                 <?php  $id=$_GET['id'];
						$sq=mysqli_query($link,"select * from knrequest_amnt where quet_num='$id'");
						$r=mysqli_fetch_array($sq);
						
						?>             <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <?php $ssq=mysqli_query($link,"select * from knqot_bill where quet_num='$id'");
													   $r1=mysqli_fetch_array($ssq);?>
 <form name="frm" method="post" action="" enctype="multipart/form-data">
 <input type="hidden" name="ids" value="<?php echo $id?>">
  <input type="hidden" name="state" value="<?php echo $r['state'];?>">
                                            <table class="table table-striped table-bordered table-hover">
											
											  <tr><td align="right">QuoteNumber</td><td align="left">
											  <input  type="text" readonly  class="form-control" value="<?php echo $id?>"  name="qt_no" id="qt_no"></td>
                                        <td align="right">Bill Received Date</td><td><input type="date" value="<?php echo date('Y-m-d')?>"   name="bill_date" id="inv_date" class="form-control"></td>
                                        </tr>
											
                                           
										
										
										
										  <tr><td align="right">Note</td><td align="left">
										<textarea name="note" class="form-control"><?php echo $r1['note'];?></textarea></td>	
                                        <td align="right">Not Required</td><td>
										<select name="req" class="form-control">
										<option value="">Select</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
										</select>
										
										</td>
                                        </tr>
                                        <tr><td align="right">Upload File1</td><td align="left">
									<input type="file" name="ufile" id="ufile" class="form-control"/>
										
										</td>
                                        </tr>
										<tr><td align="right">Upload File2</td><td align="left">
									<input type="file" name="ufile1" id="ufile1" class="form-control"/>
										
										</td>
                                        </tr>
										<tr><td align="right">Upload File3</td><td align="left">
									<input type="file" name="ufile2" id="ufile2" class="form-control"/>
										
										</td>
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
											$inv_sub_date=$_POST['inv_sub_date'];
											$req=$_POST['req'];
											//if($inv_sub_date!=''){ $st="Paid"; }
										//else {
											//$st="Un Paid";
										//}
													$iname = $_FILES['ufile']['name'];
                                        			 if($iname!= ""){
                                        	$code = md5(rand());
                                        	 $iname =$code. $_FILES['ufile']['name'];
                                        	$tmp = $_FILES['ufile']['tmp_name'];
                                        	 $dir = "upload";
                                        		       $destination =  $dir . '/' . $iname;
                                        		         move_uploaded_file($tmp, $destination);
                                        	 $iname1 =$code. $_FILES['ufile']['name'];
                                        	$iname1 = ($iname1);
                                        	}else{
                                        	 $iname1 = ($img1);
                                        	}
											$iname = $_FILES['ufile1']['name'];
                                        			 if($iname!= ""){
                                        	$code = md5(rand());
                                        	 $iname =$code. $_FILES['ufile1']['name'];
                                        	$tmp = $_FILES['ufile1']['tmp_name'];
                                        	 $dir = "upload";
                                        		       $destination =  $dir . '/' . $iname;
                                        		         move_uploaded_file($tmp, $destination);
                                        	 $iname2 =$code. $_FILES['ufile1']['name'];
                                        	$iname2 = ($iname2);
											
                                        	}else{
                                        	 $iname2 = ($img2);
                                        	}
											$iname = $_FILES['ufile2']['name'];
                                        			 if($iname!= ""){
                                        	$code = md5(rand());
                                        	 $iname =$code. $_FILES['ufile2']['name'];
                                        	$tmp = $_FILES['ufile2']['tmp_name'];
                                        	 $dir = "upload";
                                        		       $destination =  $dir . '/' . $iname;
                                        		         move_uploaded_file($tmp, $destination);
                                        	 $iname3 =$code. $_FILES['ufile2']['name'];
                                        	$iname3 = ($iname3);
											
                                        	}else{
                                        	 $iname3 = ($img3);
                                        	}
											

												if(($req=="") or ($req=="No")){

												$sq=mysqli_query($link,"update  knrequest_amnt set bill_status='payment pending',req='$req',note='$note',not_file='$iname1',not_file1='$iname2',not_file2='$iname3',docr_status='' where quet_num='$qt_no'");
												$k2=mysqli_query($link,"select * from knqot_bill where quet_num='$qt_no'") or die(mysqli_error($link));
									            if(mysqli_num_rows($k2)==0)
									            {
										        $sq=mysqli_query($link,"insert into knqot_bill (quet_num,bill_date,inv_num,inv_date,note,inv_sub_date,status,state,user)
												values('$qt_no','$bill_date','$inv_no','$inv_date','$note','$inv_sub_date','payment pending','$state','$name')");
									            }
												
										
												$s=mysqli_query($link,"update add_knqot set
												bill_rec_date='$bill_date',invoice_no='$inv_no',invoice_date='$inv_date',inv_sub_date='$inv_sub_date',invoice_status='$st',status='To Be Raise Invoice' where quet_num='$qt_no'");
												}else{
												    	$sq=mysqli_query($link,"update  knrequest_amnt set bill_status='payment pending',req='$req',note='$note',docr_status='',not_file='$iname1',not_file1='$iname2',not_file2='$iname3' where quet_num='$qt_no'");
											//	$sq=mysqli_query($link,"insert into tnqot_bill (quet_num,bill_date,inv_num,inv_date,note,inv_sub_date,status,state,user)
											//	values('$qt_no','$bill_date','$inv_no','$inv_date','$note','$inv_sub_date','payment pending','$state','$name')");
										
												$s=mysqli_query($link,"update add_knqot set
												invoice_status='Not Required',status='Not Required' where quet_num='$qt_no'");
											
												}
										
										
										
										
											print "<script>";
			print "alert('Bill Sucessfully Updated');";
			print "self.location='knbill_list.php';";
			print "</script>";
										}?>
									

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="knbill_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
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
