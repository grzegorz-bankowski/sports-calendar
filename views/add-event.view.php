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
<h1 style='display: block; margin: 50px auto 0 auto; text-align: center; font-family: Roboto'>Add new event</h1>
<div class='row'>
  <div class='col-75'>
    <div class='container'>
      <form action='/add-event' method='POST'>
     <input type='hidden' name='add_event' value='1'>
        <div class='row'>
          <div class='col-50'>
            <h3>Event details</h3>
            <label for='fname'><i class='fa fa-bullhorn'></i> Event category</label>
            <select name='category' id='s1' required>
            <?php
            for ($x = 0; $x < count($categories); $x++) {
                  echo "<option value='" . $x . "'>" . $categories[$x] . "</option>";
            }
            ?>
          </select>
            <label for='email'><i class='fa fa-user'></i> Home team</label>
            <select name='hometeam' id='s2' required></select>
            <label for='adr'><i class='fa fa-user'></i> Away team</label>
            <select name='awayteam' id='s3' required></select>

            <div class='row'>
              <div class='col-50'>
                <label for='state'><i class='fa fa-calendar-o'></i> Date</label>
                <input type='date' id='state' name='date' required>
              </div>
              <div class='col-50'>
                <label for='zip'><i class='fa fa-clock-o'></i> Time</label>
                <input type='time' id='zip' name='time' required>
              </div>
            </div>

            <div class='row'>
              <div class='col-50'>
                <label for='description'><i class='fa fa-pencil'></i> Description</label>
                <textarea type='text' id='description' name='description' value='' required></textarea>
              </div>
              </div>
          </div>

        </div>
        <input type='submit' value='Add event to calendar' class='btn'>
      </form>
    </div>
  </div>
<script>

function updateSelect(targetId, optionsArray) {
    const select = document.getElementById(targetId);
    const selectedSport = document.getElementById('s1').value;
    select.innerHTML = ''; // Czyścimy stare opcje
    select.disabled = false;

    optionsArray.forEach(team => {
        const opt = document.createElement('option');
        opt.value = team.id;
        // opt.value = sportsData[selectedSport].indexOf(text) + 1;
        opt.textContent = team.name;
        select.appendChild(opt);
    });
}

document.getElementById('s1').onchange = function() {
    const selectedSport = this.value;
    const teams = sportsData[selectedSport];

    if (teams) {
        // Aktualizujemy oba selecty tą samą listą danych
        updateSelect('s2', teams);
        updateSelect('s3', teams);
    } else {
        // Jeśli nic nie wybrano, blokujemy pola
        document.getElementById('s2').disabled = true;
        document.getElementById('s3').disabled = true;
    }
};

</script>
</body>
</html>