<?php include_once('config.php'); 
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
$objPHPExcel = new Spreadsheet();
/* $tsname=$_GET['user'];
$datatable="add_klqot";
	if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='vishnu')){
     $y="SELECT * FROM ".$datatable."    ORDER BY id desc";    
    }else{
     $y="SELECT * FROM ".$datatable."  where status='work to be started' and ses='$tsname'  ORDER BY id desc";
	 }
	 */
$objPHPExcel->getActiveSheet()->mergeCells('A1:AF1');
$objPHPExcel
    ->getActiveSheet()
    ->getStyle("A1:AF1")
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('0000FF');
$objPHPExcel
    ->getActiveSheet()
    ->getStyle("A1:AH1")
    ->getFont()->setBold(true)->getColor()
    ->setARGB('ffffff');

 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'KVR BEST PROPERTY  MANAGEMENT PVT.LTD');
 $objPHPExcel->getActiveSheet()->getStyle("A1:AF1")->getAlignment()->setHorizontal('center');
 
 $objPHPExcel->getActiveSheet()->mergeCells('A4:AF4');
 $objPHPExcel
    ->getActiveSheet()
    ->getStyle("A4:AF4")
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('0000FF');
 $objPHPExcel
    ->getActiveSheet()
    ->getStyle("A4:AF4")
    ->getFont()
    ->setBold(true)
    ->getColor()
    ->setARGB('ffffff');



 $objPHPExcel->getActiveSheet()->setCellValue('A4', 'KARNATAKA QUOTATION LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:AF4")->getAlignment()->setHorizontal('center');
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
$objPHPExcel
    ->getActiveSheet()
    ->getStyle("A6:AF6")
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('0000FF');
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


$y="SELECT q.quet_num,q.inv_date,q.falt_no,q.falt_date,q.falt_desc,q.ro_no,q.ro_date,q.tot_base,q.tot_ser,q.tot_gst,q.net,d.store_name,d.superwisor,d.coordinator,d.city,d.format_type,d.company_name,d.afm,q1.desc1,q1.serv_code,q1.brand,q1.model,q1.gst_amnt,q1.gst,q1.uom,q1.qty,q1.rate,q1.hsn,q1.serv_amt,q1.base_amt FROM `add_knqot1` q1 left join add_knqot q on q.id=q1.id1 left join dpr d on d.store_code=q.store_code ";   
$result			=	$db->query($y) or die(mysql_error());
$i=1;
$rowCount	=	7;
while($row	=	$result->fetch_assoc()){

	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['quet_num'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($scode=$row['store_code'],'UTF-8'));
	
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row['store_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row['coordinator'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row['superwisor'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row['city'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['inv_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($row['format_type'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($row['company_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($row['afm'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($row['falt_no'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['falt_date'])),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($row['falt_desc'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($row['ro_no'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['ro_date'])),'UTF-8'));
	
	$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, mb_strtoupper(addslashes($row['desc1']),'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, mb_strtoupper($row['serv_code'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, mb_strtoupper($row['brand'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, mb_strtoupper($row['model'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, mb_strtoupper($row['hsn'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, mb_strtoupper($row['gst'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, mb_strtoupper($row['uom'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, mb_strtoupper($row['rate'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, mb_strtoupper($row['qty'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, mb_strtoupper($row['base_amt'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, mb_strtoupper($row['serv_amt'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, mb_strtoupper($row['gst_amnt'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount, mb_strtoupper($row['tot_base'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AD'.$rowCount, mb_strtoupper($row['tot_ser'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AE'.$rowCount, mb_strtoupper($row['tot_gst'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AF'.$rowCount, mb_strtoupper($row['net'],'UTF-8'));
	$rowCount++;
$i++; }
$objWriter	=	new Xlsx($objPHPExcel);
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="knquotationsdetailslist.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = IOFactory::createWriter($objPHPExcel, 'Xlsx');  
$objWriter->save('php://output');
?>