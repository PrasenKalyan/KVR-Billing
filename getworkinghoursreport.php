<?php
// $conn = mysqli_connect("localhost", "ospsgw8u_admin", "Accentel@2023", "ospsgw8u_jtechnoapp") or die("unable to connect to database");
 require ('dbconnection/connection.php');
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }

error_reporting(E_ALL);
//getting id of the data from url
$from_date=$_REQUEST['from_date'];
$to_date='';
if(isset($_REQUEST['todate']))
$to_date=$_REQUEST['todate'];
$emparray=$_REQUEST['emp_name'];
if($emparray)
for ($k = 0; $k < count($emparray); $k++)
{
    if($k==0)
    $emplist="'".$emparray[$k]."'";
    else
    $emplist=$emplist.','."'".$emparray[$k]."'";
}

?>
<div class="btn-group pull-right">
	<button type="button" data-toggle="dropdown">Export <span class="caret"></span></button>
	<ul class="dropdown-menu" role="menu">
	<li><a class="dataExport" data-type="excel">XLS</a></li>    
	</ul>
</div>
<style>
    table, th, td {
  border: 1px solid black;
   border-collapse: collapse;
   padding:5px;
}
</style>
<p><b>Date: <?php echo $from_date;?></b></p>
<table id="dataTable" style="border: 1px solid black;" class="table table-striped" width="100%">
    <thead>
        <th>Sno</th>
        <th>Employee id</th>
        <th>Employee Name</th>
        <th>Login Time</th>
        <th>Logout Time</th>
        <th>Total Working Hours</th>
       
    </thead>
       <tbody>
<?php 
//$a="select distinct(tb.uid),tb.* from (select distinct (v1.id) as uid, 'Andhra Pradesh' as circle,'BSRV Prasad' as nameofvendor,'' as tot,v1.tsite as sapid,dp1.windspeed as ws, dp1.scope as scope, dp1.mpname as mp, dp1.allocationdate as siteallocatedate, dp1.sitename as sitename, dp1.pname as sitetype,dp1.sbc as sbc, dp1.towertype as towertype,dp1.theight as ttype,v.ogp as ogpno,v.ogpdate as ogbt,v.vtype as typeofvehicle,'' as typeofmaterial,v.tweight as twm,'' as load1,'' as distanceinkm,'' as extdakm,v1.date as datep,'' as dateun,v.price as rate,v.tamt as amount,case when w.name is null then v1.fsite else w.name end as fromsite,v1.tsite as tosite, case when w.latitude is null then dp.latitude else w.latitude end as fsitelat ,case when w.longitude is null then dp.longitude else w.longitude end as fsitelon,dp1.latitude as tsitelat,dp1.longitude as tsitelon,v1.kms as tkms from vtrack1 v1 left join vtrack v on v.id=v1.id1 left join warehouse w on w.id=v1.fsite  left join dpr dp on v1.fsite=dp.siteid left join dpr dp1 on v1.tsite=dp1.siteid where v.date between '$from_date' and '$to_date')tb";
$a="SELECT uploadby,phoneno,empid,datecheck,min(time) as time,checkoutdate,max(checkoutime) as checkoutime from request where phoneno in ($emplist) and datecheck ='$from_date' group by empid ";
$result = mysqli_query($conn,$a);
$i=1;
while( $row=mysqli_fetch_array($result)){
    
     $time1 = strtotime($row['time']);
$time2 = strtotime($row['checkoutime']);
$difference = round(abs($time2 - $time1) / 3600,2);
$date1 = new DateTime($row['datecheck'].' '.$row['time']); 


$date2 = new DateTime($row['checkoutdate'].' '.$row['checkoutime']);
$diff = $date1->diff($date2);

    ?>

  <tr>
        <td> <?php echo $i?></td>
        <td> <?php echo strtoupper($row['empid']);?></td>
        <td> <?php echo $row['uploadby'];?></td>
        <td> <?php echo $row['datecheck'].' '.$row['time'];?></td>
        <td> <?php echo $row['checkoutdate'].' '.$row['checkoutime'];?></td>
        <td> <?php  if($row['checkoutime'] == null) echo "-"; else echo $diff->format( '%d days, %h hours, %i minutes ');?></td>
        
      
  </tr>  
    
<?php
$i++;    
}
?>
   <tbody>
</table>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="tableExport/tableExport.js"></script>
<script type="text/javascript" src="tableExport/jquery.base64.js"></script>
<script src="tableExport/export.js"></script>