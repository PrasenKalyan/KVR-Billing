
<?php
include('dbconnection/connection.php');
$rid=$_REQUEST['id'];
// $q=$_REQUEST['q'];
	$s=mysqli_query($link,"update add_qot set wd ='cancel' where quet_num ='$rid'");
if($s){
        	print "<script>";
			print "alert('Status Sucessfully Updated');";
			print "self.location='wtsqot_list.php';";
			print "</script>";
}

?>

<?php
// include('dbconnection/connection.php');

// $id = $_POST['id'];
// $status = $_POST['status'];

// if (in_array($status, ['approved', 'cancelled'])) {
//     $stmt = $link->prepare("UPDATE add_knqot SET status = ? WHERE id = ?");
//     $stmt->bind_param("si", $status, $id);
    
//     if ($stmt->execute()) {
//         echo "Status updated to $status";
//     } else {
//         echo "Failed to update";
//     }
//     $stmt->close();
// } else {
//     echo "Invalid status";
// }
?>




