<?php
$upperArr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

$objPHPExcel = $this->PhpExcel;
$objPHPExcel->getProperties()->setCreator("IPREV-GETIG");

$i=1;
$objPHPExcel->setActiveSheetIndex(0);

foreach($rows as $row){
    $j=0;
    foreach(json_decode($row, true) as $key => $value){
        $objPHPExcel->getActiveSheet()->setCellValue($upperArr[$j].'1', $key);
        $j++;
    }
    break;
}
foreach($rows as $row){
    $i++;
    $j=0;
    foreach(json_decode($row, true) as $value){
        $objPHPExcel->getActiveSheet()->setCellValue($upperArr[$j].$i, $value);
        $j++;
    }    
}
$objPHPExcel->getActiveSheet()->setTitle('SISPREV');
$objPHPExcel->setActiveSheetIndex(0);
?>
