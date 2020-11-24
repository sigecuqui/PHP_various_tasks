<?php
require 'functions.php';

$user_data = [];
$show_form = true;

if (!empty($_POST)) {
    $user_data['name'] = 'Vardas: ' . ($_POST['name']);
    $user_data['email'] = 'El. pašto adresas: ' . $_POST['email'];
    $user_data['phone'] = 'Telefono numeris: ' . $_POST['phone'];
    $user_data['message'] = 'Žinutė: ' . $_POST['message'];
    $show_form = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About</title>
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
<?php if ($show_form): ?>
    <main id="block">
    <section class="form-block">
        <form method="post" class="form">
            <input type="text" placeholder="Jūsų vardas" name="name" required>
            <input type="email" placeholder="El. Paštas" name="email" required>
            <input type="tel" placeholder="Telefono numeris" name="phone" pattern="[0-9]{3}[0-9]{2}[0-9]{4}">
            <textarea name="message" placeholder="Jūsų žinutė.." cols="20" rows="3"></textarea>
            <button type="submit">Siųsti</button>
        </form>
    </section>
<?php else: ?>
    <div class="message-block">
        <h3>Dėkojame už jūsų žinutę, <?php print $_POST['name']; ?></h3>
        <div class="message-info">
            Jūsų pateikta informacija:
            <?php foreach ($user_data as $user_info): ?>
                <p><?php print $user_info; ?></p>
            <?php endforeach; ?>
        </div>
    </div>
    </main>
<?php endif; ?>
</body>
</html>