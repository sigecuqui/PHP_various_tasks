<?php

$params = [];

$fields = ['vardas', 'pavarde'];

foreach ($fields as $field) {
    $params[$field] = FILTER_SANITIZE_SPECIAL_CHARS;
}

$input = filter_input_array(INPUT_POST, [
    'vardas' => FILTER_SANITIZE_SPECIAL_CHARS,
    'pavarde' => FILTER_SANITIZE_SPECIAL_CHARS
]);

var_dump($input);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="POST">
    <input type="text" name="vardas" value="<Bocmanas>">
    <input type="text" name="pavarde" value="Bebrauskas">
    <button name="action1" value="save">Save</button>
    <button name="action2" value="delete">Delete</button>
</form>
</body>
</html>







