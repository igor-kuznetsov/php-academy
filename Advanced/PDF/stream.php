<?php

namespace Advanced\PDF;

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

$pdf = new Dompdf();
$pdf->loadHtml('<p>Test paragraph</p><b>Test bold text</b>');
$pdf->setPaper('A4', 'landscape');
$pdf->render();

$pdf->stream();