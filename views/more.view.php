<!doctype html>
<html lang="en">
<head>
    <title>Sports calendar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/26622e28c8.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='css/style.css'>
</head>
<link rel='stylesheet' href='css/style.css'>
<body>
<div class='navbar'>
<a href='/'><i class='fa fa-fw fa-home'></i> Home</a>
<a class='active' href='/add-event'><i class='fa fa-fw fa-plus'></i> Add event</a>
</div>
<h1 style='display: block; margin: 25px auto 0 auto; text-align: center; font-family: Roboto'><?php echo $event['hometeam_name'] . " <span style='color:red'>vs </span>" . $event['awayteam_name'] ?></h1>
<div class='row' style='display: block; width: 60%; margin: 0 auto;'>
    <div class='col-25'>
    <div class='container'>
        <div class='row'>
          <div class='col-50'>
            <h3 style="color: #45a049">Event details</h3>
            <label for='fname'><i class='fa fa-futbol'></i> Event category</label>
            <input type="text" value="<?php echo $event['category_name']; ?>" readonly>
            <label for='email'><i class='fa fa-users'></i> Home team</label>
            <input type="text" value="<?php echo $event['hometeam_name']; ?>" readonly>
            <label for='adr'><i class='fa fa-users'></i> Away team</label>
            <input type="text" value="<?php echo $event['awayteam_name']; ?>" readonly>
            <label for='place'><i class='fa fa-city'></i> Place</label>
            <input type="text" value="<?php echo $event['place']; ?>">
            <div class='row'>
              <div class='col-50'>
                <label for='state'><i class='fa fa-calendar-o'></i> Date</label>
                <input type='text' id='state' name='date' value="<?php echo $event['date']; ?>" readonly>
              </div>
              <div class='col-50'>
                <label for='zip'><i class='fa fa-clock-o'></i> Time</label>
                <input type='text' id='zip' name='time' value="<?php echo $event['time']; ?>" readonly>
              </div>
            </div>
            <div class='row'>
              <div class='col-50'>
                <label for='description'><i class='fa fa-pencil'></i> Description</label>
                <textarea type='text' id='description' name='description' readonly><?php echo $event['description']?></textarea>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
    <h1 style='display: block; margin: 25px auto 0 auto; text-align: center; font-family: Roboto'>Statistics</h1>
    <div class='col-25'>
        <div class='container'>
            <h3 style="color: #45a049"><?php echo $event['hometeam_name'] ?></h3>
            <div class='row'>
                <div class='col-25'>
                    <label for='home'><i class='fa fa-futbol'></i> Points</label>
                    <input type="text" value="<?php echo $event['hometeam_points']; ?>" readonly>
                </div>
                <div class='col-25'>
                    <label for='home'><i class='fa fa-trophy'></i> Wins</label>
                    <input type="text" value="<?php echo $event['hometeam_wins'] ?>" readonly>
                </div>
                <div class='col-25'>
                    <label for='home'><i class='fa fa-people-arrows'></i> Draws</label>
                    <input type="text" value="<?php echo $event['hometeam_draws'] ?>" readonly>
                </div>
                <div class='col-25'>
                    <label for='home'><i class='fa fa-running'></i> Defeats</label>
                    <input type="text" value="<?php echo $event['hometeam_defeats'] ?>" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class='col-25'>
        <div class='container'>
            <h3 style="color: #45a049"><?php echo $event['awayteam_name'] ?></h3>
            <div class='row'>
                <div class='col-25'>
                    <label for='home'><i class='fa fa-futbol'></i> Points</label>
                    <input type="text" value="<?php echo $event['awayteam_points']; ?>" readonly>
                </div>
                <div class='col-25'>
                    <label for='home'><i class='fa fa-trophy'></i> Wins</label>
                    <input type="text" value="<?php echo $event['awayteam_wins'] ?>" readonly>
                </div>
                <div class='col-25'>
                    <label for='home'><i class='fa fa-people-arrows'></i> Draws</label>
                    <input type="text" value="<?php echo $event['awayteam_draws'] ?>" readonly>
                </div>
                <div class='col-25'>
                    <label for='home'><i class='fa fa-running'></i> Defeats</label>
                    <input type="text" value="<?php echo $event['hometeam_defeats'] ?>" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>