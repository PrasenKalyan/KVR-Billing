<?php include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
 $tsname=$_GET['user'];
//$datatable="add_klqot";
	 //if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='accounts') or ($tsname=='klbilling')){
      $y="select * from klpayment";   
    //}else{
      //$y="select * from klpayment  ";
	 //}

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:AH1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:AH1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A1:AH1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'KVR BEST PROPERTY MANAGEMENT PVT.LTD');
 $objPHPExcel->getActiveSheet()->getStyle("A1:AH1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:AH4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:AH4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
        $objPHPExcel->getActiveSheet()->getStyle("A4:AH4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A4', 'KERALA PAYPEMENT RECEIVED LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:AH4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Inv Number');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Inv Date');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Inv Sub Date');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Serv Period');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Inv Sub Mon');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'State');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'Fomate');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', 'Gst 28%');
$objPHPExcel->getActiveSheet()->SetCellValue('J6', 'Gst 18%');
$objPHPExcel->getActiveSheet()->SetCellValue('K6', 'Gst 12%');
$objPHPExcel->getActiveSheet()->SetCellValue('L6', 'Gst 5%');
$objPHPExcel->getActiveSheet()->SetCellValue('M6', 'Gst 0%');
$objPHPExcel->getActiveSheet()->SetCellValue('N6', 'Total Base');
$objPHPExcel->getActiveSheet()->SetCellValue('O6', 'Gst(28%) Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('P6', 'Gst(18%) Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('Q6', 'Gst(12%) Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('R6', 'Gst(5%) Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('S6', 'Gst(0%) Amt');
$objPHPExcel->getActiveSheet()->SetCellValue('T6', 'Total Gst');
$objPHPExcel->getActiveSheet()->SetCellValue('U6', 'Total Amount');
$objPHPExcel->getActiveSheet()->SetCellValue('V6', 'Tds');
$objPHPExcel->getActiveSheet()->SetCellValue('W6', 'Doc No1');
$objPHPExcel->getActiveSheet()->SetCellValue('X6', 'Rec Date1');
$objPHPExcel->getActiveSheet()->SetCellValue('Y6', 'Rec Month1');
$objPHPExcel->getActiveSheet()->SetCellValue('Z6', 'Total Amt Rec1');

$objPHPExcel->getActiveSheet()->SetCellValue('AA6', 'Doc No2');
$objPHPExcel->getActiveSheet()->SetCellValue('AB6', 'Rec Date2');
$objPHPExcel->getActiveSheet()->SetCellValue('AC6', 'Rec Month2');
$objPHPExcel->getActiveSheet()->SetCellValue('AD6', 'Total Amt Rec2');
$objPHPExcel->getActiveSheet()->SetCellValue('AE6', 'Outstanding');
$objPHPExcel->getActiveSheet()->SetCellValue('AF6', 'Ageing');
$objPHPExcel->getActiveSheet()->SetCellValue('AG6', 'Remarks');
$objPHPExcel->getActiveSheet()->SetCellValue('AH6', 'User');

$objPHPExcel->getActiveSheet()->getStyle("A6:AH6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000FF');
       // $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
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
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(16);
        
        $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(22);
       
       
$objPHPExcel->getActiveSheet()->getStyle("A6:AH6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result			=	$db->query($y) or die(mysqli_close($link));
$i=1;
$rowCount	=	7;
while($row	=	$result->fetch_assoc()){
    $q=$row['inv_no'];
	//	$st=$row['state'];
		$yu="select inv_date,inv_sub_date,speriod,ftype,sum(gst28) as gst28,sum(gst18) as gst18,sum(gst12) as gst12,sum(gst5) as gst5,sum(gst5) as gst5,sum(tbase) as tbase from klqot_bill where inv_num='$q'";
		$result1=$db->query($yu) or die(mysqli_close($link));
	$row1	=	$result1->fetch_assoc();										
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($q,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row1['inv_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row1['inv_sub_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row1['speriod'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper(date('M',strtotime($row1['inv_sub_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper('KL','UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($row1['ftype'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($gst28=$row1['gst28'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($gst18=$row1['gst18'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($gst12=$row1['gst12'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($gst5=$row1['gst5'],'UTF-8'));
	
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper($gst0=$row1['gst0'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($tbase=$row1['tbase'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($g28=($gst28*28)/100,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, mb_strtoupper($g18=($gst18*18)/100,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, mb_strtoupper($g12=($gst12*12)/100,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, mb_strtoupper($g5=($gst5*5)/100,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, mb_strtoupper($g0=($gst0*0)/100,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, mb_strtoupper($gtot=$g28+$g18+$g12+$g5+$g0,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, mb_strtoupper($tbase+$gtot,'UTF-8'));
	
	$objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, mb_strtoupper($row['tds'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, mb_strtoupper($row['document_num'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, mb_strtoupper($row['recevied_date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, mb_strtoupper(date('M',strtotime($row['recevied_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, mb_strtoupper($recd=$row['recevied_amnt'],'UTF-8'));
	
	$objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, mb_strtoupper($row['document_num1'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, mb_strtoupper($row['recevied_date1'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount, mb_strtoupper(date('M',strtotime($row['recevied_date1'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AD'.$rowCount, mb_strtoupper($row['recevied_amnt1'],'UTF-8'));
	
	$objPHPExcel->getActiveSheet()->SetCellValue('AE'.$rowCount, mb_strtoupper($row['outstanding'],'UTF-8'));
	$amtdate=strtotime($recd);
    $amtdate1=strtotime($inv);
    $ddate=($amtdate - $amtdate1)/60/60/24;
    $dts=1;
    $dm=$ddate+$dts;
	
	$objPHPExcel->getActiveSheet()->SetCellValue('AF'.$rowCount, mb_strtoupper($dm,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AG'.$rowCount, mb_strtoupper($row['remarks'],'UTF-8'));
		$objPHPExcel->getActiveSheet()->SetCellValue('AH'.$rowCount, mb_strtoupper($row['user'],'UTF-8'));
	$rowCount++;
$i++; }
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="klpaymentreceived.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>