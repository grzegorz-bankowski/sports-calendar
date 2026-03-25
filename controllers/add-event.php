<?php

namespace App\Controllers;

require_once '../classes/Database.php';

use App\Classes\Database;
use DateTime;
use PDO;

if (isset($_POST['add_event'])) {
    if ($_POST['add_event'] == '1') {
        $categoryId = $_POST['category'];
        $hometeamId = $_POST['hometeam'];
        $awayteamId = $_POST['awayteam'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $time = new DateTime($time);
        $time = $time->format('H:i:s');
        $description = $_POST['description'];
        $db = new Database();
        $event = $db->query("INSERT INTO events (category_id, `date`, `time`, hometeam_id, awayteam_id, description) VALUES ($categoryId, '$date', '$time', $hometeamId, $awayteamId, '$description')");
        if ($event->rowCount() > 0) {
            header("location: ./?event=success");
        } else {
            echo "Event not created";
        }
    }
}

$db = new Database();
$db = $db->query("SELECT id, category_id, name FROM teams");
$teams = $db->fetchAll(PDO::FETCH_ASSOC);

$sportsData = [];

foreach ($teams as $team) {
    $sportsData[$team['category_id']][] = [
        'id' => $team['id'],
        'name' => $team['name']
        ];
}

echo "<script>const sportsData = " . json_encode($sportsData) . "</script>";

$categories = [0 => 'Select category', 1 => 'Football', 2 => 'Volleyball'];

require_once '../views/add-event.view.php';
