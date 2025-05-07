<?php include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
 $tsname=$_GET['user'];
	if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname=='klbilling') or ($tsname=='sumanthpotluri')or ($tsname=='naiduys') ){
       $y="SELECT distinct quet_num,user FROM `klrequest_amnt` where  status='Amount Transferred' and bill_status='' or docr_status='Cancel'    ";
	  }else{
	  $y="SELECT distinct quet_num,user FROM `klrequest_amnt` where  status='Amount Transferred'  and bill_status=''   and user='$tsname' or docr_status='Cancel'  ";
	  }
									
$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:R1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:R1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A1:R1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JYOTHI FACILITY MANAGEMENT PVT.LTD');
 $objPHPExcel->getActiveSheet()->getStyle("A1:R1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:R4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:R4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
        $objPHPExcel->getActiveSheet()->getStyle("A4:R4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A4', 'KERALA DOCUMENT REQUIRED LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:R4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
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
$objPHPExcel->getActiveSheet()->SetCellValue('K6', 'Ro Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('L6', 'Service Fee');
$objPHPExcel->getActiveSheet()->SetCellValue('M6', 'Gst Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('N6', 'Total Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('O6', 'Whom To be Invest');
$objPHPExcel->getActiveSheet()->SetCellValue('P6', 'Transfer Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('Q6', 'Amount Transferred Date');
$objPHPExcel->getActiveSheet()->SetCellValue('R6', 'User');
$objPHPExcel->getActiveSheet()->getStyle("A6:R6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
       // $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(19);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(23);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(22);
          $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(22);
 
$objPHPExcel->getActiveSheet()->getStyle("A6:R6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result			=	$db->query($y) or die(mysql_error());
$i=1;
$rowCount	=	7;
while($row	=	$result->fetch_assoc()){
    	$qtno=$row['quet_num'];
    		$a="select store_code,ro_no,ro_date,falt_desc,id,tot_base,tot_ser,tot_gst,net from add_klqot where quet_num='$qtno'";
    		$result1=$db->query($a) or die(mysql_error());
    		$row1	=	$result1->fetch_assoc();
    		$str_code=$row1['store_code'];
    		$ds="select * from dpr where store_code='$str_code'";
        	$result2=$db->query($ds) or die(mysql_error());
	        $row2=$result2->fetch_assoc();
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($qtno,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($row2['superwisor'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row2['coordinator'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row2['store_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($str_code,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row2['format_type'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($row1['ro_no'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row1['ro_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($row1['falt_desc'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($row1['tot_base'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($row1['tot_ser'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper($row1['tot_gst'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($row1['net'],'UTF-8'));
	$ac=$row['ac_det'];
    $yt="select approve_amnt,ac_det,transfer_date from klrequest_amnt where quet_num='$qtno' and  confirm='Yes'";
    $result4=$db->query($yt) or die(mysql_error());
    $array='';
                                        while($row4=$result4->fetch_assoc()){
                                            $at=$row4['approve_amnt'];
                                            $sc=$row4['ac_det'];
                                            $rdate=date('d-m-Y',strtotime($row4['transfer_date']));
                                            $array .=$sc."-".$at."(".$rdate."),";
                                            
                                            
                                        }
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $array);
	 $a10="select sum(approve_amnt) as req_amnt from klrequest_amnt where quet_num='$qtno' and  confirm='Yes' ";
	$result10=$db->query($a10) or die(mysql_error());
	 	$row3=$result10->fetch_assoc();
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, mb_strtoupper($row3['req_amnt'],'UTF-8'));
	 $a11="select transfer_date from klrequest_amnt where quet_num='$qtno' and  confirm='Yes' order by id desc limit 1 ";
	$result11=$db->query($a11) or die(mysql_error());
	 	$row4=$result11->fetch_assoc();
	$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, mb_strtoupper($row4['transfer_date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, mb_strtoupper($row['user'],'UTF-8'));
	$rowCount++;
$i++; }
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);

$dt=date('d-m-Y');
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="kldocument"'.$dt.'".xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>