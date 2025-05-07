X<?php
require_once __DIR__ . '/vendor/autoload.php'; // Assuming mpdf library is installed via Composer

// Initialize PDF object
$mpdf = new \Mpdf\Mpdf();
error_reporting(E_ALL);
ini_set('display_errors', 1);

ob_start(); // Start output buffering

// Your HTML content
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>JTECHNO</title>
    <link rel="stylesheet" href="http://mission2cr.org/admin/qot.css1">		

       <style>
    #customTable {
        width: 100%;
        border: 1px solid #000;
        border-collapse: collapse;
    }

    #customTable th,
    #customTable td {
        border: 1px solid #000;
        padding: 5px;
    }

    #row1 {
        height: 1px; /* Adjust the height as needed */
        padding: 10px; /* Adjust the padding as needed */
    }

    #row1 th,
    #row1 td {
        text-align: left; /* Set text alignment to left */
    }
</style>

</head>
<body>
    <div class="page" >
        <?php 
        include('dbconnection/connection.php');
        $quet_num = $_GET['quet_num'];

        // Extract state code from the quotation number
        $state_code = substr($quet_num, 3, 2);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

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

        // Fetch the quotation number from the URL
        $quet_num = $_GET['quet_num'];

        // Fetch the corresponding id from the database using quet_num
        $sq = mysqli_query($link, "SELECT id FROM " . $qottable . "  WHERE quet_num='$quet_num'");
        $row = mysqli_fetch_assoc($sq);

        if (!$row) {
            // Handle case when no row is found for the given quotation number
            die("No data found for the given quotation number.");
        }

        $bid = $row['id'];

        $q = mysqli_query($link, "SELECT * FROM " . $qottable1 . "  WHERE id='$bid'") or die(mysqli_error($link));
        $r = mysqli_fetch_array($q);

        // Check if the fields are set before accessing them
        $service_no = isset($r['service_no']) ? $r['service_no'] : '';
        $invdate1 = isset($r['date']) ? $r['date'] : '';

        // Check if the date is not null before using strtotime
        if (!empty($invdate1)) {
            $invdate = date('d-M-y', strtotime($invdate1));
        } else {
            // Handle case when date is null
            $invdate = '';
        }

        $store_name = isset($r['store_name']) ? $r['store_name'] : '';
        $state = isset($r['state']) ? $r['state'] : '';
        $state_code = isset($r['state_code']) ? $r['state_code'] : '';
        $addr = isset($r['addr']) ? $r['addr'] : '';
        $ses = isset($r['ses']) ? $r['ses'] : '';
        $gst_in = isset($r['gst_in']) ? $r['gst_in'] : '';
        $tot = isset($r['tot']) ? $r['tot'] : '';
        $tot_gst = isset($r['tot_gst']) ? $r['tot_gst'] : '';
        $net = isset($r['net']) ? $r['net'] : '';
        $date = isset($r['date']) ? $r['date'] : '';
        $store_code = isset($r['store_code']) ? $r['store_code'] : '';
        $inv_no = isset($r['inv_no']) ? $r['inv_no'] : '';
        $mnth = date('M', strtotime($date));
        $y = date('y', strtotime($date));


        $quet_num = $_GET['quet_num'];

        // Fetch the corresponding id from the database using quet_num
        $sq = mysqli_query($link, "SELECT id FROM " . $qottable . " WHERE quet_num='$quet_num'");
        $row = mysqli_fetch_assoc($sq);
        $id = $row['id'];

        // Fetch

        $sq = mysqli_query($link, "SELECT * FROM " . $qottable . " WHERE id='$id'");
$r = mysqli_fetch_array($sq);
$store_code = $r['store_code'];
$quet_num = $r['quet_num'];
$po_no = $r['po_no'];
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

// Fetch organization details based on state code
$sqy = mysqli_query($link, "SELECT * FROM organization WHERE id='1'");
$r2y = mysqli_fetch_array($sqy);


$quet_num = $_GET['quet_num'];



// Extract state code from the quotation number
$state_code = substr($quet_num, 3, 2);
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Set address and GST based on state code
switch ($state_code) {
    case 'AP':
        $address = $r2y['ap_address'];
        $gst = $r2y['ap_gst'];
        break;
    case 'TS':
    case 'TG':      
        $address = $r2y['tg_address'];
        $gst = $r2y['tg_gst'];
        break;
    case 'TN':
        $address = $r2y['tn_address'];
        $gst = $r2y['tn_gst'];
        break;
    case 'KL':
        $address = $r2y['kl_address'];
        $gst = $r2y['kl_gst'];
        break;
    case 'KN':
        $address = $r2y['kn_address'];
        $gst = $r2y['kn_gst'];
        break;
    case 'OD':
        $address = $r2y['od_address'];
        $gst = $r2y['od_gst'];
        break;
    default:
        // Handle the case when state code is not recognized
        // You can set default values or show an error message
        break;
}

// Get the vendor name
$vendor_name = $r2y['vendor_name'];
?>
<table border='1' style="width:100%" align="center"  cellpadding="0" cellspacing='0'>
    <thead>
        <tr class="noBorder" >
            <th colspan="14" style="width:100% border-right:none !important;font-size:18px;">
                <img src="images/excel_logo.jpg" alt="Excel Logo" width="200%" height="100" style="display: block; margin: 0 auto;" />
            </th>
        </tr>
    </thead>
    <tr>
        <td colspan="14" style="text-align:center;font-size:18px;border:0px;"><b>BILL OF SUPPLY</b><br /></td>
    </tr>
    <tr>
        <td colspan="14">
            <table>
                <tr>
                    <td><b>Name of Vendor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
                    <td><?php echo $vendor_name;?></td>
                </tr>
                <tr>
                    <td><b>Vendor Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b></td>
                    <td><?php echo $address;?></td>
                </tr>
                <tr>
                    <td><b>Vendor State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :</b></td>
                    <td><?php echo $state_code;?> STATE</td>
                </tr>
                <tr>
                    <td><b>Vendor GSTIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b></td>
                    <td><?php echo $gst;?></td>
                </tr>
                <tr>
                    <td><b>Vendor State Code :</b></td>
                    <td><?php echo $r1['state_code']; ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="14">
            <table width="100%"  style="border:1px solid #000;" align="left">
                <tr>
                    <td><b>Quotation Date:</b><?php $d=$r['inv_date']; echo date('d-m-Y', strtotime($d));?></td>
                    <td><b>Quotation Number:</b><?php $qt=$r['quet_num']; echo $r['quet_num'];?></td>
                    <td>&nbsp;&nbsp;&nbsp;<b>PO Number :</b><?php echo $r['po_no']; ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="14" style="text-align:center;font-size:18px;border:0px;"><b>Bill to Party</b><br /></td>
    </tr>
    <tr>
        <td colspan="14">
        <table width="100%"  style="border:1px solid #000;" align="left">
            <tr style="border: 1px solid black;">
                    <td><b>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
                    <td><?php echo $r1['company_name'];?></td>
                </tr>
                <tr>
                    <td><b>Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b></td>
                    <td><?php echo  $r1['address'];?></td>
                </tr>
                <tr>
                    <td><b>State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :</b></td>
                    <td><?php   $st=$r1['state']; if($st=='AP'){ echo "ANDHRA PRADESH "; } else if($st=='TS'){ echo "TELANGANA STATE"; }else if($st=='KN'){ echo "KARNATAKA STATE"; }?> STATE</td>
                </tr>
                <tr>
                    <td><b>GSTIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b></td>
                    <td><?php echo $r1['gst_in'];?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="14" style="text-align:center;font-size:18px;border:0px;"><b>Ship to Party</b><br /></td>
    </tr>
    <tr>
        <td colspan="14">
        <table width="100%"  style="border:1px solid #000;" align="left">
            <tr style="border: 1px solid black;">
                    <td><b>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
                    <td><?php echo $ship_name;?></td>
                </tr>
                <tr>
                    <td><b>
                    Address      :</b></td><td><?php echo $store_name?>, <?php echo $addr1;?></td></tr><br/>
<tr><td><b>State           :</b></td><td><?php echo $ship_state;?> STATE</td></tr><br/>
<tr><td><b>GSTIN       :</b></td><td><?php echo $ship_gst;?></td></tr><br/>
</table>
</td>
</tr>
</thead>
</tr>
<tr style="border: 1px solid black;">
<td colspan="14">
        <table id="customTable" width="100%"  style="border:1px solid #000;" align="left">
        <tr style="border: 1px solid black;">
<th style="width:5px;">SNo</th>
<th style="width:120px;">HSN/ SAC Codes</th>
<th style="width:75px;">Article/ Service Codes</th>
<th style="width:200px;" colspan="2">Description of Material/Service</th>
<th style="width:60px;" colspan="1">Brand/Make</th>
<th style="width:60px;" colspan="1">Model</th>
<th style="width:60px;" colspan="1">QTY</th>
<th style="width:60px;" colspan="1">UOM</th>
<th style="width:60px;">RATE</th>
<th style="width:100px;" colspan="1">Base Amount</th>
<th style="width:100px;" colspan="1">Service Fee -6% (In Rs)</th>
<th style="width:100px;" colspan="1">Total Base Amount</th>
<th style="width:100px; border-right-color: #000 !important;">GST Rate (18 %)</th>
</tr>
<?php
include_once('dbconnection/connection.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Fetch the id using quet_num
$quet_num = $_GET['quet_num'];
$query = "SELECT id FROM " . $qottable . " WHERE quet_num='$quet_num'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$bid = $row['id'];

// Proceed with the rest of your code
$aa = "SELECT * FROM " . $qottable1 . " WHERE id1='$bid'";
$t = mysqli_query($link, $aa) or die(mysqli_error($link));
$i = 1;
$gst_amnt1 = 0;
$tx = 0;
while ($t1 = mysqli_fetch_array($t)) {
    ?>
    <tr id="row1">
        <th style="width:5px; height: 5px;"><?php echo $i; ?></th>
        <th style="width:120px; height: 5px;">
            <?php echo $t1['hsn']; ?>
        </th>
        <th >
            <?php echo $t1['serv_code']; ?>
        </th>
        <th colspan="2" style="width:200px; height: 5px;"><?php echo '<b>' . $t1['desc1'] . '</b>'; ?></th>
        <th style="width:60px; height: 5px;" colspan="1"><?php echo $t1['brand']; ?></th>
        <th style="width:60px; height: 5px;" colspan="1"><?php echo $t1['model']; ?></th>
        <th style="width:60px; height: 5px;" colspan="1"><?php echo $t1['qty']; ?></th>
        <th style="width:60px; height: 5px;" colspan="1"> <?php echo $t1['uom']; ?></th>
        <th style="width:60px; height: 5px;"><?php echo $t1['rate']; ?></th>
        <th style="width:100px; height: 5px;" colspan="1"><?php echo $bas = $t1['base_amt']; ?></th>
        <th style="width:100px; height: 5px;" colspan="1"><?php echo $ser = $t1['serv_amt']; ?></th>
        <th style="width:100px; height: 5px;" colspan="1"><?php echo $ser + $bas; ?></th>
        <th style="width:100px; height: 5px;" colspan="1"> <?php echo $tax = number_format((float)$t1['gst_amnt'], 1, '.', ''); ?> </th>
        <th style="width:0px; height: 0px;" colspan="1"><?php ?></th>
    </tr>
    <?php
   

    
     $gst_amnt = $t1['gst_amnt'];
    $gst_amnt1 = $gst_amnt + $gst_amnt1;

    $tt_amt = $t1['total_price'];
    $tt_amt1 = $tt_amt + $tt_amt1;

    $tx = $t1['tax_amnt'];
    $tx1 = $tax + $tx1;
    $total_price = $t1['total_price'];

    $gst_amnt2 = $gst_amnt + $gst_amnt2;
    $bas1 = $bas + $bas1;
    $ser1 = $ser + $ser1;
    
    
    $i++;
}
?>

<tr>
    
    <th  colspan="10"> Total Amount</th>
    <th style="width:100px;"><?php echo $bas1; ?></th>
    <th style="width:100px;"><?php echo $ser1; ?></th>
    <th style="width:100px;"><?php echo $ser1 + $bas1; ?></th>
    <th style="width:100px;"><?php echo $tx1; ?></th>
</tr>
<tr>
    <th  colspan="13"> SGST/UGST Amt (In Rs)</th>
    <th style="width:100px;"><?php echo $tx1 / 2; ?></th>
</tr>
<tr>
    <th  colspan="13"> CGST Amt (In Rs)</th>
    <th style="width:100px;"><?php echo $tx1 / 2; ?></th>
</tr>
<tr>
    <th  colspan="13"> IGST Amt (In Rs)</th>
    <th style="width:100px;">0</th>
</tr>
<tr>
    <th  colspan="13"> Total GST  (In Rs)</th>
    <th style="width:100px;"><?php echo $tx1; ?></th>
</tr>
<tr>
    <th  colspan="13"> Total Amount (In Rs)</th>
    <th style="width:100px;"><?php echo $tamt = $tx1 + $ser1 + $bas1; ?></th>
</tr>
<tr>
    <th  colspan="14"> Total Invoice Amount in Words
        <?php
       $tmt=round($tamt);
      
     
       $number = round($tmt);
     $no = round($number);
     $point = round($number - $no, 2) * 100;
     $hundred = null;
     $digits_1 = strlen($no);
     $i = 0;
     $str = array();
     $words = array('0' => '', '1' => 'one', '2' => 'two',
      '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
      '7' => 'seven', '8' => 'eight', '9' => 'nine',
      '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
      '13' => 'thirteen', '14' => 'fourteen',
      '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
      '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
      '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
      '60' => 'sixty', '70' => 'seventy',
      '80' => 'eighty', '90' => 'ninety');
     $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
     while ($i < $digits_1) {
       $divider = ($i == 2) ? 10 : 100;
       $number = floor($no % $divider);
       $no = floor($no / $divider);
       $i += ($divider == 10) ? 1 : 2;
       if ($number) {
          $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
          $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
          $str [] = ($number < 21) ? $words[$number] .
              " " . $digits[$counter] . $plural . " " . $hundred
              :
              $words[floor($number / 10) * 10]
              . " " . $words[$number % 10] . " "
              . $digits[$counter] . $plural . " " . $hundred;
       } else $str[] = null;
    }
    $str = array_reverse($str);
    $result = implode('', $str);
    $points = ($point) ?
      "." . $words[$point / 10] . " " . 
            $words[$point = $point % 10] : '';
    echo  "- ".strtoupper($result) .  $points . " RUPEES ONLY";
        ?>
    </tr>
</table>
</tr>

</tbody>
</table>
</body>
</html>


<?php
$html = ob_get_clean(); // Get the buffered HTML content

// Write HTML to PDF
$mpdf->WriteHTML($html);

// Generate the filename dynamically
$filename = $quet_num . '_BSP.pdf';

// Output PDF with dynamically generated filename and inline attribute
$mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
?>