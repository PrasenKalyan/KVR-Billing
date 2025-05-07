<?php //include('config.php');
session_start();

if($_SESSION['user'])
{
$name=$_SESSION['user'];
$tsname=$_SESSION['user'];
include('dbconnection/connection.php');
	$state=$_GET['state'];

	if($state=='AP'){
		$qottable ='add_qot';
		$request_amnt ='request_amnt';
       
	}
	elseif($state=='TG'){
		$qottable ='add_tgqot';
		$qottable1 ='add_tgqot1';
		$request_amnt ='tgrequest_amnt';

	 
	}
	 elseif($state=='TN'){
	  $qottable ='add_tnqot';
	  $qottable1 ='add_tnqot1';
	  $request_amnt ='tnrequest_amnt';
	
	}
	elseif($state=='KL'){
		$qottable ='add_klqot';
		$qottable1 ='add_klqot1';
		$request_amnt ='klrequest_amnt';	
	  
	}
	else if($state=='KN'){
	  $qottable ='add_knqot';
	  $qottable1 ='add_knqot1';
	  $request_amnt ='knrequest_amnt';
      	
	}
	elseif($state=='OD'){
	  $qottable ='add_odqot';
	  $qottable1 ='add_odqot1';
	  $request_amnt ='odrequest_amnt';	
	}
//include('org1.php');
$y=mysqli_query($link,"select * from employee where username='$name'");
$y1=mysqli_fetch_array($y);
$email=$y1['emp_email'];
 $ename=$y1['emp_name'];
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
                                <a href="#"><?php echo $state;?> Document Required List</a>
                            </li>
                            <li>
                                <a href="#">Document Required List</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
									<!--<a href="addbill.php"><button type="button" class="btn-success btn-sm ">Add New</button></a>-->
                                       

                                        
                                        <div class="table-header">
                                        <?php echo $state; ?> Document Required List
                                        </div>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                        <div style="height:15px;"></div>
										<form method="post" action="" class="form-horizontal">
										
										<div class="form-group">
				
				
						<div class="col-sm-1"></div>
                     <div class="col-sm-8">
                  
                <input type="text" class="form-control pull-right" id="myInput" onkeyup="myFunction()" name="search" placeholder="Search  ">
                  </div>
                  <button class="btn btn-info pull-left" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  <div class="col-sm-2"><b><a href="qut_apdoc_excel.php?user=<?php echo $tsname ?>&state=<?php echo $state; ?>" class="btn btn-primary btn-xs">XL Download</a></b></div>
				   <div class="col-sm-3">
                  
               
                  </div>
				</div>
										
										</form>
                                  <div style="overflow-x:auto;">
                                        
                                            <table id="myTable" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <!--<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>-->
                                                       <th>S No</th>
                                                        
                                                        <th>Quotation No</th>
                                                        <th>Supervisor</th>
                                                        <th>Coordinator</th>
                                                        <th>AFM</th>
                                                        <th>Store Name</th>
                                                        <th>Store Code</th>
                                                        <th>Store Type</th>
                                                        <th>Ro Num</th>
                                                        <th>Ro Date</th>
                                                        <th>Fault Description</th>
                                                        <th>RO Amt</th>
                                                        <th>Tot Service</th>
                                                        <th>Tot Gst</th>
                                                        <th>Total</th>
														<th>Whom To be Invest</th>
														 <?php if( ($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname=='Sulfeekhar') or ($tsname=='manikandan') or ($tsname=='sumanthpotluri') ){?>

													    <th>Transfer Amount</th>
													    <?php } ?>
                                                        <th>Amount Transferred Date</th>
                                                        <th>Ageing</th>
                                                        <th>User</th>
                                                         <th>Edit</th>
                                                          <!-- <th>Cancel</th> -->
								
														<th>NotRequireEdit</th>
														
                                                    </tr>
                                                </thead>

                                                <tbody>
												
												<?php 
												$results_per_page = 3;
										if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                                        $start_from = ($page-1) * $results_per_page;
											if(isset($_POST['bsearch'])){
												$bsearch=$_POST['search'];
											 $y="SELECT distinct quet_num,state,transfer_date FROM ".$request_amnt."  where status='Amount Transferred' and bill_status='' and  quet_num like  '%$bsearch%'  ";
											} else {
											    
											    
											    
													  //$y="SELECT distinct quet_num,state,transfer_date FROM ".$request_amnt." where  status='Amount Transferred' and bill_status=''     ";
										
										
										if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname==$state.'billing') or ($tsname=='8919765662') or ($tsname=='sumanthpotluri') or ($tsname=='naiduys')){
											         $y="SELECT  distinct quet_num,user FROM ".$request_amnt." where  status='Amount Transferred' and bill_status=''  or docr_status='Cancel'  ORDER BY id asc LIMIT $start_from,$results_per_page";
											    }else{
											         $y="SELECT distinct quet_num,user FROM ".$request_amnt." where  status='Amount Transferred'  and bill_status=''   and user='$tsname'   or docr_status='Cancel'  ORDER BY id asc LIMIT $start_from,$results_per_page";
											    }
										
										
										
											}
											$t=mysqli_query($link,$y) or die(mysqli_error($link));
											$i=$start_from;
													$start=1;
											$ro=0;
											$ts=0;
											$tg=0;
											$tot=0;
											$apamt=0;
							 			while($rs1=mysqli_fetch_array($t)){
											    $ses=$rs1['user'];
											    $qtno=$rs1['quet_num'];
											    $yt=mysqli_query($link,"select transfer_date from ".$request_amnt." where quet_num='$qtno'");
											    $yt1=mysqli_fetch_assoc($yt);
											$tdate=$yt1['transfer_date'];
											$trdate=date_create($yt1['transfer_date']);
											$todate=date_create(date('Y-m-d'));
											$diff=date_diff($todate,$trdate);
                                            $df=$diff->format("%a");
                                                if($df > 7){
                                                    $color="red";
                                                    $c1="#fff";
                                                }else{
                                                    $color="";
                                                    $c1="#000";
                                                }
                                                
													
						$a="select store_code,ro_no,ro_date,falt_desc,id,tot_base,tot_ser,tot_gst,net from ".$qottable." where quet_num='$qtno'";
							$ssq=mysqli_query($link,$a);
							$r1=mysqli_fetch_array($ssq);
							$str_code=$r1['store_code'];
						$k=mysqli_query($link,"select * from dpr where store_code='$str_code'");
							$r3=mysqli_fetch_array($k);
							
							$supervisor=$r3['superwisor'];
							// $ename;
							if(($supervisor==$ename)){
							
						$k12="select * from dpr where store_code='$str_code' and superwisor='$supervisor'";
							}else{
							$k12="select * from dpr where store_code='$str_code' ";
							}
							$k13=mysqli_query($link,$k12);
							$r33=mysqli_fetch_array($k13);
                            ?>
                            <?php if(($supervisor==$ename) or($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname==$state.'billing') or ($tsname==$ses) or ($tsname=='sumanthpotluri') or ($tsname=='naiduys') ){?>
                                                    <tr style="background-color:<?php echo $color; ?>;color:<?php echo $c1; ?>;">
                                                        
<!--<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>-->
                                                       <td><?php echo $i+$start; ?></td>
                                                        <td><?php echo $qtno ?></td>
                                                       
                                                      <td class="hidden-480"><?php echo $r33['superwisor']; ?></td>
														 <td class="hidden-480"><?php echo $r33['coordinator']; ?></td>
														  <td class="hidden-480">
														      <?php echo $r33['afm']; ?></td>
														  <td class="hidden-480">
														      <?php echo $r33['store_name']; ?></td>
														  
														 <td class="hidden-480"><?php echo $r33['store_code']; ?></td>
														 
														
														 <td class="hidden-480"><?php echo $r33['format_type']; ?></td>
														 
														  <td class="hidden-480"><?php echo $r1['ro_no']; ?></td>
														 
														   <td class="hidden-480"><?php  $d= $r1['ro_date']; echo date('d-m-Y', strtotime($d)); ?></td> 
														    <td class="hidden-480"><?php echo $r1['falt_desc']; ?></td>
														    <td class="hidden-480"><?php echo $tb=$r1['tot_base'];
														    $ro=$ro+$tb;
														    ?></td> 
														    <td class="hidden-480"><?php echo $totser=$r1['tot_ser'];
														    $ts=$ts+$totser;
														    ?></td> 
														    <td class="hidden-480"><?php echo $tgot=$r1['tot_gst'];
														    $tg=$tg+$tgot;
														    ?></td> 
														    <td class="hidden-480"><?php echo $net=$r1['net'];
														    $tot=$net+$tot;
														    ?></td>
                                      <td class="hidden-480"><?php 
									 $ac=$rs1['ac_det'];
									 $a="select ac_det,approve_amnt,transfer_date from ".$request_amnt." where quet_num='$qtno' and  confirm='Yes' ";
														  $sr1=mysqli_query($link,$a);
										 while( $r2=mysqli_fetch_array($sr1)){
										      $transfer_date=$r2['transfer_date'];
														    //$r2['quet_num'];
											  //$req_amnt=$r2['req_amnt'];
                                                    echo $r2['ac_det']."(".$r2['approve_amnt'].")(".date('d-m-Y',strtotime($r2['transfer_date'])).")<br/>"; 
                                                //    $apamt=$apamt+$req_amnt;
										 }
														   ?>
														  
														  </td>
													 <?php if( ($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname=='Sulfeekhar') or ($tsname=='manikandan') or ($tsname=='sumanthpotluri') ){?>
<td class="hidden-480"><?php 
                                                        
                                                        $a="select sum(approve_amnt) as req_amnt from ".$request_amnt." where quet_num='$qtno' and  confirm='Yes' ";
														  $sr1=mysqli_query($link,$a);
										  $r2=mysqli_fetch_array($sr1);
														    //$r2['quet_num'];
											  $req_amnt=$r2['req_amnt'];
                                                        
                                                 $apamt=$apamt+$req_amnt;        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        echo $req_amnt; ?></td>
													    
													    <?php } ?>
                               	  
                                                        
                                           
                                                        
                                                       
                                                        <td class="hidden-480">
											
<?php
														
														$a1="select transfer_date  from ".$request_amnt." where quet_num='$qtno' and  confirm='Yes' order by id desc limit 1 ";
														  $sr11=mysqli_query($link,$a1);
										  $r21=mysqli_fetch_array($sr11);
														
														
														
														$d=$r21['transfer_date'];
if($d!=''){ 

echo date('d-m-Y', strtotime($d)); }?></td>
                                                        
                          <td>
                                                       <?php 
                                                       $rdate=date('Y-m-d');
                                                       $amtdate=strtotime($rdate);
                                                         $amtdate1=strtotime($transfer_date);
                                                        $ddate=($amtdate - $amtdate1)/60/60/24;
                                                        echo $ddate+1;
                                                       ?>
                                                       
                                                   </td>                             
                                                         <!-- <td><?php echo $rs1['user']; ?></td>-->

<td class="hidden-480"><?php 
                                                         $cempname=$rs1['user'];
                                                         $sq=mysqli_query($link,"select emp_name from emp where employeeid='$cempname' limit 1");
                                                         	$rss1=mysqli_fetch_array($sq);
                                                         	if($rss1['emp_name']=="")
                                                         	echo $cempname;
                                                         	else
                                                            echo $rss1['emp_name']; ?></td>
                                                            
														  
                                                        <td class="hidden-480">
                                                            
                                                             <?php if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname==$state.'billing')or ($tsname=='sumanthpotluri') ){ ?>
                                                            
                                                            <a href="edit_req_bill.php?id=<?php echo $rs1['quet_num'];?>&id1=<?php echo $r1['id'];?>&state=<?php echo $state;?>">
                                                        <img src="images/edit.gif"></a>
                                                        
                                                        <?php }else{?>
                                                        <img src="images/edit.gif">
                                                        <?php }?>
                                                         <?php if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname==$ses) or ($tsname=='sumanthpotluri')){ ?>
                                                        <a href="wtsedit1_qot.php?id=<?php echo $qtno; ?>&state=<?php echo $state;?>">
                                                        <span class="glyphicon glyphicon-plus-sign btn-lg"></span></a>
                                                       <?php }else{ ?>
                                                         <!--<span class="glyphicon glyphicon-plus-sign btn-lg"></span>-->
                                                    <?php    } ?>
                                                        </td>
                                                        
                                                        <!--status starts-->
                                                        <!-- <td>
														    
														    <?php if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname==$ses) or ($tsname=='sumanthpotluri')){ ?>
                                                            
                                                            <a href="edit_status.php?id=<?php echo $rs1['quet_num']; ?>&id1=<?php echo $r1['id'];?>&state=<?php echo $state;?>">
                                                        <img src="images/cancel.png"></a>
                                                        
                                                        <?php }else{?>
                                                        <img src="images/cancel.png">
                                                        <?php }?>

														    
														</td>  -->
														
														<!--status ends-->
                                                <td>
														    
														    <?php if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname==$ses) or ($tsname=='sumanthpotluri')){ ?>
                                                            
                                                            <a href="edit_req_bill.php?id=<?php echo $rs1['quet_num'];?>&id1=<?php echo $r1['id'];?>&state=<?php echo $state;?>">
                                                        <img src="images/edit.gif"></a>
                                                        
                                                        <?php }else{?>
                                                        <img src="images/edit.gif">
                                                        <?php }?>

														    
														</td>       
														
														
                                                    </tr>
												
												<?php }?>
												
												
												
												
												
											<?php $i++; } ?>
											
                                                    <tr>
                                                        
                                                        <td colspan="11">Total</td>
                                                        <td><?php echo $ro; ?></td>
                                                        <td><?php echo $ts; ?></td>
                                                        <td><?php echo $tg; ?></td>
                                                        <td><?php echo $tot; ?></td>
                                                        <td></td>
                                                        <td><?php echo $apamt;  ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
											</div>
											<div align="center">		
<?php 
	$state=$_GET['state'];

if($bsearch!=''){

	$sql="SELECT count(distinct quet_num) as total FROM ".$request_amnt."  where status='Amount Transferred' and bill_status='' and  quet_num like  '%$bsearch%'  ";
											} else {
											    
											    
											    
													  //$y="SELECT distinct quet_num,state,transfer_date FROM ".$request_amnt." where  status='Amount Transferred' and bill_status=''     ";
										
										
										if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname==$state.'billing') or ($tsname=='8919765662') or ($tsname=='sumanthpotluri') or ($tsname=='naiduys')){
											         $sql="SELECT  count(distinct quet_num) as total FROM ".$request_amnt." where  status='Amount Transferred' and bill_status=''  or docr_status='Cancel' ";
											    }else{
											         $sql="SELECT count(distinct quet_num) as total FROM ".$request_amnt." where  status='Amount Transferred'  and bill_status=''   and user='$tsname' ";
											    }
											}
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
echo "<ul class='pagination'>";
echo "<li><a href='bill_list.php?state=$state&page=".($page-1)."' class='button'>Previous</a></li>"; 

echo "<li><a>".$page."</a></li>";

echo "<li><a href='bill_list.php?state=$state&page=".($page+1)."' class='button'>NEXT</a></li>";
echo "</ul>";

?>
												
</div>
											
                                        </div>
                                    </div>
                                </div>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div>
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
                                                                 null,null,null,null,null,null,null,null,null,null,null,
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
                                                                             function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, occurrence;

      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
     for (i = 1; i < tr.length; i++) {
         occurrence = false; // Only reset to false once per row.
         td = tr[i].getElementsByTagName("td");
         for(var j=0; j< td.length; j++){                
             currentTd = td[j];
             if (currentTd ) {
                 if (currentTd.innerHTML.toUpperCase().indexOf(filter) > -1) {
                     tr[i].style.display = "";
                     occurrence = true;
                 }
             }
         }
         if(!occurrence){
             tr[i].style.display = "none";
         }
     }
   }
        </script><!-- inline scripts related to this page -->
        <?php mysqli_close($link); ?>
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