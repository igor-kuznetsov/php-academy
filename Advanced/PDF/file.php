<?php

namespace Advanced\PDF;

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$pdfOptions = new Options();
$oldRoot = $pdfOptions->getChroot();
$newRoot = dirname(__FILE__);
$pdfOptions->setChroot($newRoot);
$fontDir = implode(DIRECTORY_SEPARATOR, [
    $oldRoot,
    'lib',
    'fonts'
]);
$pdfOptions->setFontDir($fontDir);
$pdfOptions->set('defaultFont', 'Courier');

$pdf = new Dompdf($pdfOptions);
$pdf->loadHtmlFile('page.html');
$pdf->setPaper('A4', 'landscape');
$pdf->render();

$output = $pdf->output();

file_put_contents('page.pdf', $output);