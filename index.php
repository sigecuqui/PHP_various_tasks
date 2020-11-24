<?php
require 'functions.php';

$match = generate_match();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">
<header>
    <nav>
        <ul>
            <li><a href="index.php">HOME PAGE</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="contact_us.php">CONTACT US</a></li>
            <li><a href="statistics.php">STATISTICS</a></li>
        </ul>
    </nav>
</header>
<main>
    <h1 class="title">KAMUOLIO ŽAIDIMO RUNGTYNIŲ SEZONAS</h1>
    <section>
        <div class="time">
            <p><?php print $match['date']; ?></p>
            <p><?php print $match['time']; ?></p>
        </div>
        <p class="location"><?php print $match['location']; ?></p>
        <h2 class="title_2">ŽAIDĖJŲ GRUPUOTĖS</h2>
        <article class="teams_div">
            <?php foreach ($match['team'] as $team): ?>
                <div class="team">
                    <img class="logo" src="/logos/img-<?php print $team['team_logo'] ;?>.svg" alt="logos">
                    <p class="team_name"><?php print $team['team_name']; ?></p>
                </div>
            <?php endforeach; ?>
        </article>
        <p class="score"><?php print $match['result']; ?></p>
    </section>
</main>
</body>
</html>