<?php

require_once 'vendor/autoload.php';

if (!file_exists("simple.xlsx")) {
    exit("Please run excel_writer.php first.");
}

$reader = new PHPExcel_Reader_Excel2007();
$phpExcel = $reader->load("simple.xlsx");
unset($reader);

echo "Creator: " . $phpExcel->getProperties()->getCreator() . "<br>";
echo "Title: " . $phpExcel->getProperties()->getTitle() . "<br>";
echo "Subject: " . $phpExcel->getProperties()->getSubject() . "<br>";
echo "Description: " . $phpExcel->getProperties()->getDescription() . "<br>";
echo "<hr>";
echo "Title: " . $phpExcel->getActiveSheet()->getTitle() . "<br>";
echo "Cell A1: " . $phpExcel->getActiveSheet()->getCell('A1')->getValue() . "<br>";
echo "Cell B2: " . $phpExcel->getActiveSheet()->getCell('B2')->getValue() . "<br>";
echo "Cell C1: " . $phpExcel->getActiveSheet()->getCell('C1')->getValue() . "<br>";
echo "Cell D2: " . $phpExcel->getActiveSheet()->getCell('D2')->getValue() . "<br>";