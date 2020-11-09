<?php

$arr_1 = [2, 7, 4, 9, 6, 1, 6, 3];

$arr_2 = [2, 7, 9, 1, 6, 1, 6, 3];

$is_special = '';
foreach ($arr_1 as $index => $value) {
    print "index is: $index and value is: $value </br>";

    if ($index % 2 === 0) {
        if ($value % 2 !== 0) {
            $is_special = 'array not special';
            break;
        } else {
            $is_special = 'array is special';
        }
    } else {
        if ($value % 2 === 0) {
            $is_special = 'array not special';
            break;
        }
    }
}

var_dump($arr_1);
print $is_special;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lucky</title>
    <style>

</head>
<body>
</body>
</html>







