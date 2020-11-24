<?php
require './constants.php';

function rand_array_value($array)
{
    return $array[rand(0, count($array) - 1)];
}

function generate_random_player()
{
    return [
        'name' => rand_array_value(NAMES),
        'surname' => rand_array_value(SURNAMES),
        'age' => rand(18, 36),
        'height' => rand(175, 230),
        'position' => rand_array_value(POSITION_TYPES),
    ];
}

function generate_team()
{
    $array = [];
    $array['coach_name'] = rand_array_value(NAMES) . ' ' . rand_array_value(SURNAMES);
    $array['team_logo'] = 'logos/img-' . rand(1, 120) . '.svg';
    $array['team_name'] = ucfirst(rand_array_value(TEAM_ADJECTIVES)) . ' ' . ucfirst(rand_array_value(TEAM_NOUNS));
    for ($x = 0; $x < rand(7, 12); $x++) {
        $array['players'][] = generate_random_player();
    }
    foreach ($array['players'] as &$players) {
        $shirt = generate_rand_num_array(count($array['players']));
        foreach ($shirt as $shirt_number)
            $players['shirt_number'] = $shirt_number;
    }
    return $array;
}

$team_one = generate_team();
$team_two = generate_team();
function generate_rand_num_array($count)
{
    $numbers = range(1, 100);
    shuffle($numbers);
    return array_slice($numbers, 0, $count);
}

function generate_rand_date($start_date, $end_date)
{
    $time = rand(strtotime($start_date), strtotime($end_date));
    return date("Y-m-d", $time);
}

function generate_rand_time()
{
    $time = rand(strtotime('18:00'), strtotime('22:30'));
    return date('H:i', ceil($time / (30 * 60)) * (30 * 60));
}

function generate_score()
{
    $score1 = rand(50, 160);
    $score2 = rand(50, 160);
    return $score1 . ':' . $score2;
}

function generate_match()
{
    $game = [
        'date' => generate_rand_date('2020-10-11', '2020-12-01'),
        'time' => generate_rand_time(),
        'location' => rand_array_value(LOCATIONS),
        'team' => [],
        'result' => generate_score()
    ];
    for ($i = 0; $i < 2; $i++) {
        $game['team'][] = generate_team();
    }
    if ($game['date'] > date('Y-m-d')) {
        $game['result'] = '';
    }
    return $game;
}

$game = generate_match();
function teams_scores($result)
{
    $scores = [];
    if (!$result == '') {
        $scores[0] = substr($result, 0, strrpos($result, ":"));
        $scores[1] = substr($result, strrpos($result, ":") + 1);
    } else {
        $scores[0] = 0;
        $scores[1] = 0;
    }
    return $scores;
}

function one_team_player_count($array)
{
    return count($array['players']);
}

function all_teams_players_count($teams_array)
{
    $players = 0;
    foreach ($teams_array as $team) {
        $players += one_team_player_count($team);
    }
    return $players;
}

function count_average_number($teams_array)
{
    $players = [];
    foreach ($teams_array as $team) {
        $players[] = one_team_player_count($team);
    }
    $average = ceil(array_sum($players) / count($teams_array));

    return $average;
}

function avg_players_per_team($teams)
{
    return floor(all_teams_players_count($teams));
}

function filter_by_teams_player($count, $teams)
{
    $array = [];
    foreach ($teams as $team) {
        $player_count = one_team_player_count($team);
        if ($player_count == $count) {
            $array[] = $team;
        }
    }
    return $array;
}

function count_by_position($position, $team)
{
    $players = 0;
    foreach ($team['players'] as $key => $player) {
        if ($player['position'] === $position) {
            $players++;
        }
    }
    return $players;
}

function generate_teams($number)
{
    $teams = [];
    for ($x = 1; $x <= $number; $x++) {
        $teams[] = generate_team();
    }
    return $teams;
}

function array_by_position($position, $team)
{
    $players = [];
    foreach ($team['players'] as $player) {
        if ($player['position'] === $position) {
            $players[] = $player['name'] . ' ' . $player['surname'];
        }
    }
    return $players;
}

/**
 * @param $position
 * @param $number
 * @param $teams
 * @return array
 */
function teams_by_position($position, $number, $teams)
{
    $teams_filtered = [];
    foreach ($teams as $team) {
        $players = array_by_position($position, $team);
        if (count($players) == $number) {
            $teams_filtered[] = $team;
        }
    }
    return $teams_filtered;
}

function specific_position_players($position, $teams)
{
    $players_filtered = 0;
    foreach ($teams as $team) {
        $players_filtered += count_by_position($position, $team);
    }
    return $players_filtered;
}

function array_from_positions($teams)
{
    $array_of_positions = [];
    foreach (POSITION_TYPES as $position) {
        $array_of_positions[$position] = specific_position_players($position, $teams);
    }
    return $array_of_positions;
}

function max_position_count($teams)
{
    $array_of_positions = array_from_positions($teams);
    $max_position = array_search(max($array_of_positions), $array_of_positions);
    return $max_position;
}

function team_players_by_height($a, $b)
{
    if ($a['height'] == $b['height']) {
        return 0;
    }
    return ($a['height'] < $b['height']) ? -1 : 1;
}

//
$team = generate_team();
$array_by_height = usort($team['players'], 'team_players_by_height');

function generate_matches($quantity)
{
    $matches = [];
    for ($x = 0; $x < $quantity; $x++) {
        $matches[$x] = generate_match();
    }
    return $matches;
}

function first_matched_happened($matches)
{
    $date = [];
    foreach ($matches as $match) {
        $date[] = $match['date'];
    }

    return min($date);
}

function last_matched_happened($matches)
{
    $date = [];
    foreach ($matches as $match) {
        $date[] = $match['date'];
    }
    return max($date);
}

function filter_matches($matches)
{
    $date_today = (date('Y-m-j'));
    $matches_past = [];
    foreach ($matches as $match) {
        $date = $match['date'];
        if ($date < $date_today) {
            $matches_past[] = $date;
        }
    }
    return $matches_past;
}

function filter_past_matches($matches)
{
    $past_matches = [];
    foreach ($matches as $match) {
        if ($match['result'] !== '') {
            $past_matches [] = $match;
        }
    }
    return $past_matches;
}

$matches_past = filter_matches(generate_matches(6));
$match = generate_match();

function assign_points(&$match)
{
    $scores = teams_scores($match['result']);
    foreach ($scores as $key => $score) {
        for ($i = 0; $i < $score; $i++) {
            $player = &$match['team'][$key]['players'][rand(0, count($match['team'][$key]['players']) - 1)];
            if (isset($player['points'])) {
                $player['points'] += 1;
            } else {
                $player['points'] = 1;
            }
        }
    }
}

function generate_scoreboard($match)
{
    $score_board = [];

    foreach ($match['team'] as $index => $team) {
        $score_board[$index]['name'] = $team['team_name'];
        foreach ($team['players'] as $player_key => $player) {
            $score_board[$index]['players'][$player_key]['name'] = $player['name'];
            $score_board[$index]['players'][$player_key]['surname'] = $player['surname'];
            $score_board[$index]['players'][$player_key]['points'] = $player['points'];
        }
    }
    return $score_board;
}

