<?php

header('Content-Type: application/pdf;');
header('Content-Length: 10000000;');
header('Content-Disposition: attachment; filename="download.pdf"');

for ($i = 0; $i < 1000; $i++) {
    echo str_repeat('.', 1000);
    usleep(5000);
}