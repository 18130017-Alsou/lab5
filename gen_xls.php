<?//require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<?require_once 'engine/library/PHPExcel/PHPExcel.php';?>
<?require_once 'engine/library/PHPExcel/PHPExcel/Writer/Excel5.php';?>
<?require_once 'engine/library/PHPExcel/PHPExcel/IOFactory.php'?>
<?
ob_end_clean();
$title = 'Таблица';
$array = array("№ п/п", "марка", "модель", "год выпуска", "трансмиссия", "стоимость", "название автосалона", "адрес");
$xls = new PHPExcel();
$xls->getProperties()->setTitle("Auto");
$xls->getProperties()->setSubject("lab5");
$xls->getProperties()->setCreator("Zybin Roman");
$xls->getProperties()->setCompany("USATU");
$xls->getProperties()->setCategory("PI319");
$xls->getProperties()->setKeywords("Auto");
$xls->getProperties()->setCreated("1.04.2200");

$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$sheet->setTitle('Автомобиль');
$sheet->getPageSetup()->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$sheet->getPageMargins()->setTop(1);
$sheet->getPageMargins()->setRight(0.75);
$sheet->getPageMargins()->setLeft(0.75);
$sheet->getPageMargins()->setBottom(1);

$sheet->setCellValueExplicit('A1', 'Таблица', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
$sheet->mergeCells('A1:H1');
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


/*
$sheet->setCellValueExplicit('A2', $array[0], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->setCellValueExplicit('B2', $array[1], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->setCellValueExplicit('C2', $array[2], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->setCellValueExplicit('D2', $array[3], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->setCellValueExplicit('E2', $array[4], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->setCellValueExplicit('F2', $array[5], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->setCellValueExplicit('G2', $array[6], PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->setCellValueExplicit('H2', $array[7], PHPExcel_Cell_DataType::TYPE_STRING);*/
for($i = 0; $i < count($array); $i++){
    $sheet->setCellValueByColumnAndRow($i, 2, $array[$i]);
    $sheet->getStyleByColumnAndRow($i, 2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
}
$j=3;
$queryTab = "adv_stock_info";
$query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
$result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
while ($row=mysqli_fetch_array($result)){
    for($i = 0; $i < count($row)/2; $i++){
        $text = $row[$i];
        $sheet->setCellValueByColumnAndRow($i, $j, $text);
        $sheet->getStyleByColumnAndRow($i, $j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);        
    }
$j++;
}
ob_end_clean();
header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
ob_end_clean();
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Auto.xls");

$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');
//$objWriter = new PHPExcel_Writer_Excel5($xls);
//$objWriter->save("test.xls");
$objWriter->save('php://output');
ob_end_clean();
?>
<?require_once 'engine/connection/connectionEnd.php';?>