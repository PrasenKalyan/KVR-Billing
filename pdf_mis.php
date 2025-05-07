<?php
require_once __DIR__ . '/vendor/autoload.php'; // Assuming mpdf library is installed via Composer

// Initialize PDF object
$mpdf = new \Mpdf\Mpdf();

ob_start(); // Start output buffering

// Your HTML content
?>
<!DOCTYPE HTML>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>JTECHNO</title>
 <script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
            window.print();
            }
            function closs()
            {
                window.close();
            }
        </script>
<link rel="stylesheet" href="http://mission2cr.org/admin/qot.css1">		
<style>
        .centered-heading {
            text-align: right;
        }
        /*body {*/
            border: 5px solid black; /* Border for the entire page */
        /*    padding: 10px;*/
        /*}*/
       
        td {
            /* border: 1px solid black; */
            padding: 5px;
            text-align: left;
        }
        
         table {
            transform: scale(0.85); /* Adjust the scale value as needed */
            transform-origin: top left;
        }
        .page {
            border: 2px double black;
            padding: 20px;
            width: 210mm; /* A4 width */
            height: 260mm; /* A4 height */
            margin: 0 auto; /* Center the page horizontally */
        }
    @media print {
            table {
                transform: scale(0.85); /* Adjust the scale value as needed */
                transform-origin: top left;
            }
        }
 
    </style>
</head>

<body >
    

    <!-- <div class="page"> -->
    <div class="page" >

   
<?php 
//ob_start();
 //include('config.php');
include('dbconnection/connection.php');
$quet_num = $_GET['quet_num'];

// Extract state code from the quotation number
$state_code = substr($quet_num, 3, 2);

// Define the table names based on the state code
switch ($state_code) {
    case 'AP':
        $qottable ='add_qot';
        $qottable1 ='add_qot1';
        break;
    case 'TS':
    case 'TG':  
        $qottable ='add_tgqot';
        $qottable1 ='add_tgqot1';
        break;
    case 'TN':
        $qottable ='add_tnqot';
        $qottable1 ='add_tnqot1';
        break;
    case 'KL':
        $qottable ='add_klqot';
        $qottable1 ='add_klqot1';
        break;
    case 'KN':
        $qottable ='add_knqot';
        $qottable1 ='add_knqot1';
        break;
    case 'OD':
        $qottable ='add_odqot';
        $qottable1 ='add_odqot1';
        break;
    default:
        // Handle the case when state code is not recognized
        // You can set default values or show an error message
        break;
}

$quet_num = $_GET['quet_num'];

    // Fetch the corresponding id from the database using quet_num
    $sq = mysqli_query($link, "SELECT id FROM " . $qottable . " WHERE quet_num='$quet_num'");
    $row = mysqli_fetch_assoc($sq);
    $id = $row['id'];

    // Fetch other data based on id
    $sq = mysqli_query($link, "SELECT * FROM " . $qottable . " WHERE id='$id'");
    $r = mysqli_fetch_array($sq);
    $store_code = $r['store_code'];
    $quet_num = $r['quet_num'];
    $po_no = $r['po_no'];
include('dbconnection/connection.php');

$bid = $_GET['id'];
$loc = $_GET['loc'];
$a = "select * from dpr where store_code='$store_code'";
$ssq1 = mysqli_query($link, $a);
$r1 = mysqli_fetch_array($ssq1);
$state_code = $r1['state_code'];
$company_name1 = $r1['company_name'];
$addr1 = $r1['ship_ddress'];
$state1 = $r1['state'];
$format_type = $r1['format_type'];
$city = $r1['city'];
$gst_in1 = $r1['gst_in'];
$ship_name = $r1['ship_name'];
$ship_state = $r1['ship_state'];
$ship_gst = $r1['ship_gst'];
$po_no = $r1['po_no'];


$m = date('m');
if ($m > '03') {
    $currentDate = date("Y-m-d");
    $dateOneYearAdded = strtotime(date("Y-m-d", strtotime($currentDate)) . " +1 year");
    $ny = date('Y', $dateOneYearAdded);
    $nyd = date('Y') . "-" . $ny;
} else {
    $currentDate = date("Y-m-d");
    $dateOneYearAdded = strtotime(date("Y-m-d", strtotime($currentDate)) . " -1 year");
    $ny = date('Y', $dateOneYearAdded);
    $nyd = $ny . "-" . date('Y');
}

//echo"<table border='1'><tr><th></th><th width='2%'>Location:</th><th>$val4</th><th >From Date:</th><th>$val5</th><th>Todate:</th><th>$val7</th></tr></table>";

?>

<img src="images/excel_logo.jpg" alt="Excel Logo" width="80%" height="100" style="display: block; margin: 0 auto;" />

<h5>Annexure-16 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Tentative format - Corrected will be given before commencement of work)</h5>
<h4 style="text-align: center; font-size: 16px;">
    <u>Summary sheet for Miscellaneous Repair Work</u>
</h4>

<!--<table border='1'  cellpadding="0" cellspacing='0'>-->
<table  border='1'  cellpadding="0" cellspacing='0' style="width: 100%; margin-top: -90px;">
											<tr><td><b>Vendor Name :</b></td><td><?php echo "&nbsp;JTechno Associates FMS Pvt Ltd"?></td></tr><br/>
											<tr><td><b>Period :</b></td><td><?php echo $nyd;?></td></tr><br/>
											<tr><td><b>State :</b></td><td><?php
											$quet_num = $_GET['quet_num'];

// Extract state code from the quotation number
$state_code = substr($quet_num, 3, 2);
											echo $state_code; ?> state</td></tr><br/>
											<tr><td><b>Format :</b></td><td><?php echo $r1['format_type'];;?></td></tr><br/>
											<tr><td><b>Po Number :</b></td><td><?php echo $r['po_no']; ?> </td></tr><br/>
										
										</table>
<br>
<table border='1' style="width:100%; height: 130;" align="left" cellpadding="0" cellspacing='0'>

        <thead >
            <tr>
                <th style="width:5px;">SNo</th>
                <th style="width:5px;">City / Town</th>
                <th style="width:5px;">Store SAP code</th>
                <th style="width:5px;">Fault No</th>
                <th style="width:5px;">Date of fault</th>
                <th style="width:5px;">Nature of job in brief</th>
                <th style="width:5px;">Bill No.</th>
                <th style="width:15px;">Bill Date</th>
                <th style="width:5px;">Amount</th>
                <th style="width:5px;">Service Fee</th>
                <th style="width:5px;">GST Value</th>
                <th style="width:5px;">Total Bill Amount (Rs)</th>
            </tr>
        </thead>
       
        <?php
include_once('dbconnection/connection.php');

$aa = "SELECT @acount:=@acount+1 AS sno, '$city' AS city, '$store_code' AS Store_SAP_code, falt_no AS Fault_No, falt_date AS Date_of_fault, falt_desc AS Nature_of_job_in_brief, quet_num AS Bill_No, '' AS Bill_Date, tot_base AS Amount, tot_ser AS Service_Fee, tot_gst AS GST_Value, (tot_base + tot_ser + tot_gst) AS Total_Bill_Amount_Rs FROM (SELECT @acount:= 0) AS acount, $qottable WHERE id='$id'";

$result = mysqli_query($link, $aa);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["sno"] . "</td>";
        echo "<td>" . $row["city"] . "</td>";
        echo "<td>" . $row["Store_SAP_code"] . "</td>";
        echo "<td>" . $row["Fault_No"] . "</td>";
        echo "<td>" . $row["Date_of_fault"] . "</td>";
        echo "<td>" . $row["Nature_of_job_in_brief"] . "</td>";
        echo "<td>" . $row["Bill_No"] . "</td>";
        echo "<td>" . $row["Bill_Date"] . "</td>";
        echo "<td>" . $row["Amount"] . "</td>";
        echo "<td>" . $row["Service_Fee"] . "</td>";
        echo "<td>" . $row["GST_Value"] . "</td>";
        echo "<td>" . $row["Total_Bill_Amount_Rs"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
?>
        </tbody>
        </table>

<table style="width:100%" align="top">
    <tr>
        <td>Vendor's representative:</td>
        <td>Name & Sign:</td>
      
    </tr>
    <tr style="height: 150px;">
        <td>Checked by FM :</td>
        <td>Store Personnel: </td>
          <td><img src="images/RR.png"/></td>
    </tr>
<tr>
    <td></td>
    <br>
    <br>
    <td></td>
    <br>
    <br>
    <td></td>

<tr>
<tr style="height: 50px;">
    <td style="padding-bottom: 20px;">Name & Sign of FM Representative:</td>
    <td style="padding-bottom: 20px;">Name & Sign of Store Manager:</td>
</tr>

</tr>
<tr>
       <td></td>
       </tr>
 



</table>
<br>
<br>
<br>


</body>
</html>
    


<?php
$quet_num = $_GET['quet_num'];
$html = ob_get_clean(); // Get the buffered HTML content

// Write HTML to PDF
$mpdf->WriteHTML($html);

// Generate the filename dynamically
$filename = $quet_num . '_MIS.pdf';

// Output PDF with dynamically generated filename and inline attribute
$mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
?>

