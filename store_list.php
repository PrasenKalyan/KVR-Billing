<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
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
                                <a href="#">Reliance Billing</a>
                            </li>
                            <li>
                                <a href="#">Store Billing List</a>
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
                                        Stores List
                                        </div>

                                        <!-- div.table-responsive -->
<div style="height:15px; margin-bottom:20px;">
<button class="btn btn-info" type="submit" name="bsearch" onclick="javascript:location.href='add_stock.php'" id="bsearch">
                                               
                                                Add New
        <br />                                    </button>
 </div>
										 <form method="post" action="" class="form-horizontal">
										
										
				
				<div class="col-sm-2">
						    <input id=\"store_name\" list=\"city25\" name="store_name" class="form-control" placeholder="Store Name" >
<datalist id=\"city25\" >

<?php  
$sql2="SELECT distinct store_name FROM dpr";
  // Query to collect records
$r2=mysqli_query($link,$sql2) or die(mysqli_error());
while ($row2=mysqli_fetch_array($r2)) {
echo  "<option value=\"$row2[store_name]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
						    
						    
						</div>
						<div class="col-sm-2">
						    <input id=\"comp_name\" list=\"city26\" name="comp_name" class="form-control" placeholder="company" >
<datalist id=\"city26\" >

<?php  
$sql3="SELECT distinct company_name FROM dpr";
  // Query to collect records
$r3=mysqli_query($link,$sql3) or die(mysqli_error());
while ($row3=mysqli_fetch_array($r3)) {
echo  "<option value=\"$row3[company_name]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
						    
						    
						</div>
						<div class="col-sm-2">
						    <input id=\"format_type\" list=\"city27\" name="format_type" class="form-control" placeholder="Format" >
<datalist id=\"city27\" >

<?php  
$sql4="SELECT distinct format_type FROM dpr";
  // Query to collect records
$r4=mysqli_query($link,$sql4) or die(mysqli_error());
while ($row4=mysqli_fetch_array($r4)) {
echo  "<option value=\"$row4[format_type]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
						    
						    
						</div>
						<div class="col-sm-2">
						    <input id=\"store_code\" list=\"city23\" name="store_code" class="form-control" placeholder="Store Code" >
<datalist id=\"city23\" >

<?php  
$sql="SELECT distinct store_code FROM dpr";
  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[store_code]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
						    
						    
						</div>
						<div class="form-group">
				<div class="col-sm-1">
						    <input id=\"state\" list=\"city24\" name="state" class="form-control" placeholder="State" >
<datalist id=\"city24\" >

<?php  
$sql1="SELECT distinct state FROM dpr";
  // Query to collect records
$r1=mysqli_query($link,$sql1) or die(mysqli_error());
while ($row1=mysqli_fetch_array($r1)) {
echo  "<option value=\"$row1[state]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
						    
						    
						</div>
                    <div class="col-sm-1">
                  
                <input id=\"city\" list=\"city28\" name="city" class="form-control" placeholder="city" >
<datalist id=\"city28\" >

<?php  
$sql6="SELECT distinct city FROM dpr";
  // Query to collect records
$r6=mysqli_query($link,$sql6) or die(mysqli_error());
while ($row6=mysqli_fetch_array($r6)) {
echo  "<option value=\"$row6[city]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
                  </div>
				   <div class="col-sm-2">
                  
               <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  </div>
				</div>
										
										</form>
                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                        
                                  
                                        
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
                                                        
                                                        <th>Store Name</th>
                                                        <th>Company Name</th>
                                                        <th>Format Type</th>
                                                        
                                                          <th>Store Code</th>
														  <th>State</th>
                                                     
                                                        <th>City</th>
														  <th>Edit</th>
														   <th>Delete</th>
												</tr>
                                                </thead>

                                                <tbody>
												
												<?php 
											include('dbconnection/connection1.php');
											if(isset($_POST['bsearch'])){
											  $store_name=$_POST['store_name'];
											    $comp_name=$_POST['comp_name'];
											 $format_type=$_POST['format_type'];
											   $store_code=$_POST['store_code'];
											    $state=$_POST['state'];
											    $city=$_POST['city'];
											    
											   $y="select  * from dpr where
												
												
											(('$store_code' <> ' ' and locate('$store_code', store_code) <> 0) or ('$store_code' = ' '  and 1 = 1) ) and
											
									(('$store_name' <> ' ' and locate('$store_name', store_name) <> 0) or ('$store_name' = ' '  and 1 = 1) ) and
											
											
											(('$comp_name' <> ' ' and locate('$comp_name', company_name) <> 0) or ('$comp_name' = ' '  and 1 = 1) ) and
											
											
											(('$city' <> ' ' and locate('$city',city) <> 0) or ('$city' = ' '  and 1 = 1) ) and
											
											
											(('$state' <> ' ' and locate('$state', state) <> 0) or ('$state' = ' '  and 1 = 1) ) and 
											
										(('$format_type' <> ' ' and locate('$format_type', format_type) <> 0) or ('$format_type' = ' '  and 1 = 1) ) ";  
											    
									
											    
											}else{
											    $y="select * from dpr order by id desc ";
											}
									$t=mysqli_query($link,$y) or die(mysqli_error($link));
											$i=1;
											while($rs1=mysqli_fetch_array($t)){
											
																						
                                                    ?>
												
												<tr>
                                                        
<!--<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>-->
                                                        <td><?php echo $i; ?></td>
                                                       
                                                      
                                                       
                                                        <td class="hidden-480"><?php echo $rs1['store_name']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['company_name']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['format_type']; ?></td>
                                                        
                                                        <td class="hidden-480"><?php echo $rs1['store_code'] ?></td>
                                                         <td class="hidden-480"><?php echo $bill_status=$rs1['state']; ?></td>
                                                         <td class="hidden-480"><?php echo $bill_status=$rs1['city']; ?></td>
                                                        <td class="hidden-480"><a href="edit_store.php?id=<?php echo $rs1['id']; ?>">
                                                        <img src="images/edit.gif"></a></td>
														 <td class="hidden-480">
														 
                                                   
                                                        <a onClick="return confirm('Are you sure you want to delete this item?');" href="store_delete.php?id=<?php echo $rs1['id']; ?>"><img src="images/Icon_Delete.png"></a>
                                                       
                                                      
                                                       </td>
                                                        
                                                         
														 
                                                    </tr>
                                                    <?php $i++; } 
													
													
													?>
                                                    
                                                    
                                                </tbody>
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