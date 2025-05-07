<?php include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
 $tsname=$_GET['user'];
 include('dbconnection/connection.php');
$state=$_GET['state'];

if($state=='AP'){
  $qottable ='add_qot';
  $qottable1 ='add_qot1';
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
//$datatable="add_qot";
	/*if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='vishnu')){
     $y="SELECT * FROM ".$datatable."    ORDER BY id desc";    
    }else{
     $y="SELECT * FROM ".$datatable."  where ses='$tsname'  ORDER BY id desc";
	 }*/

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:AF1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:AF1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
 $objPHPExcel->getActiveSheet()->getStyle("A1:AF1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JTECHNO ASSOCIATES');
 $objPHPExcel->getActiveSheet()->getStyle("A1:AF1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:AF4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:AF4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
        $objPHPExcel->getActiveSheet()->getStyle("A4:AF4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A4', $state.' QUOTATION LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:AF4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Quotation No');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Store Code');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Store Name');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Coordinator Name');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Supervisor');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'City');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'Date');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', 'Store Type');
$objPHPExcel->getActiveSheet()->SetCellValue('J6', 'Company Name');
$objPHPExcel->getActiveSheet()->SetCellValue('K6', 'Afm');
$objPHPExcel->getActiveSheet()->SetCellValue('L6', 'Falut No');
$objPHPExcel->getActiveSheet()->SetCellValue('M6', 'Fault Date');
$objPHPExcel->getActiveSheet()->SetCellValue('N6', 'Fault Desc');
$objPHPExcel->getActiveSheet()->SetCellValue('O6', 'RO No');
$objPHPExcel->getActiveSheet()->SetCellValue('P6', 'RO Date');
$objPHPExcel->getActiveSheet()->SetCellValue('Q6', 'Description');
$objPHPExcel->getActiveSheet()->SetCellValue('R6', 'Service Id');
$objPHPExcel->getActiveSheet()->SetCellValue('S6', 'Brand/Make');
$objPHPExcel->getActiveSheet()->SetCellValue('T6', 'Model');
$objPHPExcel->getActiveSheet()->SetCellValue('U6', 'Hsn/San Code');
$objPHPExcel->getActiveSheet()->SetCellValue('V6', 'Gst');
$objPHPExcel->getActiveSheet()->SetCellValue('W6', 'Uom');
$objPHPExcel->getActiveSheet()->SetCellValue('X6', 'Rate');
$objPHPExcel->getActiveSheet()->SetCellValue('Y6', 'Qty');
$objPHPExcel->getActiveSheet()->SetCellValue('Z6', 'Base Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('AA6', 'Service Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('AB6', 'Gst Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('AC6', 'RO Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('AD6', 'GST Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('AE6', 'Servc Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('AF6', 'Total');
$objPHPExcel->getActiveSheet()->getStyle("A6:AF6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
       // $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(14);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(15);  
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(15);
 
$objPHPExcel->getActiveSheet()->getStyle("A6:AF6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

  $y="SELECT * FROM ".$qottable1."    ORDER BY id desc";    
$result			=	$db->query($y) or die(mysql_error());
$i=1;
$rowCount	=	7;
while($row10	=	$result->fetch_assoc()){
    $id1=$row10['id1'];
    $id2=$row10['id'];
    $y10="SELECT * FROM ".$qottable." where id='$id1'";
    $result10			=	$db->query($y10) or die(mysql_error());
    $row	=	$result10->fetch_assoc();
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['quet_num'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($scode=$row['store_code'],'UTF-8'));
	
	$ds="select * from dpr where store_code='$scode'";
	$result1=$db->query($ds) or die(mysql_error());
	$row1=$result1->fetch_assoc();
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row1['store_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row1['coordinator'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row1['superwisor'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row1['city'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['inv_date'])),'UTF-8'));
		$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($row1['format_type'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($row1['company_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($row1['afm'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($row['falt_no'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['falt_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($row['falt_desc'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($row['ro_no'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, mb_strtoupper($row['ro_date'],'UTF-8'));

		$ds1="select * from ".$qottable1." where id1='$id1' and id='$id2'";
	$result2=$db->query($ds1) or die(mysql_error());
	$row2=$result2->fetch_assoc();
	
		$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, mb_strtoupper($row2['desc1'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, mb_strtoupper($row2['serv_code'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, mb_strtoupper($row2['brand'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, mb_strtoupper($row2['model'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, mb_strtoupper($row2['hsn'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, mb_strtoupper($row2['gst'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, mb_strtoupper($row2['uom'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, mb_strtoupper($row2['rate'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, mb_strtoupper($row2['qty'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, mb_strtoupper($row2['base_amt'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, mb_strtoupper($row2['serv_amt'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, mb_strtoupper($row2['gst_amnt'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount, mb_strtoupper($row['tot_base'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AD'.$rowCount, mb_strtoupper($row['tot_ser'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AE'.$rowCount, mb_strtoupper($row['tot_gst'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AF'.$rowCount, mb_strtoupper($row['net'],'UTF-8'));
	

	$rowCount++;
$i++; }
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$state.'-quotationsdetailslist.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>