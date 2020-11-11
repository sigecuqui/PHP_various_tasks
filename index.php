<?php

$user_inputs = [
    ["catr", "blue", "skt", "umbrells", "paddy"],
    ["it", "is", "find"],
    ["aprinl", "showrs", "bring", "may", "flowers"],
    ['weird', 'indicr', 'moment', 'starry', 'wind', 'skies'],
];

$correct_texts = [
    ["cat", "blue", "sky", "umbrella", "paddy"],
    ["it", "is", "fine"],
    ["april", "showers", "bring", "may", "flowers"],
    ['weird', 'indict', 'moment', 'starry', 'wind', 'skies'],
];

function check_typing($user_array, $correct_array) {
    $array = [];

    for ($i = 0; $i < count($user_array); $i++) {
        if ($user_array[$i] === $correct_array[$i]) {
            $array[] = 1;
        } else $array[] = -1;
    }

    return $array;
}

var_dump(check_typing($user_inputs[3], $correct_texts[3]));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

</body>
</html>







