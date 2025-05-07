<?php //include('config.php');
session_start();
$stn="dashboard";
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
        strong{
            color:red;
        }
    </style>
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
                
                 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>

<script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#register-form").validate({
    
        // Specify the validation rules
        rules: {
            req_ref: {
					   required: true,
					
					   remote: "emailcheck.php?data=req_ref"
					},
			
			
				  
				   
		
            
        },
        
       
        messages: {
            req_ref: { 	  required: "<strong style='color:#FF0000;font-size:14px;'>Please enter Request Number</strong>",
							<!--minlength:"<strong style='color:#FF0000;font-size:14px;'>Mobile Number must have minimum  10 letters</strong>",-->
					       remote: "<strong style='color:#FF0000;font-size:14px;'>Request Number Allready Entered </strong>"
				  },
			
			
			
			
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
  <script type="text/javascript">
function report()
{
   		

	  window.open('list.php','mywindow1','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')

	
}
</script>

       <script type="text/javascript" src="jquery-1.11.0.min.js"></script>
     
<script>
$(document).on('keyup ','.changesNo2',function(){
	
	id = $(this).attr('data-row');
	
	//alert(id);
	days1 = $('#uom1'+id).val();
	//alert(days1);
	amount1 = $('#amountk1'+id).val();
		//alert(amount10);
		ds=(parseFloat(days1)*parseFloat(amount1)).toFixed(2);
		
	mm= $('#total1'+id).val(ds);
	ser=(ds*8/100).toFixed(2);
	gst=(ds*18/100).toFixed(2);
	
	//alert(ser);
var tt=document.getElementById("total1"+id).value;
var stax=document.getElementById("service1"+id).value;
document.getElementById("service1"+id).value=ser;
document.getElementById("gst1"+id).value=gst;
	//alert(ser);
	tamount11 = $('#tdramount').val();
	//alert(tamount11);
	var dtot=document.getElementById("tdramount").value;
	var tx=document.getElementById("tot_tax").value;
	//var tot=document.getElementById("tot").value;
	
//alert(dtot);
var nn=eval(dtot)+eval(tt);
var nn1=eval(tx)+eval(stax);
//alert(nn);
//document.getElementById("tdramount").value=eval(nn);

	//calculateTotal();
	//calculateTotal22();
	
});

$(document).on('keyup ','.tet4',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal3();
	
	});
	
	function calculateTotal3(){
	subTotal = 0 ; total = 0; 
	$('.tet4').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tdramount').val(subTotal.toFixed(2) );
	t=$('#tdramount').val();

	//$('#tot').val(subTotal.toFixed(2));
	
	
}



$(document).on('keyup ','.tet5',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)*8/100).toFixed(2) );

	calculateTotal4();
	
	});
	
	function calculateTotal4(){
	subTotal = 0 ; total = 0; 
	$('.tet5').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot_tax').val(subTotal.toFixed(2) );
	t=$('#tot_tax').val();

	//$('#tot').val(subTotal.toFixed(2));
	
	
}

$(document).on('keyup ','.tet7',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)*18/100).toFixed(2) );

	calculateTotal5();
	
	});
	
	function calculateTotal5(){
	subTotal = 0 ; total = 0; 
	$('.tet7').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot_gst').val(subTotal.toFixed(2) );
	t=$('#tot_gst').val();

	$('#tot_gst1').val((subTotal/2).toFixed(2));
	$('#tot_gst2').val((subTotal/2).toFixed(2));
	
	
}


$(document).on('keyup ','.tet8',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal8();
	
	});
	
	function calculateTotal8(){
	subTotal = 0 ; total = 0; 
	$('.tet8').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot').val(subTotal.toFixed(2) );
	t=$('#tot').val();

	$('#txtTot1').val(subTotal.toFixed(2));
	
	
}

</script> 

<script>

function showquotes(str)
{
if (str=="")
  {
  document.getElementByName("state").innerHTML="";
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
   // document.getElementById("country5").innerHTML=xmlhttp.responseText;
	//document.getElementById("country5").innerHTML=show;
	var show=xmlhttp.responseText;
	//alert(show);
	document.getElementById("quotes").innerHTML=show;
	//document.location.reload();
    }
  }
xmlhttp.open("GET","get_qot_fordatalist.php?q="+str,true);
xmlhttp.send();
}


function showuser(str)
{
if (str=="")
  {
  document.getElementByName("state").innerHTML="";
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
   // document.getElementById("country5").innerHTML=xmlhttp.responseText;
	//document.getElementById("country5").innerHTML=show;
	var show=xmlhttp.responseText;
	//alert(show);
	document.getElementById("quet_num").innerHTML=show;
	//document.location.reload();
    }
  }
xmlhttp.open("GET","get_qot.php?q="+str,true);
xmlhttp.send();
}
</script>




<script>
  function showH(str)
  {
     var state=document.getElementById("state").value;
  
if (str=="")

  {

  //document.getElementById("state").innerHTML="";

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
	document.getElementById("status").value=strar[1];

	
    }

  }

xmlhttp.open("GET","get-data20.php?q="+str+"&state="+state,true);

xmlhttp.send();

}

</script>

<script>

function showUser(str)
{
if (str=="")
  {
  document.getElementByName("state").innerHTML="";
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
   // document.getElementById("country5").innerHTML=xmlhttp.responseText;
	//document.getElementById("country5").innerHTML=show;
	var show=xmlhttp.responseText;
	//alert(show);
	document.getElementById("status").innerHTML=show;
	//document.location.reload();
    }
  }
xmlhttp.open("GET","get_qot1.php?q="+str,true);
xmlhttp.send();
}
</script>





<!--tot_gst-->
 <!-- /.sidebar-shortcuts -->
                <?php include 'template/sidemenu.php' ?>
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
                                <a href="#">Settings</a>
                            </li>
                            <li>
                                <a href="#">Status Change</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">	
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                 Status Change

                            </h1>
                        </div>
                        
                          


                
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-6">
                                       
 <form name="frm" method="post" id="register-form" action="" enctype="multipart/form-data" autocomplete="off">
                     
                                            <table class="table table-striped table-bordered table-hover">
                                            <tr>
                                                <td align="right">State</td>
                                                 <td>
                                             <select name="state" id="state" required class="form-control" onchange="showquotes(this.value)">
                                                 
										     <option value="">Select State</option>
										     <!-- <option value="AP">AP</option> -->
										     <option value="TG">TG</option>
										     <!-- <option value="KL">KL</option>
										     <option value="TN">TN</option>
										     <option value="KN">KN</option> -->
										 </select> 
										 </td>
										 </tr>
										
                                        
                             <tr>
                                                <td align="right">Quotation Number</td>
                                                 <td align="left">
                                                     <input name="quet_num" id="quet_num" required class="form-control" list="quotes"  onchange="showH(this.value)" >
<datalist id="quotes" >
</datalist>
                                             <!--<select name="quet_num" id="quet_num" required class="form-control" onchange="showH(this.value)">
                                                 <option value="">select Quotation</option>
                                                 </select>-->
</td>
</tr>
                                                 
                                                 
                                                        
                                            
                                            
										 

                                                 <tr>
												 <td align="right">status:</td>
												 <td>
<input type="text" name="status"  id="status"   required class="form-control" readonly  onchange="showUser(this.value)"></br></br>
</td>
</tr>
<tr>
<td align="right">status update:</td>
<td>
<input id=\"statusupdate\" list=\"city5\" class="form-control" name="statusupdate"  >
<datalist id=\"city5\" >

<?php 
function updatepage(){
     print "<script>";
                                                print "alert('Successfully Updated ');";
                                                print "self.location='form.php';";
                                                print "</script>";
}
//include_once('dbconnection/connection1.php');
$sql="select distinct status from add_qot  ";  // Query to collect records
$r1=mysqli_query($link,$sql) or die(mysqli_error());
while ($row=mysqli_fetch_array($r1)) {
echo  "<option value=\"$row[status]\"/>"; // Format for adding options 
}
echo  "<option value='Approved Amount'/>";
////  End of data collection from table /// 

echo "</datalist>";
include_once('dbconnection/connection.php');
?>

</td>
</tr>

</table>

<div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                submit
                                            </button>
											
											&nbsp; &nbsp; &nbsp;
                                           <a href="dashboard.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div></div></div></div>

                             <?php 
                                        if(isset($_POST['submit'])){
                                            $quotation=$_POST['quet_num'];
                                            $state=$_POST['state'];
                                             $luser=$_POST['luser'];
											$status=trim($_POST['status']);
                                        $statusupdate=$_POST['statusupdate'];
                                       // echo hi;
                                            
                                            if(($state=="AP") && ($statusupdate=="Ro Required")){
                                               
                                               
                                               if($status=="work to be started"){
                                                   $t="update add_qot set status='$statusupdate' ,ro_no='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else if(($state=="TG") && ($statusupdate=="Ro Required")){
                                               
                                               
                                               if($status=="work to be started"){
                                                   $t="update add_tgqot set status='$statusupdate',ro_no='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else if(($state=="TN") && ($statusupdate=="Ro Required")){
                                               
                                               
                                               if($status=="work to be started"){
                                                   $t="update add_tnqot set status='$statusupdate',ro_no='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else if(($state=="KN") && ($statusupdate=="Ro Required")){
                                               
                                               
                                               if($status=="work to be started"){
                                                   $t="update add_knqot set status='$statusupdate',ro_no='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else if(($state=="KL") && ($statusupdate=="Ro Required")){
                                               
                                               
                                               if($status=="work to be started"){
                                                   $t="update add_klqot set status='$statusupdate',ro_no='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                           else  if(($state=="AP") && ($statusupdate=="work to be started")){
                                               
                                               
                                              if($status=="Request Amount"){
                                                   $t="update add_qot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_amnt3='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',adv_date3='0000-00-00',ac_det1='',ac_det2='',ac_det3='',ac_det4='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from request_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="TG") && ($statusupdate=="work to be started")){
                                               
                                               
                                              if($status=="Request Amount"){
                                                   $t="update add_tgqot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_amnt3='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',adv_date3='0000-00-00',ac_det1='',ac_det2='',ac_det3='',ac_det4='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from tgrequest_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="KL") && ($statusupdate=="work to be started")){
                                               
                                               
                                              if($status=="Request Amount"){
                                                   $t="update add_klqot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_amnt3='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',adv_date3='0000-00-00',ac_det1='',ac_det2='',ac_det3='',ac_det4='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from klrequest_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="KN") && ($statusupdate=="work to be started")){
                                               
                                               
                                              if($status=="Request Amount"){
                                                   $t="update add_knqot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_amnt3='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',adv_date3='0000-00-00',ac_det1='',ac_det2='',ac_det3='',ac_det4='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from knrequest_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="TN") && ($statusupdate=="work to be started")){
                                               
                                               
                                              if($status=="Request Amount"){
                                                   $t="update add_tnqot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_amnt3='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',adv_date3='0000-00-00',ac_det1='',ac_det2='',ac_det3='',ac_det4='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from tnrequest_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="AP") && ($statusupdate=="Request Amount")){
                                               
                                               
                                              if($status=="Approved Amount"){
                                                   $t="update add_qot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update request_amnt set confirm='Pending' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="TG") && ($statusupdate=="Request Amount")){
                                               
                                               
                                              if($status=="Approved Amount"){
                                                   $t="update add_tgqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update tgrequest_amnt set confirm='Pending' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="TN") && ($statusupdate=="Request Amount")){
                                               
                                               
                                              if($status=="Approved Amount"){
                                                   $t="update add_tnqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update tnrequest_amnt set confirm='Pending' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="KL") && ($statusupdate=="Request Amount")){
                                               
                                               
                                              if($status=="Approved Amount"){
                                                   $t="update add_klqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update klrequest_amnt set confirm='Pending' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="KN") && ($statusupdate=="Request Amount")){
                                               
                                               
                                              if($status=="Approved Amount"){
                                                   $t="update add_knqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update knrequest_amnt set confirm='Pending' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="AP") && ($statusupdate=="Approved Amount")){
                                               
                                               
                                              if($status=="Document Required"){
                                                   $t="update add_qot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update request_amnt set status='' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="TG") && ($statusupdate=="Approved Amount")){
                                               
                                               
                                              if($status=="Document Required"){
                                                   $t="update add_tgqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update tgrequest_amnt set status='' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="TN") && ($statusupdate=="Approved Amount")){
                                               
                                               
                                              if($status=="Document Required"){
                                                   $t="update add_tnqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update tnrequest_amnt set status='' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="KL") && ($statusupdate=="Approved Amount")){
                                               
                                               
                                              if($status=="Document Required"){
                                                   $t="update add_klqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update klrequest_amnt set status='' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="KN") && ($statusupdate=="Approved Amount")){
                                               
                                               
                                              if($status=="Document Required"){
                                                   $t="update add_knqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update knrequest_amnt set status='' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                             else  if(($state=="AP") && ($statusupdate=="Document Required")){
                                               
                                               
                                              if($status=="To Be Raise Invoice"){
                                                   $t="update add_qot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update request_amnt set status='Amount Transferred',bill_status='' where quet_num='$quotation'") or die(mysqli_error($link));
                                                mysqli_query($link,"delete from qot_bill where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="AP") && ($statusupdate=="To Be Raise Invoice")){
                                               
                                               
                                              if($status=="Raised Invoice List"){
                                                   $t="update add_qot set status='$statusupdate',invoice_no='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update qot_bill set status='payment pending' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="TG") && ($statusupdate=="To Be Raise Invoice")){
                                               
                                               
                                              if($status=="Raised Invoice List"){
                                                   $t="update add_tgqot set status='$statusupdate',invoice_no='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update tgqot_bill set status='payment pending' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="KL") && ($statusupdate=="To Be Raise Invoice")){
                                               
                                               
                                              if($status=="Raised Invoice List"){
                                                   $t="update add_klqot set status='$statusupdate',invoice_no='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update klqot_bill set status='payment pending' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="KN") && ($statusupdate=="To Be Raise Invoice")){
                                               
                                               
                                              if($status=="Raised Invoice List"){
                                                   $t="update add_knqot set status='$statusupdate',invoice_no='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update knqot_bill set status='payment pending' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="TN") && ($statusupdate=="To Be Raise Invoice")){
                                               
                                               
                                              if($status=="Raised Invoice List"){
                                                   $t="update add_tnqot set status='$statusupdate',invoice_no='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update tnqot_bill set status='payment pending' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="TG") && ($statusupdate=="Document Required")){
                                               
                                               
                                              if($status=="To Be Raise Invoice"){
                                                   $t="update add_tgqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update tgrequest_amnt set status='Amount Transferred',bill_status='' where quet_num='$quotation'") or die(mysqli_error($link));
                                                mysqli_query($link,"delete from tgqot_bill where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="TN") && ($statusupdate=="Document Required")){
                                               
                                               
                                              if($status=="To Be Raise Invoice"){
                                                   $t="update add_tnqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update tnrequest_amnt set status='Amount Transferred',bill_status='' where quet_num='$quotation'") or die(mysqli_error($link));
                                                mysqli_query($link,"delete from tnqot_bill where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="KL") && ($statusupdate=="Document Required")){
                                               
                                               
                                              if($status=="To Be Raise Invoice"){
                                                   $t="update add_klqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update klrequest_amnt set status='Amount Transferred',bill_status='' where quet_num='$quotation'") or die(mysqli_error($link));
                                                mysqli_query($link,"delete from klqot_bill where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="KN") && ($statusupdate=="Document Required")){
                                               
                                               
                                              if($status=="To Be Raise Invoice"){
                                                   $t="update add_knqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update knrequest_amnt set status='Amount Transferred',bill_status='' where quet_num='$quotation'") or die(mysqli_error($link));
                                                mysqli_query($link,"delete from knqot_bill where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="AP") && ($statusupdate=="Raised Invoice List")){
                                               
                                               
                                              if($status=="Payment Pending"){
                                                   $t="update add_qot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update qot_bill set status='RUn Paid' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="TN") && ($statusupdate=="Raised Invoice List")){
                                               
                                               
                                              if($status=="Payment Pending"){
                                                   $t="update add_tnqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update tnqot_bill set status='RUn Paid' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="TG") && ($statusupdate=="Raised Invoice List")){
                                               
                                               
                                              if($status=="Payment Pending"){
                                                   $t="update add_tgqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update tgqot_bill set status='RUn Paid' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="KL") && ($statusupdate=="Raised Invoice List")){
                                            
                                              if($status=="Payment Pending"){
                                                   $t="update add_klqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update klqot_bill set status='RUn Paid' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="KN") && ($statusupdate=="Raised Invoice List")){
                                               
                                               
                                              if($status=="Payment Pending"){
                                                   $t="update add_knqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update knqot_bill set status='RUn Paid' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="AP") && ($statusupdate=="Payment Pending")){
                                               
                                               
                                              if($status=="Payment Received"){
                                                   $t1="delete from payment where inv_no=(select invoice_no from add_qot where quet_num='$quotation')";
                                                mysqli_query($link,$t1) or die(mysqli_error($link));
                                                   $t="update add_qot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update qot_bill set status='Un Paid' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="KL") && ($statusupdate=="Payment Pending")){
                                               
                                               
                                              if($status=="Payment Received"){
                                                   $t1="delete from klpayment where inv_no=(select invoice_no from add_klqot where quet_num='$quotation')";
                                                mysqli_query($link,$t1) or die(mysqli_error($link));
                                                   $t="update add_klqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update klqot_bill set status='Un Paid' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="TN") && ($statusupdate=="Payment Pending")){
                                               
                                               
                                              if($status=="Payment Received"){
                                                   $t1="delete from tnpayment where inv_no=(select invoice_no from add_tnqot where quet_num='$quotation')";
                                                mysqli_query($link,$t1) or die(mysqli_error($link));
                                                   $t="update add_tnqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update tnqot_bill set status='Un Paid' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="KN") && ($statusupdate=="Payment Pending")){
                                               
                                               
                                              if($status=="Payment Received"){
                                                  $t1="delete from knpayment where inv_no=(select invoice_no from add_knqot where quet_num='$quotation')";
                                                mysqli_query($link,$t1) or die(mysqli_error($link));
                                                   $t="update add_knqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update knqot_bill set status='Un Paid' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else  if(($state=="TG") && ($statusupdate=="Payment Pending")){
                                               
                                               
                                              if($status=="Payment Received"){
                                                   $t1="delete from tgpayment where inv_no=(select invoice_no from add_tgqot where quet_num='$quotation')";
                                                mysqli_query($link,$t1) or die(mysqli_error($link));
                                                   $t="update add_tgqot set status='$statusupdate' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"update tgqot_bill set status='Un Paid' where quet_num='$quotation'") or die(mysqli_error($link));
                                                updatepage();
                                                exit;
                                              }
                                            }
                                            else
                                            {
                                                   print "<script>";
                                                print "alert('State Transfer Cannot be Done! Ask for Manual Change.');";
                                                print "self.location='form.php';";
                                                print "</script>";
                                            }
                                        
                                       /* else
										    if(($state=="AP") && ($statusupdate=="work to be started")){
                                               
                                               if($status=="Request Amount"){
                                                   $t="update add_qot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_amnt3='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',adv_date3='0000-00-00',ac_det1='',ac_det2='',ac_det3='',ac_det4='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from request_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                exit;
                                              }else if($status=="Approved Amount"){
                                               $t="update add_qot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_amnt3='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',adv_date3='0000-00-00',ac_det1='',ac_det2='',ac_det3='',ac_det4='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from request_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                exit;   
                                              }else if($status=="Document Required"){
                                               $t="update add_qot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_amnt3='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',adv_date3='0000-00-00',ac_det1='',ac_det2='',ac_det3='',ac_det4='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from request_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                exit;   
                                              }
                                              
                                               
                                               
                                                                                         }
                                                                                         
                                                 else if(($state=="TG") && ($statusupdate=="work to be started")){
                                               
                                                if($status=="Request Amount"){
                                                   $t="update add_tgqot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_amnt3='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',adv_date3='0000-00-00',ac_det1='',ac_det2='',ac_det3='',ac_det4='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from tgrequest_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                exit;
                                              }else if($status=="Approved Amount"){
                                               $t="update add_tgqot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_amnt3='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',adv_date3='0000-00-00',ac_det1='',ac_det2='',ac_det3='',ac_det4='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from tgrequest_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                exit;   
                                              }else if($status=="Document Required"){
                                               $t="update add_tgqot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_amnt3='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',adv_date3='0000-00-00',ac_det1='',ac_det2='',ac_det3='',ac_det4='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from tgrequest_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                exit;   
                                              }
                                              
                                               
                                               
                                                                                         } 
                                                                                         
                                                                                       else if(($state=="KL") && ($statusupdate=="work to be started")){
                                               
                                                if($status=="Request Amount"){
                                                   $t="update add_klqot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',ac_det1='',ac_det2='',ac_det3='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from klrequest_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                exit;
                                              }else if($status=="Approved Amount"){
                                               $t="update add_klqot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',ac_det1='',ac_det2='',ac_det3='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from klrequest_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                exit;   
                                              }else if($status=="Document Required"){
                                               $t="update add_klqot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',ac_det1='',ac_det2='',ac_det3='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from klrequest_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                exit;   
                                              }
                                              else if($status=="payment pending")
                                              {
                                              $t="update add_klqot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',ac_det1='',ac_det2='',ac_det3='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from klrequest_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                exit;  
                                              }
                                               
                                               
                                                                                         }
                                                                                         
                                                                                        else if(($state=="TN") && ($statusupdate=="work to be started")){
                                               
                                                if($status=="Request Amount"){
                                                   $t="update add_tnqot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',ac_det1='',ac_det2='',ac_det3='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from tnrequest_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                exit;
                                              }else if($status=="Approved Amount"){
                                               $t="update add_tnqot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',ac_det1='',ac_det2='',ac_det3='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from tnrequest_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                exit;   
                                              }else if($status=="Document Required"){
                                               $t="update add_tnqot set status='$statusupdate',adv_amnt='0.00',adv_amnt1='0.00',adv_amnt2='0.00',adv_date='0000-00-00',
                                                adv_date1='0000-00-00',adv_date2='0000-00-00',ac_det1='',ac_det2='',ac_det3='',bal='' where quet_num='$quotation'";
                                                mysqli_query($link,$t) or die(mysqli_error($link));
                                                mysqli_query($link,"delete from request_amnt where quet_num='$quotation'") or die(mysqli_error($link));
                                                exit;   
                                              }*/
                                              
                                               
                                               
                                                                                         }
	
	                                        //$kl=mysqli_query($link,$t) or die(mysqli_error($link));
	                                        if($kl){
	                                            print "<script>";
                                                print "alert('Successfully Uploaded ');";
                                                print "self.location='form.php';";
                                                print "</script>";
	                                        }
	
	
	
                                        

                                        
                                        ?>
<!--<script src="assets/js/jquery-2.1.4.min.js"></script>-->

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
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script> 
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>

        <!-- ace scripts -->
       <!-- <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>-->
                                        
                                    <!--<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>   
                                    <script src="assets/js/jquery-2.1.4.min.js"></script>-->  
                                      <script type="text/javascript">

function val(str,id)
{
cal=0;

var price=document.getElementById("price"+id).value;
var qty=document.getElementById("qty"+id).value;
var sgst=document.getElementById("sgst"+id).value;
var cgst=document.getElementById("cgst"+id).value;
var gst=Math.abs(sgst)+Math.abs(cgst);
cal=eval(price)*eval(qty);
document.getElementById("amnt"+id).value=Math.abs(cal);	

cal1=eval(price)*eval(qty)*eval(gst)/100;
document.getElementById("gst_amnt"+id).value=Math.abs(cal1);



}</script>
<script>
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