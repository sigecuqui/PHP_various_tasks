<?php
require 'constants.php';

/**
 * Random masyvo vertė
 * @param $array
 * @return mixed
 */
function rand_array_value($array)
{
    return $array[rand(0, count($array) - 1)];
}

/**
 * Random žaidėjai
 * @return array
 */
function generate_player()
{
    return [
        'name' => rand_array_value(NAMES),
        'surname' => rand_array_value(SURNAMES),
        'age' => rand(18, 36),
        'height' => rand(175, 230),
        'position' => rand_array_value(POSITION_TYPES)
    ];
}

/**
 * Random numeriai
 * @param $count
 * @return array
 */
function generate_rand_num_array($count)
{
    $rand_numbers = [];
    $numbers = range(1, 100);
    shuffle($numbers);
    for ($x = 0; $x < $count; $x++) {
        $rand_numbers[] = $numbers[$x];
    }

    return $rand_numbers;
}

/**
 * Komandų sudarymas
 * @return array
 */
function generate_team()
{
    $team = [
        'name' => ucfirst(rand_array_value(TEAM_ADJECTIVES)) . ' ' . ucfirst(rand_array_value(TEAM_NOUNS)),
        'coach' => rand_array_value(NAMES) . ' ' . rand_array_value(SURNAMES),
        'team_logo' => rand(1, 120),
        'players' => []
    ];
    for ($i = 0; $i <= rand(7, 12); $i++) {
        $team['players'][] = generate_player();
    }
    foreach ($team['players'] as &$player) {
        $shirts = generate_rand_num_array(count($team['players']));
        foreach ($shirts as $shirt_number) {
            $player['shirt_number'] = $shirt_number;
        }
    }
    return $team;
}

/**
 * Funkcija generuoja rungtynių datą
 * @param $start
 * @param $end
 * @return false|string
 */
function generate_rand_date($start, $end)
{
    $min = strtotime($start);
    $max = strtotime($end);
    $value = mt_rand($min, $max);

    return date('Y-m-d', $value);
}

/**
 * Funkcija generuoja rungtynių laiką
 * @return false|string
 */
function generate_rand_time()
{
    // Convert to timestamps
    $min = strtotime('18:00');
    $max = strtotime('22:30');

    // Generate random number within range
    $random_time = rand($min, $max);

    // Round minute down to nearest half hour.
    // 1800 = 30 minutes X 60 seconds
    $rounded_time = round($random_time / 1800) * 1800;

    // Convert back to string with appropriate date format
    return date('H:i', $rounded_time);
}

/**
 * Funkcija generuoja rungtynių taškus
 * @return string
 */
function generate_score()
{
    return mt_rand(50, 160) . ':' . mt_rand(50, 160);
}

/**
 * @return array
 */
function generate_match()
{
    $match = [
        'date' => $date = generate_rand_date('2020-10-11', '2020-12-01'),
        'time' => generate_rand_time(),
        'location' => rand_array_value(LOCATIONS),
        'teams' => [],
        'result' => $date <= (date("Y-m-d")) ? generate_score() : '0:0'
    ];
    for ($i = 0; $i < 2; $i++) {
        $match['teams'][] = generate_team();
    }
    return $match;
}

/**
 * Funkcija atskiria rezultatus ir priskiria komandoms
 *
 * @param $score
 * @return array
 */
function teams_scores($score)
{
    $scores = [];
    $scores['team1_score'] = substr($score, 0, strrpos($score, ':'));
    $scores['team2_score'] = substr($score, strrpos($score, ':') + 1);
    return $scores;
}
