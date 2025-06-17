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
    <?php include 'template/headerfile.php'; ?>
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


 <!--tot_gst-->
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
                                <a href="#">Edit Expenses</a>
                            </li>
                            <li>
                                <a href="#">Edit Expenses</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">	
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                 Edit Expenses

                            </h1>
                        </div>
                        
                      <?php
                      $id=$_REQUEST['id'];
                      $m=mysqli_query($link,"select * from expenses where id='$id'");
                      $m1=mysqli_fetch_array($m);
                      ?>  
                        
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-6">
                                       
 <form name="frm" method="post" id="register-form" action="" enctype="multipart/form-data">
                     
                                            <table class="table table-striped table-bordered table-hover">
                                            <tr>
                                                 <td align="right">State</td>
                                                 <td>
                                             <select name="state" id="state" required class="form-control">
										     <option value="">Select State</option>
										     <option value="AP" <?php if($m1['state']=="AP"){echo 'selected';} ?>>AP</option>
										     <option value="TG" <?php if($m1['state']=="TG"){echo 'selected';} ?>>TG</option>
										     <option value="KL" <?php if($m1['state']=="KL"){echo 'selected';} ?>>KL</option>
										     <option value="OD" <?php if($m1['state']=="OD"){echo 'selected';} ?>>OD</option>
										     <option value="KN" <?php if($m1['state']=="KN"){echo 'selected';} ?>>KN</option>
										 </select> 
										 </td>
										 </tr>
										 <tr>
                                           <td align="right">Date</td><td>
                                            <input type="date" name="date" id="date" value="<?php echo $m1['edate']; ?>" required class="form-control">
                                             <input type="hidden" name="user" id="user" value="<?php echo $name ?>" required class="form-control">
                                        
                                       </td>
                                       </tr>
                                        
                                        
                                         <tr>
                                            <td align="right">Quotation Number</td>
                                            <td>
                                                <input type="text" name="quet_no" id="quet_no" readonly class="form-control" value="<?php echo $m1['quet_no']?>">
                                            </td>
                                         </tr>
                                         <tr>
                                                 <td align="right">Type Of Payment</td>
                                                 <td>
                                             <select name="payment_type" id="payment_type" required class="form-control">
										     <option value="">Select Payment Type</option>
										     <option value="WITH GST" <?php if($m1['payment_type']=="WITH GST"){echo 'selected';} ?>>WITH GST</option>
										     <option value="WITHOUT GST" <?php if($m1['payment_type']=="WITHOUT GST"){echo 'selected';} ?>>WITHOUT GST</option>
										     <option value="LABOUR CHARGES" <?php if($m1['payment_type']=="LABOUR CHARGES"){echo 'selected';} ?>>LABOUR CHARGES</option>
										     
										 </select> 
										 </td>
										 </tr>
                                      
										 <tr>
                                         <td align="right">Amount</td><td>
                                        <input type="text" name="amount" id="amount" required  class="form-control" value="<?php echo $m1['amount'] ?>">
                                         <input type="hidden" name="id2" id="id2" required  class="form-control" value="<?php echo $m1['id'] ?>">
                                        
                                       </td>
                                     
                                        </tr>
                                         <tr>
                                         <td align="right">Upload Document</td><td>
                                        <input type="file" name="imageb" id="imageb"   class="form-control">
                                    <input type="hidden" name="file" value="<?php echo $m1['file'] ?>"/>
                                       </td>
                                        </tr>
									<tr>
                                         <td align="right">View Document</td><td>
                                        <a href="expenses/<?php echo $m1['file']; ?>" target="_blank">View</a>
                                       </td>
                                        </tr>
                                        <?php if(($name=='admin') or ($name=="durgarao") or ($name=="accounts") or ($name=="sumanthpotluri")){ ?>
                                         <tr>
                                                 <td align="right">Status</td>
                                                 <td>
                                             <select name="status" id="status"  class="form-control">
										     <option value="">Select Status</option>
										     <option value="Pending" <?php if($m1['status']=="Pending"){echo 'selected';} ?>>Pending</option>
										     <option value="Approved" <?php if($m1['status']=="Approved"){echo 'selected';} ?>>Approved</option>
										     <!-- <option value="Rejected" <?php if($m1['status']=="Rejected"){echo 'selected';} ?>>Rejected</option>
										     <option value="Deposited" <?php if($m1['status']=="Deposited"){echo 'selected';} ?>>Deposited</option> -->
										     
										 </select> 
                                         
										 </td>
										 </tr>
                                         <tr>
                                                 <td align="right">Exp Description</td>
                                                 <td>
                                              <textarea  name="expdesc" id="expdesc" rows="4"  required class="form-control"><?php echo $m1['expdesc'] ?></textarea>
										 </td>
										 </tr>
										 <?php }?>
                                        </table>
                                        
                                   
                                        
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
                                            </button>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="knexpenseslist.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div></div></div></div>
                                        
                                        <?php 
                                        if(isset($_POST['submit'])){
                                            $id2=$_POST['id2'];
                                             $status=$_POST['status'];
                                            $date=$_POST['date'];
                                            $state=$_POST['state'];
                                            $expdesc=$_POST['expdesc'];
                                            $q=$_POST['quet_no'];
                                            $payment_type = $_POST['payment_type'];
                                            $amount=$_POST['amount'];
                                            $user=$_POST['user'];
                                            $img3=$_POST['file'];
                                            $iname4 = $_FILES['imageb']['name'];
                                			 if($iname4!= ""){
                                	         $code2 = md5(rand());
                                	         $iname4 =$code2. $_FILES['imageb']['name'];
                                	         $tmp = $_FILES['imageb']['tmp_name'];
                                	         $dir2 = "expenses";
                                		     $destination =  $dir2 . '/' . $iname4;
                                		     move_uploaded_file($tmp, $destination);
                                        	 $iname5 =$code2. $_FILES['imageb']['name'];
                                        	 $iname5 = ($iname5);
                                        	 }else{
                                        	 $iname5 = ($img3);
                                        	 }
	
	
	
	                                        $kl=mysqli_query($link,"update  expenses set edate='$date',state='$state',expdesc='$expdesc',quet_no='$q', payment_type = '$payment_type',amount='$amount',file='$iname5',status='$status' where id='$id2'") or die(mysqli_error($link));
	                                        if($kl){
	                                            print "<script>";
        print "alert('Successfully Updated ');";
        {
        print "self.location='dashboard.php';";
        }
        print "</script>";
	                                        }
	
	
	
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
