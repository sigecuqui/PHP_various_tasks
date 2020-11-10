<?php

$sentence = 'Labai skanu, labai gardu UGACIAGA';

function remove_vowels($str)
{
    $vowels = ["a", "e", "i", "o", "u", "y"];
    return str_ireplace($vowels, "", $str);
}

var_dump($sentence);
$new_sentence = remove_vowels($sentence);
var_dump($new_sentence);

////2. remove vowels reference

function remove_vowels_ref(&$str)
{
    $vowels = ["a", "e", "i", "o", "u", "y"];
    $str = str_ireplace($vowels, "", $str);
}

var_dump($sentence);
remove_vowels_ref($sentence);
var_dump($sentence);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks</title>
    <style>
        </head>
        <body>
        </body>
        </html >







