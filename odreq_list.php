<?php //include('config.php');
session_start();
//include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
$tsname=$_SESSION['user'];
//include('org1.php');
//$y=mysqli_query($link,"select * from employee where emp_name='$name'");
//$y1=mysqli_fetch_array($y);
//$email=$y1['emp_email'];
//include'dbfiles/org.php';
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
                                <a href="#">Request Amount List</a>
                            </li>
                          
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    
                        <!-- PAGE CONTENT BEGINS -->

                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
									<!--<a href="addbill.php"><button type="button" class="btn-success btn-sm ">Add New</button></a>-->
                                       
                                        <div class="table-header">
                                        Request Amount Approve List
                                        </div>

                                        <!-- div.table-responsive -->
<div style="height:15px; margin-bottom:20px;">
<!--<button class="btn btn-info" type="submit" name="bsearch" onclick="javascript:location.href='add_odqot.php'" id="bsearch">
                                               
                                                Add New
        <br />                                    </button>-->
		
		<form method="post" action="" class="form-horizontal">
										
										<div class="form-group">
				
				
						<div class="col-sm-1"></div>
                     <div class="col-sm-3">
                  
                <input type="text" class="form-control pull-right" id="myInput" name="search" placeholder="Coordinator">
                  </div>
				  <div class="col-sm-2">
                  
                <input type="date" class="form-control pull-right" id="date" name="date" placeholder="Search" value="<?php echo date('Y-m-d'); ?>" >
                  </div>
				   <div class="col-sm-3">
                  
               <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  </div>
                  <div class="col-sm-2"><b><a href="qut_odreqamt_excel.php?user=<?php echo $tsname;?>" class="btn btn-primary btn-xs">XL Download</a></b>
                  <!--<b><button class="btn btn-primary btn-xs" id="aprvall" name ="aptvall">Approve All</button></b>-->
                  </div>
				</div>
										
										</form>	
										
 </div>
										 <!--<form method="post" action="" class="form-horizontal">
										
										<div class="form-group">
				
				
						<div class="col-sm-1"></div>
                    <div class="col-sm-8">
                  
                <input type="text" class="form-control pull-right" id="search" name="search" placeholder="Search By Service No or date(yyyy-mm-dd) ">
                  </div>
				   <div class="col-sm-3">
                  
               <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  </div>
				</div>
										
										</form>-->
                                        <!-- div.dataTables_borderWrap -->
                                        <div  style="overflow-x:auto;">
                                <?php         
                                  if(isset($_POST['bsearch'])){
												$bsearch=$_POST['search'];
												$date=$_POST['date'];
											// $y="select a.store_name,a.city,b.quet_num,b.store_code,b.inv_date,b.id
											 //from add_odqot b,dpr a where a.store_code=b.store_code order by b.id desc ";
											// $y="select * from add_odqot2 where  ro_date='$date'";
												$y="select * from odrequest_amnt where confirm!='Yes' order by id desc";
												
												?>
                                        
                                            <table id="myTable" class="table table-striped table-bordered table-hover" style="border:1px solid;">
                                                <thead>
                                                    <tr>
                                                        <!--<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>-->
														<th></th>
                                                        <th>S No</th>
                                                        
                                                        <th width="20%">Quotation No</th>
                                                         <th>Supervisor</th>
                                                        <th>Coordinator</th>
                                                        <th>Store Name</th>
                                                        <th>Store Code</th>
                                                        <th>Store Type</th>
                                                        <th>Ro Num</th>
                                                        <th>Ro Date</th>
                                                        <th>Fault Description</th>
                                                         <th>RO Amount</th>
                                                         <th>Service Fee</th>
                                                         <th>GST</th>
                                                         <th>Total Amount</th>
                                                         <th>Advance</th>
                                                         <th>Requested Amount</th>
														 
														   <th>Balance Amount</th>
											<th>GST Type</th>
											<th>GST Amount</th>
														   <th>Whoom</th>
                                                        
														 <th>User</th>
                                                          
                                                    <th>Update</th>
                                                        
													 <th>Edit</th>
														     
                                                        
                                                      
                                                      
                                                    </tr>
                                                </thead>

                                                <tbody>
												
												<?php 
											include('dbconnection/connection.php');
											
											
										
											
											$t=mysqli_query($link,$y) or die(mysqli_error($link));
											$i=1;
											$ramt=0;
											$sfee=0;
											$gt=0;
											$tamt=0;
											$adv=0;
											$reqamt=0;
											$bamt=0;
											$tgst=0;
											while($rs1=mysqli_fetch_array($t)){
											
													$qot=$rs1['quet_num'];									
                                                    ?>
												
												<tr>
                                                        
<!--<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>-->
                                                       
                                                       
                                                      
                                                          
														  <?php 
										$state=$rs1['state'];
										if($state=='OD'){
										 $a="select * from add_odqot where quet_num='$qot' and ro_date='$date'  ";
										} 
										$ssq=mysqli_query($link,$a);
										$r1=mysqli_fetch_array($ssq);
										$str_code=$r1['store_code'];
										$redate=$r1['ro_date'];
										
										?>
										
										<?php $sq3=mysqli_query($link,"select * from dpr where store_code='$str_code' and coordinator='$bsearch' ");
										$r3=mysqli_fetch_array($sq3);
										$coordinator=$r3['coordinator'];
										if($coordinator==$bsearch){
										$ramt=$ramt+$r1['tot_base'];
										$sfee=$sfee+$r1['tot_ser'];
										$gt=$gt+$r1['tot_gst'];
										$tamt=$tamt+$r1['net'];
										$adv=$adv+$r1['adv_amnt']+$r1['adv_amnt1']+$r1['adv_amnt2']-$rs1['req_amnt'];
										$reqamt=$reqamt+$rs1['req_amnt'];
										$bamt=$bamt+$r1['bal'];
										$tgst=$tgst+$r1['gst_amount']+$r1['gst_amount1']+$r1['gst_amount2']-$rs1['gst_amount3'];
										
										
										?>
										<?php
														 $qotnum=$rs1['quet_num'];
												            $tyy="select sum(req_amnt+gstamt) as samt from odrequest_amnt where quet_num='$qotnum' and confirm='Pending'";
                                                            $ty=mysqli_query($link,$tyy) or die(mysqli_error($link));
                                                $ty1=mysqli_fetch_array($ty);
                                                            
                                         $treq=$ty1['samt'];
                                        
?>
														<td><center><input type="checkbox" name="checkboxrow" value="<?php echo $rs1['quet_num'].'::'.$treq; ?>" />&nbsp;</center></td>
										 <td><center><input type="checkbox" name="row<?php echo $i?>" />&nbsp;</center></td>
										 <td><?php echo $i; ?></td>
														<td class="hidden-480"><?php echo $qot; ?></td>
                                                        <td class="hidden-480"><?php echo $r3['superwisor']; ?></td>
														 <td class="hidden-480"><?php echo $r3['coordinator']; ?></td>
														  <td class="hidden-480"><?php echo $r3['store_name']; ?></td>
														  
														 <td class="hidden-480"><?php echo $r3['store_code']; ?></td>
														 
														
														 <td class="hidden-480"><?php echo $r3['format_type']; ?></td>
														 
														  <td class="hidden-480"><?php echo $r1['ro_no']; ?></td>
														 
														   <td class="hidden-480"><?php  $d= $r1['ro_date']; echo date('d-m-Y', strtotime($d)); ?></td> 
														    <td class="hidden-480"><?php echo $r1['falt_desc']; ?></td>
												 <td class="hidden-480"><?php echo $r1['tot_base']; ?></td>
												 
												 <td class="hidden-480"><?php echo $r1['tot_ser']; ?></td>
												 
												 <td class="hidden-480"><?php echo $r1['tot_gst']; ?></td>
												  <td class="hidden-480"><?php echo $r1['net']; ?></td>
												  
												  <?php $ree= $rs1['req_amnt']; ?>
												  
												   <td class="hidden-480"><?php echo $r1['adv_amnt']+$r1['adv_amnt1']+$r1['adv_amnt2']-$ree; ?></td>
												    <td class="hidden-480"><?php echo $rs1['req_amnt']; ?></td>
												  
												  
												  <td class="hidden-480"><?php echo $r1['bal']; ?></td>
												  <td class="hidden-480"><?php $gtpe= $r1['gst_type'];
												  if($gtpe=="With GST"){ echo "With GST";} else {
												      
												  }
												  ?></td>
												  
                                                        <td class="hidden-480"><?php echo $rs1['ac_det']; ?></td>
												  
                                                        
                                                       
                                                       <!-- <td><?php echo $rs1['user']; ?></td>-->
                                                        <td class="hidden-480"><?php 
                                                         $cempname=$rs1['user'];
                                                         $sq=mysqli_query($link,"select emp_name from emp where employeeid='$cempname' limit 1");
                                                         	$rss1=mysqli_fetch_array($sq);
                                                         	if($rss1['emp_name']=="")
                                                         	echo $cempname;
                                                         	else
                                                            echo $rss1['emp_name']; ?></td>
                                                       
                                                       <td class="hidden-480"><a href="odreq_amnt_list.php?id=<?php echo $rs1['id']; ?>&amt=<?php echo $amt;?>&st=<?php echo $state;?>" onclick="return confirm('are you sure?')">
                                                        <img src="update.png" width="16" height="16"></a></td>
                                                    <td class="hidden-480"><a href="odedit_request.php?id=<?php echo $rs1['id']; ?>">
                                                        <img src="images/edit.gif"></a>
                                                     
                                                     <a href="odcancel_request.php?id=<?php echo $rs1['id']; ?>">
                                                        <img src="images/Icon_Delete.png"></a>   
                                                        
                                                        </td>
														 
										<?php } ?>
                                                    </tr>
                                                    <?php $i++; } 
													
													
													?>
                                                    <tr>
													<td colspan="11">Total </td>
												
													<td><?php echo $ramt ?></td>
													<td><?php echo $sfee ?></td>
													<td><?php echo $gt ?></td>
													<td><?php echo $tamt ?></td>
													<td><?php echo $adv ?></td>
													<td><?php echo $reqamt ?></td>
													<td><?php echo $bamt ?></td>
													<td></td>
													<td><?php echo $tgst ?></td>
													<td colspan="4"></td>
													</tr>
                                                    
                                                </tbody>
                                            </table>
											
												<?php }else{ ?>
											<table id="myTable" class="table table-striped table-bordered table-hover" style="border:1px solid;">
                                                <thead>
                                                    <tr>
                                                        <!--<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>-->
														<th></th>
                                                        <th>S No</th>
                                                        
                                                        <th>Quotation No</th>
                                                         <th>Supervisor</th>
                                                        <th>Coordinator</th>
                                                        <th>Store Name</th>
                                                        <th>Store Code</th>
                                                        <th>Store Type</th>
                                                        <th>Ro Num</th>
                                                        <th>Ro Date</th>
                                                        <th>Fault Description</th>
                                                         <th>RO Amount</th>
                                                         <th>Service Fee</th>
                                                         <th>GST</th>
                                                         <th>Total Amount</th>
                                                         <th>Advance</th>
                                                         <th>Requested Amount</th>
														 
														   <th>Balance Amount</th>
											<th>GST Type</th>	
												<th>GST Amount</th>
														   <th>Whoom</th>
                                                        <th>User</th>
														
                                                          
                                                    <th>Update</th>
                                                        
													 <th>Edit</th>
														     
                                                        
                                                      
                                                      
                                                    </tr>
                                                </thead>

                                                <tbody>
												
												<?php 
											include('dbconnection/connection.php');
												//	$y="select distinct quet_num,state from odrequest_amnt where confirm!='Yes' order by id desc";
											if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts')or ($tsname=='sumanthpotluri') or ($tsname=='JFMOD22232823')){
											    	$y="select distinct quet_num,state,user from odrequest_amnt where confirm!='Yes' order by id desc";
											}else{
											    	$y="select distinct quet_num,state,user from odrequest_amnt where confirm!='Yes' and user='$tsname' order by id desc";
											}
												
											 
											$t=mysqli_query($link,$y) or die(mysqli_error($link));
											$i=1;
											$ramt=0;
											$sfee=0;
											$gt=0;
											$tamt=0;
											
											$adv=0;
											$reqamt=0;
											$bamt=0;
											$tgst=0;
											while($rs1=mysqli_fetch_array($t)){
											
																						
                                                    ?>
												
												<tr>
                                                        
<!--<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>-->
														<?php
														 $qotnum=$rs1['quet_num'];
												            $tyy="select sum(req_amnt+gstamt) as samt from odrequest_amnt where quet_num='$qotnum' and confirm='Pending'";
                                                            $ty=mysqli_query($link,$tyy) or die(mysqli_error($link));
                                                $ty1=mysqli_fetch_array($ty);
                                                            
                                         $treq=$ty1['samt'];
                                        
?>
														<td><center><input type="checkbox" name="checkboxrow" value="<?php echo $rs1['quet_num'].'::'.$treq; ?>" />&nbsp;</center></td>
                                                        <td><?php echo $i; ?></td>
                                                       
                                                      
                                                          <td class="hidden-480"><?php echo $qot=$rs1['quet_num']; ?></td>
														  <?php 
										$state=$rs1['state'];
										if($state=='OD'){
										 $a="select * from add_odqot where quet_num='$qot'";
										} 
										$ssq=mysqli_query($link,$a);
										$r1=mysqli_fetch_array($ssq);
										$str_code=$r1['store_code'];
										?>
										
										<?php $sq3=mysqli_query($link,"select * from dpr where store_code='$str_code'");
										$r3=mysqli_fetch_array($sq3);
										
										$ramt=$ramt+$r1['tot_base'];
										$sfee=$sfee+$r1['tot_ser'];
										$gt=$gt+$r1['tot_gst'];
										$tamt=$tamt+$r1['net'];
									//	$adv=$adv+$r1['adv_amnt']+$r1['adv_amnt1']+$r1['adv_amnt2']-$rs1['req_amnt'];
										//$reqamt=$reqamt+$rs1['req_amnt'];
										$bamt=$bamt+$r1['bal'];
										$tgst=$tgst+$r1['gst_amount']+$r1['gst_amount1']+$r1['gst_amount2']-$rs1['gst_amount3'];
										?>
										                                         <td class="hidden-480"><?php echo $r3['superwisor']; ?></td>
														 <td class="hidden-480"><?php echo $r3['coordinator']; ?></td>
														  <td class="hidden-480"><?php echo $r3['store_name']; ?></td>
														  
														 <td class="hidden-480"><?php echo $r3['store_code']; ?></td>
														 
														
														 <td class="hidden-480"><?php echo $r3['format_type']; ?></td>
														 
														  <td class="hidden-480"><?php echo $r1['ro_no']; ?></td>
														 
														   <td class="hidden-480"><?php  $d= $r1['ro_date']; echo date('d-m-Y', strtotime($d)); ?></td> 
														    <td class="hidden-480"><?php echo $r1['falt_desc']; ?></td>
												 <td class="hidden-480"><?php echo $r1['tot_base']; ?></td>
												 
												 <td class="hidden-480"><?php echo $r1['tot_ser']; ?></td>
												 
												 <td class="hidden-480"><?php echo $r1['tot_gst']; ?></td>
												  <td class="hidden-480"><?php echo $r1['net']; ?></td>
												  
												  <?php $ree= $rs1['req_amnt']; ?>
												  
												   <td class="hidden-480">
												   
												   <?php
												             $ty5="select sum(approve_amnt) as samt from odrequest_amnt where quet_num='$qot'";
                                                            $ty55=mysqli_query($link,$ty5) or die(mysqli_error($link));
                                                $ty15=mysqli_fetch_array($ty55);
                                                            
                                        echo $tadv=$ty15['samt'];
                                        $adv=$adv+$tadv;
                                                ?>
										   </td>
												    <td class="hidden-480">
												        <?php
												             $tyy="select sum(req_amnt+gstamt) as samt from odrequest_amnt where quet_num='$qot'";
                                                            $ty=mysqli_query($link,$tyy) or die(mysqli_error($link));
                                                $ty1=mysqli_fetch_array($ty);
                                                            
                                         $treq=$ty1['samt'];
                                        echo $ttt=$treq-$tadv;
                                        $reqamt=$reqamt+$ttt;
                                                ?></td>
												  
												  
												  <td class="hidden-480"><?php echo $r1['bal']; ?></td>
												  <td class="hidden-480"><?php 
												  
												     $yt5="select * from odrequest_amnt where quet_num='$qot'";
                                                            $uy0=mysqli_query($link,$yt5) or die(mysqli_error($link));
                                                        while($uy01=mysqli_fetch_array($uy0)){
                                                            $gstamt=$uy01['gstamt'];
                                                            
                                        echo $uy01['gsttype']."<br/>";
                                                        }
																							  ?></td>
																							  <td class="hidden-480"><?php 
												  
												     $yt5="select * from odrequest_amnt where quet_num='$qot'";
                                                            $uy0=mysqli_query($link,$yt5) or die(mysqli_error($link));
                                                        while($uy01=mysqli_fetch_array($uy0)){
                                                            $gstamt=$uy01['gstamt'];
                                                            
                                        echo $uy01['gstamt']."<br/>";
                                                        }
																							  ?></td>
												  
                                                        <td class="hidden-480">
                                                            
                                                            <?php 
                                                             $yt="select * from odrequest_amnt where quet_num='$qot'";
                                                            $uy=mysqli_query($link,$yt) or die(mysqli_error($link));
                                                        while($uy1=mysqli_fetch_array($uy)){
                                                            $at=$uy1['req_amnt']+$uy1['gstamt'];
                                        echo $uy1['ac_det']."-".$at."<br/>";
                                                        }
                                                            
                                                            
                                                            
                                                           ?>                                                  </td>
												  
                                                        
                                                       
                                                        <!--<td><?php echo $rs1['user']; ?></td>-->
                                                         <td class="hidden-480"><?php 
                                                         $cempname=$rs1['user'];
                                                         $sq=mysqli_query($link,"select emp_name from emp where employeeid='$cempname' limit 1");
                                                         	$rss1=mysqli_fetch_array($sq);
                                                         	if($rss1['emp_name']=="")
                                                         	echo $cempname;
                                                         	else
                                                            echo $rss1['emp_name']; ?></td>
                                                       
                                                       <td class="hidden-480">
                                                         <?php if(($tsname=='admin') or ($tsname=='durgarao')or ($tsname=='sumanthpotluri') or ($tsname=='JFMOD22232823')){ ?>
                                                           
                                                           <a href="odreq_amnt_list.php?id=<?php echo $qot; ?>&amt=<?php echo $amt;?>&st=<?php echo $state;?>" onclick="return confirm('are you sure?')">
                                                        <img src="update.png" width="16" height="16"></a>
                                                        
                                                        <?php }else{ ?>
                                                        <img src="update.png" width="16" height="16">
                                                        <?php }?>
                                                        
                                                        
                                                        </td>
                                                    <td class="hidden-480">
                                                        <?php if(($tsname=='admin') or ($tsname=='durgarao')or ($tsname=='sumanthpotluri')){ ?>
                                                        <a href="odedit_request.php?id=<?php echo $rs1['quet_num']; ?>">
                                                        <img src="images/edit.gif"></a>
                                                        
                                                        <a href="odcancel_request.php?id=<?php echo $rs1['quet_num']; ?>">
                                                        <img src="images/Icon_Delete.png"></a>
                                                         <?php }else{ ?>
                                                        <img src="images/edit.gif"> <img src="images/Icon_Delete.png">
                                                        
                                                        <?php }?> 
                                                        </td>
														 
														 
                                                    </tr>
                                                    <?php $i++; } 
													
													
													?>
                                                    <tr>
													<td colspan="11">Total </td>
													<td><?php echo $ramt ?></td>
													<td><?php echo $sfee ?></td>
													<td><?php echo $gt ?></td>
													<td><?php echo $tamt ?></td>
													<td><?php echo $adv ?></td>
													<td><?php echo $reqamt ?></td>
													<td><?php echo $bamt ?></td>
													<td></td>
													<td><?php echo $tgst ?></td>
													<td colspan="4"></td>
													</tr>
                                                    
                                                </tbody>
                                            </table>
                                            
                                            
                                        	
												<?php }?>
												
												
												
                                        </div>
                                    </div>
                                </div>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                <!-- /.row -->
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
                                            jQuery(function ($) {
                                                //initiate dataTables plugin
                                                var myTable =
                                                        $('#dynamic-table')
                                                        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                                                        .DataTable({
                                                            bAutoWidth: false,
                                                            "aoColumns": [
                                                                {"bSortable": false},
                                                                 null,null,null,null,null,null,
                                                                {"bSortable": false}
                                                            ],
                                                            "aaSorting": [],

                                                            


                                                            select: {
                                                                style: 'multi'
                                                            }
                                                        });



                                                $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

                                                new $.fn.dataTable.Buttons(myTable, {
                                                    buttons: [
                                                        {
                                                            "extend": "colvis",
                                                            "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                                                            "className": "btn btn-white btn-primary btn-bold",
                                                            columns: ':not(:first):not(:last)'
                                                        },
                                                        {
                                                            "extend": "copy",
                                                            "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "csv",
                                                            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "excel",
                                                            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "pdf",
                                                            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "print",
                                                            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                                                            "className": "btn btn-white btn-primary btn-bold",
                                                            autoPrint: false,
                                                            message: 'This print was produced using the Print button for DataTables'
                                                        }
                                                    ]
                                                });
                                                myTable.buttons().container().appendTo($('.tableTools-container'));

                                                //style the message box
                                                var defaultCopyAction = myTable.button(1).action();
                                                myTable.button(1).action(function (e, dt, button, config) {
                                                    defaultCopyAction(e, dt, button, config);
                                                    $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
                                                });


                                                var defaultColvisAction = myTable.button(0).action();
                                                myTable.button(0).action(function (e, dt, button, config) {

                                                    defaultColvisAction(e, dt, button, config);


                                                    if ($('.dt-button-collection > .dropdown-menu').length == 0) {
                                                        $('.dt-button-collection')
                                                                .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                                                                .find('a').attr('href', '#').wrap("<li />")
                                                    }
                                                    $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
                                                });

                                                ////

                                                setTimeout(function () {
                                                    $($('.tableTools-container')).find('a.dt-button').each(function () {
                                                        var div = $(this).find(' > div').first();
                                                        if (div.length == 1)
                                                            div.tooltip({container: 'body', title: div.parent().text()});
                                                        else
                                                            $(this).tooltip({container: 'body', title: $(this).text()});
                                                    });
                                                }, 500);





                                                myTable.on('select', function (e, dt, type, index) {
                                                    if (type === 'row') {
                                                        $(myTable.row(index).node()).find('input:checkbox').prop('checked', true);
                                                    }
                                                });
                                                myTable.on('deselect', function (e, dt, type, index) {
                                                    if (type === 'row') {
                                                        $(myTable.row(index).node()).find('input:checkbox').prop('checked', false);
                                                    }
                                                });




                                                /////////////////////////////////
                                                //table checkboxes
                                                $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

                                                //select/deselect all rows according to table header checkbox
                                                $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function () {
                                                    var th_checked = this.checked;//checkbox inside "TH" table header

                                                    $('#dynamic-table').find('tbody > tr').each(function () {
                                                        var row = this;
                                                        if (th_checked)
                                                            myTable.row(row).select();
                                                        else
                                                            myTable.row(row).deselect();
                                                    });
                                                });

                                                //select/deselect a row when the checkbox is checked/unchecked
                                                $('#dynamic-table').on('click', 'td input[type=checkbox]', function () {
                                                    var row = $(this).closest('tr').get(0);
                                                    if (this.checked)
                                                        myTable.row(row).deselect();
                                                    else
                                                        myTable.row(row).select();
                                                });



                                                $(document).on('click', '#dynamic-table .dropdown-toggle', function (e) {
                                                    e.stopImmediatePropagation();
                                                    e.stopPropagation();
                                                    e.preventDefault();
                                                });



                                                //And for the first simple table, which doesn't have TableTools or dataTables
                                                //select/deselect all rows according to table header checkbox
                                                

                                                //select/deselect a row when the checkbox is checked/unchecked
                                                



                                                /********************************/
                                                //add tooltip for small view action buttons in dropdown menu
                                              

                                                //tooltip placement on right or left
                                                


                                                /***************/
                                               





                                                /**
                                                 //add horizontal scrollbars to a simple table
                                                 $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
                                                 {
                                                 horizontal: true,
                                                 styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
                                                 size: 2000,
                                                 mouseWheelLock: true
                                                 }
                                                 ).css('padding-top', '12px');
                                                 */


                                            })
        </script>
   <script>
document.getElementById('aprvall').onclick = function() {
  var markedCheckbox = document.getElementsByName('checkboxrow');
  var datastring  =[];
  for (var checkbox of markedCheckbox) {
    if (checkbox.checked)
      //document.body.append(checkbox.value + ', ');
      datastring.push(checkbox.value);
  }
  
  
  
  $.ajax({
         data:  {
			 data:datastring
		 },
         type: "post",
         url: "approveall.php",
         success: function(data){
              alert("Approved Quotations Successfully!");
         }
	});
}
</script>     
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