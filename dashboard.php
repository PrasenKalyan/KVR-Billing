<?php //include('config.php');
ob_start();
$stn="dashboard";
include('dbconnection/connection.php');
session_start();
 date_default_timezone_set('Asia/Kolkata');
//echo $_SESSION['user'];
if($_SESSION['user'])
{
$name=$_SESSION['user'];
$tsname=$_SESSION['user'];
//include('org1.php');


//include'dbfiles/org.php'
?>

<!DOCTYPE html>
<html lang="en">
	<?php include 'template/headerfile.php'; ?>


	<body class="no-skin">
		<?php include 'template/logo.php'; ?>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
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
								<a href="#">Dashboard</a>
							</li>
							<!--<li class="active">Blank Page</li>-->
						</ul><!-- /.breadcrumb -->

						<!-- /.nav-search -->
					</div>

					<div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="row">
							<div class="col-xs-12">
							    <h1>Summary</h1>
								<!-- PAGE CONTENT BEGINS -->
                                <div class="col-xs-18"  style="margin-bottom:10px;">
 			 <div class="analysis-box m-b-0 bg-blue" style="width: 100%; padding: 10px; margin-top: 70px;">
	                            <h3 class="text-white box-title">
								<input type="submit" class="btn btn-info" style="font-weight: bold;" value="Andhra Pradesh" onclick="report2();">
							 
							  <?php echo $ip;?></h3>
							   <?php echo $cnt;?></h3>
						 <!-- Dropdown to Toggle Chart -->
<select id="chartToggle5" class="btn btn-dark" style="margin-left: 20px;">
    <option value="hide1">View Dashboard</option>
    <option value="show1">Show Bar Chart</option>
</select>

							</span></h3>
							<?php
// 1. Consolidated data from add_knqot
$knqotData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(1) AS total,
        SUM(tot_base) AS total_sum,
        SUM(CASE WHEN status='Ro Required' THEN 1 ELSE 0 END) AS ro_required_count,
        SUM(CASE WHEN status='Ro Required' THEN tot_base ELSE 0 END) AS ro_required_sum,
        SUM(CASE WHEN status='work to be started' THEN 1 ELSE 0 END) AS work_start_count,
        SUM(CASE WHEN status='work to be started' THEN tot_base ELSE 0 END) AS work_start_sum,
        SUM(CASE WHEN status='Raised Invoice List' THEN tot_base ELSE 0 END) AS raised_invoice_sum,
        SUM(CASE WHEN wd='cancel' AND status='work to be started' THEN tot_base ELSE 0 END) AS cancelled_sum
    FROM add_qot
") or die(mysqli_error($link));
$knqotData = mysqli_fetch_assoc($result);

// 2. Consolidated data from knrequest_amnt
$requestData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(DISTINCT CASE WHEN confirm='Pending' THEN quet_num END) AS req_amt_count,
        SUM(CASE WHEN confirm='Pending' THEN req_amnt ELSE 0 END) AS req_amt_sum,
        COUNT(CASE WHEN confirm='Yes' AND status='' THEN 1 END) AS approved_count,
        SUM(CASE WHEN confirm='Yes' AND status='' THEN req_amnt ELSE 0 END) AS approved_sum,
        COUNT(DISTINCT CASE WHEN (status='Amount Transferred' AND bill_status='') OR docr_status='Cancel' THEN quet_num END) AS doc_req_count,
        SUM(CASE WHEN (status='Amount Transferred' AND bill_status='') OR docr_status='Cancel' THEN req_amnt ELSE 0 END) AS doc_req_sum
    FROM request_amnt
") or die(mysqli_error($link));
$requestData = mysqli_fetch_assoc($result);

// 3. Consolidated data from knqot_bill
$billData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(CASE WHEN status='payment pending' THEN 1 END) AS payment_pending_count,
        COUNT(CASE WHEN status='RUn Paid' THEN 1 END) AS run_paid_count,
        COUNT(CASE WHEN status='Un Paid' THEN 1 END) AS unpaid_count,
        SUM(CASE WHEN status='RUn Paid' THEN tbase ELSE 0 END) AS run_paid_sum,
        SUM(CASE WHEN status='Un Paid' THEN tbase ELSE 0 END) AS unpaid_sum
    FROM qot_bill
") or die(mysqli_error($link));
$billData = mysqli_fetch_assoc($result);

// 4. Consolidated data from knpayment
$paymentData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(*) AS total_payments,
        SUM(recevied_amnt) AS received_sum,
        SUM(recevied_amnt1) AS received_sum1
    FROM payment
") or die(mysqli_error($link));
$paymentData = mysqli_fetch_assoc($result);

// 5. Cancelled quotations
$cancelledCount = mysqli_fetch_assoc(mysqli_query($link, "SELECT COUNT(*) AS cancelled FROM add_qot WHERE wd='cancel'"))['cancelled'];
?>

	                            <div id="sparkline16" >
	                         <table class="table">
							        <th>TOTAL QUOTATIONS</th>
	                                <th>RO REQUIRED</th>
									
									<th>WORK TO BE STARTED</th>
									<th>REQUESTED AMOUNT LIST</th>
									<th>AMOUNT APPROVED LIST</th>
	                                <th>DOCUMENT REQ LIST</th>
									<th>TO BE RAISE INVOICE</th>
									<th>RAISED INVOICE</th>
									<th>PAYMENT PENDING INVOICE</th>
	                                <th>PAYMENT RECEIVED</th>
									<th>CANCELLED QUOTATIONS</th>
	                                
	                                
    <tr>
        <td><b style="color:white;"><?= $knqotData['total'] ?></b></td>
        <td><b style="color:white;"><?= $knqotData['ro_required_count'] ?></b></td>
        <td><b style="color:white;"><?= $knqotData['work_start_count'] ?></b></td>
        <td><b style="color:white;"><?= $requestData['req_amt_count'] ?></b></td>
        <td><b style="color:white;"><?= $requestData['approved_count'] ?></b></td>
        <td><b style="color:white;"><?= $requestData['doc_req_count'] ?></b></td>
        <td><b style="color:white;"><?= $billData['payment_pending_count'] ?></b></td>
        <td><b style="color:white;"><?= $billData['run_paid_count'] ?></b></td>
        <td><b style="color:white;"><?= $billData['unpaid_count'] ?></b></td>
        <td><b style="color:white;"><?= $paymentData['total_payments'] ?></b></td>
        <td><b style="color:white;"><?= $cancelledCount ?></b></td>
    </tr>
    <tr>
        <td><b style="color:white;"><?= number_format($knqotData['total_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($knqotData['ro_required_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($knqotData['work_start_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($requestData['req_amt_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($requestData['approved_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($requestData['doc_req_sum'], 2) ?></b></td>
        <td><b style="color:white;">0.00</b></td> <!-- Raised invoice count not tracked -->
        <td><b style="color:white;"><?= number_format($billData['run_paid_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($billData['unpaid_sum'], 2) ?></b></td>
        <td>
            <b style="color:white;"><?= number_format($paymentData['received_sum'], 2) ?></b><br>
            <b style="color:white;"><?= number_format($paymentData['received_sum1'], 2) ?></b>
        </td>
        <td><b style="color:white;"><?= number_format($knqotData['cancelled_sum'], 2) ?></b></td>
    </tr>


	                               
	                                   
	                            </table>
	                           
</div>
	                            
	                            </div>
	                             <div id="barChartContainer5" style="display: none;">
  <canvas id="barChart5"></canvas>
	                        </div>

<script>
document.getElementById('chartToggle5').addEventListener('change', function () {
    const table = document.getElementById('sparkline16');
    const chartContainer = document.getElementById('barChartContainer5');

    if (this.value === 'show1') {
        table.style.display = 'none';
        chartContainer.style.display = 'block';
        renderBarChart5(); // render chart
    } else {
        table.style.display = 'block';
        chartContainer.style.display = 'none';
    }
});

let chartInstance5;
function renderBarChart5() {
    const ctx = document.getElementById('barChart5').getContext('2d');

    if (chartInstance5) chartInstance5.destroy();

    chartInstance5 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Total Quotations', 'RO Required', 'Work to be Started',
                'Requested Amount', 'Approved Amount', 'Doc Request',
                'To Raise Invoice', 'Raised Invoice',
                'Payment Pending', 'Payments Received', 'Cancelled Quotations'
            ],
            datasets: [
                {
                    label: 'Count',
                    data: [
                        <?= $knqotData['total'] ?>,
                        <?= $knqotData['ro_required_count'] ?>,
                        <?= $knqotData['work_start_count'] ?>,
                        <?= $requestData['req_amt_count'] ?>,
                        <?= $requestData['approved_count'] ?>,
                        <?= $requestData['doc_req_count'] ?>,
                        <?= $billData['payment_pending_count'] ?>,
                        <?= $billData['run_paid_count'] ?>,
                        <?= $billData['unpaid_count'] ?>,
                        <?= $paymentData['total_payments'] ?>,
                        <?= $cancelledCount ?>
                    ],
                    backgroundColor: 'rgba(33, 150, 243, 0.7)',
                    yAxisID: 'yCounts'
                },
                {
                    label: 'Amount',
                    data: [
                        <?= $knqotData['total_sum'] ?? 0 ?>,
                        <?= $knqotData['ro_required_sum'] ?? 0 ?>,
                        <?= $knqotData['work_start_sum'] ?? 0 ?>,
                        <?= $requestData['req_amt_sum'] ?? 0 ?>,
                        <?= $requestData['approved_sum'] ?? 0 ?>,
                        <?= $requestData['doc_req_sum'] ?? 0 ?>,
                        0,
                        <?= $billData['run_paid_sum'] ?? 0 ?>,
                        <?= $billData['unpaid_sum'] ?? 0 ?>,
                        <?= ($paymentData['received_sum'] ?? 0) + ($paymentData['received_sum1'] ?? 0) ?>,
                        <?= $knqotData['cancelled_sum'] ?? 0 ?>
                    ],
                    backgroundColor: 'rgba(244, 67, 54, 0.7)',
                    yAxisID: 'yAmounts'
                }
            ]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false
            },
            scales: {
                yCounts: {
                    type: 'linear',
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Count'
                    },
                    beginAtZero: true
                },
                yAmounts: {
                    type: 'linear',
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Amount (₹)'
                    },
                    beginAtZero: true,
                    grid: {
                        drawOnChartArea: false
                    }
                }
            }
        }
    });
}

</script>
	                        <div class="analysis-box m-b-0 bg-red" style="width: 100%; padding: 10px; margin-top: 70px;">
	                            <h3 class="text-white box-title">
								<input type="submit" class="btn btn-info" style="font-weight: bold;" value="KARNATAKA" onclick="report2();">
							 
							  <?php echo $ip;?></h3>
							   <?php echo $cnt;?></h3>
						 <!-- Dropdown to Toggle Chart -->
<select id="chartToggle1" class="btn btn-dark" style="margin-left: 20px;">
    <option value="hide1">View Dashboard</option>
    <option value="show1">Show Bar Chart</option>
</select>

							</span></h3>
							<?php
// 1. Consolidated data from add_knqot
$knqotData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(1) AS total,
        SUM(tot_base) AS total_sum,
        SUM(CASE WHEN status='Ro Required' THEN 1 ELSE 0 END) AS ro_required_count,
        SUM(CASE WHEN status='Ro Required' THEN tot_base ELSE 0 END) AS ro_required_sum,
        SUM(CASE WHEN status='work to be started' THEN 1 ELSE 0 END) AS work_start_count,
        SUM(CASE WHEN status='work to be started' THEN tot_base ELSE 0 END) AS work_start_sum,
        SUM(CASE WHEN status='Raised Invoice List' THEN tot_base ELSE 0 END) AS raised_invoice_sum,
        SUM(CASE WHEN wd='cancel' AND status='work to be started' THEN tot_base ELSE 0 END) AS cancelled_sum
    FROM add_knqot
") or die(mysqli_error($link));
$knqotData = mysqli_fetch_assoc($result);

// 2. Consolidated data from knrequest_amnt
$requestData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(DISTINCT CASE WHEN confirm='Pending' THEN quet_num END) AS req_amt_count,
        SUM(CASE WHEN confirm='Pending' THEN req_amnt ELSE 0 END) AS req_amt_sum,
        COUNT(CASE WHEN confirm='Yes' AND status='' THEN 1 END) AS approved_count,
        SUM(CASE WHEN confirm='Yes' AND status='' THEN req_amnt ELSE 0 END) AS approved_sum,
        COUNT(DISTINCT CASE WHEN (status='Amount Transferred' AND bill_status='') OR docr_status='Cancel' THEN quet_num END) AS doc_req_count,
        SUM(CASE WHEN (status='Amount Transferred' AND bill_status='') OR docr_status='Cancel' THEN req_amnt ELSE 0 END) AS doc_req_sum
    FROM knrequest_amnt
") or die(mysqli_error($link));
$requestData = mysqli_fetch_assoc($result);

// 3. Consolidated data from knqot_bill
$billData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(CASE WHEN status='payment pending' THEN 1 END) AS payment_pending_count,
        COUNT(CASE WHEN status='RUn Paid' THEN 1 END) AS run_paid_count,
        COUNT(CASE WHEN status='Un Paid' THEN 1 END) AS unpaid_count,
        SUM(CASE WHEN status='RUn Paid' THEN tbase ELSE 0 END) AS run_paid_sum,
        SUM(CASE WHEN status='Un Paid' THEN tbase ELSE 0 END) AS unpaid_sum
    FROM knqot_bill
") or die(mysqli_error($link));
$billData = mysqli_fetch_assoc($result);

// 4. Consolidated data from knpayment
$paymentData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(*) AS total_payments,
        SUM(recevied_amnt) AS received_sum,
        SUM(recevied_amnt1) AS received_sum1
    FROM knpayment
") or die(mysqli_error($link));
$paymentData = mysqli_fetch_assoc($result);

// 5. Cancelled quotations
$cancelledCount = mysqli_fetch_assoc(mysqli_query($link, "SELECT COUNT(*) AS cancelled FROM add_knqot WHERE wd='cancel'"))['cancelled'];
?>

	                            <div id="sparkline12" >
	                         <table class="table">
							        <th>TOTAL QUOTATIONS</th>
	                                <th>RO REQUIRED</th>
									
									<th>WORK TO BE STARTED</th>
									<th>REQUESTED AMOUNT LIST</th>
									<th>AMOUNT APPROVED LIST</th>
	                                <th>DOCUMENT REQ LIST</th>
									<th>TO BE RAISE INVOICE</th>
									<th>RAISED INVOICE</th>
									<th>PAYMENT PENDING INVOICE</th>
	                                <th>PAYMENT RECEIVED</th>
									<th>CANCELLED QUOTATIONS</th>
	                                
	                                
    <tr>
        <td><b style="color:white;"><?= $knqotData['total'] ?></b></td>
        <td><b style="color:white;"><?= $knqotData['ro_required_count'] ?></b></td>
        <td><b style="color:white;"><?= $knqotData['work_start_count'] ?></b></td>
        <td><b style="color:white;"><?= $requestData['req_amt_count'] ?></b></td>
        <td><b style="color:white;"><?= $requestData['approved_count'] ?></b></td>
        <td><b style="color:white;"><?= $requestData['doc_req_count'] ?></b></td>
        <td><b style="color:white;"><?= $billData['payment_pending_count'] ?></b></td>
        <td><b style="color:white;"><?= $billData['run_paid_count'] ?></b></td>
        <td><b style="color:white;"><?= $billData['unpaid_count'] ?></b></td>
        <td><b style="color:white;"><?= $paymentData['total_payments'] ?></b></td>
        <td><b style="color:white;"><?= $cancelledCount ?></b></td>
    </tr>
    <tr>
        <td><b style="color:white;"><?= number_format($knqotData['total_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($knqotData['ro_required_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($knqotData['work_start_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($requestData['req_amt_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($requestData['approved_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($requestData['doc_req_sum'], 2) ?></b></td>
        <td><b style="color:white;">0.00</b></td> <!-- Raised invoice count not tracked -->
        <td><b style="color:white;"><?= number_format($billData['run_paid_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($billData['unpaid_sum'], 2) ?></b></td>
        <td>
            <b style="color:white;"><?= number_format($paymentData['received_sum'], 2) ?></b><br>
            <b style="color:white;"><?= number_format($paymentData['received_sum1'], 2) ?></b>
        </td>
        <td><b style="color:white;"><?= number_format($knqotData['cancelled_sum'], 2) ?></b></td>
    </tr>


	                               
	                                   
	                            </table>
	                           
</div>
	                            
	                            </div>
	                             <div id="barChartContainer1" style="display: none;">
  <canvas id="barChart1"></canvas>
	                        </div>

<script>
document.getElementById('chartToggle1').addEventListener('change', function () {
    const table = document.getElementById('sparkline12');
    const chartContainer = document.getElementById('barChartContainer1');

    if (this.value === 'show1') {
        table.style.display = 'none';
        chartContainer.style.display = 'block';
        renderBarChart1(); // render chart
    } else {
        table.style.display = 'block';
        chartContainer.style.display = 'none';
    }
});

let chartInstance1;
function renderBarChart1() {
    const ctx = document.getElementById('barChart1').getContext('2d');

    if (chartInstance1) chartInstance1.destroy();

    chartInstance1 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Total Quotations', 'RO Required', 'Work to be Started',
                'Requested Amount', 'Approved Amount', 'Doc Request',
                'To Raise Invoice', 'Raised Invoice',
                'Payment Pending', 'Payments Received', 'Cancelled Quotations'
            ],
            datasets: [
                {
                    label: 'Count',
                    data: [
                        <?= $knqotData['total'] ?>,
                        <?= $knqotData['ro_required_count'] ?>,
                        <?= $knqotData['work_start_count'] ?>,
                        <?= $requestData['req_amt_count'] ?>,
                        <?= $requestData['approved_count'] ?>,
                        <?= $requestData['doc_req_count'] ?>,
                        <?= $billData['payment_pending_count'] ?>,
                        <?= $billData['run_paid_count'] ?>,
                        <?= $billData['unpaid_count'] ?>,
                        <?= $paymentData['total_payments'] ?>,
                        <?= $cancelledCount ?>
                    ],
                    backgroundColor: 'rgba(33, 150, 243, 0.7)',
                    yAxisID: 'yCounts'
                },
                {
                    label: 'Amount',
                    data: [
                        <?= $knqotData['total_sum'] ?? 0 ?>,
                        <?= $knqotData['ro_required_sum'] ?? 0 ?>,
                        <?= $knqotData['work_start_sum'] ?? 0 ?>,
                        <?= $requestData['req_amt_sum'] ?? 0 ?>,
                        <?= $requestData['approved_sum'] ?? 0 ?>,
                        <?= $requestData['doc_req_sum'] ?? 0 ?>,
                        0,
                        <?= $billData['run_paid_sum'] ?? 0 ?>,
                        <?= $billData['unpaid_sum'] ?? 0 ?>,
                        <?= ($paymentData['received_sum'] ?? 0) + ($paymentData['received_sum1'] ?? 0) ?>,
                        <?= $knqotData['cancelled_sum'] ?? 0 ?>
                    ],
                    backgroundColor: 'rgba(244, 67, 54, 0.7)',
                    yAxisID: 'yAmounts'
                }
            ]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false
            },
            scales: {
                yCounts: {
                    type: 'linear',
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Count'
                    },
                    beginAtZero: true
                },
                yAmounts: {
                    type: 'linear',
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Amount (₹)'
                    },
                    beginAtZero: true,
                    grid: {
                        drawOnChartArea: false
                    }
                }
            }
        }
    });
}

</script>

						
	                        <div class="analysis-box m-b-0 bg-green" style="width: 100%; padding: 10px; margin-top: 70px;">
	                            <h3 class="text-white box-title">
								<input type="submit" class="btn btn-info" style="font-weight: bold;" value="KERELA" onclick="report2();">
							 
							  <?php echo $ip;?></h3>
							   <?php echo $cnt;?></h3>
						 <!-- Dropdown to Toggle Chart -->
<select id="chartToggle2" class="btn btn-dark" style="margin-left: 20px;">
    <option value="hide1">View Dashboard</option>
    <option value="show1">Show Bar Chart</option>
</select>

							</span></h3>
							<?php
// 1. Consolidated data from add_knqot
$knqotData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(1) AS total,
        SUM(tot_base) AS total_sum,
        SUM(CASE WHEN status='Ro Required' THEN 1 ELSE 0 END) AS ro_required_count,
        SUM(CASE WHEN status='Ro Required' THEN tot_base ELSE 0 END) AS ro_required_sum,
        SUM(CASE WHEN status='work to be started' THEN 1 ELSE 0 END) AS work_start_count,
        SUM(CASE WHEN status='work to be started' THEN tot_base ELSE 0 END) AS work_start_sum,
        SUM(CASE WHEN status='Raised Invoice List' THEN tot_base ELSE 0 END) AS raised_invoice_sum,
        SUM(CASE WHEN wd='cancel' AND status='work to be started' THEN tot_base ELSE 0 END) AS cancelled_sum
    FROM add_klqot
") or die(mysqli_error($link));
$knqotData = mysqli_fetch_assoc($result);

// 2. Consolidated data from knrequest_amnt
$requestData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(DISTINCT CASE WHEN confirm='Pending' THEN quet_num END) AS req_amt_count,
        SUM(CASE WHEN confirm='Pending' THEN req_amnt ELSE 0 END) AS req_amt_sum,
        COUNT(CASE WHEN confirm='Yes' AND status='' THEN 1 END) AS approved_count,
        SUM(CASE WHEN confirm='Yes' AND status='' THEN req_amnt ELSE 0 END) AS approved_sum,
        COUNT(DISTINCT CASE WHEN (status='Amount Transferred' AND bill_status='') OR docr_status='Cancel' THEN quet_num END) AS doc_req_count,
        SUM(CASE WHEN (status='Amount Transferred' AND bill_status='') OR docr_status='Cancel' THEN req_amnt ELSE 0 END) AS doc_req_sum
    FROM klrequest_amnt
") or die(mysqli_error($link));
$requestData = mysqli_fetch_assoc($result);

// 3. Consolidated data from knqot_bill
$billData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(CASE WHEN status='payment pending' THEN 1 END) AS payment_pending_count,
        COUNT(CASE WHEN status='RUn Paid' THEN 1 END) AS run_paid_count,
        COUNT(CASE WHEN status='Un Paid' THEN 1 END) AS unpaid_count,
        SUM(CASE WHEN status='RUn Paid' THEN tbase ELSE 0 END) AS run_paid_sum,
        SUM(CASE WHEN status='Un Paid' THEN tbase ELSE 0 END) AS unpaid_sum
    FROM klqot_bill
") or die(mysqli_error($link));
$billData = mysqli_fetch_assoc($result);

// 4. Consolidated data from knpayment
$paymentData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(1) AS total_payments,
        SUM(recevied_amnt) AS received_sum,
        SUM(recevied_amnt1) AS received_sum1
    FROM klpayment
") or die(mysqli_error($link));
$paymentData = mysqli_fetch_assoc($result);

// 5. Cancelled quotations
$cancelledCount = mysqli_fetch_assoc(mysqli_query($link, "SELECT COUNT(1) AS cancelled FROM add_klqot WHERE wd='cancel'"))['cancelled'];
?>

	                            <div id="sparkline13" >
	                         <table class="table">
							        <th>TOTAL QUOTATIONS</th>
	                                <th>RO REQUIRED</th>
									
									<th>WORK TO BE STARTED</th>
									<th>REQUESTED AMOUNT LIST</th>
									<th>AMOUNT APPROVED LIST</th>
	                                <th>DOCUMENT REQ LIST</th>
									<th>TO BE RAISE INVOICE</th>
									<th>RAISED INVOICE</th>
									<th>PAYMENT PENDING INVOICE</th>
	                                <th>PAYMENT RECEIVED</th>
									<th>CANCELLED QUOTATIONS</th>
	                                
	                                
    <tr>
        <td><b style="color:white;"><?= $knqotData['total'] ?></b></td>
        <td><b style="color:white;"><?= $knqotData['ro_required_count'] ?></b></td>
        <td><b style="color:white;"><?= $knqotData['work_start_count'] ?></b></td>
        <td><b style="color:white;"><?= $requestData['req_amt_count'] ?></b></td>
        <td><b style="color:white;"><?= $requestData['approved_count'] ?></b></td>
        <td><b style="color:white;"><?= $requestData['doc_req_count'] ?></b></td>
        <td><b style="color:white;"><?= $billData['payment_pending_count'] ?></b></td>
        <td><b style="color:white;"><?= $billData['run_paid_count'] ?></b></td>
        <td><b style="color:white;"><?= $billData['unpaid_count'] ?></b></td>
        <td><b style="color:white;"><?= $paymentData['total_payments'] ?></b></td>
        <td><b style="color:white;"><?= $cancelledCount ?></b></td>
    </tr>
    <tr>
        <td><b style="color:white;"><?= number_format($knqotData['total_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($knqotData['ro_required_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($knqotData['work_start_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($requestData['req_amt_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($requestData['approved_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($requestData['doc_req_sum'], 2) ?></b></td>
        <td><b style="color:white;">0.00</b></td> <!-- Raised invoice count not tracked -->
        <td><b style="color:white;"><?= number_format($billData['run_paid_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($billData['unpaid_sum'], 2) ?></b></td>
        <td>
            <b style="color:white;"><?= number_format($paymentData['received_sum'], 2) ?></b><br>
            <b style="color:white;"><?= number_format($paymentData['received_sum1'], 2) ?></b>
        </td>
        <td><b style="color:white;"><?= number_format($knqotData['cancelled_sum'], 2) ?></b></td>
    </tr>


	                               
	                                   
	                            </table>
	                           
</div>
	                            
	                            </div>
	                             <div id="barChartContainer2" style="display: none;">
  <canvas id="barChart2"></canvas>
	                        </div>

<script>
document.getElementById('chartToggle2').addEventListener('change', function () {
    const table = document.getElementById('sparkline13');
    const chartContainer = document.getElementById('barChartContainer2');

    if (this.value === 'show1') {
        table.style.display = 'none';
        chartContainer.style.display = 'block';
        renderBarChart2(); // render chart
    } else {
        table.style.display = 'block';
        chartContainer.style.display = 'none';
    }
});

let chartInstance2;
function renderBarChart2() {
    const ctx = document.getElementById('barChart2').getContext('2d');

    if (chartInstance2) chartInstance2.destroy();

    chartInstance1 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Total Quotations', 'RO Required', 'Work to be Started',
                'Requested Amount', 'Approved Amount', 'Doc Request',
                'To Raise Invoice', 'Raised Invoice',
                'Payment Pending', 'Payments Received', 'Cancelled Quotations'
            ],
            datasets: [
                {
                    label: 'Count',
                    data: [
                        <?= $knqotData['total'] ?>,
                        <?= $knqotData['ro_required_count'] ?>,
                        <?= $knqotData['work_start_count'] ?>,
                        <?= $requestData['req_amt_count'] ?>,
                        <?= $requestData['approved_count'] ?>,
                        <?= $requestData['doc_req_count'] ?>,
                        <?= $billData['payment_pending_count'] ?>,
                        <?= $billData['run_paid_count'] ?>,
                        <?= $billData['unpaid_count'] ?>,
                        <?= $paymentData['total_payments'] ?>,
                        <?= $cancelledCount ?>
                    ],
                    backgroundColor: 'rgba(33, 150, 243, 0.7)',
                    yAxisID: 'yCounts'
                },
                {
                    label: 'Amount',
                    data: [
                        <?= $knqotData['total_sum'] ?? 0 ?>,
                        <?= $knqotData['ro_required_sum'] ?? 0 ?>,
                        <?= $knqotData['work_start_sum'] ?? 0 ?>,
                        <?= $requestData['req_amt_sum'] ?? 0 ?>,
                        <?= $requestData['approved_sum'] ?? 0 ?>,
                        <?= $requestData['doc_req_sum'] ?? 0 ?>,
                        0,
                        <?= $billData['run_paid_sum'] ?? 0 ?>,
                        <?= $billData['unpaid_sum'] ?? 0 ?>,
                        <?= ($paymentData['received_sum'] ?? 0) + ($paymentData['received_sum1'] ?? 0) ?>,
                        <?= $knqotData['cancelled_sum'] ?? 0 ?>
                    ],
                    backgroundColor: 'rgba(244, 67, 54, 0.7)',
                    yAxisID: 'yAmounts'
                }
            ]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false
            },
            scales: {
                yCounts: {
                    type: 'linear',
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Count'
                    },
                    beginAtZero: true
                },
                yAmounts: {
                    type: 'linear',
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Amount (₹)'
                    },
                    beginAtZero: true,
                    grid: {
                        drawOnChartArea: false
                    }
                }
            }
        }
    });
}

</script>
	                    

					

	                    
	                       <div class="analysis-box m-b-0 bg-orange" style="width: 100%; padding: 10px; margin-top: 70px;">
	                            <h3 class="text-white box-title">
								<input type="submit" class="btn btn-info" style="font-weight: bold;" value="ODISHA" onclick="report2();">
							 
							  <?php echo $ip;?></h3>
							   <?php echo $cnt;?></h3>
						 <!-- Dropdown to Toggle Chart -->
<select id="chartToggle3" class="btn btn-dark" style="margin-left: 20px;">
    <option value="hide1">View Dashboard</option>
    <option value="show1">Show Bar Chart</option>
</select>

							</span></h3>
							<?php
// 1. Consolidated data from add_knqot
$knqotData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(1) AS total,
        SUM(tot_base) AS total_sum,
        SUM(CASE WHEN status='Ro Required' THEN 1 ELSE 0 END) AS ro_required_count,
        SUM(CASE WHEN status='Ro Required' THEN tot_base ELSE 0 END) AS ro_required_sum,
        SUM(CASE WHEN status='work to be started' THEN 1 ELSE 0 END) AS work_start_count,
        SUM(CASE WHEN status='work to be started' THEN tot_base ELSE 0 END) AS work_start_sum,
        SUM(CASE WHEN status='Raised Invoice List' THEN tot_base ELSE 0 END) AS raised_invoice_sum,
        SUM(CASE WHEN wd='cancel' AND status='work to be started' THEN tot_base ELSE 0 END) AS cancelled_sum
    FROM add_odqot
") or die(mysqli_error($link));
$knqotData = mysqli_fetch_assoc($result);

// 2. Consolidated data from knrequest_amnt
$requestData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(DISTINCT CASE WHEN confirm='Pending' THEN quet_num END) AS req_amt_count,
        SUM(CASE WHEN confirm='Pending' THEN req_amnt ELSE 0 END) AS req_amt_sum,
        COUNT(CASE WHEN confirm='Yes' AND status='' THEN 1 END) AS approved_count,
        SUM(CASE WHEN confirm='Yes' AND status='' THEN req_amnt ELSE 0 END) AS approved_sum,
        COUNT(DISTINCT CASE WHEN (status='Amount Transferred' AND bill_status='') OR docr_status='Cancel' THEN quet_num END) AS doc_req_count,
        SUM(CASE WHEN (status='Amount Transferred' AND bill_status='') OR docr_status='Cancel' THEN req_amnt ELSE 0 END) AS doc_req_sum
    FROM odrequest_amnt
") or die(mysqli_error($link));
$requestData = mysqli_fetch_assoc($result);

// 3. Consolidated data from knqot_bill
$billData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(CASE WHEN status='payment pending' THEN 1 END) AS payment_pending_count,
        COUNT(CASE WHEN status='RUn Paid' THEN 1 END) AS run_paid_count,
        COUNT(CASE WHEN status='Un Paid' THEN 1 END) AS unpaid_count,
        SUM(CASE WHEN status='RUn Paid' THEN tbase ELSE 0 END) AS run_paid_sum,
        SUM(CASE WHEN status='Un Paid' THEN tbase ELSE 0 END) AS unpaid_sum
    FROM odqot_bill
") or die(mysqli_error($link));
$billData = mysqli_fetch_assoc($result);

// 4. Consolidated data from knpayment
$paymentData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(1) AS total_payments,
        SUM(recevied_amnt) AS received_sum,
        SUM(recevied_amnt1) AS received_sum1
    FROM odpayment
") or die(mysqli_error($link));
$paymentData = mysqli_fetch_assoc($result);

// 5. Cancelled quotations
$cancelledCount = mysqli_fetch_assoc(mysqli_query($link, "SELECT COUNT(1) AS cancelled FROM add_odqot WHERE wd='cancel'"))['cancelled'];
?>

	                            <div id="sparkline14" >
	                         <table class="table">
							        <th>TOTAL QUOTATIONS</th>
	                                <th>RO REQUIRED</th>
									
									<th>WORK TO BE STARTED</th>
									<th>REQUESTED AMOUNT LIST</th>
									<th>AMOUNT APPROVED LIST</th>
	                                <th>DOCUMENT REQ LIST</th>
									<th>TO BE RAISE INVOICE</th>
									<th>RAISED INVOICE</th>
									<th>PAYMENT PENDING INVOICE</th>
	                                <th>PAYMENT RECEIVED</th>
									<th>CANCELLED QUOTATIONS</th>
	                                
	                                
    <tr>
        <td><b style="color:white;"><?= $knqotData['total'] ?></b></td>
        <td><b style="color:white;"><?= $knqotData['ro_required_count'] ?></b></td>
        <td><b style="color:white;"><?= $knqotData['work_start_count'] ?></b></td>
        <td><b style="color:white;"><?= $requestData['req_amt_count'] ?></b></td>
        <td><b style="color:white;"><?= $requestData['approved_count'] ?></b></td>
        <td><b style="color:white;"><?= $requestData['doc_req_count'] ?></b></td>
        <td><b style="color:white;"><?= $billData['payment_pending_count'] ?></b></td>
        <td><b style="color:white;"><?= $billData['run_paid_count'] ?></b></td>
        <td><b style="color:white;"><?= $billData['unpaid_count'] ?></b></td>
        <td><b style="color:white;"><?= $paymentData['total_payments'] ?></b></td>
        <td><b style="color:white;"><?= $cancelledCount ?></b></td>
    </tr>
    <tr>
        <td><b style="color:white;"><?= number_format($knqotData['total_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($knqotData['ro_required_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($knqotData['work_start_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($requestData['req_amt_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($requestData['approved_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($requestData['doc_req_sum'], 2) ?></b></td>
        <td><b style="color:white;">0.00</b></td> <!-- Raised invoice count not tracked -->
        <td><b style="color:white;"><?= number_format($billData['run_paid_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($billData['unpaid_sum'], 2) ?></b></td>
        <td>
            <b style="color:white;"><?= number_format($paymentData['received_sum'], 2) ?></b><br>
            <b style="color:white;"><?= number_format($paymentData['received_sum1'], 2) ?></b>
        </td>
        <td><b style="color:white;"><?= number_format($knqotData['cancelled_sum'], 2) ?></b></td>
    </tr>


	                               
	                                   
	                            </table>
	                           
</div>
	                            
	                            </div>
	                             <div id="barChartContainer3" style="display: none;">
  <canvas id="barChart3"></canvas>
	                        </div>

<script>
document.getElementById('chartToggle3').addEventListener('change', function () {
    const table = document.getElementById('sparkline14');
    const chartContainer = document.getElementById('barChartContainer3');

    if (this.value === 'show1') {
        table.style.display = 'none';
        chartContainer.style.display = 'block';
        renderBarChart3(); // render chart
    } else {
        table.style.display = 'block';
        chartContainer.style.display = 'none';
    }
});

let chartInstance3;
function renderBarChart3() {
    const ctx = document.getElementById('barChart3').getContext('2d');

    if (chartInstance3) chartInstance3.destroy();

    chartInstance3 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Total Quotations', 'RO Required', 'Work to be Started',
                'Requested Amount', 'Approved Amount', 'Doc Request',
                'To Raise Invoice', 'Raised Invoice',
                'Payment Pending', 'Payments Received', 'Cancelled Quotations'
            ],
            datasets: [
                {
                    label: 'Count',
                    data: [
                        <?= $knqotData['total'] ?>,
                        <?= $knqotData['ro_required_count'] ?>,
                        <?= $knqotData['work_start_count'] ?>,
                        <?= $requestData['req_amt_count'] ?>,
                        <?= $requestData['approved_count'] ?>,
                        <?= $requestData['doc_req_count'] ?>,
                        <?= $billData['payment_pending_count'] ?>,
                        <?= $billData['run_paid_count'] ?>,
                        <?= $billData['unpaid_count'] ?>,
                        <?= $paymentData['total_payments'] ?>,
                        <?= $cancelledCount ?>
                    ],
                    backgroundColor: 'rgba(33, 150, 243, 0.7)',
                    yAxisID: 'yCounts'
                },
                {
                    label: 'Amount',
                    data: [
                        <?= $knqotData['total_sum'] ?? 0 ?>,
                        <?= $knqotData['ro_required_sum'] ?? 0 ?>,
                        <?= $knqotData['work_start_sum'] ?? 0 ?>,
                        <?= $requestData['req_amt_sum'] ?? 0 ?>,
                        <?= $requestData['approved_sum'] ?? 0 ?>,
                        <?= $requestData['doc_req_sum'] ?? 0 ?>,
                        0,
                        <?= $billData['run_paid_sum'] ?? 0 ?>,
                        <?= $billData['unpaid_sum'] ?? 0 ?>,
                        <?= ($paymentData['received_sum'] ?? 0) + ($paymentData['received_sum1'] ?? 0) ?>,
                        <?= $knqotData['cancelled_sum'] ?? 0 ?>
                    ],
                    backgroundColor: 'rgba(244, 67, 54, 0.7)',
                    yAxisID: 'yAmounts'
                }
            ]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false
            },
            scales: {
                yCounts: {
                    type: 'linear',
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Count'
                    },
                    beginAtZero: true
                },
                yAmounts: {
                    type: 'linear',
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Amount (₹)'
                    },
                    beginAtZero: true,
                    grid: {
                        drawOnChartArea: false
                    }
                }
            }
        }
    });
}

</script>
   


	                   

						
	                   
	                       <div class="analysis-box m-b-0 bg-purple" style="width: 100%; padding: 10px; margin-top: 70px;">
	                            <h3 class="text-white box-title">
								<input type="submit" class="btn btn-info" style="font-weight: bold;" value="TELANGANA" onclick="report2();">
							 
							  <?php echo $ip;?></h3>
							   <?php echo $cnt;?></h3>
						 <!-- Dropdown to Toggle Chart -->
<select id="chartToggle4" class="btn btn-dark" style="margin-left: 20px;">
    <option value="hide1">View Dashboard</option>
    <option value="show1">Show Bar Chart</option>
</select>

							</span></h3>
							<?php
// 1. Consolidated data from add_knqot
$knqotData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(1) AS total,
        SUM(tot_base) AS total_sum,
        SUM(CASE WHEN status='Ro Required' THEN 1 ELSE 0 END) AS ro_required_count,
        SUM(CASE WHEN status='Ro Required' THEN tot_base ELSE 0 END) AS ro_required_sum,
        SUM(CASE WHEN status='work to be started' THEN 1 ELSE 0 END) AS work_start_count,
        SUM(CASE WHEN status='work to be started' THEN tot_base ELSE 0 END) AS work_start_sum,
        SUM(CASE WHEN status='Raised Invoice List' THEN tot_base ELSE 0 END) AS raised_invoice_sum,
        SUM(CASE WHEN wd='cancel' AND status='work to be started' THEN tot_base ELSE 0 END) AS cancelled_sum
    FROM add_tgqot
") or die(mysqli_error($link));
$knqotData = mysqli_fetch_assoc($result);

// 2. Consolidated data from knrequest_amnt
$requestData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(DISTINCT CASE WHEN confirm='Pending' THEN quet_num END) AS req_amt_count,
        SUM(CASE WHEN confirm='Pending' THEN req_amnt ELSE 0 END) AS req_amt_sum,
        COUNT(CASE WHEN confirm='Yes' AND status='' THEN 1 END) AS approved_count,
        SUM(CASE WHEN confirm='Yes' AND status='' THEN req_amnt ELSE 0 END) AS approved_sum,
        COUNT(DISTINCT CASE WHEN (status='Amount Transferred' AND bill_status='') OR docr_status='Cancel' THEN quet_num END) AS doc_req_count,
        SUM(CASE WHEN (status='Amount Transferred' AND bill_status='') OR docr_status='Cancel' THEN req_amnt ELSE 0 END) AS doc_req_sum
    FROM tgrequest_amnt
") or die(mysqli_error($link));
$requestData = mysqli_fetch_assoc($result);

// 3. Consolidated data from knqot_bill
$billData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(CASE WHEN status='payment pending' THEN 1 END) AS payment_pending_count,
        COUNT(CASE WHEN status='RUn Paid' THEN 1 END) AS run_paid_count,
        COUNT(CASE WHEN status='Un Paid' THEN 1 END) AS unpaid_count,
        SUM(CASE WHEN status='RUn Paid' THEN tbase ELSE 0 END) AS run_paid_sum,
        SUM(CASE WHEN status='Un Paid' THEN tbase ELSE 0 END) AS unpaid_sum
    FROM tgqot_bill
") or die(mysqli_error($link));
$billData = mysqli_fetch_assoc($result);

// 4. Consolidated data from knpayment
$paymentData = [];
$result = mysqli_query($link, "
    SELECT 
        COUNT(1) AS total_payments,
        SUM(recevied_amnt) AS received_sum,
        SUM(recevied_amnt1) AS received_sum1
    FROM tgpayment
") or die(mysqli_error($link));
$paymentData = mysqli_fetch_assoc($result);

// 5. Cancelled quotations
$cancelledCount = mysqli_fetch_assoc(mysqli_query($link, "SELECT COUNT(1) AS cancelled FROM add_tgqot WHERE wd='cancel'"))['cancelled'];
?>

	                            <div id="sparkline15" >
	                         <table class="table">
							        <th>TOTAL QUOTATIONS</th>
	                                <th>RO REQUIRED</th>
									
									<th>WORK TO BE STARTED</th>
									<th>REQUESTED AMOUNT LIST</th>
									<th>AMOUNT APPROVED LIST</th>
	                                <th>DOCUMENT REQ LIST</th>
									<th>TO BE RAISE INVOICE</th>
									<th>RAISED INVOICE</th>
									<th>PAYMENT PENDING INVOICE</th>
	                                <th>PAYMENT RECEIVED</th>
									<th>CANCELLED QUOTATIONS</th>
	                                
	                                
    <tr>
        <td><b style="color:white;"><?= $knqotData['total'] ?></b></td>
        <td><b style="color:white;"><?= $knqotData['ro_required_count'] ?></b></td>
        <td><b style="color:white;"><?= $knqotData['work_start_count'] ?></b></td>
        <td><b style="color:white;"><?= $requestData['req_amt_count'] ?></b></td>
        <td><b style="color:white;"><?= $requestData['approved_count'] ?></b></td>
        <td><b style="color:white;"><?= $requestData['doc_req_count'] ?></b></td>
        <td><b style="color:white;"><?= $billData['payment_pending_count'] ?></b></td>
        <td><b style="color:white;"><?= $billData['run_paid_count'] ?></b></td>
        <td><b style="color:white;"><?= $billData['unpaid_count'] ?></b></td>
        <td><b style="color:white;"><?= $paymentData['total_payments'] ?></b></td>
        <td><b style="color:white;"><?= $cancelledCount ?></b></td>
    </tr>
    <tr>
        <td><b style="color:white;"><?= number_format($knqotData['total_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($knqotData['ro_required_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($knqotData['work_start_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($requestData['req_amt_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($requestData['approved_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($requestData['doc_req_sum'], 2) ?></b></td>
        <td><b style="color:white;">0.00</b></td> <!-- Raised invoice count not tracked -->
        <td><b style="color:white;"><?= number_format($billData['run_paid_sum'], 2) ?></b></td>
        <td><b style="color:white;"><?= number_format($billData['unpaid_sum'], 2) ?></b></td>
        <td>
            <b style="color:white;"><?= number_format($paymentData['received_sum'], 2) ?></b><br>
            <b style="color:white;"><?= number_format($paymentData['received_sum1'], 2) ?></b>
        </td>
        <td><b style="color:white;"><?= number_format($knqotData['cancelled_sum'], 2) ?></b></td>
    </tr>


	                               
	                                   
	                            </table>
	                           
</div>
	                            
	                            </div>
	                             <div id="barChartContainer4" style="display: none;">
  <canvas id="barChart4"></canvas>
	                        </div>

<script>
document.getElementById('chartToggle4').addEventListener('change', function () {
    const table = document.getElementById('sparkline15');
    const chartContainer = document.getElementById('barChartContainer4');

    if (this.value === 'show1') {
        table.style.display = 'none';
        chartContainer.style.display = 'block';
        renderBarChart4(); // render chart
    } else {
        table.style.display = 'block';
        chartContainer.style.display = 'none';
    }
});

let chartInstance4;
function renderBarChart4() {
    const ctx = document.getElementById('barChart4').getContext('2d');

    if (chartInstance4) chartInstance4.destroy();

    chartInstance4 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Total Quotations', 'RO Required', 'Work to be Started',
                'Requested Amount', 'Approved Amount', 'Doc Request',
                'To Raise Invoice', 'Raised Invoice',
                'Payment Pending', 'Payments Received', 'Cancelled Quotations'
            ],
            datasets: [
                {
                    label: 'Count',
                    data: [
                        <?= $knqotData['total'] ?>,
                        <?= $knqotData['ro_required_count'] ?>,
                        <?= $knqotData['work_start_count'] ?>,
                        <?= $requestData['req_amt_count'] ?>,
                        <?= $requestData['approved_count'] ?>,
                        <?= $requestData['doc_req_count'] ?>,
                        <?= $billData['payment_pending_count'] ?>,
                        <?= $billData['run_paid_count'] ?>,
                        <?= $billData['unpaid_count'] ?>,
                        <?= $paymentData['total_payments'] ?>,
                        <?= $cancelledCount ?>
                    ],
                    backgroundColor: 'rgba(33, 150, 243, 0.7)',
                    yAxisID: 'yCounts'
                },
                {
                    label: 'Amount',
                    data: [
                        <?= $knqotData['total_sum'] ?? 0 ?>,
                        <?= $knqotData['ro_required_sum'] ?? 0 ?>,
                        <?= $knqotData['work_start_sum'] ?? 0 ?>,
                        <?= $requestData['req_amt_sum'] ?? 0 ?>,
                        <?= $requestData['approved_sum'] ?? 0 ?>,
                        <?= $requestData['doc_req_sum'] ?? 0 ?>,
                        0,
                        <?= $billData['run_paid_sum'] ?? 0 ?>,
                        <?= $billData['unpaid_sum'] ?? 0 ?>,
                        <?= ($paymentData['received_sum'] ?? 0) + ($paymentData['received_sum1'] ?? 0) ?>,
                        <?= $knqotData['cancelled_sum'] ?? 0 ?>
                    ],
                    backgroundColor: 'rgba(244, 67, 54, 0.7)',
                    yAxisID: 'yAmounts'
                }
            ]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false
            },
            scales: {
                yCounts: {
                    type: 'linear',
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Count'
                    },
                    beginAtZero: true
                },
                yAmounts: {
                    type: 'linear',
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Amount (₹)'
                    },
                    beginAtZero: true,
                    grid: {
                        drawOnChartArea: false
                    }
                }
            }
        }
    });
}

</script>
   
                            
	                    

						 

						<div class="analysis-box m-b-0 bg-fuchsia" style="width: 100%">
	                            <h3 class="text-white box-title">
								  <input type="submit" class="btn btn-info" style="font-weight: bold;" value="EXPENSES LIST" onclick="report1();"> 
								
						 <?php echo $lbc;?></span></h3>
	                             <div id="sparkline6"><canvas style="display: contents; width: 267px; height: 60px; vertical-align: top;"></canvas> 
	                       <table class="table">
                                    <th>STATES</th>
	                                <th>ANDHRA PRADESH</th>
									<th>KARNATAKA</th>
									<th>KERALA</th>
									<th>ODISHA</th>
	                                <th>TELANGANA</th> 
	                                <tr>
                                        <td>Total Expenses Quotations</td>
									<td><?php $p="select * from expenses where state='AP'";
									$k=mysqli_query($link,$p) or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k)."</b>";
									?> </td>
									<td><?php $p="select * from expenses where state='KN'";
									$k=mysqli_query($link,$p) or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k)."</b>";
									?> </td>
									<td><?php $p="select * from expenses where state='KL'";
									$k=mysqli_query($link,$p) or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k)."</b>";
									?> </td>
									<td><?php $p="select * from expenses where state='OD'";
									$k=mysqli_query($link,$p) or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k)."</b>";
									?> </td>
									<td><?php $p="select * from expenses where state='TS'";
									$k=mysqli_query($link,$p) or die(mysqli_error($link));
									echo "<b style='color:white;'>".mysqli_num_rows($k)."</b>";
									?> </td>
	                                </tr>
                                    <tr>
                                       <td> Approved Amount <i class="fa fa-inr" aria-hidden="true"></i> </td> 
	                                <td> <?php $query="select sum(amount) as total_amount from expenses where state='AP' and status = 'Approved'";
$result = mysqli_query($link, $query) or die("Query Failed: " . mysqli_error($link));

$row = mysqli_fetch_assoc($result);
$total = $row['total_amount'];

if ($total === null) {
    echo "<b style='color:white;'>0</b>"; 
} else {
    
    $rounded_total = number_format($total, 2);
    echo "<b style='color:white;'>" . $rounded_total . "</b>";
}

?></td>
                                    <td><?php $query="select sum(amount) as total_amount from expenses where state='KN' and status = 'Approved'";
$result = mysqli_query($link, $query) or die("Query Failed: " . mysqli_error($link));

$row = mysqli_fetch_assoc($result);
$total = $row['total_amount'];

if ($total === null) {
    echo "<b style='color:white;'>0</b>"; 
} else {
    
    $rounded_total = number_format($total, 2);
    echo "<b style='color:white;'>" . $rounded_total . "</b>";
}

?></td>
                                    <td><?php $query="select sum(amount) as total_amount from expenses where state='KL' and status = 'Approved'";
$result = mysqli_query($link, $query) or die("Query Failed: " . mysqli_error($link));

$row = mysqli_fetch_assoc($result);
$total = $row['total_amount'];

if ($total === null) {
    echo "<b style='color:white;'>0</b>"; 
} else {
    
    $rounded_total = number_format($total, 2);
    echo "<b style='color:white;'>" . $rounded_total . "</b>";
}

?></td>
                                    <td><?php $query="select sum(amount) as total_amount from expenses where state='OD' and status = 'Approved'";
$result = mysqli_query($link, $query) or die("Query Failed: " . mysqli_error($link));

$row = mysqli_fetch_assoc($result);
$total = $row['total_amount'];

if ($total === null) {
    echo "<b style='color:white;'>0</b>"; 
} else {
    
    $rounded_total = number_format($total, 2);
    echo "<b style='color:white;'>" . $rounded_total . "</b>";
}

?></td>
                                    <td><?php $query="select sum(amount) as total_amount from expenses where state='TS' and status = 'Approved'";
$result = mysqli_query($link, $query) or die("Query Failed: " . mysqli_error($link));

$row = mysqli_fetch_assoc($result);
$total = $row['total_amount'];

if ($total === null) {
    echo "<b style='color:white;'>0</b>"; 
} else {
    
    $rounded_total = number_format($total, 2);
    echo "<b style='color:white;'>" . $rounded_total . "</b>";
}

?></td>
                                    </tr>
                                    <tr>
                                        <td> Pending Amount <i class="fa fa-inr" aria-hidden="true"></i>  </td>
	                                <td><?php $query="select sum(amount) as total_amount from expenses where state='AP' and status = 'Pending'";
$result = mysqli_query($link, $query) or die("Query Failed: " . mysqli_error($link));

$row = mysqli_fetch_assoc($result);
$total = $row['total_amount'];

if ($total === null) {
    echo "<b style='color:white;'>0</b>"; 
} else {
    
    $rounded_total = number_format($total, 2);
    echo "<b style='color:white;'>" . $rounded_total . "</b>";
}

?></td>
                                    <td><?php $query="select sum(amount) as total_amount from expenses where state='KN' and status = 'Pending'";
$result = mysqli_query($link, $query) or die("Query Failed: " . mysqli_error($link));

$row = mysqli_fetch_assoc($result);
$total = $row['total_amount'];

if ($total === null) {
    echo "<b style='color:white;'>0</b>"; 
} else {
    
    $rounded_total = number_format($total, 2);
    echo "<b style='color:white;'>" . $rounded_total . "</b>";
}

?></td>
                                    <td><?php $query="select sum(amount) as total_amount from expenses where state='KL' and status = 'Pending'";
$result = mysqli_query($link, $query) or die("Query Failed: " . mysqli_error($link));

$row = mysqli_fetch_assoc($result);
$total = $row['total_amount'];

if ($total === null) {
    echo "<b style='color:white;'>0</b>"; 
} else {
    
    $rounded_total = number_format($total, 2);
    echo "<b style='color:white;'>" . $rounded_total . "</b>";
}

?></td>
                                    <td><?php $query="select sum(amount) as total_amount from expenses where state='OD' and status = 'Pending'";
$result = mysqli_query($link, $query) or die("Query Failed: " . mysqli_error($link));

$row = mysqli_fetch_assoc($result);
$total = $row['total_amount'];

if ($total === null) {
    echo "<b style='color:white;'>0</b>"; 
} else {
    
    $rounded_total = number_format($total, 2);
    echo "<b style='color:white;'>" . $rounded_total . "</b>";
}

?></td>
                                    <td><?php $query="select sum(amount) as total_amount from expenses where state='TS' and status = 'Pending'";
$result = mysqli_query($link, $query) or die("Query Failed: " . mysqli_error($link));

$row = mysqli_fetch_assoc($result);
$total = $row['total_amount'];

if ($total === null) {
    echo "<b style='color:white;'>0</b>"; 
} else {
    
    $rounded_total = number_format($total, 2);
    echo "<b style='color:white;'>" . $rounded_total . "</b>";
}

?></td>
                                    </tr>
	                                
	                            </table></div>
	                        </div>
	                    </div>
                     

					
						</div>
                           <hr/>
						
						
                                
								<!-- PAGE CONTENT ENDS -->
						
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
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	</body>
</html>

<?php 

}else
{
include 'dashboard1.php';
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>