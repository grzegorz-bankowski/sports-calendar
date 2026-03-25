<?php

namespace App\Controllers;

require_once "../classes/Database.php";
require_once "../classes/Notify.php";

use App\Classes\Database;
use App\Classes\Notify;
use DateTimeImmutable;
use DateInterval;

if (isset($_GET['date'])) {
    $date = strtotime($_GET['date']);
} else {
    $date = strtotime("now");
}
$origin = date("Y-m-d", $date);
$for_sql = date("Y-m-d", $date);
$month_origin = date("m", $date);
$nextMonthDate = strtotime("+1 month");
$month = date("m", $nextMonthDate);
$year = date("Y", $nextMonthDate);

$origin = new DateTimeImmutable($origin);
$target = new DateTimeImmutable($year . '-' . $month . '-' . '01');
$from = new DateTimeImmutable($year . '-' . $month_origin . '-' . '01');
$from_day_name = date("l", $from->getTimestamp());
$interval_from = $origin->diff($from);
$interval_to = $origin->diff($target);
$interval_month = $target->diff($from);

$db = new Database();
$events = $db->query("SELECT e.id, e._category, DATE_FORMAT(e.date, '%W, %d-%m-%Y') AS date, TIME_FORMAT(e.time, '%H:%i') AS time, e._hometeam, e._awayteam, e.description,
    t1.name AS hometeam_name, t1.ground AS ground,
    t2.name AS awayteam_name,
    c.id AS cat_id, c.name AS category_name
FROM events e
INNER JOIN teams t1 ON e._hometeam = t1.id 
INNER JOIN teams t2 ON e._awayteam = t2.id 
INNER JOIN categories c ON e._category = c.id 
WHERE e.date = '$for_sql'");
$events = $events->fetchAll();

require_once '../views/index.view.php';

if (isset($_GET['event']) && $_GET['event'] == 'success') {
    $info = new Notify();
    $info->Info('Event successfully added!');
}

if (isset($_GET['url']) && $_GET['url'] == 'invalid') {
    $error = new Notify();
    $error->Error('This url is invalid or does not exist!');
}
