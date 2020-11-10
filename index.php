<?php

$array = [3, 6, 7, 10, 5];

function multiply_by_length($array)
{
    $generated = [];
    $length = count($array);
    foreach ($array as $arr) {
        $generated[] = (int)$arr * $length;
    }
    return $generated;
}

function multiply_by_length_ref(&$array)
{
    foreach ($array as &$value) {
        $value *= count($array);
    }

}

multiply_by_length_ref($array);
var_dump($array);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks</title>
    <style>
        <
        /
        head >
        < body >
        <

        /
        body >
        <

        /
        html >







