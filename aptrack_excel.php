<?php include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
include('dbconnection/connection.php');
$state=$_GET['state'];

if($state=='AP'){
  $qottable ='add_qot';
  $payment='payment';
  $qotbill ='qot_bill';
  $request_amnt ='request_amnt';
     
}
elseif($state=='TG'){
  $qottable ='add_tgqot';
      $qottable1 ='add_tgqot1';
  $qotbill ='tgqot_bill';
  $request_amnt ='tgrequest_amnt';
  $payment='tgpayment';

 
}
 elseif($state=='TN'){
  $qottable ='add_tnqot';
    $qottable1 ='add_tnqot1';
  $qotbill ='tnqot_bill';
  $request_amnt ='tnrequest_amnt';
  $payment='tnpayment';

}
elseif($state=='KL'){
  $qottable ='add_klqot';
      $qottable1 ='add_klqot1';
  $qotbill ='klqot_bill';
  $request_amnt ='klrequest_amnt';	
  $payment='klpayment'; 

}
else if($state=='KN'){
  $qottable ='add_knqot';
    $qottable1 ='add_knqot1';
  $qotbill ='knqot_bill';
  $request_amnt ='knrequest_amnt';
  $payment='knpayment';     
   
}
elseif($state=='OD'){
  $qottable ='add_odqot';
    $qottable1 ='add_odqot1';
  $qotbill ='odqot_bill';
  $request_amnt ='odrequest_amnt';	
  $payment='odpayment';	

}
//$tsname=$_GET['user'];
if(isset($_POST['submit'])){
	$from_date=$_POST['from_date'];
	$to_date=$_POST['to_date'];
	//$type=$_POST['emp'];
}
//	if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='vishnu')){
     $y="SELECT * FROM ".$qottable."  where inv_date between '$from_date' and '$to_date'   ORDER BY id desc";    
    //}else{
    // $y="SELECT * FROM ".$qottable." where status='work to be started' and ses='$tsname'  ORDER BY id desc";
	// }

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:BJ1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:BJ1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
 $objPHPExcel->getActiveSheet()->getStyle("A1:BJ1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JTECHNO ASSOCIATES');
 $objPHPExcel->getActiveSheet()->getStyle("A1:BJ1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:BJ4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:BJ4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
        $objPHPExcel->getActiveSheet()->getStyle("A4:BJ4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A4', $state.' TRACKER LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:BJ4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Quotation No');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Store Code');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Store Name');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Store Type');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Coordinator Name');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'Supervisor');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'AFM');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', 'City');
$objPHPExcel->getActiveSheet()->SetCellValue('J6', 'Company Name');
$objPHPExcel->getActiveSheet()->SetCellValue('K6', 'Quotation Date');
$objPHPExcel->getActiveSheet()->SetCellValue('L6', 'Fault No');
$objPHPExcel->getActiveSheet()->SetCellValue('M6', 'Fault Date');
$objPHPExcel->getActiveSheet()->SetCellValue('N6', 'Fault Description');
$objPHPExcel->getActiveSheet()->SetCellValue('O6', 'Quotation Status');
$objPHPExcel->getActiveSheet()->SetCellValue('P6', 'Type of Work');
$objPHPExcel->getActiveSheet()->SetCellValue('Q6', 'Sub Type');
$objPHPExcel->getActiveSheet()->SetCellValue('R6', 'Ro No');
$objPHPExcel->getActiveSheet()->SetCellValue('S6', 'PO Type 416/417');
$objPHPExcel->getActiveSheet()->SetCellValue('T6', 'Ro Date');
$objPHPExcel->getActiveSheet()->SetCellValue('U6', 'Ro Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('V6', 'Service Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('W6', 'Gst Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('X6', 'Total Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('Y6', 'User');
$objPHPExcel->getActiveSheet()->SetCellValue('Z6', 'Invested RO Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('AA6', 'Invested GST');
$objPHPExcel->getActiveSheet()->SetCellValue('AB6', 'Invested TOTAL');
$objPHPExcel->getActiveSheet()->SetCellValue('AC6', 'Invest Date');
$objPHPExcel->getActiveSheet()->SetCellValue('AD6', 'To Whoom');
$objPHPExcel->getActiveSheet()->SetCellValue('AE6', 'Invoice No');
$objPHPExcel->getActiveSheet()->SetCellValue('AF6', 'User');
$objPHPExcel->getActiveSheet()->SetCellValue('AG6', 'Inv Date');
$objPHPExcel->getActiveSheet()->SetCellValue('AH6', 'Inv Sub Date');
$objPHPExcel->getActiveSheet()->SetCellValue('AI6', 'Serv Period');
$objPHPExcel->getActiveSheet()->SetCellValue('AJ6', 'Inv Sub Mon');
$objPHPExcel->getActiveSheet()->SetCellValue('AK6', 'State');
$objPHPExcel->getActiveSheet()->SetCellValue('AL6', 'Fomate');
$objPHPExcel->getActiveSheet()->SetCellValue('AM6', 'Gst 28%');
$objPHPExcel->getActiveSheet()->SetCellValue('AN6', 'Gst 18%');
$objPHPExcel->getActiveSheet()->SetCellValue('AO6', 'Gst 12%');
$objPHPExcel->getActiveSheet()->SetCellValue('AP6', 'Gst 5%');
$objPHPExcel->getActiveSheet()->SetCellValue('AQ6', 'Gst 0%');
$objPHPExcel->getActiveSheet()->SetCellValue('AR6', 'Total Base');
$objPHPExcel->getActiveSheet()->SetCellValue('AS6', 'Gst(28%) Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('AT6', 'Gst(18%) Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('AU6', 'Gst(12%) Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('AV6', 'Gst(5%) Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('AW6', 'Gst(0%) Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('AX6', 'Total Gst');
$objPHPExcel->getActiveSheet()->SetCellValue('AV6', 'Total Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('AZ6', 'Doc No1');
$objPHPExcel->getActiveSheet()->SetCellValue('BA6', 'Rec Date1');
$objPHPExcel->getActiveSheet()->SetCellValue('BB6', 'Rec Month1');
$objPHPExcel->getActiveSheet()->SetCellValue('BC6', 'Total Amt Rec1');
$objPHPExcel->getActiveSheet()->SetCellValue('BD6', 'Doc No2');
$objPHPExcel->getActiveSheet()->SetCellValue('BE6', 'Rec Date2');
$objPHPExcel->getActiveSheet()->SetCellValue('BF6', 'Rec Month2');
$objPHPExcel->getActiveSheet()->SetCellValue('BG6', 'Total Amt Rec2');
$objPHPExcel->getActiveSheet()->SetCellValue('BH6', 'Outstanding');
$objPHPExcel->getActiveSheet()->SetCellValue('BI6', 'Ageing');
$objPHPExcel->getActiveSheet()->SetCellValue('BJ6', 'Remarks');

 $objPHPExcel->getActiveSheet()->getStyle("A6:BJ6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('800000');
         $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(14);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
$objPHPExcel->getActiveSheet()->getStyle("A6:BJ6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);

$result			=	$db->query($y) or die(mysql_error());
$i=1;
$rowCount	=	7;
while($row	=	$result->fetch_assoc()){
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($qno=$row['quet_num'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($scode=$row['store_code'],'UTF-8'));
	
	$ds="select * from dpr where store_code='$scode'";
	$result1=$db->query($ds) or die(mysql_error());
	$row1=$result1->fetch_assoc();
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row1['store_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row1['format_type'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row1['coordinator'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row1['superwisor'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($row1['afm'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($row1['city'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($row1['company_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['inv_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($row['falt_no'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['falt_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($row['falt_desc'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($row['status'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, mb_strtoupper($row['type_of_work'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, mb_strtoupper($row['sub_type'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, mb_strtoupper($row['ro_no'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, mb_strtoupper($row['po_type'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, mb_strtoupper($row['ro_date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, mb_strtoupper($row['tot_base'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, mb_strtoupper($row['tot_ser'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, mb_strtoupper($row['tot_gst'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, mb_strtoupper($row['net'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, mb_strtoupper($row['ses'],'UTF-8'));
	
	$ds10="select sum(approve_amnt) as amount,sum(transfer) as kltft,sum(gstamt) as klgst from ".$request_amnt." where quet_num='$qno'";
	$result20=$db->query($ds10) or die(mysql_error());
	$row20=$result20->fetch_assoc();
    $objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, mb_strtoupper($row20['kltft'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, mb_strtoupper($row20['klgst'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, mb_strtoupper($row20['apamount'],'UTF-8'));
	$ds11="select transfer_date from ".$request_amnt." where quet_num='$qno' ";
	$result21=$db->query($ds11) or die(mysql_error());
	$row21=$result21->fetch_assoc();
	
	$objPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row21['transfer_date'])),'UTF-8'));
	$yt="select approve_amnt,ac_det,transfer_date from ".$request_amnt." where quet_num='$qno'";
    $result4=$db->query($yt) or die(mysql_error());
    $array='';
                                        while($row4=$result4->fetch_assoc()){
                                            $at=$row4['approve_amnt'];
                                            $sc=$row4['ac_det'];
                                            $rdate=date('d-m-Y',strtotime($row4['transfer_date']));
                                            $array .=$sc."-".$at."(".$rdate."),";
                                            
                                            
                                        }
    
	$objPHPExcel->getActiveSheet()->SetCellValue('AD'.$rowCount, mb_strtoupper($array,'UTF-8'));
	$ds1="select * from ".$qotbill." where quet_num='$qno'";
	$result11=$db->query($ds1) or die(mysql_error());
	$row2=$result11->fetch_assoc();
	$objPHPExcel->getActiveSheet()->SetCellValue('AE'.$rowCount, mb_strtoupper($invno=$row2['inv_num'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AF'.$rowCount, mb_strtoupper($row2['user'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AG'.$rowCount, mb_strtoupper($row2['inv_date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AH'.$rowCount, mb_strtoupper($row2['inv_sub_date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AI'.$rowCount, mb_strtoupper($row2['speriod'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AJ'.$rowCount, mb_strtoupper($row2['inv_sub_date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AK'.$rowCount, mb_strtoupper($state,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AL'.$rowCount, mb_strtoupper($row2['ftype'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AM'.$rowCount, mb_strtoupper($gst28=$row2['gst28'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AN'.$rowCount, mb_strtoupper($gst18=$row2['gst18'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AO'.$rowCount, mb_strtoupper($gst12=$row2['gst12'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AP'.$rowCount, mb_strtoupper($gst5=$row2['gst5'],'UTF-8'));
	
	$objPHPExcel->getActiveSheet()->SetCellValue('AQ'.$rowCount, mb_strtoupper($gst0=$row2['gst0'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AR'.$rowCount, mb_strtoupper($tbase=$row2['tbase'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AS'.$rowCount, mb_strtoupper($g28=($gst28*28)/100,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AT'.$rowCount, mb_strtoupper($g18=($gst18*18)/100,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AU'.$rowCount, mb_strtoupper($g12=($gst12*12)/100,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AV'.$rowCount, mb_strtoupper($g5=($gst5*5)/100,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AW'.$rowCount, mb_strtoupper($g0=($gst0*0)/100,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AX'.$rowCount, mb_strtoupper($gtot=$g28+$g18+$g12+$g5+$g0,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AY'.$rowCount, mb_strtoupper($tbase+$gtot,'UTF-8'));
	$y25="select * from ".$payment." where inv_no='$invno'"; 
	$result12=$db->query($y25) or die(mysql_error());
	$row3=$result12->fetch_assoc();
	
	$objPHPExcel->getActiveSheet()->SetCellValue('AZ'.$rowCount, mb_strtoupper($row['document_num'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('BA'.$rowCount, mb_strtoupper($row3['recevied_date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('BB'.$rowCount, mb_strtoupper(date('M',strtotime($row3['recevied_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('BC'.$rowCount, mb_strtoupper($recd=$row3['recevied_amnt'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('BD'.$rowCount, mb_strtoupper($row3['document_num1'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('BE'.$rowCount, mb_strtoupper($row3['recevied_date1'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('BF'.$rowCount, mb_strtoupper(date('M',strtotime($row3['recevied_date1'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('BG'.$rowCount, mb_strtoupper($row3['recevied_amnt1'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('BH'.$rowCount, mb_strtoupper($row3['outstanding'],'UTF-8'));
	//$objPHPExcel->getActiveSheet()->SetCellValue('BI'.$rowCount, mb_strtoupper($row3['outstanding'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('BJ'.$rowCount, mb_strtoupper($row3['remarks'],'UTF-8'));
	$rowCount++;
$i++; }

header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$state.'-track.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>