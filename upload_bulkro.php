<?php //include('config.php');
include('dbconnection/connection1.php');
include('dbconnection/connection.php');
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
// require('PHPexcel.php');
$state=$_GET['state'];
//require('db_config.php');
if(isset($_POST['submit'])){
	$mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
	
	if(in_array($_FILES["file"]["type"],$mimes)){

	
    $state=$_GET['state'];
	if($state=='AP'){
		$qottable ='add_qot';
	}
	  elseif($state=='TG'){
		$qottable ='add_tgqot';
	  }
	   elseif($state=='TN'){
		$qottable ='add_tngqot';
	  }
	  elseif($state=='KL'){
		$qottable ='add_klqot';
	  }
	  else if($state=='KN'){
		$qottable ='add_knqot';
	  }
	  elseif($state=='OD'){
		$qottable ='add_odqot';
	  }
		
				$uploadFilePath = 'upload/'.basename($_FILES['file']['name']);
		      move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

		$Reader = new SpreadsheetReader($uploadFilePath);
         $totalSheet = count($Reader->sheets());
		$html="<table border='1'>";

		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++){

			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
	        {
						$html.="<tr>";

						/* Check If sheet not emprt */
					$qutno = isset($Row[1]) ? $Row[1] : '';
					$potype= isset($Row[2]) ? $Row[2] : '';
					$ponum= isset($Row[3]) ? $Row[3] : '';
					$ronum= isset($Row[5]) ? $Row[5] : '';
						$rodate = isset($Row[6]) ? $Row[6] : '';
						$podate = isset($Row[7]) ? $Row[7] : '';
						$html.="</tr>";
						if($ronum!='' and $ronum!='0'){
							$status='work to be started';
							
						} else if($ponum!='' and $ponum!='0'){
							$status='work to be started';
						} else {
							$status='Ro Required';
						}
						
					if( ($qutno!= '') and  ($ponum!= '' ) and ($ronum!= '' ) ){	
											
					echo	$m="update " .$qottable." set po_type='$potype',
						po_no='$ponum',ro_no='$ronum',ro_date='$rodate',po_date='$podate',status='$status' where  quet_num='$qutno' and status='Ro Required'";
				
						$link->query($m);

					}	        

		   }
	    }
		$html.="</table>";
		
		//exit;
		//echo "<br />Data Inserted in dababase";
		
		print "<script>";
			print "alert('Successfully Uploaded');";
			print "self.location='roqot_list.php?state=$state';";
			print "</script>";
		
	}
	else{
		die("<script>
		alert('Sorry!, You have to upload only excel file');
		self.location='bulk_ro_update.php?state=$state';
		</script>");
	}
	
}

?>