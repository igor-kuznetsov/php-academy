<?php

$my_text = 'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь. А король-то — голый. А ларчик просто открывался. А там хоть трава не расти.';

/**
 * @param string $text
 * @return string
 */
function reverse(string $text):string
{
    $array = explode('.', $text);
    $array = array_filter($array);

    return implode('. ', array_reverse($array)) . '.';
}

echo reverse($my_text);