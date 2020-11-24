<?php
require './functions.php';

$teams = generate_teams(5);
$matches = generate_matches(5);
$match = generate_match();
$past_matches = filter_past_matches($matches);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Something</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Mitr:wght@300&display=swap" rel="stylesheet">
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
    <section>
        <ul>
            <li><a href="#komandos">Komandos</a></li>
            <li><a href="#rungtynes">Rungtynės</a></li>
            <li><a href="#taskai">Taškų lentelės</a></li>
            <li><a href="#info">Bendra informacija</a></li>
        </ul>
    </section>
    <section>
        <div id='komandos'><a name='komandos'></a>
            <h2>Komandos</h2>
            <table class="table_team">
                <tr class="border">
                    <th class="border">Komandos pavadinimas</th>
                    <th class="border">Trenerio vardas</th>
                    <th class="border">Žaidėjų skaičius</th>
                    <th class="border">Žaidėjai</th>
                    <th class="border">Aukščiausio žaidėjo ūgis</th>
                </tr>
                <?php foreach ($teams as $key => $team): ?>
                    <tr>
                        <td class="border"><?php print $team['team_name']; ?></td>
                        <td class="border"><?php print $team['coach_name']; ?></td>
                        <td class="border"><?php print count($team['players']); ?></td>
                        <?php foreach ($team['players'] as $player): ?>
                            <td class="border column"><?php print $player['position'] . ' ,' . $player['name'] . ' ' . $player['surname']; ?></td>
                        <?php endforeach; ?>
                        <?php usort($team['players'], 'team_players_by_height'); ?>
                        <td class="border"><?php print end($team['players'])['height']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div id='rungtynes'><a name='rungtynes'></a>
            <h2>Rungtynės</h2>
            <table class="table_team">
                <tr class="border">
                    <th class="border">Pirmos komandos pavadinimas</th>
                    <th class="border">Antros komandos pavadinimas</th>
                    <th class="border">Rezultatai</th>
                </tr>
                <?php foreach ($matches as  $match): ?>
                    <tr>
                        <td class="border"><?php print $match['team'][0]['team_name']; ?></td>
                        <td class="border"><?php print $match['team'][1]['team_name']; ?></td>
                        <?php if ($match['result'] === ''): ?>
                            <td class="border"><?php print $match['date']; ?></td>
                        <?php else: ?>
                            <td class="border"><?php print $match['result']; ?></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div id='taskai'><a name='taskai'></a>
            <h2>Taškų lentelės</h2>
            <table class="table_team">
                <tr class="border">
                    <th class="border">Komandos pavadinimas</th>
                    <th class="border">Rungtynių data</th>
                    <th class="border">Rezultatai</th>
                </tr>
                <?php foreach ($past_matches as $key => $match): ?>
                    <tr>
                        <td class="border"><?php print $match['team'][0]['team_name']; ?></td>
                        <td class="border"><?php print $match['team'][1]['team_name']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div id='info'><a name='info'></a>
            <h2>Bendra informacija</h2>
        </div>
    </section>
</main>
</body>
</html>