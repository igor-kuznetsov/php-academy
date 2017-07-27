<?php

require '../functions.php';

Auth::logout();
header('Location: '.site_url('/'));
exit;