<?php
session_start();

if($_SESSION['user'])
{
$name=$_SESSION['user'];
$tsname=$_SESSION['user'];
// Check if the user is logged in and has the role of "superwisor"
// if (!isset($_SESSION['user'])) {
//     header('Location: index.php?authentication_failed');
//     exit;
// }

// Include necessary files
include 'dbconnection/connection.php'; // Assuming this file contains the database connection

// Fetch user details from the database
// $user = $_SESSION['user'];
// $sql = "SELECT * FROM employee WHERE username = '$user'";
// $result = mysqli_query($link, $sql);

// $row = mysqli_fetch_assoc($result);
// $role = $row['super_wisor'];

// // Check if the user's role is "superwisor"
// if ($role == 'superwisor') {


    // Pagination
    $results_per_page = 30;
    $datatable = "add_tgqot";
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    };
    $start_from = ($page - 1) * $results_per_page;

    // Build the query based on search input
    if (isset($_POST['bsearch'])) {
        $bsearch = $_POST['search'];
        $query = "SELECT * FROM $datatable WHERE quet_num LIKE '%$bsearch%' OR falt_no LIKE '%$bsearch%' OR status LIKE '%$bsearch%' ORDER BY id DESC";
    } else {
        $query = "SELECT * FROM $datatable ORDER BY id DESC LIMIT $start_from, $results_per_page";
    }

    $result = mysqli_query($link, $query);
    $total_pages = ceil(mysqli_num_rows($result) / $results_per_page); // Calculate total pages

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TG Miscellaneous Details</title>
        <?php include 'template/headerfile.php'; ?>
        <style>
            /* Custom CSS for responsive table */
            .table-wrapper {
                overflow-x: auto;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #f2f2f2;
            }

            /* Hide certain columns on extra small devices */
            @media only screen and (max-width: 768px) {
                .hide-on-mobile {
                    display: none;
                }
            }

            /* Pagination styling */
            .pagination {
                margin-top: 20px;
                text-align: center;
            }

            .pagination a {
                display: inline-block;
                padding: 5px 10px;
                border: 1px solid #ccc;
                background-color: #f9f9f9;
                text-decoration: none;
                margin-right: 5px;
            }

            .pagination .active a {
                background-color: #ccc;
            }
        </style>
    </head>

    <body class="no-skin">
        <?php include 'template/logo.php'; ?>

        <div class="main-container ace-save-state" id="main-container">
            <div id="sidebar" class="sidebar responsive ace-save-state">
                <?php include 'template/sidemenu.php' ?>
                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li><i class="ace-icon fa fa-home home-icon"></i><a href="#">Home</a></li>
                            <li><i class="ace-icon fa fa-cog home-icon"></i><a href="ts_mis_qot.php?page=1">TG Miscellaneous Details List</a></li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-header">TG Miscellaneous Details</div>
                            <form method="post" action="ts_mis_qot.php" class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="search" name="search" placeholder="Search By Quotation No or FM Fault No or status" />
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                            <i class="ace-icon fa fa-search bigger-110"></i> Search
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="table-wrapper">
                                <table id="myTable" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>S No</th>
                                            <th>Quotation No</th>
                                            <th>Miscellaneous</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            $i = $start_from + 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $i . "</td>";
                                                echo "<td>" . $row['quet_num'] . "</td>";
                                                echo "<td><a href='tgqut_excel_mis.php?id=" . $row['id'] . "&state=TG'><img src='images/xl.jpg' width='20' height='20'></a></td>";
                                                echo "</tr>";
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div align="center">     
                                    <?php 
                                    $sql = "SELECT COUNT(id) AS total FROM ".$datatable;
                                    $result = mysqli_query($link,$sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
                                    echo "<ul class='pagination'>";
                                    echo "<li><a href='ts_mis_qot.php?page=".($page-1)."' class='button'>Previous</a></li>"; 
                                    echo "<li><a>".$page."</></li>";
                                    echo "<li><a href='ts_mis_qot.php?page=".($page+1)."' class='button'>NEXT</a></li>";
                                    echo "</ul>";
                                    ?>
                                </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.main-content-inner -->
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

        <!-- Page specific plugin scripts -->
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
        <!-- inline scripts related to this page -->
    </body>

    </html>
<?php
} else {
    session_destroy();
    session_unset();
    header('Location: index.php?authentication_failed');
    exit;
}
?>
