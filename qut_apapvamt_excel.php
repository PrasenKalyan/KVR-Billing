<?php include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
 $tsname=$_GET['user'];
 include('dbconnection/connection.php');
 $state=$_GET['state'];

 if($state=='AP'){
	 $qottable ='add_qot';
	 $request_amnt ='request_amnt';
	 $stn='ap';
  
 }
 elseif($state=='TG'){
	 $qottable ='add_tgqot';
	 $qottable1 ='add_tgqot1';
	 $request_amnt ='tgrequest_amnt';
	 $stn='tg';

  
 }
  elseif($state=='TN'){
   $qottable ='add_tnqot';
   $qottable1 ='add_tnqot1';
   $request_amnt ='tnrequest_amnt';
   $stn='tn';

 
 }
 elseif($state=='KL'){
	 $qottable ='add_klqot';
	 $qottable1 ='add_klqot1';
	 $request_amnt ='klrequest_amnt';
	 $stn='kl';

 
   
 }
 else if($state=='KN'){
   $qottable ='add_knqot';
   $qottable1 ='add_knqot1';
   $request_amnt ='knrequest_amnt';
   $stn='kn';

 
 
 }
 elseif($state=='OD'){
   $qottable ='add_odqot';
   $qottable1 ='add_odqot1';
   $request_amnt ='odrequest_amnt';	
   $stn='od';

 }
if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname==$stn.'billing')){
$y="select * from ".$request_amnt." where  confirm='Yes' and status='' order by id desc";    
}else{
$y="select * from ".$request_amnt." where  confirm='Yes' and status='' and user='$tsname'  order by id desc";
}
												  $objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:X1');
$objPHPExcel->getActiveSheet()->getStyle("A1:X1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
$objPHPExcel->getActiveSheet()->getStyle("A1:X1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'JTECHNO ASSOCIATES');
$objPHPExcel->getActiveSheet()->getStyle("A1:X1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->mergeCells('A4:X4');
$objPHPExcel->getActiveSheet()->getStyle("A4:X4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
$objPHPExcel->getActiveSheet()->getStyle("A4:X4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A4', $state.' PROVED AMOUNT LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:X4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Quotation No');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Supervisor');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Coordinator');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Store Name');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Store Code');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'Store Type');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'Ro Num');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', 'Ro Date');
$objPHPExcel->getActiveSheet()->SetCellValue('J6', 'Fault Description');

$objPHPExcel->getActiveSheet()->SetCellValue('K6', 'RO Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('L6', 'Service Fee');
$objPHPExcel->getActiveSheet()->SetCellValue('M6', 'GST');
$objPHPExcel->getActiveSheet()->SetCellValue('N6', 'Total');
$objPHPExcel->getActiveSheet()->SetCellValue('O6', 'Requested Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('P6', 'Balance Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('Q6', 'GST Type');
$objPHPExcel->getActiveSheet()->SetCellValue('R6', 'GST Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('S6', 'Advance Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('T6', 'Remarks');
$objPHPExcel->getActiveSheet()->SetCellValue('U6', 'Whom to be Invest Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('V6', 'Request Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('W6', 'Rq Amount Date');
$objPHPExcel->getActiveSheet()->SetCellValue('X6', 'User');

$objPHPExcel->getActiveSheet()->getStyle("A6:X6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
       // $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
      $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(28);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(14);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(19);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(22);
        
$objPHPExcel->getActiveSheet()->getStyle("A6:X6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result			=	$db->query($y) or die(mysql_error());
$cnt=$result->num_rows;
$i=1;
$rowCount	=	7;
while($row	=	$result->fetch_assoc()){
    $qot=$row['quet_num'];
    $krid=$row['id'];
    $ac=$row['ac_det'];
    $a="select store_code,ro_no,ro_date,falt_desc,tot_base,tot_ser,tot_gst,adv_amnt,adv_amnt1,adv_amnt2,gst_type,net,bal from ".$qottable." where quet_num='$qot'";
    $result1=$db->query($a) or die(mysql_error());
    $row2=$result1->fetch_assoc();
    $str_code=$row2['store_code'];
    $tot_base=$row2['tot_base'];
    $ds="select * from dpr where store_code='$str_code'";
	$result2=$db->query($ds) or die(mysql_error());
	$row1=$result2->fetch_assoc();
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($qot,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($row1['superwisor'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row1['coordinator'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row1['store_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($str_code,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row1['format_type'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($row2['ro_no'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row2['ro_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($row2['falt_desc'],'UTF-8'));
	
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($tot_base,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($row2['tot_ser'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper($row2['tot_gst'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($row2['net'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($row['req_amnt']+$row['gstamt'],'UTF-8'));	
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, mb_strtoupper($row2['bal'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, mb_strtoupper($row['gsttype'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, mb_strtoupper($row['gstamt'],'UTF-8'));

	$adamt="select sum(approve_amnt) as req_amnt from ".$request_amnt." where quet_num='$qot'and  status='Amount Transferred' and   confirm='Yes'" ;
												      $ads=$db->query($adamt) or die(mysql_error());
												      $ads1=$ads->fetch_assoc();
												       $adsd=$ads1['req_amnt'];
	$objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, mb_strtoupper($adsd,'UTF-8'));
		$objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, mb_strtoupper($row['remarks'],'UTF-8'));
	
	$objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, mb_strtoupper($ac,'UTF-8'));
	$tyy="select sum(approve_amnt) as req_amnt from ".$request_amnt." where quet_num='$qot'  and  confirm='Yes' and status=''   and ac_det='$ac'";
    $result3=$db->query($tyy) or die(mysql_error());
    $row4=$result3->fetch_assoc(); 
  	$objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, mb_strtoupper($row4['req_amnt'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, mb_strtoupper(date('d.m.Y',strtotime($row['req_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, mb_strtoupper($row['user'],'UTF-8'));
	$rowCount++;
$i++; }
$cnt1=3;
$tc=$rowCount+$cnt+$cnt1;
//$objPHPExcel->getActiveSheet()->SetCellValue('K10', mb_strtoupper($tc,'UTF-8'));
 
$objPHPExcel->getActiveSheet()->SetCellValue('A'.$tc, 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B'.$tc, 'Name');
$objPHPExcel->getActiveSheet()->SetCellValue('C'.$tc, 'Account No');
$objPHPExcel->getActiveSheet()->SetCellValue('D'.$tc, 'Bank');
$objPHPExcel->getActiveSheet()->SetCellValue('E'.$tc, 'IFSC Code');
$objPHPExcel->getActiveSheet()->SetCellValue('F'.$tc, 'Amount');

  if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts')){
    	$y2="select distinct ac_det from ".$request_amnt." where confirm='Yes' and status='' ";
	}else{
    	$y2="select distinct ac_det from ".$request_amnt." where  user='$tsname' and  confirm='Yes' and status='' ";
	}
										
$result10=$db->query($y2) or die(mysql_error());
$cnt2=1;
$j=1;
$rowCount1	=	$tc+$cnt2;
while($row10	=	$result10->fetch_assoc()){
    $acd=$row10['ac_det'];
     $yu="select * from ac_det where name='$acd'";
     $result11=$db->query($yu) or die(mysql_error());
     $row11	=	$result11->fetch_assoc();
	 $r12="select sum(approve_amnt) as amt from ".$request_amnt." where ac_det='$acd' and confirm='Yes' and status='' ";
	 $result12=$db->query($r12) or die(mysql_error());
	 $row12	=	$result12->fetch_assoc();
	$dds=$row12['amt'];
	
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount1, mb_strtoupper($j,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount1, mb_strtoupper($acd,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount1, mb_strtoupper($row11['ac_no'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount1, mb_strtoupper('','UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount1, mb_strtoupper($row11['ifsc'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount1, mb_strtoupper($dds,'UTF-8'));


$j++;
 	$rowCount1++;   
}

$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$state.'-aprvamountlist.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>