<?php

$h = fopen('alpha.txt', 'r+');
flock($h, LOCK_EX);
fwrite($h, '88888');
flock($h, LOCK_UN);
fclose($h);
//========================
unlink('alpha.txt'); // remove file