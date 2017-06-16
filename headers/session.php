<?php

session_start();

//session_id();

//var_dump($_SESSION);
//unset($_SESSION['count']);

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
} else {
    $_SESSION['count']++;
}

echo $_SESSION['count'];
