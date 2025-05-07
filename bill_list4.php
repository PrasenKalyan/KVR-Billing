<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
$tsname=$_SESSION['user'];

$state=$_GET['state'];

	if($state=='AP'){
		$qottable ='add_qot';
		$qotbill ='qot_bill';
		$request_amnt ='request_amnt';
        $sts='AP';
        $payment = 'payment';
       
	}
	elseif($state=='TG'){
		$qottable ='add_tgqot';
		$qotbill ='tgqot_bill';
		$request_amnt ='tgrequest_amnt';
        $sts='TG';
        $payment = 'tgpayment';


	 
	}
	 elseif($state=='TN'){
	  $qottable ='add_tnqot';
	  $qotbill ='tnqot_bill';
	  $request_amnt ='tnrequest_amnt';
      $sts='TN';
      $payment = 'tnpayment';
	
	}
	elseif($state=='KL'){
		$qottable ='add_klqot';
		$qotbill ='klqot_bill';
		$request_amnt ='klrequest_amnt';	
        $sts='KL';
        $payment = 'klpayment';
	  
	}
	else if($state=='KN'){
	  $qottable ='add_knqot';
	  $qotbill ='knqot_bill';
	  $request_amnt ='knrequest_amnt';
      $sts='KN';
      $payment = 'knpayment';
      	
	}
	elseif($state=='OD'){
	  $qottable ='add_odqot';
	  $qotbill ='odqot_bill';
	  $request_amnt ='odrequest_amnt';
      $sts='OD';
      $payment = 'odpayment';	
	}
//include('org1.php');
$y=mysqli_query($link,"select * from employee where emp_name='$name'");
$y1=mysqli_fetch_array($y);
$email=$y1['emp_email'];
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
                                <a href="#"><?php echo $state?> Payment Pending List</a>
                            </li>
                            <li>
                                <a href="#"><?php echo $state ?> Payment PendingList</a>
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
                                        <?php echo $state ?> Payment Received List
                                        </div>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                        <div style="height:15px;"></div>
										<form method="post" action="" class="form-horizontal">
										
										<div class="form-group">
				
				
						<div class="col-sm-1"></div>
                     <div class="col-sm-8">
                  
                <input type="text" class="form-control pull-right" id="myInput" name="search" placeholder="Search By Quotation Name No  " onkeyup="myFunction()">
                
                  </div>
                  <button class="btn btn-info pull-left" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  <div class="col-sm-2"><b><a href="qut_appr_excel.php?user=<?php echo $tsname ?>&state=<?php echo $state; ?>" class="btn btn-primary btn-xs">XL Download</a></b></div>
			<!--	   <div class="col-sm-3">
                  
               <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  </div>-->
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
													<th>Inv Number</th>
												
													<th>Inv Date</th>
													<th>Inv Sub Date</th>
													<th>Serv Period</th>
													<th>Inv Sub Mon</th>
													<th>State</th>
													<th>Fomate</th>
													<th>Gst 28%</th>
													<th>Gst 18%</th>
													<th>Gst 12%</th>
													<th>Gst 5%</th>
													<th>Gst 0%</th>
													<th>Total Base</th>
													<th>Gst(28%) Amt</th>
													<th>Gst(18%) Amt</th>
													<th>Gst(12%) Amt</th>
													<th>Gst(5%) Amt</th>
													<th>Gst(0%) Amt</th>
													<th>Total Gst</th>
                                                    <th>Total Amount </th>
                                                    <th>Tds</th>
                                                    <th>Doc No1</th>
                                                    <th>Rec Date1</th>
                                                    <th>Rec Mon1</th>
                                                     <th>Total Amt Rec1</th>
                                                    
                                                    <th>Doc No2</th>
                                                    <th>Rec Date2</th>
                                                    <th>Rec Mon2</th>
                                                     <th>Total Amt Rec2</th>
                                                    
                                                      <th>Outstanding</th>
                                                      <th>Ageing</th>
                                                       <th>Remarks</th>
                                                       <th>User</th>
                                                   <th>Edit</th>
                                                   <th>View</th>
													<th>Delete</th>  
                                                    </tr>
                                                </thead>

                                                <tbody>
												
												<?php 
												 $results_per_page = 30;
										if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                                        $start_from = ($page-1) * $results_per_page;
											if(isset($_POST['bsearch'])){
											   
												$bsearch=$_POST['search'];
											$ssq1="select * from ".$payment."  where inv_no like  '%$bsearch%'";
													  } else {
													     //if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname=='klbilling')){
													         $ssq1="select * from ".$payment."  order by id desc  LIMIT $start_from,$results_per_page";
													      //}else{
													        //  $ssq1="select * from klpayment  order by id desc ";
													     // }
														
													  }
											$t=mysqli_query($link,$ssq1) or die(mysqli_error($link));
                                            $i=$start_from;
                                            $start=1;
											$g128=0;
											$g118=0;
											$g112=0;
											$g15=0;
											$g10=0;
											$tbs=0;
											$gt28=0;
											$gt18=0;
											$gt12=0;
											$gt5=0;
											$gt0=0;
											$td=0;
											$tar=0;
											$ot=0;
											$tg=0;
											$amt=0;
											$tds=0;
											$ot=0;
											$tar=0;
											$tar10=0;
											while($rs1=mysqli_fetch_array($t)){
											
													$q=$rs1['inv_no'];
													$st=$rs1['state'];
													$yu=mysqli_query($link,"select inv_date,inv_sub_date,speriod,ftype,sum(gst28) as gst28,sum(gst18) as gst18,sum(gst12) as gst12,sum(gst5) as gst5,sum(gst5) as gst5,sum(tbase) as tbase from ".$qotbill." where inv_num='$q'") or die(mysqli_error($link));
													$yu1=mysqli_fetch_array($yu);
												
                                                    ?>
                                                    <tr>
                                                        

                                                        <td><?php echo $i+$start; ?></td>
														<td><?php echo $rs1['inv_no']; ?></td>
														
														<td><?php echo $invdate=$yu1['inv_date']; ?></td>
														<td><?php echo $yu1['inv_sub_date']; ?></td>
														<td><?php echo $yu1['speriod']; ?></td>
														<td><?php echo date('M',strtotime($yu1['inv_sub_date'])) ?></td>
														<td><?php echo $state?></td>
														<td><?php echo $yu1['ftype']; ?></td>
													    <td><?php echo $gst28=$yu1['gst28'];
													    $g128=$gst28+$g128;
													    ?></td>
														<td><?php echo $gst18=$yu1['gst18'];
														$g118=$gst18+$g118;
														?></td>
														<td><?php echo $gst12=$yu1['gst12']; 
														$g112=$gst12+$g112;
														?></td>
														<td><?php echo $gst5=$yu1['gst5'];
														$g15=$gst5+$g15;
														?></td>
														<td><?php echo $gst0=$yu1['gst0'];
														$g10=$gst0+$g10;
														?></td>
														<td><?php echo $tbase=$yu1['tbase'];
														$tbs=$tbase+$tbs;
														?></td>	
														<td><?php echo $g28=($gst28*28)/100;
														$gt28=$gt28+$g28;
														?></td>
														<td><?php echo $g18=($gst18*18)/100;
														$gt18=$gt18+$g18;
														?></td>
														<td><?php echo $g12=($gst12*12)/100;
														$gt12=$gt12+$g12;
														?></td>
														<td><?php echo $g5=($gst5*5)/100;
														$gt5=$gt5+$g5;
														?></td>
														<td><?php echo $g0=($gst0*0)/100;
														$gt0=$gt0+$g0;
														?></td>
                                                       <td><?php echo $gtot=$g28+$g18+$g12+$g5+$g0;
                                                       $tg=$tg+$gtot;?></td>
                                                      <td><?php echo  $tt=$tbase+$gtot;
                                                      $tamt=$tamt+$tt;?></td>
                                                      <td><?php echo $td1=$rs1['tds']; 
                                                      $tds=$tds+$td1;
                                                      ?></td>
                                                      <td><?php echo $rs1['document_num']; ?></td>
                                                      <td><?php echo $rs1['recevied_date']; ?></td>
                                                      <td><?php echo date('M',strtotime($rs1['recevied_date'])) ?></td>
                                                      <td><?php echo $tamr=$rs1['recevied_amnt'];
                                                      $tar=$tar+$tamr;?></td>
                                                      
                                                      
                                                       <td><?php echo $rs1['document_num1']; ?></td>
                                                      <td><?php echo $rs1['recevied_date1']; ?></td>
                                                      <td><?php echo date('M',strtotime($rs1['recevied_date1'])) ?></td>
                                                      <td><?php echo $tamr10=$rs1['recevied_amnt1'];
                                                      $tar10=$tar10+$tamr10;?></td>
                                                      
                                                      
                                                      
                                                      
                                                      <td><?php echo $ot1= $rs1['outstanding'];
                                                      $ot=$ot+$ot1;
                                                      ?></td>
                                                     <td class="hidden-480">
                                                         <?php 
                                                         $rdate=date('Y-m-d');
                                                         $amtdate=strtotime($rdate);
                                                         $amtdate1=strtotime($invdate);
                                                        $ddate=($amtdate - $amtdate1)/60/60/24;
                                                        echo $ddate+1;
                                                         ?>
                                                         
                                                         
                                                     </td>
                                                     <td class="hidden-480">
                                                        <?php echo $rs1['remarks'];?>
                                                        </td>
                                                      <!--  <td><?php echo $rs1['user']; ?></td>-->
                                                      <td class="hidden-480"><?php 
                                                         $cempname=$rs1['user'];
                                                         $sq=mysqli_query($link,"select emp_name from emp where employeeid='$cempname' limit 1");
                                                         	$rss1=mysqli_fetch_array($sq);
                                                         	if($rss1['emp_name']=="")
                                                         	echo $cempname;
                                                         	else
                                                            echo $rss1['emp_name']; ?></td>
														 <td class="hidden-480">
                                                        <a href="edit_paymentrecv.php?id=<?php echo $rs1['id'];?>&state=<?php echo $state?>"><img src="images/edit.gif"/></a>
                                                        </td>	
                                                        <td>
														    <?php
														    
														    
														    $tp=mysqli_query($link,"select file from ".$qotbill." where inv_num='$q'") or die(mysqli_error($link));
														    $tp1=mysqli_fetch_array($tp);
														    $tpfile=$tp1['file'];
														    if($tpfile!=''){
														    ?>
														    <a href="iupload/<?php echo $tpfile  ?>">View</a>
														    <?php }else{ ?>
														    View
														    
														    <?php }?>
														    
														    </td>
														    <td><a href="delete_recv.php?id=<?php echo $rs1['id']; ?>&state=<?php echo $state?>"><img src="images/Icon_Delete.png"/></a></td>
                                                    </tr>
												
											<?php $i++; } ?>
											
											<tr>
											    <td colspan="8">Total</td>
											    <td><?php echo $g128; ?></td>
											    <td><?php echo $g118; ?></td>
											    <td><?php echo $g112; ?></td>
											    <td><?php echo $g15; ?></td>
											    <td><?php echo $g10; ?></td>
											    <td><?php echo $tbs; ?></td>
											     <td><?php echo $gt28; ?></td>
											    <td><?php echo $gt18; ?></td>
											    <td><?php echo $gt12; ?></td>
											    <td><?php echo $gt5; ?></td>
											    <td><?php echo $gt0; ?></td>
											    <td><?php echo $tg; ?></td>
											    <td><?php echo $tamt; ?></td>
											    <td><?php echo $tds; ?></td>
											    <td></td>
											    <td></td>
											    <td></td>
											   <td><?php echo $tar; ?></td>
											   <td><?php echo $ot; ?></td>
											   <td></td>
											</tr>
											    </tbody>
                                            </table>
											</div>
											<div align="center">		
<?php 
$sql = "SELECT COUNT(id) AS total FROM ".$datatable;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
  



echo "<ul class='pagination'>";
echo "<li><a href='bill_list4.php?state=$state&page=".($page-1)."' class='button'>Previous</a></li>"; 

echo "<li><a>".$page."</></li>";

echo "<li><a href='bill_list4.php?state=$state&page=".($page+1)."' class='button'>NEXT</a></li>";
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
                                                



                                                /************/
                                                //add tooltip for small view action buttons in dropdown menu
                                              

                                                //tooltip placement on right or left
                                                


                                                /*****/
                                               





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