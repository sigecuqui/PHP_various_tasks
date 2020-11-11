<?php

$people = ['Antanina', 'Bzegosz', 'Pampalomira', 'Sklermanta', 'Belzebubijus', 'Lachudrija'];

function people_likes(array $people): string
{
    $liked = '';
    if (count($people) == 0) {
        $liked .= 'No one ';
    } elseif (count($people) < 4) {
        foreach ($people as $name) {
            $liked .= $name . ', ';
        }
    } elseif (count($people) >= 4) {
        for ($i = 0; $i < 2; $i++) {
            $liked .= $people[$i] . ', ';
        }
        $liked .= 'and ' . (count($people) - 2) . ' others ';
    }
    $liked .= 'likes this';
    return $liked;
}

var_dump(people_likes($people));
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







