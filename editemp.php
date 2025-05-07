<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
include'dbfiles/uqry_emp.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
	 <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
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
                                <a href="#">Settings</a>
                            </li>
                            <li>
                                <a href="#">Employee Details</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                               Employee Details

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">Employee Details</h3>
								</div>
                      <?php $id=$_GET['id'];

//include('config.php');

$res=mysqli_query($link,"select * from employee where empid='$id'") or die(mysqli_error($link));
$rw=mysqli_fetch_array($res) or die(mysqli_error($link));
//$to=$rw['btype'];
//$msg=$rw['msg'];




 ?>         
                                
            <form name="frm" method="post" action="" enctype="multipart/form-data">
 <input type="hidden" name="id" value="<?php echo $id?>">
  <input type="hidden" name="ses" value="<?php echo $name;?>">
                                            <table class="table table-striped table-bordered table-hover">
                                                
											<tr>
											    <td align="right">Name of Employee </td>
											    <td><input  type="text"    class="form-control" value="<?php echo $rw['emp_name']?>" required name="empname" id="empname"></td>
											    <td align="right">DOB</td>
											     <td><input type="date" value="<?php echo $rw['DOB']?>"  required name="dob" id="dob" class="form-control"></td>
											</tr>
											  <tr><td align="right">Gender</td><td align="left">
											

  <label><input type="radio" name="gender" value="Male" value=" <?php if($gender=="Male"){echo 'checked';} ?>">Male</label>
  <label><input type="radio" name="gender" value="female" value=" <?php if($gender=="feMale"){echo 'checked';} ?>">feMale</label>
  
											</td>
											
                                            
                                        
											  
                                        <td align="right">Marital Status</td>
										<td>
										<input type="radio" id="married" name="marstatus" value="<?php echo $maritalstatus ?>">
  <label for="married">Married</label>
  <input type="radio" id="unmarried" name="marstatus" value="<?php echo $rw['maritalstatus'] ?>">
  <label for="unmarried">unmarried</label>
										</td>
                                        </tr>
											
                                            <tr>
											
											<td align="right">Contact No.</td><td align="left">
											<input  type="number" value="<?php echo $rw['contactno']?>"  class="form-control" name="conno" id="conno"></td>
                                      
											
											<td align="right">Alternate Contact No. </td><td align="left">
											<input type="number" class="form-control"  value="<?php echo $rw['alternateno']?>" id="aconno" name="aconno">
											
											</td>
</tr>
                                        
                                        <tr><td align="right">Adharcard No</td><td align="left">
										 <input  type="number" value="<?php echo $rw['adharcardno']?>"  class="form-control" name="adhar" id="adhar"></td>
										 
                                        <td align="right">Address</td><td align="left">
										
										<input type="text"  required name="address" id="address" class="form-control" value="<?php echo $rw['address']?>"></td>
                                        </tr>
                                        
										
										 <tr><td align="right">City</td><td align="left">
										 <input  type="text" value="<?php echo $rw['city']?>"  class="form-control" name="city" id="city"></td>
                                        <td align="right">State</td><td>
										<input type="text" required name="state" id="state" class="form-control" value="<?php echo $rw['state']?>"></td>
                                        </tr>
										
										
										 <tr><td align="right">Qualification</td><td align="left">
										<input type="text" required name="qua" id="qua" class="form-control" value="<?php echo $rw['qualification']?>"></td>
                                       <td align="right">Experience</td><td>
										<input type="text" required name="exp" id="exp" class="form-control" value="<?php echo $rw['experience']?>"></td>
                                        </tr>
										
                                         <tr><td align="right">DOJ</td><td align="left">
										<input type="date" value="<?php echo $rw['DOJ']?>"  required name="doj" id="doj" class="form-control"></td>
                                          <td align="right"> Designation</td><td>
										  <input type="text" name="des" id="des" required class="form-control" value="<?php echo $rw['designation']?>"></td>
                                        </tr>
										
										  <tr><td align="right">ESI No.</td><td align="left">
										<input type="text" required name="esi" id="esi" class="form-control" value="<?php echo $rw['ESI_NO']?>"></td>
                                       <td align="right">PF No.</td><td>
										<input type="text" required name="pf" id="pf" class="form-control" value="<?php echo $rw['PFNO']?>"></td>
                                        </tr>
										
                                        <tr><td align="right">Photo</td><td align="left">
										<input type="file"   name="empfile" id="img1" class="form-control"/></td>
                                        <td align="right">Email Id</td><td>
										<input type="text" required name="email" id="email" class="form-control"  value="<?php echo $emp_email?>"></td>
                                        </tr>
										  <tr><td align="right">User Name</td><td align="left">
										<input type="text" class="form-control" required  id="uname" name="uname" placeholder="Enter User Name" value="<?php echo $username?>">
										</td>
                                       <td align="right">Password</td><td>
									    <input type="password" class="form-control" required id="pwd" name="pwd" placeholder="Enter Password" value="<?php echo $password ?>">
									</td>
                                        </tr>

                                        <td align="right">Store Code</td><td align="left">
									<input  required name="strcd" id="strcd" class="form-control" value="<?php echo $rw['strcd']?>"  rows="1.5" cols="20"/></td>
										
                                        
                                        </table>
                                        <?php  $tt=$r['total_amnt'];
										$tt1=$r['total_sgst'];
										
										?>
                                        
                                        
                                        
                                        <?php 
									//	echo $aa="select * from employee where empid='$empid'";
										/*$aa="select a.item_desc,a.hsn,a.sac,b.qty,b.price,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst,
										sum(b.tax_amnt) as tax,sum(b.gst_amnt) as gs
 from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code and a.category=b.temp_type";*/
 
//$t=mysqli_query($link,$aa) or die(mysqli_error($link));?>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
   
                                            
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                          
                                        
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
                                            </button>
										
										
			

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="qot_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
								</div>
                            </div>
                        </div>
                        <!-- PAGE CONTENT BEGINS -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
					
					
					
					
					
					
					
					
					
					
					
					
					
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <?php include('template/footer.php'); ?>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
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
<script src="assets/js/jquery-ui.custom.min.js"></script>

<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-timepicker.min.js"></script>



<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script>
                    $(document).ready(function () {

                        $("#success-alert").hide();
                        $("#success-alert").fadeTo(1000, 500).slideUp(500, function () {
                            $("#success-alert").alert('close');
                            window.location.href=window.location.href;
                        });
                        //$( '#validation-form' ).reset();


                        $('.date-picker').datepicker({
                            autoclose: true,
                            todayHighlight: true
                        })
                                //show datepicker when clicking on the icon
                                .next().on(ace.click_event, function () {
                            $(this).prev().focus();
                        });

                       

                        //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                       


                       



                      


                    });


</script>		<!-- inline scripts related to this page -->
</body>
<?php mysqli_close($link); ?>
</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>