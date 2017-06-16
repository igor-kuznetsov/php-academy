<?php

setcookie('Name', 'Vasya');
setcookie('Test', false);

setcookie('a[b]', 555);
setcookie('a[c]', 666);
setcookie('a[d]', 7777);

//setcookie('ddd', [10, 5, 8]);

var_dump($_COOKIE);

//setrawcookie();