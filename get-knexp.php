<?php
include('dbconnection/connection.php');
?>

<?php
$q=$_GET["q"];

// $quote_no = mysqli_real_escape_string($link, $_POST['quet_no']);

// $query = "SELECT bal FROM add_knqot WHERE quet_num = '$quote_no' & status = 'Request Amount'";
    $query = "
    SELECT adv_amnt FROM add_knqot WHERE quet_num = '$q'
    UNION
    SELECT adv_amnt FROM add_qot WHERE quet_num = '$q'
    UNION
    SELECT adv_amnt FROM add_tgqot WHERE quet_num = '$q'
    UNION
    SELECT adv_amnt FROM add_klqot WHERE quet_num = '$q'
    UNION
    SELECT adv_amnt FROM add_odqot WHERE quet_num = '$q'
";

    $result = mysqli_query($link, $query);


while($row = mysqli_fetch_array($result))
  {
    echo ":" .  $row['adv_amnt'];
 
  }

?>     