<?php //Check the php code for DB connecttion 
session_start();
include('dbconnection/connection.php');
if ($_SESSION['user']) {
    $name = $_SESSION['user'];
    $tsname = $_SESSION['user'];
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include 'template/headerfile.php'; ?>
    <style>
        strong {
            color: red;
        }

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        .reload {
            font-family: "Lucida Sans Unicode";
            cursor: pointer;
            float: left;
        }

        .loader {
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #FFFFFF;
            font-size: 120px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #FFFFFF;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <!-- Styling Ends here  -->
    <script>
        function populatefilters(str) {


            if (str == "") {
                return;
            }
            document.getElementById("loaders").style.display = "block";

            if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }



            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    // document.getElementById("country5").innerHTML=xmlhttp.responseText;
                    //document.getElementById("country5").innerHTML=show;

                    var show = xmlhttp.responseText;
                    //alert(show);
                    document.getElementById(str).innerHTML = show;
                    document.getElementById("loaders").style.display = "none";
                    alert('filter loaded');


                    //document.location.reload();
                }
            }
            xmlhttp.open("GET", "getfilterinforpages.php?q=" + str + "&statetable=add_knqot", true);
            xmlhttp.send();
        }

        function ConfirmDialog() {
            var x = confirm("Are you sure to delete record?")
            if (x) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    </script>

    <body class="no-skin">
        <?php include 'template/logo.php'; ?>
        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
        </div>
        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {}
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')
                    } catch (e) {}
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
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="#">Employee Activity List</a>
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
                                Activity Report
                            </div>
                            <div class="page-header">
                                <h1 align="center">
                                    Employee Activity Report

                                </h1>
                            </div>
                            <!-- div.table-responsive -->
                            <!-- <div  style="margin-bottom:20px;">
    <?php if (($tsname == "8919765662") or ($tsname == "9985744288") or ($tsname == "9985894749") or ($tsname == "9959419056") or ($tsname == "9182198721") or ($tsname == "9666466368")) {
    } else { ?>
<button class="btn btn-info" type="submit" name="bsearch" onclick="javascript:location.href='finalemp2.php'" id="bsearch">   Add New  </button>
		<?php } ?>
</div> -->
                            <form method="post" action="" class="form-horizontal"  >
                                <div class="form-group" style="margin-top: 10px;">


                                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1">From Date </label>

                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" id="from_date" name="from_date" required placeholder="From date" value="<?php echo date('Y-m-d'); ?>" />
                                        <strong><?php echo $errorName; ?></strong>
                                    </div>


                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> To Date </label>

                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" id="to_date" name="to_date" required placeholder="To date" value="<?php echo date('Y-m-d'); ?>" /> <strong> </strong>
                                    </div>

                                </div>





                                <div style="overflow-x:auto;">

                                    <table id="myTable" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>

                                                <th>S No</th>
                                                <th>EMP ID</th>
                                                <th>EMP Name </th>
                                                <th>Store Code</th>
                                                <th>Store Address</th>
                                                <th>Check-in Location</th>
                                                <th>Check-in Date</th>
                                                <th>Check-in time</th>
                                                <th>Check-out Location</th>
                                                <th>Check-out Time</th>
                                                <th>Work Image</th>

                                            </tr>


                                            <tr>

                                                <th>
                                                    <div class="loader" id="loaders" style="display:none"></div>
                                                </th>

                                                <th></th>

                                                <th>
                                                    <div style="width:100%">
                                                        <span style="width:20%"  onclick="populatefilters('store_code26')" class=reload>&#x21bb;</span>
                                                        <input style="width:80%" id=\"uloadby\"  name="uploadby" class="form-control" placeholder="Employee Name">
                                                    </div>
                                                    <datalist id="store_code26">
                                                    </datalist>
                                                </th>

                                                <th>
                                                    <div style="width:100%">
                                                        <span style="width:20%" onclick="populatefilters('store_code26')" class=reload>&#x21bb;</span>
                                                        <input style="width:80%" id=\"store_code\" list="store_code26" name="indid" class="form-control" placeholder="Store Code">
                                                    </div>
                                                    <datalist id="store_code26">
                                                    </datalist>
                                                </th>


                                                <th>
                                                    <div style="width:100%">
                                                        <span style="width:20%" onclick="populatefilters('store_name26')" class=reload>&#x21bb;</span><input style="width:80%" id=\"store_name\" list=store_name26 name="sname" class="form-control" placeholder="Store Name">
                                                    </div>

                                                    <datalist id="store_name26">
                                                    </datalist>
                                                </th>

                                                <th></th>

                                                <th><input type="submit" value="Submit" name="submitkk" class="btn btn-primary"></th>
                                                <th> <input type="reset" value="Reset" name="submit1" class="btn btn-danger" onclick="javascript:location.href='finalemp1.php'"> </th>

                                                <th></th>
                                                <th></th>

                                            </tr>
                         
                            </thead>
                            <?php
                            $from_date = $_POST['from_date'];
                            $to_date = $_POST['to_date'];
                            ?>
                            <!-- displaying  from date and to date  -->
                            <div style="display: flex; justify-content:center ">
                                <p style=text-align:center><b>From Date: <?php echo $from_date; ?></b>
                                    <b> To Date: <?php echo $to_date; ?>
                                </p>

                            </div>
                            </form>
                            <tbody>

                            <?php 
										$link = mysqli_connect("localhost", "ospsgw8u_admin", "Accentel@2023", "ospsgw8u_jtechnoapp") or die("unable to connect to database");
 
                                        if (mysqli_connect_errno()) {
                                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                        die();
                                        }
											
													
										$datatable="request";
										$results_per_page = 30;
										if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                                        $start_from = ($page-1) * $results_per_page;
										
											
												if(isset($_POST['bsearch'])){
												$bsearch=$_POST['search'];
                                                $from_date=$_POST['from_date'];
                                                $to_date=$_POST['to_date'];
											
											 $y="select * from request where (empid like '%$bsearch%' or sname like '%$bsearch%'  or indid like '%$bsearch%') and datecheck between '$from_date' and '$to_date'  order by id desc";
                                            // $y="SELECT *FROM request WHERE (sname like '%$bsearch%') AND checkdate BETWEEN datecheck between '$from_date' and '$to_date'  ";		
                                        } else
                                         
												if(isset($_POST['submitkk'])){
												//$qot_nun=$_POST['qot_nun'];
												$uploadby=$_POST['uploadby'];
												$sname=$_POST['sname'];
												$indid=$_POST['indid'];
                                            
                                            
                                            $from_date=$_POST['from_date'];
                                            $to_date=$_POST['to_date'];
                                            
                                           
                                        $y="SELECT *FROM request WHERE (('$uploadby' <> ' ' and locate('$uploadby', uploadby) <> 0) or ('$uploadby' = ' '  and 1 = 1) ) and
                                                 (('$sname' <> ' ' and locate('$sname', sname) <> 0) or ('$sname' = ' '  and 1 = 1) ) and
                                                 (('$indid' <> ' ' and locate('$indid', indid) <> 0) or ('$indid' = ' '  and 1 = 1) ) and  datecheck between '$from_date' and '$to_date'  order by id desc LIMIT $start_from, ".$results_per_page;
                                    
                                        }
												
                                             else {
													
													 $y="SELECT * FROM ".$datatable."   ORDER BY id desc LIMIT $start_from, ".$results_per_page;
													 
												}

                                $t = mysqli_query($link, $y) or die(mysqli_error($link));
                                $i = $start_from;
                                $start = 1;
                                $ro = 0;
                                $ts = 0;
                                $tg = 0;
                                $n = 0;

                                while ($rs1 = mysqli_fetch_array($t)) {
                                    $user = $rs1['ses'];


                                ?>

                                    <tr>

                                        <td><?php echo $i + $start; ?></td>


                                        <td class="hidden-480"><?php echo $rs1['empid']; ?></td>
                                        <td class="hidden-480"><?php echo $rs1['uploadby']; ?></td>
                                        <td class="hidden-480"><?php echo $rs1['indid']; ?></td>
                                        <td class="hidden-480"><?php echo $rs1['sname']; ?></td>
                                        <td class="hidden-480"><?php echo $rs1['loc']; ?></td>
                                        <td class="hidden-480"><?php echo $rs1['date']; ?></td>
                                        <td class="hidden-480"><?php echo $rs1['time']; ?></td>
                                        <td class="hidden-480"><?php echo $rs1['checkoutloc']; ?></td>
                                        <td class="hidden-480"><?php echo $rs1['checkoutime']; ?></td>
                                        <td style=" cursor: pointer;" onclick="imageload(this.innerText)" class="hidden-480"><?php echo "Image" . $rs1['id']; ?></td>
                                    </tr>
                                <?php $i++;
                                }
                                ?>
                            </tbody>
                            </table>
                            <div align="center">
                                <?php
                                $sql = "SELECT COUNT(id) AS total FROM " . $datatable;
                                $result = mysqli_query($link, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $total_pages = ceil($row["total"] / $results_per_page);
                                // calculate total pages with results no need fo employee activity report so commented repo
                                echo "<ul class='pagination'>";
                                echo "<li><a href='finalemp1.php?page=" . ($page - 1) . "' class='button'>Previous</a></li>";

                                echo "<li><a>" . $page . "</></li>";

                                echo "<li><a href='finalemp1.php?page=" . ($page + 1) . "' class='button'>NEXT</a></li>";
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

            function imageload(s) {

                var si = s.replace("Image", "");
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImg");
                var modalImg = document.getElementById("img01");
                modal.style.display = "block";
                modalImg.src = "https://jtechnoassociates.in/jtechnoapp/uploads/photo1" + si + ".jpg";
                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }
            }
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
            jQuery(function($) {
                //initiate dataTables plugin
                var myTable =
                    $('#dynamic-table')
                    //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                    .DataTable({
                        bAutoWidth: false,
                        "aoColumns": [{
                                "bSortable": false
                            },
                            null, null, null, null, null, null, null,
                            {
                                "bSortable": false
                            }
                        ],
                        "aaSorting": [],




                        select: {
                            style: 'multi'
                        }
                    });



                $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

                new $.fn.dataTable.Buttons(myTable, {
                    buttons: [{
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
                myTable.button(1).action(function(e, dt, button, config) {
                    defaultCopyAction(e, dt, button, config);
                    $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
                });


                var defaultColvisAction = myTable.button(0).action();
                myTable.button(0).action(function(e, dt, button, config) {

                    defaultColvisAction(e, dt, button, config);


                    if ($('.dt-button-collection > .dropdown-menu').length == 0) {
                        $('.dt-button-collection')
                            .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                            .find('a').attr('href', '#').wrap("<li />")
                    }
                    $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
                });

                ////

                setTimeout(function() {
                    $($('.tableTools-container')).find('a.dt-button').each(function() {
                        var div = $(this).find(' > div').first();
                        if (div.length == 1)
                            div.tooltip({
                                container: 'body',
                                title: div.parent().text()
                            });
                        else
                            $(this).tooltip({
                                container: 'body',
                                title: $(this).text()
                            });
                    });
                }, 500);
                myTable.on('select', function(e, dt, type, index) {
                    if (type === 'row') {
                        $(myTable.row(index).node()).find('input:checkbox').prop('checked', true);
                    }
                });
                myTable.on('deselect', function(e, dt, type, index) {
                    if (type === 'row') {
                        $(myTable.row(index).node()).find('input:checkbox').prop('checked', false);
                    }
                });

                /////////////////////////////////
                //table checkboxes
                $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

                //select/deselect all rows according to table header checkbox
                $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function() {
                    var th_checked = this.checked; //checkbox inside "TH" table header

                    $('#dynamic-table').find('tbody > tr').each(function() {
                        var row = this;
                        if (th_checked)
                            myTable.row(row).select();
                        else
                            myTable.row(row).deselect();
                    });
                });

                //select/deselect a row when the checkbox is checked/unchecked
                $('#dynamic-table').on('click', 'td input[type=checkbox]', function() {
                    var row = $(this).closest('tr').get(0);
                    if (this.checked)
                        myTable.row(row).deselect();
                    else
                        myTable.row(row).select();
                });



                $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
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
                    for (var j = 0; j < td.length; j++) {
                        currentTd = td[j];
                        if (currentTd) {
                            if (currentTd.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                                occurrence = true;
                            }
                        }
                    }
                    if (!occurrence) {
                        tr[i].style.display = "none";
                    }
                }
            }
        </script><!-- inline scripts related to this page -->
    </body>

    </html>
<?php

} else {
    session_destroy();

    session_unset();

    header('Location:index.php?authentication failed');
}

?>