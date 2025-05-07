<?php
include('dbconnection/connection1.php');
$keyword=$_GET["keyword"];
$id=$_GET["id"];

    $query =mysqli_query($link,"SELECT distinct company_name  FROM   dpr WHERE state='KL' and company_name LIKE '%$keyword%'  LIMIT 0,10");
?>
<ul id="country-list">
<?php
while(	$row=mysqli_fetch_array($query)){
?>
<li onClick="selectCountry('<?php echo $row["company_name"];?>','<?php echo $id;?>');"><?php echo $row["company_name"];?></li>
<?php } ?>
</ul>