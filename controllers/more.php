<?php

namespace App\Controllers;

require_once '../classes/Database.php';

use App\Classes\Database;
use PDO;

if (isset($_GET['event'])) {
    $db = new Database();
    $event = $db->query("SELECT e.category_id, DATE_FORMAT(e.date, '%Y-%m-%d') AS date, TIME_FORMAT(e.time, '%H:%i') AS time, e.hometeam_id, e.awayteam_id, e.place, e.description,
        t1.name AS hometeam_name, t1.wins AS hometeam_wins, t1.draws AS hometeam_draws, t1.defeats AS hometeam_defeats, t1.points AS hometeam_points, t1.ground AS hometeam_ground,
        t2.name AS awayteam_name, t2.wins AS awayteam_wins, t2.draws AS awayteam_draws, t2.defeats AS awayteam_defeats, t2.points AS awayteam_points,
        c.id AS category_id, c.name AS category_name
        FROM events AS e
        INNER JOIN categories AS c ON e.category_id = c.id
        INNER JOIN teams AS t1 ON e.hometeam_id = t1.id
        INNER JOIN teams AS t2 ON e.awayteam_id = t2.id
        WHERE e.id = $_GET[event]");
    $event = $event->fetch(PDO::FETCH_ASSOC);
}

require_once '../views/more.view.php';