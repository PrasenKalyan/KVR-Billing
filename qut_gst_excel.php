<?php include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
 $name=$_GET['user'];
//$datatable="add_klqot";
include('dbconnection/connection.php');
$state=$_GET['state'];

if($state=='AP'){
  $qottable ='add_qot';
  $qotbill ='qot_bill';
  $request_amnt ='request_amnt';
     
}
elseif($state=='TG'){
  $qottable ='add_tgqot';
      $qottable1 ='add_tgqot1';
  $qotbill ='tgqot_bill';
  $request_amnt ='tgrequest_amnt';

 
}
 elseif($state=='TN'){
  $qottable ='add_tnqot';
    $qottable1 ='add_tnqot1';
  $qotbill ='tnqot_bill';
  $request_amnt ='tnrequest_amnt';

}
elseif($state=='KL'){
  $qottable ='add_klqot';
      $qottable1 ='add_klqot1';
  $qotbill ='klqot_bill';
  $request_amnt ='klrequest_amnt';	
  
}
else if($state=='KN'){
  $qottable ='add_knqot';
    $qottable1 ='add_knqot1';
  $qotbill ='knqot_bill';
  $request_amnt ='knrequest_amnt';
      
}
elseif($state=='OD'){
  $qottable ='add_odqot';
    $qottable1 ='add_odqot1';
  $qotbill ='odqot_bill';
  $request_amnt ='odrequest_amnt';	
}
if(($name=='admin') or ($name=='durgarao') or ($name=='accounts') ){
 $y="select * from ".$request_amnt." where gsttype='With GST'";
}else{
 $y="select * from ".$request_amnt." where gsttype='With GST' and user='$tsname' ";
}

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:L1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:L1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
 $objPHPExcel->getActiveSheet()->getStyle("A1:L1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JTECHNO ASSOCIATES');
 $objPHPExcel->getActiveSheet()->getStyle("A1:L1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:L4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:L4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
        $objPHPExcel->getActiveSheet()->getStyle("A4:L4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A4', $state.' QUOTATION  GST FILES LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:L4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'State');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Quotation No');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Store Code');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Store Name');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Coordinator Name');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'Supervisor');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', 'To Whoom');
$objPHPExcel->getActiveSheet()->SetCellValue('J6', 'Transfer Date');
$objPHPExcel->getActiveSheet()->SetCellValue('K6', 'Status');
$objPHPExcel->getActiveSheet()->SetCellValue('L6', 'User');
$objPHPExcel->getActiveSheet()->getStyle("A6:L6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
       // $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
        
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
         $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(22);
       
$objPHPExcel->getActiveSheet()->getStyle("A6:L6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result			=	$db->query($y) or die(mysql_error());
$i=1;
$rowCount	=	7;
while($row	=	$result->fetch_assoc()){
    $q=$row['quet_num'];
    $amt=$row['req_amnt']+$row['gstamt'];
    // $state='AP';
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($state,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($q,'UTF-8'));
	$r="select * from ".$qottable." where quet_num='$q'";
	$result2=$db->query($r) or die(mysql_error());
	$row2=$result2->fetch_assoc();
	$scode=$row2['store_code'];
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($scode,'UTF-8'));
	$ds="select * from dpr where store_code='$scode'";
	$result1=$db->query($ds) or die(mysql_error());
	$row1=$result1->fetch_assoc();
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row1['store_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row1['coordinator'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row1['superwisor'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($amt,'UTF-8'));
		$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($row['ac_det'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper(date('d.m.Y',strtotime($row['transfer_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($row['gstatus'],'UTF-8'));
		$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($row['user'],'UTF-8'));
	$rowCount++;
$i++; }
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$state.'-gstlist.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>