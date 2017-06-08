<?php

$my_text = 'а васька слушает да ест. а воз и ныне там. а вы друзья как ни садитесь, все в музыканты не годитесь. а король-то — голый. а ларчик просто открывался.а там хоть трава не расти.';
//$my_text = 'aasds sadsadsad sadsadsad. sadsadsad asdsadsa sad';

/**
 * @param string $text
 * @return string
 */
function capital_letters(string $text):string
{
    $array = explode('.', $text);

    foreach ($array as $key => $value) {
        //$array[$key] = ucfirst($value);
        $value = trim($value);
        $array[$key] = mb_strtoupper(mb_substr($value, 0, 1)) . mb_substr($value, 1);
    }

    return implode('. ', $array);
}

echo capital_letters($my_text);