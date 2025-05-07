<?php
include('dbconnection/connection.php');
$keyword=$_GET["keyword"];
$id=$_GET["id"];

    $query =mysqli_query($link,"SELECT distinct name  FROM   ac_det WHERE   name LIKE '%$keyword%'  LIMIT 0,10");
?>
<ul id="country-list">
<?php
while(	$row=mysqli_fetch_array($query)){
?>
<li onClick="selectCountry('<?php echo $row["name"];?>','<?php echo $id;?>');"><?php echo $row["name"];?></li>
<?php } ?>
</ul>