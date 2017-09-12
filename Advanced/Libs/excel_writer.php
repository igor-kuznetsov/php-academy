<?php

require_once 'vendor/autoload.php';

$phpExcel = new PHPExcel();

$phpExcel->getProperties()->setCreator("Maarten Balliauw")
    ->setLastModifiedBy("Maarten Balliauw")
    ->setTitle("PHPExcel Test Document")
    ->setSubject("PHPExcel Test Document")
    ->setDescription("Test document for PHPExcel, generated using PHP classes.")
    ->setKeywords("office PHPExcel php")
    ->setCategory("Test result file");

$phpExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Hello')
    ->setCellValue('B2', 'world!')
    ->setCellValue('C1', 'Hello')
    ->setCellValue('D2', 'world!');

$phpExcel->getActiveSheet()->setTitle('Simple');

$writer = new PHPExcel_Writer_Excel2007($phpExcel);
$writer->save('simple.xlsx');