<?php
$words = ['krakamule', 'runkelis', 'ciuciundra','baba', 'kulbe', 'sasiska', 'miau', 'kate'];

function find_four_letters (&$words) {
    foreach ($words as $key => $word) {
        if (strlen($word)  !== 4 ) {
            array_splice($words, array_search($word,$words),1);
        }
    }
}
find_four_letters($different_words);
var_dump($different_words);


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







