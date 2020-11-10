<?php

/**
 * Separates odd and even numbers, puts in separate arrays
 *
 * @param $array
 * @return array[]
 */
function partition($array)
{
$evens = [];
$odds = [];
foreach ($array as $value) {
    if ($value % 2 === 0) {
        $evens[] = $value;
    } else {
        $odds[] = $value;
    }
}

    return ['evens' => $evens, 'odds' => $odds];

/**
 * Changes original array by separating odd and even numbers
 *
 * @param $array
 */
function partition_ref(&$array)
{
    $evens = [];
    $odds = [];
    foreach ($array as &$value) {
        if ($value % 2 === 0) {
            $evens[] = $value;
        } else {
            $odds[] = $value;
        }
    }

    $array = ['evens' => $evens, 'odds' => $odds];
}
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







