<?php include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
 $tsname=$_GET['user'];
//$datatable="add_klqot";
include('dbconnection/connection.php');
	$state=$_GET['state'];

	if($state=='AP'){

		$qotbill ='qot_bill';
		$request_amnt ='request_amnt';
       
	}
	elseif($state=='TG'){
		$qotbill ='tgqot_bill';	
		$request_amnt ='tgrequest_amnt'; 
	}
	 elseif($state=='TN'){
	  $qotbill ='tnqot_bill';
	  $request_amnt ='tnrequest_amnt';	
	}
	elseif($state=='KL'){
		$qotbill ='klqot_bill';  
		$request_amnt ='klrequest_amnt';
	}
	else if($state=='KN'){
	  $qotbill ='knqot_bill';  
	  $request_amnt ='knrequest_amnt';  	
	}
	elseif($state=='OD'){
	  $qotbill ='odqot_bill';
	  $request_amnt ='odrequest_amnt';
	}
	 if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname==$state.'billing')){
		 $y="select * from ".$qotbill." where status='RUn Paid' ";
		 }else{
		 $y="select * from ".$qotbill." where status='RUn Paid' and user='$tsname' ";
		}

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:X1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:X1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
 $objPHPExcel->getActiveSheet()->getStyle("A1:X1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JTECHMO ASSOCIATES');
 $objPHPExcel->getActiveSheet()->getStyle("A1:X1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:X4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:X4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
        $objPHPExcel->getActiveSheet()->getStyle("A4:X4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A4', $state.' Raised Invoice LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:X4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Inv Number');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Qut Num');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Inv Date');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Inv Sub Date');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Serv Period');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'Inv Sub Mon');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'State');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', 'Fomate');
$objPHPExcel->getActiveSheet()->SetCellValue('J6', 'Gst 28%');
$objPHPExcel->getActiveSheet()->SetCellValue('K6', 'Gst 18%');
$objPHPExcel->getActiveSheet()->SetCellValue('L6', 'Gst 12%');
$objPHPExcel->getActiveSheet()->SetCellValue('M6', 'Gst 5%');
$objPHPExcel->getActiveSheet()->SetCellValue('N6', 'Gst 0%');
$objPHPExcel->getActiveSheet()->SetCellValue('O6', 'Total Base');
$objPHPExcel->getActiveSheet()->SetCellValue('P6', 'Gst(28%) Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('Q6', 'Gst(18%) Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('R6', 'Gst(12%) Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('S6', 'Gst(5%) Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('T6', 'Gst(0%) Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('U6', 'Total Gst');
$objPHPExcel->getActiveSheet()->SetCellValue('V6', 'Total Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('W6', 'Ageing');
$objPHPExcel->getActiveSheet()->SetCellValue('X6', 'User');
$objPHPExcel->getActiveSheet()->getStyle("A6:X6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
       // $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(14);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(16);
		$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(10);
         $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(22);
 
$objPHPExcel->getActiveSheet()->getStyle("A6:X6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result			=	$db->query($y) or die(mysql_error());
$i=1;
$rowCount	=	7;
while($row	=	$result->fetch_assoc()){
    
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['inv_num'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($scode=$row['quet_num'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['inv_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['inv_sub_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row['speriod'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['inv_sub_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($state,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($row['ftype'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($gst28=$row['gst28'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($gst18=$row['gst18'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($gst12=$row['gst12'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper($gst5=$row['gst5'],'UTF-8'));
	
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($gst0=$row['gst0'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($tbase=$row['tbase'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, mb_strtoupper($g28=($gst28*28)/100,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, mb_strtoupper($g18=($gst18*18)/100,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, mb_strtoupper($g12=($gst12*12)/100,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, mb_strtoupper($g5=($gst5*5)/100,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, mb_strtoupper($g0=($gst0*0)/100,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, mb_strtoupper($gtot=$g28+$g18+$g12+$g5+$g0,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, mb_strtoupper($tbase+$gtot,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, mb_strtoupper(	
	((strtotime(date('Y-m-d'))-(strtotime($row['inv_date'])))/60/60/24)+1,'UTF-8'));	
	$objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, mb_strtoupper($row['user'],'UTF-8'));
	$rowCount++;
$i++; }
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$state.'-raisedinvoicelist.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>