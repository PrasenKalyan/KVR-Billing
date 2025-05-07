<?php //include('config.php');
include('dbconnection/connectionconcept.php');
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
//require('db_config.php');
	
if(isset($_POST['submit'])){
	$mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
	if(in_array($_FILES["file"]["type"],$mimes)){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		  $month=$_POST['month'];
		  $year=$_POST['year'];
		$uploadFilePath = 'upload/'.basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

		$Reader = new SpreadsheetReader($uploadFilePath);

		$totalSheet = count($Reader->sheets());

		 "You have total ".$totalSheet." sheets".

		$html="<table border='1'>";
		$html.="<tr><th>Title</th><th>Description</th></tr>";

		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++){

			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
	        {
	        	$html.="<tr>";
				/* Check If sheet not emprt */
		        $ename = isset($Row[0]) ? $Row[0] : '';
				 $empid = isset($Row[1]) ? $Row[1] : '';
				//$item_desc = isset($Row[2]) ? $Row[2] : '';
				 //$item_desc = isset($Row[2]) ? str_replace('?',' ',utf8_decode($Row[2])): '';
				$basic = isset($Row[2]) ? $Row[2] : '';
				$others = isset($Row[3]) ? $Row[3] : '';
				$pf = isset($Row[4]) ? $Row[4] : '';
				$pt = isset($Row[5]) ? $Row[5] : '';
				$esi = isset($Row[6]) ? $Row[6] : '';
				$pfec = isset($Row[7]) ? $Row[7] : '';
				$pfes = isset($Row[8]) ? $Row[8] : '';
				$loc = isset($Row[9]) ? $Row[9] : '';
				$bank = isset($Row[10]) ? $Row[10] : '';
				$pf1 = isset($Row[11]) ? $Row[11] : '';
				$uan = isset($Row[12]) ? $Row[12] : '';
				$esi1 = isset($Row[13]) ? $Row[13] : '';
				$ac = isset($Row[14]) ? $Row[14] : '';
				$desg = isset($Row[15]) ? $Row[15] : '';
				$bonus = isset($Row[16]) ? $Row[16] : '';
				$oben = isset($Row[17]) ? $Row[17] : '';
				
			$html.="<td>".$i."</td>";
				 $html.="<td>".$ename."</td>";
				$html.="<td>".$empid."</td>";
				$html.="<td>".$basic."</td>";
				$html.="<td>".$others."</td>";
				$html.="<td>".$pf."</td>";
				$html.="<td>".$pt."</td>";
				$html.="<td>".$esi."</td>";
				$html.="<td>".$pfec."</td>";
				$html.="<td>".$loc."</td>";
				$html.="<td>".$bank."</td>";
				$html.="<td>".$pf1."</td>";
				$html.="<td>".$uan."</td>";
				$html.="<td>".$esi."</td>";
				$html.="<td>".$ac."</td>";
					$html.="<td>".$desg."</td>";
						$html.="<td>".$bonus."</td>";
							$html.="<td>".$oben."</td>";
				
				
				$html.="</tr>";

				 $q="select * from salarymonthwise where month='$month'  and year='$year' and email='$empid' ";
				
				$p=mysqli_query($link,$q) or die(mysqli_error($link));
				//$p=$link->query($q);
				$c=mysqli_num_rows($p);
				$r=mysqli_fetch_array($p);
				 $month1=addslashes($r['month'])."<br/>";
				$year1=$r['year']."<br/>";
				$email1=$r['email']."<br/>";
				$month1=$month;
				$year1=$year;
				$email1=$empid;
				
				
				if( $c > 0 ){
					//echo 'hi';
				
						
								 $m="update salarymonthwise set  name ='".addslashes($ename)."' ,basic='$basic', others='$others',pf='$pf', pt='$pt',esi='$esi',pfec='$pfec',
								pfes='$pfes',location='$loc',bank_name='$bank',pf_no='$pf1',pf_uan='$uan',esi_no1='$esi1',ac_num='$ac',designation='$desg',bonus='$bonus',oben='$oben'    where email='$email1' and month='$month1' and year='$year1' ";
					//$rt=mysqli_query($link,$m) or die(mysqli_error($link));
						$link->query($m);
							
						
				}else{
				
				if( ($ename!='Name') and ($ename!='') ){
								//$query = "insert into items(title,description) values('".$title."','".$description."')";
	   $query = "insert into salarymonthwise(name,email,basic,others,month,year,pf,pt,esi,pfec,pfes,location,bank_name,pf_no,pf_uan,esi_no1,ac_num,designation,bonus,oben)
							values('".$ename."','".$empid."','".addslashes($basic)."','".$others."',
							'".$month."','".$year."','".$pf."','".$pt."','".$esi."',
							'".$pfec."','".$pfes."','".$loc."','".$bank."','".$pf1."','".$uan."','".$esi1."','".$ac."','".$desg."','".$bonus."','".$oben."')";     
    
	 //$res=mysql_query($ten_ins) or die(mysql_error());
				$link->query($query);
				
							}	else{}
							
				
				}
				
				
				
	        }

		}

		$html.="</table>";
		
		
	//	echo $html;

		echo "<br />Data Inserted in dababase";
			print "<script>";
            print "alert('Successfully Registred ');";
			print "self.location='uploadempsalary.php';";
			print "</script>";

	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
	}

}

?>