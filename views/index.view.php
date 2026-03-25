<!doctype html>
<html lang="en">
<head>
    <title>Sports calendar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/26622e28c8.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='css/style.css'>
    <script src="js/zephyr-toast.js"></script>
    <link rel="stylesheet" href="js/zephyr-toast.css">
    <link rel="stylesheet" href="js/zephyr-toast-animate.css">
</head>
<body>
<div class='navbar'>
<a class='active' href='/'><i class='fa fa-fw fa-home'></i> Home</a>
<a href='/add-event'><i class='fa fa-fw fa-plus'></i> Add event</a>
</div>
<?php
echo "<h1 style='display: block; margin: 50px auto 0 auto; text-align: center; font-family: Roboto'>" .  $origin->format('F') . " " . $origin->format('Y') . "</h1>";
?>
<div style='width: 60%; display: grid; grid-template-columns: repeat(7, 1fr); flex-wrap: wrap; margin:25px auto; align:center;'>

<?php
for ($a = 0; $a < 7; $a++) {
    echo "<div style='background-color: #009688; color: white; padding: 10px; border: 1px solid black; border-radius: 5px; margin: 5px; text-align: center'>";
    echo $from->add(new DateInterval("P" . $a . "D"))->format('l');
    echo "</div>";
}

echo "</div>";
echo "<div style='width: 60%; display: grid; grid-template-columns: repeat(7, 1fr); flex-wrap: wrap; margin:25px auto; align:center;'>";

for ($i = 0; $i < $interval_month->days; $i++) {
    if ($from->add(new DateInterval("P" . $i . "D"))->format('Y-m-d') == $origin->format('Y-m-d')) {
        echo "<div style='color:black; font-weight:bold; background-color: yellow; padding: 10px; border: 1px solid black; border-radius: 5px; margin: 5px; text-align: right'>";
        echo "<a style='color:black; text-decoration:none' href='/?date=" . $from->add(new DateInterval('P' . $i . 'D'))->format('Y-m-d') . "'</a>";
        echo $from->add(new DateInterval("P" . $i . "D"))->format('d');
        echo "</a>";
        echo "</div>";
    } else {
        echo "<div style='background-color: lightblue; padding: 10px; border: 1px solid black; border-radius: 5px; margin: 5px; text-align: right'>";
        echo "<a style='color:teal; text-decoration:none; font-weight:bold' href='/?date=" . $from->add(new DateInterval('P' . $i . 'D'))->format('Y-m-d') . "'</a>";
        echo $from->add(new DateInterval("P" . $i . "D"))->format('d');
        echo "</a>";
        echo "</div>";
    }
}
?>
</div>

<h1 style='display: block; margin: 50px auto 0 auto; text-align: center; font-family: Roboto'>All events on <?php echo $origin->format('d-m-Y') ?></h1>

<div style='width: 60%; display: grid; grid-template-columns: auto; flex-wrap: wrap; margin:25px auto; align:center;'>
<table style='width: 100%; text-align: center; border: 1px solid black; border-radius: 5px; border-collapse: collapse;'>
<tr style='background-color: #ff5722; color: white'>
<th style='padding: 8px;'>#</th>
<th>Date</th>
<th>Time</th>
<th>Sport</th>
<th>Event</th>
<th>Location</th>
<th>Action</th>
</tr>
<?php
$x = 1;
foreach ($events as $event) {
    echo "<tr style='font-weight: bold' class='events'>";
    echo "<td style='padding: 8px;'>" . $x . "</td>";
    echo "<td>" . $event['date'] . "</td>";
    echo "<td>" . $event['time'] . "</td>";
    echo "<td>" . $event['category_name'] . "</td>";
    echo "<td>" . $event['hometeam_name'] . " vs " . $event['awayteam_name'] . "</td>";
    echo "<td>" . $event['ground'] . "</td>";
    echo "<td><a class='more' href=/more?event=" . $event['id'] . ">More</a></td>";
    echo "</tr>";
    $x++;
}
?>
</table>
</div>
</body>
</html>