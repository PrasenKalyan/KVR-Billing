<?php //include('config.php');
session_start();
$stn="KL";
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
                                <a href="#">KL Approved Amount List</a>
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
                                       KL Approved Amount List
                                        </div>

                                        <!-- div.table-responsive -->
<div style="height:15px; margin-bottom:20px;">
<!--<button class="btn btn-info" type="submit" name="bsearch" onclick="javascript:location.href='add_qot.php'" id="bsearch">
                                               
                                                Add New
        <br />                                    </button>-->
		
		<form method="post" action="" class="form-horizontal">
										
										<div class="form-group">
				
				
						<div class="col-sm-1"></div>
                     <div class="col-sm-6">
                  
                <input type="text" class="form-control pull-right" id="myInput" onkeyup="myFunction()" name="search" placeholder="Search By Quotation No  or Whom to be invest">
                  </div>
				   <div class="col-sm-3">
                  
               <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  </div>
                  <div class="col-sm-2"><b><a href="qut_klamtaprv_excel.php?user=<?php echo $tsname; ?>" class="btn btn-primary btn-xs">XL Download</a></b></div>
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
                                        <div style="overflow-x:auto;">
                                        
                                  
                                        
                                            <table id="sample-table" class="table table-striped table-bordered table-hover">
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
                                                        <th>Store Name</th>
                                                        <th>Store Code</th>
                                                        <th>Store Type</th>
                                                        <th>Ro Num</th>
                                                        <th>Ro Date</th>
                                                        <th>Fault Description</th>
                                                         <th>RO Amount</th>
                                                        <th>Service Fee</th>
                                                        <th>GST</th>
                                                        <th>Total</th>
                                                        <th>Requested Amount</th>
													    <th>Balance Amount</th>
										                <th>GST Type</th>
										                <th>GST Amount</th>
										                   <th>Advance Amount</th>
														<th>Whom To be Invest</th>
														
                                                         <th>Approved Amount</th>
                                                        <th>Approved Amount Date</th>
														<th>User</th>
                                                          <th>Update</th>
                                                    
                                                        
													 <th>Edit</th>
														     
                                                        
                                                      
                                                      
                                                    </tr>
                                                </thead>

                                                <tbody>
												
												<?php 
											include('dbconnection/connection.php');
									if(isset($_POST['bsearch'])){
												$bsearch=$_POST['search'];
										
											 $y="select * from klrequest_amnt where  quet_num like '%$bsearch%' or ac_det like '%$bsearch%'  and confirm='Yes' and status!='Amount Transferred' group by ac_det order by id desc";
												} else {
													
													//$y="select * from klrequest_amnt where  confirm='Yes' and status!='Amount Transferred' group by ac_det order by id desc";
												
												    if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname=='klbilling') or ($tsname=='sumanthpotluri')){
													$y="select * from klrequest_amnt where  confirm='Yes' and status=''  order by id desc";    
													}else{
													    $y="select * from klrequest_amnt where  confirm='Yes' and status=''  and user='$tsname'  order by id desc";
													}
													
												    
												    
												}
											 
											$t=mysqli_query($link,$y) or die(mysqli_error($link));
											$i=1;
											$apamt=0;
												$apt=0;
										$ra=0;
										$sf=0;
										$gsta=0;
										$tamt=0;
										$reqam=0;
										$bala=0;
										$ada=0;
											while($rs1=mysqli_fetch_array($t)){
							$qtno=$rs1['quet_num'];
							$krid=$rs1['id'];
						$a="select store_code,ro_no,ro_date,falt_desc,tot_base,tot_ser,tot_gst,adv_amnt,adv_amnt1,adv_amnt2,gst_type,net,bal from add_klqot where quet_num='$qtno'";
							$ssq=mysqli_query($link,$a);
							$r1=mysqli_fetch_array($ssq);
							$str_code=$r1['store_code'];
						$k=mysqli_query($link,"select * from dpr where store_code='$str_code'");
							$r3=mysqli_fetch_array($k);
                                                    ?>
												
												<tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $qtno ?></td>
                                                       
                                                      <td class="hidden-480"><?php echo $r3['superwisor']; ?></td>
														 <td class="hidden-480"><?php echo $r3['coordinator']; ?></td>
														  <td class="hidden-480"><?php echo $r3['store_name']; ?></td>
														  
														 <td class="hidden-480"><?php echo $r3['store_code']; ?></td>
														 
														
														 <td class="hidden-480"><?php echo $r3['format_type']; ?></td>
														 
														  <td class="hidden-480"><?php echo $r1['ro_no']; ?></td>
														 
														   <td class="hidden-480"><?php  $d= $r1['ro_date']; echo date('d-m-Y', strtotime($d)); ?></td> 
														    <td class="hidden-480"><?php echo $r1['falt_desc']; ?></td> 
														     <td class="hidden-480"><?php echo $r1['tot_base'];
														      $ro=$ro+$r1['tot_base'];
														     
														     ?></td>
												 	 <td class="hidden-480"><?php echo $r1['tot_ser']; 
												 	 $sf=$sf+$r1['tot_ser'];
												 	 ?></td>
												 	 <td class="hidden-480"><?php echo $r1['tot_gst']; 
												 	 $gsta=$gsta+$r1['tot_gst']; 
												 	 ?></td>
												 	 <td class="hidden-480"><?php echo $r1['net'];
												 	 	 $tamt=$tamt+$r1['net'];
												 	 ?></td>
												  
												  <?php $ree= $rs1['req_amnt']; ?>
												  
											
												    <td class="hidden-480"><?php echo $rs1['req_amnt']+$rs1['gstamt'];
												     $reqam=$reqam+$rs1['req_amnt']+$rs1['gstamt'];
												    ?></td>
												  
												  
												  <td class="hidden-480"><?php echo $r1['bal']; 
												    $bala=$bala+$r1['bal'];
												  ?></td>
												  <td class="hidden-480"><?php echo $rs1['gsttype'];  ?></td>
												 <td class="hidden-480"><?php 
												  
												     echo $rs1['gstamt'];
                                                        
																							  ?></td>
												   <td>
												      <?php
												     $adamt="select sum(approve_amnt) as req_amnt from klrequest_amnt where quet_num='$qtno'and  status='Amount Transferred' and   confirm='Yes'" ;
												      $ads=mysqli_query($link,$adamt) or die(mysqli_error($link));
												      $ads1=mysqli_fetch_array($ads);
												     echo $adsd=$ads1['req_amnt'];
												      $ada=$ada+$adsd;
												      echo $r1['approve_amt'];
												      ?>
												      
												  </td>
												  
												  
												  
                                      <td class="hidden-480"><?php 
									 $ac=$rs1['ac_det'];
									 $a="select sum(approve_amnt) as req_amnt from klrequest_amnt where quet_num='$qtno' and id='$krid' and  confirm='Yes' and ac_det='$ac'";
														  $sr1=mysqli_query($link,$a);
										  $r2=mysqli_fetch_array($sr1);
														    //$r2['quet_num'];
											  $req_amnt=$r2['req_amnt'];
                                                    
                                                    $apamt=$apamt+$req_amnt;
														   ?>
														  
														  <?php echo $rs1['ac_det']; ?></td>
														  
                                                        <td class="hidden-480"><?php echo $req_amnt; ?></td>
                                                         <td class="hidden-480"><?php  $d= $rs1['req_date']; echo date('d-m-Y', strtotime($d)); ?></td>
                                                        
                                                        <!--<td class="hidden-480"><?php echo $rs1['user']; ?></td>-->
                                                        <td class="hidden-480"><?php 
                                                         $cempname=$rs1['user'];
                                                         $sq=mysqli_query($link,"select emp_name from emp where employeeid='$cempname' limit 1");
                                                         	$rss1=mysqli_fetch_array($sq);
                                                         	if($rss1['emp_name']=="")
                                                         	echo $cempname;
                                                         	else
                                                            echo $rss1['emp_name']; ?></td>
                                                          <td class="hidden-480">
                                                          <?php    if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname=='sumanthpotluri')){ ?> 
                                                          <a href="klreq_amnt_list1.php?id=<?php  echo $rs1['id']; ?>" onclick="return confirm('are you sure?')">
                                                        <img src="update.png" width="16" height="16"></a>
                                                        
                                                        <?php }else{ ?>
                                                        <img src="update.png" width="16" height="16">
                                                        <?php }?>
                                                        </td>
                                                       
                                                      
                                                    <td class="hidden-480">
                                                    <?php    if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname=='sumanthpotluri')){ ?>  
                                                    <a href="kledit_request1.php?id=<?php echo $rs1['id'] ?>">
                                                        <img src="images/edit.gif"></a>
                                                        
                                                        <?php }else{ ?>
                                                        <img src="images/edit.gif">
                                                        
                                                        <?php }?>
                                                        
                                                        
                                                        </td>
														 
														 
                                                    </tr>
                                                    <?php $i++; } 
													
													
													?>
                                                    <tr><th align="center" colspan="10" style="text-align:right;color:red;">Total</th><td><?php echo $ro; ?></td><td><?php echo $sf; ?></td><td><?php echo $gsta; ?></td><td><?php echo $tamt; ?></td><td><?php echo $reqam; ?></td><td><?php echo $bala; ?></td><td></td><td></td><td><?php echo $ada?></td><td></td><td><?php echo $apamt; ?></td><td colspan="4"></td></tr>
                                                    
                                                </tbody>
                                            </table>
											
															
												<h2>Account Summary</h2>
											<table class="table">
                                                <tr>
                                                    
                                                    <th>S No</th>
                                                    <th>Name</th>
                                                    <th>Account No</th>
                                                    <th>Bank</th>
                                                    <th>IFSC Code</th>
                                                    <th>Amount</th>
                                                </tr>
                                                <?php 
                                            if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname=='klbilling') or ($tsname=='sumanthpotluri')){
											    	$y="select distinct ac_det from klrequest_amnt where confirm='Yes' and status='' ";
											}else{
											    	$y="select distinct ac_det from klrequest_amnt where  user='$tsname' and  confirm='Yes' and status='' ";
											}
											
											$uy=mysqli_query($link,$y) or die(mysqli_error($link));
										$k=1;
										$klt=0;
											while($uy1=mysqli_fetch_array($uy)){
											    $acd=$uy1['ac_det'];
											    
											    $yu=mysqli_query($link,"select * from ac_det where name='$acd'");
											    $yu1=mysqli_fetch_array($yu);
											    $mu=mysqli_query($link,"select sum(approve_amnt) as amt from klrequest_amnt where ac_det='$acd' and confirm='Yes' and status='' ");
											    $mu1=mysqli_fetch_array($mu);
											    $dds=$mu1['amt'];
											    $klt=$klt+$dds;
											?>    
											<tr>
											    <td><?php echo $k ?></td>
											    <td><?php echo $acd ?></td>
											    <td><?php echo $yu1['ac_no'] ?></td>
											    <td></td>
											    <td><?php echo $yu1['ifsc'] ?></td>
											    <td><?php echo $mu1['amt'] ?></td>
											    <td></td>
											</tr>
										        
                                                <?php $k++; }?>
                                                	<tr><td colspan="5" style="text-align:right;color:red;">Total</td>
											<td><?php echo $klt; ?></td>
											</tr>
                                        
                                            </table>
										
											
											
											
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
                                                                 null,null,null,null,null,null,null,
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
     for (i = 2; i < tr.length; i++) {
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