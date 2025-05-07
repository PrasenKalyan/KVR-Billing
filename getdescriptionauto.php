<?php
include('dbconnection/connection.php');
$keyword=$_GET["keyword"];
$id=$_GET["id"];

    $query =mysqli_query($link,"SELECT   mdescription  FROM   ritems WHERE mdescription LIKE '$keyword%' ");
?>
<ul id="country-list">
<?php
while(	$row=mysqli_fetch_array($query)){
?>
<li onClick="selectCountry('<?php echo $row["mdescription"];?>','<?php echo $id;?>');"><?php echo $row["mdescription"];?></li>
<?php } ?>
</ul>