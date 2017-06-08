<?php

if ( ! function_exists('test')) {
    function test($a = 0, $b = 0)
    {
        echo $a + $b;
    }
}

test();

$function = 'test';
$function(4, 7);

$x = 8;

call_user_func($function, $x, 5);

call_user_func_array($function, [&$x, 10]);

print "<pre>";
print_r(get_defined_functions());
print "</pre>";