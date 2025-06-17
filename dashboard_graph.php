<?php
// Counts
$totalQuotations = mysqli_num_rows(mysqli_query($link, "SELECT * FROM add_knqot"));
$roRequiredCount = mysqli_num_rows(mysqli_query($link, "SELECT * FROM add_knqot WHERE status = 'Ro Required'"));
$workStartCount = mysqli_num_rows(mysqli_query($link, "SELECT * FROM add_knqot WHERE status = 'work to be started'"));
$pendingCount = mysqli_num_rows(mysqli_query($link, "SELECT DISTINCT quet_num FROM knrequest_amnt WHERE confirm='Pending'"));
$confirmedCount = mysqli_num_rows(mysqli_query($link, "SELECT * FROM knrequest_amnt WHERE confirm='Yes' AND status=''"));
$transferredOrCancelledCount = mysqli_num_rows(mysqli_query($link, "SELECT DISTINCT quet_num FROM knrequest_amnt WHERE (status='Amount Transferred' AND bill_status='') OR docr_status='Cancel'"));
$raisedInvoiceCount = mysqli_num_rows(mysqli_query($link,"SELECT * FROM add_knqot WHERE status='Raised Invoice List'"));
$countRunPaid = mysqli_num_rows(mysqli_query($link, "SELECT * FROM knqot_bill WHERE status='RUn Paid'"));
$countUnPaid = mysqli_num_rows(mysqli_query($link, "SELECT * FROM knqot_bill WHERE status='Un Paid'"));
$countPayments = mysqli_num_rows(mysqli_query($link, "SELECT * FROM knpayment"));
$countCancelled = mysqli_num_rows(mysqli_query($link, "SELECT * FROM add_knqot WHERE wd='cancel'"));

// Amounts
$roRequiredAmount = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(tot_base) AS total FROM add_knqot WHERE status = 'Ro Required'"))['total'] ?? 0;
$workStartAmount = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(tot_base) AS total FROM add_knqot WHERE status = 'work to be started'"))['total'] ?? 0;
$pendingAmount = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(req_amnt) AS total FROM knrequest_amnt WHERE confirm='Pending'"))['total'] ?? 0;
$confirmedAmount = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(req_amnt) AS total FROM knrequest_amnt WHERE confirm='Yes' AND status=''"))['total'] ?? 0;
$transferredOrCancelledAmount = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(req_amnt) AS total FROM knrequest_amnt WHERE (status='Amount Transferred' AND bill_status='') OR docr_status='Cancel'"))['total'] ?? 0;
$raisedInvoiceAmount = mysqli_fetch_assoc(mysqli_query($link,"SELECT SUM(tot_base) AS total_amount FROM add_knqot WHERE status='Raised Invoice List'"))['total_amount'] ?? 0;
$amountRunPaid = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(tbase) AS total FROM knqot_bill WHERE status='RUn Paid'"))['total'] ?? 0;
$amountUnPaid = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(tbase) AS total FROM knqot_bill WHERE status='Un Paid'"))['total'] ?? 0;

$amountReceived1 = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(recevied_amnt) AS total FROM knpayment"))['total'] ?? 0;
$amountReceived2 = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(recevied_amnt1) AS total FROM knpayment"))['total'] ?? 0;
$totalReceived = $amountReceived1 + $amountReceived2;

$amountCancelled = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(tot_base) AS total FROM add_knqot WHERE status='work to be started' AND wd='cancel'"))['total'] ?? 0;
?>
<h3 style="text-align:center; font-weight:bold; margin-bottom:10px;">Karnataka - Quotation Status Overview</h3>
<canvas id="quotationBarChart" style="max-width: 800px; height: 400px;"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('quotationBarChart').getContext('2d');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            'Total Quotations', 'RO Required', 'Work to be Started',
            'Requested Amount', 'Confirmed (No Status)', 'Amount Transferred / Cancelled',
            'Raised Invoice', 'RUn Paid', 'Un Paid',
            'Total Payments Received', 'Cancelled Quotations'
        ],
        datasets: [
            {
                label: 'Quotation Count',
                data: [
                    <?php echo $totalQuotations; ?>,
                    <?php echo $roRequiredCount; ?>,
                    <?php echo $workStartCount; ?>,
                    <?php echo $pendingCount; ?>,
                    <?php echo $confirmedCount; ?>,
                    <?php echo $transferredOrCancelledCount; ?>,
                    <?php echo $raisedInvoiceCount; ?>,
                    <?php echo $countRunPaid; ?>,
                    <?php echo $countUnPaid; ?>,
                    <?php echo $countPayments; ?>,
                    <?php echo $countCancelled; ?>
                ],
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Amount (₹)',
                data: [
                    0, // Total Quotations doesn't have an amount
                    <?php echo $roRequiredAmount; ?>,
                    <?php echo $workStartAmount; ?>,
                    <?php echo $pendingAmount; ?>,
                    <?php echo $confirmedAmount; ?>,
                    <?php echo $transferredOrCancelledAmount; ?>,
                    <?php echo $raisedInvoiceAmount; ?>,
                    <?php echo $amountRunPaid; ?>,
                    <?php echo $amountUnPaid; ?>,
                    <?php echo $totalReceived; ?>,
                    <?php echo $amountCancelled; ?>
                ],
                backgroundColor: 'rgba(255, 99, 132, 0.7)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
            tooltip: { mode: 'index', intersect: false }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return value.toLocaleString("en-IN"); // adds commas like 1,00,000
                    }
                }
            }
        }
    }
});
</script>

<?php

$id = $_REQUEST['id'];
$query = mysqli_query($link, "SELECT tot_base FROM add_knqot WHERE quet_num = '$id'");
$r1 = mysqli_fetch_assoc($query);
$tot_base = $r1['tot_base'];
?>
										<tr>
  <td align="right">Total Base Amount</td>
  <td align="left">
    <input type="text" name="tot_base" id="tot_base" class="form-control" readonly 
           value="<?php echo $tot_base; ?>">
  </td>
  
</tr>


<?php
// Counts
$totalQuotations = mysqli_num_rows(mysqli_query($link, "SELECT * FROM add_tgqot"));
$roRequiredCount = mysqli_num_rows(mysqli_query($link, "SELECT * FROM add_tgqot WHERE status = 'Ro Required'"));
$workStartCount = mysqli_num_rows(mysqli_query($link, "SELECT * FROM add_tgqot WHERE status = 'work to be started'"));
$pendingCount = mysqli_num_rows(mysqli_query($link, "select distinct quet_num from tgrequest_amnt where confirm='Pending'"));
$confirmedCount = mysqli_num_rows(mysqli_query($link, "SELECT * FROM tgrequest_amnt WHERE confirm='Yes' AND status=''"));
$transferredOrCancelledCount = mysqli_num_rows(mysqli_query($link, "SELECT DISTINCT quet_num FROM tgrequest_amnt WHERE (status='Amount Transferred' AND bill_status='') OR docr_status='Cancel'"));
$raisedInvoiceCount = mysqli_num_rows(mysqli_query($link,"select * from tgqot_bill where status='payment pending'"));
$countRunPaid = mysqli_num_rows(mysqli_query($link, "SELECT * FROM tgqot_bill WHERE status='RUn Paid'"));
$countUnPaid = mysqli_num_rows(mysqli_query($link, "SELECT * FROM tgqot_bill WHERE status='Un Paid'"));
$countPayments = mysqli_num_rows(mysqli_query($link, "SELECT * FROM tgpayment"));
$countCancelled = mysqli_num_rows(mysqli_query($link, "SELECT * FROM add_tgqot WHERE wd='cancel'"));

// Amounts
$totalQuotationsAmount = mysqli_fetch_assoc(mysqli_query($link, "SELECT sum(tot_base) as total FROM add_tgqot"));
$roRequiredAmount = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(tot_base) AS total FROM add_tgqot WHERE status = 'Ro Required'"))['total'] ?? 0;
$workStartAmount = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(tot_base) AS total FROM add_tgqot WHERE status = 'work to be started'"))['total'] ?? 0;
$pendingAmount = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(req_amnt) AS total FROM tgrequest_amnt WHERE confirm='Pending'"))['total'] ?? 0;
$confirmedAmount = mysqli_fetch_assoc(mysqli_query($link, "select sum(tot_base) AS total from add_tgqot where status='Approved Amount'"))['total'] ?? 0;
$transferredOrCancelledAmount = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(req_amnt) AS total FROM tgrequest_amnt WHERE (status='Amount Transferred' AND bill_status='' OR docr_status='Cancel'"))['total'] ?? 0;
$raisedInvoiceAmount = mysqli_fetch_assoc(mysqli_query($link,"select sum(tot_base) AS total_amount from add_tgqot where status='To Be Raise Invoice'"))['total_amount'] ?? 0;
$amountRunPaid = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(tbase) AS total FROM tgqot_bill WHERE status='RUn Paid'"))['total'] ?? 0;
$amountUnPaid = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(tbase) AS total FROM tgqot_bill WHERE status='Un Paid'"))['total'] ?? 0;

$amountReceived1 = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(recevied_amnt) AS total FROM tgpayment"))['total'] ?? 0;
$amountReceived2 = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(recevied_amnt1) AS total FROM tgpayment"))['total'] ?? 0;
$totalReceived = $amountReceived1 + $amountReceived2;

$amountCancelled = mysqli_fetch_assoc(mysqli_query($link, "SELECT SUM(tot_base) AS total FROM add_tgqot WHERE  status = 'work to be started' and wd='cancel' "))['total'] ?? 0;
?>
<canvas id="TelanganaquotationBarChart" style="max-width: 800px; height: 400px;"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.getElementById("chartToggle4").addEventListener("change", function () {
    const chartContainer = document.getElementById("TelanganabarChartContainer");

    if (this.value === "show4") {
        chartContainer.style.display = "block";
        renderDualBarChart4(); // render chart only when shown
    } else {
        chartContainer.style.display = "none";
    }
});

function renderDualBarChart4() {
    const ctx = document.getElementById('TelanganaquotationBarChart').getContext('2d');

    if (window.dualBarInstance) {
        window.dualBarInstance.destroy(); // Destroy old chart
    }

    window.dualBarInstance = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Total Quotations', 'RO Required', 'Work to be Started',
                'Requested Amount List', 'Amount Approved List', 'Document Required List',
                'To Be Raise Invoice', 'Raised Invoice List', 'Payment Pending Invoice',
                'Payment Received', 'Cancelled Quotations'
            ],
            datasets: [
                {
                    label: 'Quotation Count',
                    data: [
                        <?php echo $totalQuotations; ?>,
                        <?php echo $roRequiredCount; ?>,
                        <?php echo $workStartCount; ?>,
                        <?php echo $pendingCount; ?>,
                        <?php echo $confirmedCount; ?>,
                        <?php echo $transferredOrCancelledCount; ?>,
                        <?php echo $raisedInvoiceCount; ?>,
                        <?php echo $countRunPaid; ?>,
                        <?php echo $countUnPaid; ?>,
                        <?php echo $countPayments; ?>,
                        <?php echo $countCancelled; ?>
                    ],
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Amount (₹)',
                    data: [
                        
						<?php echo $totalQuotationsAmount; ?>,
                        <?php echo $roRequiredAmount; ?>,
                        <?php echo $workStartAmount; ?>,
                        <?php echo $pendingAmount; ?>,
                        <?php echo $confirmedAmount; ?>,
                        <?php echo $transferredOrCancelledAmount; ?>,
                        <?php echo $raisedInvoiceAmount; ?>,
                        <?php echo $amountRunPaid; ?>,
                        <?php echo $amountUnPaid; ?>,
                        <?php echo $totalReceived; ?>,
                        <?php echo $amountCancelled; ?>
                    ],
                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                tooltip: { mode: 'index', intersect: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value) {
                            return value.toLocaleString("en-IN");
                        }
                    }
                }
            }
        }
    });
}
</script>