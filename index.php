<?php

if (!empty($_POST)) {
    $amount = $_POST['amount'];
    $total_icons = 4;
    $icons = [];
    $won = true;

    for ($i = 1; $i <= $total_icons; ++$i) {
        $random_number = rand(1, 2);
        $icons[] = $random_number;

        if(count(array_unique($icons)) !== 1){
            $won = false;
        }
    }

    if ($won) {
        $result = "Laimėjai " . number_format($total_icons * $amount, 2) . " Eur!";
    } else {
        $result = "Pralošei savo pinigėlius... net " . number_format($amount, 2) . " Eur!";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lucky</title>
    <style>
        body {
            padding-top: 50px;
            text-align: center;
            font-family: Bahnschrift;
        }

        .container {
            width: 600px;
            margin: auto;
            letter-spacing: 2px;
            padding: 10px;
        }

        .icons {
            padding: 30px 0;
            display: flex;
            justify-content: space-around;
        }

        .icon {
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            width: 100px;
            height: 100px;
        }

        .icon-1 {
            background-image: url("https://lh3.googleusercontent.com/proxy/VOop_GWEylbkeebnj7Ze9SHClbPbIcFxVR6-G7LOFXKhhxnw7y5VkaaRK9cWv6FBrvjF7iDE6GjMnepofuw1WVwZHIvDzDSGLx9KLfYx-BLip3iXqhZ22CHMfiT9p18a");
        }

        .icon-2 {
            background-image: url("https://img2.pngio.com/beer-bottle-png-corona-corona-extra-bo-1176498-png-images-pngio-cerveza-corona-light-png-920_1540.png");
        }

    </style>
</head>
<body>
<form method="post">
    <input type="number" name="amount" placeholder="Jūsų statoma suma" value="<?php print $amount ?? null ?>">
    <button type="submit">Žaisti</button>
</form>
<div class="container">
    <?php if (isset($amount)) : ?>
        <div>Žaidžiama iš: <?= $amount ?> Eur</div>
        <?php if (isset($icons)): ?>
            <div class="icons">
                <?php foreach ($icons as $icon): ?>
                    <div class="icon icon-<?php print $icon ?>"></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div><?= $result ?></div>
    <?php endif; ?>
</div>

</body>
</html>







