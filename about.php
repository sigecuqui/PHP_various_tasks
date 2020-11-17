<?php
require 'functions.php';

$match = generate_match();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>About</title>
</head>
<body class="body">
<header>
    <nav>
        <ul>
            <li><a href="index.php">NAMŲ PUSLAPIS</a></li>
            <li><a href="about.php">APIE PASISKAITYTI</a></li>
            <li><a href="contact_us.php">SUKONTAKTUOKIME</a></li>
        </ul>
    </nav>
</header>
<main class="about_main">
    <?php foreach ($match['teams'] as $team): ?>
        <section class="team-info">
            <div class="coach">
                <h2><?php print $team['name']; ?></h2>
                <h3 class="red">Trenerukas: <?php print $team['coach']; ?></h3>
                <img src="https://c.shld.net/rpx/i/s/pi/mp/25527/prod_2646570004?src=http%3A%2F%2Fwww.onellc.biz%2Fauction_images%2F1200x1200%2F90161.jpg&d=ea3852c26135644e5284b458909d25527fcb3cd7&?hei=64&wid=64&qlt=50"
                     alt="coach">
            </div>
            <div class="players">
                <?php foreach ($team['players'] as $player): ?>
                    <div class="player">
                        <h4 class="red">Žaidėjas: <?php print $player['name'] . ' ' . $player['surname']; ?></h4>
                        <p>Jo meteliai: <?php print $player['age']; ?></p>
                        <p>Aukštumas: <?php print $player['height']; ?></p>
                        <p>Pozicija: <?php print $player['position']; ?></p>
                        <p>Numeriukas: <?php print $player['shirt_number']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endforeach; ?>
</main>
</body>
</html>