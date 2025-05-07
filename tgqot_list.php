<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
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
        
        .reload {
  font-family: Lucida Sans Unicode
  cursor: pointer;
  float:left;
}
.loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 30px;
  height: 30px;
  animation: spin 2s linear infinite;
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
    </style>
	<script>
    function populatefilters(str)
{

 
if (str=="")
  {
  return;
  } 
  document.getElementById("loaders").style.display="block";
  
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
	document.getElementById(str).innerHTML=show;
	document.getElementById("loaders").style.display="none";
	alert('filter loaded');
	
	
	//document.location.reload();
    }
  }
xmlhttp.open("GET","getfilterinforpages.php?q="+str+"&statetable=add_tgqot",true);
xmlhttp.send();
}
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
                                <a href="#">Quotations List</a>
                            </li>
                          
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    
                        <!-- PAGE CONTENT BEGINS -->

                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
									<!--<a href="addbill.php"><button type="button" class="btn-success btn-sm ">Add New</button></a>-->
                                       
                                        <div class="table-header">
                                        TG Quotations List
                                        </div>

                                        <!-- div.table-responsive -->
<div  style="margin-bottom:20px;">
    <?php if(($tsname=="8919765662") or ($tsname=="9985744288") or ($tsname=="9985894749") or ($tsname=="9959419056") or ($tsname=="9182198721") or ($tsname=="9666466368") ){}else{ ?>
<button class="btn btn-info" type="submit" name="bsearch" onclick="javascript:location.href='add_tgqot.php'" id="bsearch">   Add New  </button>
		<?php }?>
</div>
		<form method="post" action="" class="form-horizontal">
										
							<div class="form-group">
				
				
						
                     <div class="col-sm-4">
                  
                <input type="text" class="form-control " id="search" name="search" placeholder="Search By Quotation No  or FM Fault No or status"/>
                  </div>
				   <div class="col-sm-3">
                  
               <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  </div>
				  <div class="col-sm-2"><b><a href="qut_tg_excel.php" class="btn btn-primary btn-xs">XL Download</a></b></div>
				    <div class="col-sm-1"><b>
					 <a onclick="window.open('qut_tg_print.php','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')"
												   class="btn btn-primary btn-xs">
					
					
					Print</a></b></div>
				</div>
										
										</form>	
		
		
	<!--	
<form method="post" action="" class="form-horizontal">
										
		
				
				
						
                     
                  
                <input type="text"  id="myInput" name="search" placeholder="Search  " >
                  
				
				  <b><a href="qut_ap_excel.php" class="btn btn-primary btn-xs">XL Download</a></b>
				    <b>
					 <a onclick="window.open('qut_ap_print.php','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')"
												   class="btn btn-primary btn-xs">
					
					
					Print</a></b>
				
										
										</form>	-->
										
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
                                                         <th>Store Code</th>
                                                        <th>Store Name</th>
														
														<th>Coordinator Name</th>
                                                        <th>Super Wisor</th>
                                                         <th>City</th>
														  <th>Date</th>
														   <th>Base Amt</th>
														  <th>Serv Amt</th>
														  <th>Gst Amt</th>
														  <th>Tot Amt</th>
														  <th>Status</th>
														   <th>User</th>
                                                     		 <th>Edit</th>
        													  <?php if(($tsname!="admin")  ){}else{ ?>
        													  <th>RONo Edit</th>
        													  <?php }?>
													         
														     <th>Print</th> <th>Quotation</th>
															 <th>Bill of Supply</th><th>Miscllenious</th>
														     <th>Pdf Download</th>
                                                        
                                                      
                                                      
                                                    </tr>
													  <form name="frm" method="post" >
                                                        
													  <tr >
                                                        <!--<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>-->
                                                        <th><div class="loader" id="loaders" style="display:none" ></div></th>
                                                        
                                                        <th></th>
                                                        
                                                        <th>
                                                            <div  style="width:100%">
  <span style="width:20%" onclick="populatefilters('store_code26')" class=reload>&#x21bb;</span>
                                                            <input style="width:80%"  id=\"store_code\" list="store_code26" name="store_code" class="form-control" placeholder="Store Code" ></div>
<datalist id="store_code26" >
</datalist>
</th>
 <th >
                                                            <div  style="width:100%">
  <span style="width:20%" onclick="populatefilters('store_name26')" class=reload>&#x21bb;</span><input style="width:80%"  id=\"store_name\" list=store_name26 name="store_name" class="form-control" placeholder="Store Name">
</div>
                                                            
<datalist id="store_name26" >
</datalist>
</th>
														
														
     <th >
                                                            <div  style="width:100%">
  <span style="width:20%" onclick="populatefilters('coordinator26')" class=reload>&#x21bb;</span><input style="width:80%"  id=\"coordinator\" list="coordinator26" name="coordinator" class="form-control" placeholder="Coordinator Name" >
</div>
                                                            
<datalist id="coordinator26" >
</datalist>
</th>
           <th>                                                 <div  style="width:100%">
  <span style="width:20%" onclick="populatefilters('superwisor26')" class=reload>&#x21bb;</span><input style="width:80%" id=\"superwisor\" list="superwisor26" name="superwisor" class="form-control" placeholder="superwisor Name" >
</div>
                                                            
<datalist id="superwisor26" >
</datalist>
</th>
                                                        <th >
                                                            <div  style="width:100%">
  <span style="width:20%" onclick="populatefilters('city27')" class=reload>&#x21bb;</span><input style="width:80%"  id=\"city\" list="city27" name="city" class="form-control" placeholder="City Name" >
</div>
                                                            
<datalist id="city27" >
</datalist>
</th>
														  <th></th>
														
   <th><input  type="submit" value="Submit" name="submitkk" class="btn btn-primary" ></th>
   <th>   <input type="reset" value="Reset" name="submit1" class="btn btn-danger"  onclick="javascript:location.href='tgqot_list.php'"> </th>
   <th>    </th>
<!--
style="width:16px; font-size:8px; height:16px; background-image:url(images/Filter.png); background-repeat:no-repeat; margin-top:5px;"
<input type="reset" value="" name="submit1" class="" 
style="width:16px; font-size:8px; height:16px; background-image:url(images/FilterNone.gif); background-repeat:no-repeat;
 margin-top:5px;" onclick="javascript:location.href='qot_list1.php'">--> </th> <th></th><th></th>
														 <th></th>
                                                         <th></th>
                                                       <th></th>
                                                      
                                                    </tr></form>
                                                </thead>

                                                <tbody>
												
												<?php 
										
											
													
										$datatable="add_tgqot";
										$results_per_page = 30;
										if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                                        $start_from = ($page-1) * $results_per_page;
										
											
												if(isset($_POST['bsearch'])){
												$bsearch=$_POST['search'];
											// $y="select a.store_name,a.city,b.quet_num,b.store_code,b.inv_date,b.id
											 //from add_qot b,dpr a where a.store_code=b.store_code order by b.id desc ";
											 $y="select * from add_tgqot where quet_num like '%$bsearch%' or falt_no like '%$bsearch%'  or status like '%$bsearch%'order by id desc";
												} else
												if(isset($_POST['submitkk'])){
												//$qot_nun=$_POST['qot_nun'];
												$store_code=$_POST['store_code'];
												$store_name=$_POST['store_name'];
												$coordinator=$_POST['coordinator'];
												$superwisor=$_POST['superwisor'];
												$city=$_POST['city'];	
												$status=$_POST['status'];
												/*echo $y="select  a.quet_num,a.store_code,a.inv_date,a.status,a.id from add_qot a,dpr b where a.quet_num='$qot_nun'
												 or b.store_code='$store_code' or b.store_name='$store_name' or b.coordinator='$coordinator'
												 or b.superwisor='$superwisor' or b.city='$city' or a.status='$status'

												 order by id desc";*/
												
												 $y="select  a.quet_num,a.store_code,a.inv_date,a.status,a.id,a.ses from add_tgqot a,dpr b where
												
												
											(('$store_code' <> ' ' and locate('$store_code', a.store_code) <> 0) or ('$store_code' = ' '  and 1 = 1) ) and
											(('$store_name' <> ' ' and locate('$store_name', b.store_name) <> 0) or ('$store_name' = ' '  and 1 = 1) ) and
											(('$coordinator' <> ' ' and locate('$coordinator', b.coordinator) <> 0) or ('$coordinator' = ' '  and 1 = 1) ) and
											(('$city' <> ' ' and locate('$city', b.city) <> 0) or ('$city' = ' '  and 1 = 1) ) and
											(('$status' <> ' ' and locate('$status', a.status) <> 0) or ('$status' = ' '  and 1 = 1) ) and a.store_code=b.store_code";
												}
												
												
												else {
													
													 $y="SELECT * FROM ".$datatable."   ORDER BY id desc LIMIT $start_from, ".$results_per_page;
													 
												}
											 
											$t=mysqli_query($link,$y) or die(mysqli_error($link));
									    	$i=$start_from;
													$start=1;
													$ro=0;
											$ts=0;
											$tg=0;
											$n=0;
										
											while($rs1=mysqli_fetch_array($t)){
            					        	 $user=$rs1['ses'];	
            						        
																						
                                                    ?>
												
												<tr>
                                                        
<!--<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>-->
                                                        <td><?php echo $i+$start; ?></td>
                                                       
                                                      
                                                          <td class="hidden-480"><?php echo $rs1['quet_num']; ?></td>
                                                        <td class="hidden-480"><?php echo $store_code=$rs1['store_code'];
													
$ssq1=mysqli_query($link,"select * from dpr where store_code='$store_code'");
$r1=mysqli_fetch_array($ssq1);

														?></td>
                                                       
                                                        <td class="hidden-480"><?php echo $r1['store_name']; ?></td>
                                                        
														
														<td class="hidden-480"><?php echo $r1['coordinator']; ?></td>
                                                        <td class="hidden-480"><?php echo $r1['superwisor']; ?></td>
                                                        <td class="hidden-480"><?php echo $r1['city']; ?></td>
                                                        <td class="hidden-480"><?php  $d= $rs1['inv_date']; echo date('d-m-Y', strtotime($d)); ?></td>
                                                        <td class="hidden-480"><?php echo $tb=$rs1['tot_base'];
                                                         $ro=$ro+$tb;
                                                        ?></td>
                                                        <td class="hidden-480"><?php echo $ts1=$rs1['tot_ser']; 
                                                         $ts=$ts+$ts1;
                                                        ?></td>
                                                        <td class="hidden-480"><?php echo $tg1=$rs1['tot_gst'];
                                                        $tg=$tg+$tg1;
                                                        ?></td>
                                                        <td class="hidden-480"><?php echo $n1=$rs1['net'];
                                                        $n=$n+$n1;?></td>
                                                        
                                                        <td class="hidden-480"><?php
                                                        $icheck=0;
                                                        $quetnumc=$rs1['quet_num'];
                                                        $qc=mysqli_query($link,"select status from tgqot_bill where quet_num='$quetnumc'");
                                                        $r1c=mysqli_fetch_array($qc);
                                                        if(mysqli_num_rows($qc)>0){
                                                        switch($r1c['status']){
                                                            case "Un Paid":
                                                                $icheck=1;
                                                                echo "Payment Pending Invoice";
                                                                break;
                                                                case "payment pending":
                                                                    $icheck=1;
                                                                    echo "To be raised Invoice";
                                                                    break;
                                                                default :echo $rs1['status'];
                                                                         break;
                                                                
                                                        }    
                                                        
                                                        
                                                            
                                                        }
                                                        else
                                                        echo $rs1['status'];
                                                        ?>
                                                        
                                                        </td>
                                                       <!-- <td class="hidden-480"><?php echo $rs1['ses']; ?></td>-->
                                                        <td class="hidden-480"><?php 
                                                         $cempname=$rs1['ses'];
                                                         $sq=mysqli_query($link,"select emp_name from emp where employeeid='$cempname' limit 1");
                                                         	$rss1=mysqli_fetch_array($sq);
                                                         	if($rss1['emp_name']=="")
                                                         	echo $cempname;
                                                         	else
                                                            echo $rss1['emp_name']; ?></td>  
                                                      
                                                    <td class="hidden-480">
                                                        
                                                        
                                                        
                                                        <?php 
                                                
                                                if($tsname=='admin'or 'vinoth') { ?>
                                                        <a href="edit_tgqot.php?id=<?php echo $rs1['id']; ?>">
                                                        <img src="images/edit.gif"></a>
                                           <?php     }else{
                                               echo $user;
                                               echo $tsname;
                                               if($tsname==$user){ ?>
                                                   <a href="edit_tgqot.php?id=<?php echo $rs1['id']; ?>">
                                                        <img src="images/edit.gif"></a>
                                              <?php  }else{ ?>
                                               
                                                        <img src="images/edit.gif">
                                          <?php }
                                           }
                                                ?>        
                                                
                                                        
                                                        
                                                        </td>
                                                        <?php if(($tsname!="admin")){}else{ ?>
                                                        <td> 
                                                        
                                                                
                                                        <a href="tgeditrono_qot.php?id=<?php echo $rs1['id']; ?>">
                                                        <img src="images/edit.gif"></a>
                                            
                                               
                                                        
                                                        
                                                        
                                                        </td>
                                                        <?php }?>
														
														
														 <td class="hidden-480">
														 
                                                   <a onclick="window.open('qut_print.php?id=<?php echo $rs1['id'];?>&state=TG','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')"
												   class="btn btn-primary btn-xs"><img src="images/printer.png"></a>
                                                        </td> 
                                                        
                                                         <td class="hidden-480"><a href="qut_excel.php?id=<?php echo $rs1['id']; ?>&state=TG">
                                                        <img src="images/xl.jpg" width="20" height="20"></a></td>
                                                        
                                                        <td class="hidden-480"><a href="qut_excel_bill.php?id=<?php echo $rs1['id']; ?>&state=TG">
                                                        <img src="images/xl.jpg" width="20" height="20"></a></td>
                                                     <td class="hidden-480"><a href="qut_excel_mis.php?id=<?php echo $rs1['id']; ?>&state=TG">
                                                        <img src="images/xl.jpg" width="20" height="20"></a></td>
                                                       
                                                        
                                                        <td class="hidden-480">
                                                       <a href="qot_pdf.php?id=<?php echo $rs1['id'];?>&state=TG"
												   class=""><img src="images/pdf_icon.gif" width="30" height="30"></a>
                                                       
                                                         </td>
														 
                                                    </tr>
                                                    <?php $i++; } 
													
													
													?>
                                                    
                                                    <tr>
                                                        <td colspan="8">Total</td>
                                                        <td><?php echo $ro; ?></td>
                                                        <td><?php echo $ts; ?></td>
                                                        <td><?php echo $tg; ?></td>
                                                        <td><?php echo $n; ?></td>
                                                        <td colspan="8"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
											
											

											
											
											
											<div align="center">		
<?php 
$sql = "SELECT COUNT(id) AS total FROM ".$datatable;
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
  



echo "<ul class='pagination'>";
echo "<li><a href='tgqot_list.php?page=".($page-1)."' class='button'>Previous</a></li>"; 

echo "<li><a>".$page."</></li>";

echo "<li><a href='tgqot_list.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo "</ul>";
?>
												
</div>
											
											
                                        
                                </div>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        
                </div><!-- /.row -->
            
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