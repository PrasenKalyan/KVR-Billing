<?php //include('config.php');
ob_start();
$stn="dashboard";
include('dbconnection/connection.php');
session_start();
 date_default_timezone_set('Asia/Kolkata');
//echo $_SESSION['user'];
if($_SESSION['user'])
{
$name=$_SESSION['user'];
$tsname=$_SESSION['user'];
//include('org1.php');


//include'dbfiles/org.php'
?>

<!DOCTYPE html>
<html lang="en">
	<?php include 'template/headerfile.php'; ?>


	<body class="no-skin">
		<?php include 'template/logo.php'; ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

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
								<a href="#">Dashboard</a>
							</li>
							<!--<li class="active">Blank Page</li>-->
						</ul><!-- /.breadcrumb -->

						<!-- /.nav-search -->
					</div>

					<div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="row">
							<div class="col-xs-12">
							    <h1>Summary</h1>
								<!-- PAGE CONTENT BEGINS -->
                                <div class="col-xs-18"  style="margin-bottom:10px;">
                                
                           			
					<form name="form" method="post">
					<input type="hidden" name="sname" id="fdate" value="<?php echo date('Y-m-d');?>"> 
					<div class="row">
	                    <div class="">
						<div class="analysis-box m-b-0 bg-yellow" style="width: 100%; padding: 10px;">
						<!-- <a href='book_appointment.php'><h3 class="text-white box-title">New Appointments <span class="pull-right">(ToDay)
								<i class="fa fa-caret-up"></i> <?php echo $cnt?></span></h3>-->
								<h3 class="text-white box-title">
								<input type="submit" style="font-weight: bold; " class="btn btn-info" value="ANDHRA PRADESH" >
						 <?php echo $cnt;?></h3>
								
								
	                            <div id="sparkline7"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                            <table class="table">
	                                <th>Total Quotations</th>
	                                <th>RO REQUIRED</th>
									<th>WORK TO BE STARTED</th>
									<th>REQUESTED AMOUNT LIST</th>
									<th>AMOUNT APPROVED LIST</th>
	                                <th>DOCUMENT REQ LIST</th>
									<th>TO BE RAISE INVOICE</th>
									<th>RAISED INVOICE</th>
									<th>PAYMENT PENDING INVOICE</th>
	                                <th>PAYMENT RECEIVED</th>
	                                <!-- <th></th> -->
	                                <tr>
	                                <!-- <td><i class="fa fa-arrow-up" aria-hidden="true"></i> </td> -->
									<td> <?php $k2=mysqli_query($link,"select * from add_qot") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?></td>
	                                 <td> <?php $k2=mysqli_query($link,"select * from add_qot where status='Ro Required'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?></td>
									
									<!-- <td><i class="fa fa-arrow-up" aria-hidden="true"></i> </td> -->
	                                <td> <?php $k3=mysqli_query($link,"select * from add_qot where status='work to be started' ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k3)."</b>";
									?></td>
									<td><?php $k4=mysqli_query($link,"select distinct quet_num from request_amnt where confirm='Pending'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k4)."</b>";
									?> </td>
									<td> <?php $kt5=mysqli_query($link,"select * from request_amnt where confirm='Yes' and status=''") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($kt5)."</b>";
									?></td>
									<td><?php $k6=mysqli_query($link,"select distinct quet_num from request_amnt where status='Amount Transferred' and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
									<td><?php $k7=mysqli_query($link,"select * from qot_bill where status='payment pending'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k7)."</b>";
									?> </td>
									<td><?php $k8=mysqli_query($link,"select * from qot_bill where status='RUn Paid'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
									<td><?php $k8=mysqli_query($link,"select * from qot_bill where status='Un Paid'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
									<td><?php $k9=mysqli_query($link,"select * from payment") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k9)."</b>";
									?> </td>

									
									
	                                
	                                
									
									

	                                 </tr>
	                                  
	                               
	                                 
	                            </table>
	                            </div>
								</a>
	                        </div>
	                    </div>
						
										
	                    <div class="">
	                        <div class="analysis-box m-b-0 bg-red" style="width: 100%; padding: 10px; margin-top: 70px;">
	                            <h3 class="text-white box-title">
								<input type="submit" class="btn btn-info" style="font-weight: bold;" value="KARNATAKA" onclick="report2();">
							 
							  <?php echo $ip;?></h3>
								
							</span></h3>
	                            <div id="sparkline12"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                         <table class="table">
							        <th>Total Quotations</th>
	                                <th>RO REQUIRED</th>
									<th>WORK TO BE STARTED</th>
									<th>REQEUSTED AMOUNT LIST</th>
									<th>AMOUNT APPROVED LIST</th>
	                                <th>DOCUMENT REQ LIST</th>
									<th>TO BE RAISE INVOICE</th>
									<th>RAISED INVOICE</th>
									<th>PAYMENT PENDING INVOICE</th>
	                                <th>PAYMENT RECEIVED</th>
	                                
	                                <tr>
	                                <!-- <td><i class="fa fa-arrow-up" aria-hidden="true"></i> </td> -->
									 <td><?php $k2 = mysqli_query($link,"select * from add_knqot") or die(mysqli_close($link));
									 echo "<b style = 'color:white;'>".mysqli_num_rows($k2)."</b>";?></td>

									<td><?php $k2=mysqli_query($link,"select * from add_knqot where status='Ro Required'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?></td>
	                                
									<td><?php $k3=mysqli_query($link,"select * from add_knqot where status='work to be started'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k3)."</b>";
									?></td>
									<td><?php $k4=mysqli_query($link,"select distinct quet_num from knrequest_amnt where confirm='Pending'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k4)."</b>";
									?> </td>
									<td> <?php $kt5=mysqli_query($link,"select * from knrequest_amnt where confirm='Yes' and status=''") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($kt5)."</b>";
									?></td>
									<td><?php $k6=mysqli_query($link,"select distinct quet_num from knrequest_amnt where status='Amount Transferred' and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?></td>
									<td><?php $k7=mysqli_query($link,"select * from knqot_bill where status='payment pending'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k7)."</b>";
									?></td>
									<td><?php $k8=mysqli_query($link,"select * from knqot_bill where status='RUn Paid'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?></td>
									<td><?php $k8=mysqli_query($link,"select * from knqot_bill where status='Un Paid' ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?></td>
									<td><?php $k9=mysqli_query($link,"select * from knpayment ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k9)."</b>";
									?></td>
									
	                                </tr>
	                                 <!-- <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
									<td></td>
									<td></td>
	                                <td></td>
	                                <td></td>
									
	                                </tr> -->
	                               
	                                   
	                            
	                                
	                              
	                                
	                                </tr>
	                                   <!-- <tr>
	                                <td><i class="fa fa-inr" aria-hidden="true"></i> </td>
	                                 <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
	                                <td></td>
									<td></td>
									<td></td>
	                                <td></td>
	                                <td></td>
									
	                                </tr>    -->
	                            </table></div>
	                        </div>
	                    </div>
						<div class="">
	                        <div class="analysis-box m-b-0 bg-green" style="width:100%; padding: 10px; margin-top: 70px;">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info" style="font-weight: bold;" value="KERALA" onclick="report1();">
								
							 <?php echo $lbc;?></span></h3>
	                            <div id="sparkline6"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                            <table class="table">
								    <th>Total Quotations</th>
	                                <th>RO REQUIRED</th>
									<th>WORK TO BE STARTED</th>
									<th>REQUESTED AMOUNT LIST</th>
									<th>AMOUNT APPROVED LIST</th>
	                                <th>DOCUMENT REQ LIST</th>
									<th>TO BE RAISE INVOICE</th>
									<th>RAISED INVOICE</th>
									<th>PAYMENT PENDING INVOICE</th>
	                                <th>PAYMENT RECEIVED</th>
	                                
	                                <tr>
	                                
									<td> <?php $k2=mysqli_query($link,"select * from add_klqot") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?></td>
									<td> <?php $k2=mysqli_query($link,"select * from add_klqot where status='Ro Required'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?></td>
									<td> <?php $k3=mysqli_query($link,"select * from add_klqot where status='work to be started'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k3)."</b>";
									?></td>
	                                
									<td> <?php $k4=mysqli_query($link,"select distinct quet_num from klrequest_amnt where confirm='Pending'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k4)."</b>";
									?> </td>
									<td> <?php $kt5=mysqli_query($link,"select * from klrequest_amnt where confirm='Yes' and status=''") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($kt5)."</b>";
									?></td>
									<td><?php $k6=mysqli_query($link,"select distinct quet_num from klrequest_amnt where status='Amount Transferred' and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
									<td><?php $k7=mysqli_query($link,"select * from klqot_bill where status='payment pending' ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k7)."</b>";
									?> </td>
									<td> <?php $k8=mysqli_query($link,"select * from klqot_bill where status='RUn Paid'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?></td>
									<td><?php $k8=mysqli_query($link,"select * from klqot_bill where status='Un Paid'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
									<td><?php $k9=mysqli_query($link,"select * from klpayment ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k9)."</b>";
									?></td>
									
	                                
	                                

									

	                                </tr>
	                                
	                                    
	                            </table></div>
	                        </div>
	                    </div>
	                    	<div class="">
	                        <div class="analysis-box m-b-0 bg-blue" style="width: 100%; padding:10px; margin-top: 70px;">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info" style="font-weight: bold;" value="ODISHA" onclick="report1();">
								
							 <?php echo $lbc;?></span></h3>
	                            <div id="sparkline6"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                        <table class="table">
							        <th>Total Quotations</th>
	                                <th>RO REQUIRED</th>
									<th>WORK TO BE STARTED</th>
									<th>REQUESTED AMOUNT LIST</th>
									<th>AMOUNT APPROVED LIST</th>
	                                <th>DOCUMENT REQ LIST</th>
									<th>TO BE RAISE INVOICE</th>
									<th>RAISED INVOICE</th>
									<th>PAYMENT PENDING INVOICE</th>
	                                <th>PAYMENT RECEIVED</th>
	                                
	                                <tr>
									<td><?php $k2=mysqli_query($link,"select * from add_odqot") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?></td>
	                                
									<td><?php $k2=mysqli_query($link,"select * from add_odqot where status='Ro Required'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?></td>
									<td><?php $k3=mysqli_query($link,"select * from add_odqot where status='work to be started'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k3)."</b>";
									?></td>
									<td><?php $k4=mysqli_query($link,"select distinct quet_num from odrequest_amnt where confirm='Pending'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k4)."</b>";
									?> </td>
									<td> <?php $kt5=mysqli_query($link,"select * from odrequest_amnt where confirm='Yes' and status=''") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($kt5)."</b>";
									?></td>
									<td><?php $k6=mysqli_query($link,"select distinct quet_num from odrequest_amnt where status='Amount Transferred' and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?></td>
									<td><?php $k7=mysqli_query($link,"select * from odqot_bill where status='payment pending'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k7)."</b>";
									?></td>
									<td><?php $k8=mysqli_query($link,"select * from odqot_bill where status='RUn Paid'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?></td>
									<td><?php $k8=mysqli_query($link,"select * from odqot_bill where status='Un Paid'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?></td>
									<td><?php $k9=mysqli_query($link,"select * from odpayment") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k9)."</b>";
									?></td>

	                                </tr>    
	                            </table></div>
	                        </div>
	                    </div>
	                    <div class="">
	                        <div class="analysis-box m-b-0 bg-purple" style="width: 100%; padding:10px; margin-top: 70px;">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info" style="font-weight: bold;" value="TELANGANA" onclick="report1();">
								
					<?php echo $lbc;?></span></h3>
	                            <div id="sparkline6"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                         <table class="table">
							        <th>Total Quotations</th>
	                                <th>RO REQUIRED</th>
									<th>WORK TO BE STARTED</th>
									<th>REQUESTED AMOUNT LIST</th>
									<th>AMOUNT APPROVED LIST</th>
	                                <th>DOCUMENT REQ LIST</th>
									<th>TO BE RAISE INVOICE</th>
									<th>RAISED INVOICE</th>
									<th>PAYMENT PENDING INVOICE</th>
	                                <th>PAYMENT RECEIVED</th>
	                                
	                                <tr>
									<td><?php $k2=mysqli_query($link,"select * from add_tgqot") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?> </td>
	                                    
										<td><?php $k2=mysqli_query($link,"select * from add_tgqot where status='Ro Required'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k2)."</b>";
									?> </td>
									<td><?php $k3=mysqli_query($link,"select * from add_tgqot where status='work to be started'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k3)."</b>";
									?> </td>
									<td> <?php $k4=mysqli_query($link,"select distinct quet_num from tgrequest_amnt where confirm='Pending'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k4)."</b>";
									?> </td>
									<td> <?php $kt5=mysqli_query($link,"select * from tgrequest_amnt where confirm='Yes' and status=''") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($kt5)."</b>";
									?> </td>									
	                                 <td><?php $k6=mysqli_query($link,"select distinct quet_num from tgrequest_amnt where status='Amount Transferred' and bill_status='' or docr_status='Cancel'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k6)."</b>";
									?> </td>
									<td><?php $k7=mysqli_query($link,"select * from tgqot_bill where status='payment pending'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k7)."</b>";
									?> </td>
									<td><?php $k8=mysqli_query($link,"select * from tgqot_bill where status='RUn Paid'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
									<td><?php $k8=mysqli_query($link,"select * from tgqot_bill where status='Un Paid'") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k8)."</b>";
									?> </td>
									<td><?php $k9=mysqli_query($link,"select * from tgpayment ") or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k9)."</b>";
									?> </td>
									
	                                </tr>
	                                  
	                            </table></div>
	                        </div>
	                    </div>
						<div class="">
						<div class="analysis-box m-b-0 bg-fuchsia" style="width: 400px;">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info" style="font-weight: bold;" value="EXPENSES LIST" onclick="report1();"> 
								
						 <!-- <?php echo $lbc;?></span></h3> -->
	                             <div id="sparkline6"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                       <table class="table">
	                                <th>AP</th>
									<th>KN</th>
									<th>KL</th>
									<th>OD</th>
	                                <th>TG</th> 
	                                <tr>
									<td><?php $p="select * from expenses where state='AP'";
									$k=mysqli_query($link,$p) or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k)."</b>";
									?> </td>
									<td><?php $p="select * from expenses where state='KN'";
									$k=mysqli_query($link,$p) or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k)."</b>";
									?> </td>
									<td><?php $p="select * from expenses where state='KL'";
									$k=mysqli_query($link,$p) or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k)."</b>";
									?> </td>
									<td><?php $p="select * from expenses where state='OD'";
									$k=mysqli_query($link,$p) or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k)."</b>";
									?> </td>
									<td><?php $p="select * from expenses where state='TG'";
									$k=mysqli_query($link,$p) or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k)."</b>";
									?> </td>
									
	                   
									

	                                </tr>
	                                
	                            </table></div>
	                        </div>
	                    </div>
	                   
						</form>
						</div>
                           <hr/>
						
						
                                
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
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
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