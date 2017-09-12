<?php

require_once 'vendor/autoload.php';

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
    ->setLastModifiedBy("Maarten Balliauw")
    ->setTitle("PHPExcel Test Document")
    ->setSubject("PHPExcel Test Document")
    ->setDescription("Test document for PHPExcel, generated using PHP classes.")
    ->setKeywords("office PHPExcel php")
    ->setCategory("Test result file");

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Hello')
    ->setCellValue('B2', 'world!')
    ->setCellValue('C1', 'Hello')
    ->setCellValue('D2', 'world!');

$objPHPExcel->getActiveSheet()->setTitle('Simple');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('simple.xlsx');