<?php include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
$tsname=$_GET['user'];
 include('dbconnection/connection.php');
	$state=$_GET['state'];

	if($state=='AP'){
		$qottable ='add_qot';
		$qotbill ='qot_bill';
		$request_amnt ='request_amnt';
       
	}
	elseif($state=='TG'){
		$qottable ='add_tgqot';
		$qotbill ='tgqot_bill';
		$request_amnt ='tgrequest_amnt';

	 
	}
	 elseif($state=='TN'){
	  $qottable ='add_tnqot';
	  $qotbill ='tnqot_bill';
	  $request_amnt ='tnrequest_amnt';
	
	}
	elseif($state=='KL'){
		$qottable ='add_klqot';
		$qotbill ='klqot_bill';
		$request_amnt ='klrequest_amnt';	
	  
	}
	else if($state=='KN'){
	  $qottable ='add_knqot';
	  $qotbill ='knqot_bill';
	  $request_amnt ='knrequest_amnt';
      	
	}
	elseif($state=='OD'){
	  $qottable ='add_odqot';
	  $qotbill ='odqot_bill';
	  $request_amnt ='odrequest_amnt';	
	}
    if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname==$state.'billing') or ($tsname=='Srujith.Nimmagadda') or ($tsname=='naiduys')){
        $y="SELECT * FROM ".$qotbill." where status='payment pending'   ";
             }else{ 
        $y="SELECT * FROM ".$qotbill." where status='payment pending' and user='$tsadmin'  "; 
            }
$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:Q1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:Q1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
 $objPHPExcel->getActiveSheet()->getStyle("A1:Q1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JTECHNO ASSOCIATES');
 $objPHPExcel->getActiveSheet()->getStyle("A1:Q1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:Q4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:Q4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
        $objPHPExcel->getActiveSheet()->getStyle("A4:Q4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A4', $state.'TO BE RAISE QUOTATION LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:Q4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Quotation No');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Invoice Number');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Note');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Service Period');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Total Base Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', '28 % Gst');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', '18 % Gst');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', '12 % Gst');
$objPHPExcel->getActiveSheet()->SetCellValue('J6', '5 % Gst');
$objPHPExcel->getActiveSheet()->SetCellValue('K6', '0 % Gst');
$objPHPExcel->getActiveSheet()->SetCellValue('L6', 'Total Gst');
$objPHPExcel->getActiveSheet()->SetCellValue('M6', 'Final Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('N6', 'Bill Received Date');
$objPHPExcel->getActiveSheet()->SetCellValue('O6', 'Invoice Date');
$objPHPExcel->getActiveSheet()->SetCellValue('P6', 'Invoice Submited Date');
$objPHPExcel->getActiveSheet()->SetCellValue('Q6', 'Format Type');

$objPHPExcel->getActiveSheet()->getStyle("A6:Q6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
       // $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
 
$objPHPExcel->getActiveSheet()->getStyle("A6:Q6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result			=	$db->query($y) or die(mysql_error());
$i=1;
$rowCount	=	7;
while($row1	=	$result->fetch_assoc()){
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
  $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row1['quet_num'],'UTF-8'));
  $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($row1['inv_num'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row1['note'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row1['speriod'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row1['tbase'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row1['gst28'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($row1['gst18'],'UTF-8'));
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($row1['gst12'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($row1['gst5'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($row1['gst0'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($row1['total'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper($row1[''],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($row1['bill_date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($row1['inv_date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, mb_strtoupper($row1['inv_sub_date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, mb_strtoupper($row1['ftype'],'UTF-8'));
 $rowCount++;
$i++; }
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$state.'-BulkInvoice.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>