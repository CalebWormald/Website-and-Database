<?php
    //for local device/database
    include("./includes/localconnect.php");
    //for school database
    include("./includes/connect.php");

?>
<html>

<head>
<title>Asphalt 8 Airborne Speedrun</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="./main.css">

<script>
    // Check if the browser supports localStorage
    if (typeof localStorage !== 'undefined') {
        // Browser supports localStorage
        // You can use localStorage here if needed
    } else {
        // Browser does not support localStorage
        // Provide a fallback or show a message to the user
        console.error('Your browser does not support localStorage.');
    }
</script>

</head>
<body>

<!-- Navbar (sit on top) -->
<nav>
    <a href="index.php" class="button"><img src="logoimage.png" alt="Logo"></a>
    <!-- Float links to the right -->
    <div class="links">
    <a href="inserthigh.php" class="button">Insert Speedruns</a>
            <a href="insertplay.php" class="button">Insert Players</a>
            <a href="delete.php" class="button">Delete</a>
            <a href="searchhigh.php" class="button">Search Highscores</a>
            <a href="searchplay.php" class="button">Search Players</a>
    </div>
</nav>
<div class="content">
    <h2>Insert Highscores</h2>
    <form action="inserthigh.php" method="post">
        
        <label for="player">Player:</label><br>
        <input type="text" id="player" name="player" required placeholder="Player"><br><br>

        <label for="highscore">Highscore:</label><br>
        <input type="number" id="highscore" name="highscore" required placeholder="Highscore" step="0.001" min="0" max="1000"><br><br>

        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required placeholder="Date"><br><br>

        <label for="map">Map:</label><br>
        <input type="text" id="map" name="map" required placeholder="Map"><br><br>

        <label for="class">Class:</label><br>
        <input type="text" id="class" name="class" required placeholder="Class"><br><br>

        <label for="gamemode">Gamemode:</label><br>
        <input type="text" id="gamemode" name="gamemode" required placeholder="Gamemode"><br><br>


        <input type="submit" name="insert" value="Add Data To Database">

    </form>

<?php
if(isset($_POST['insert']))
{
    // get values form input text and number
    $player = $_POST['player'];
    $highscore = $_POST['highscore'];
    $date = $_POST['date'];
    $map = $_POST['map'];
    $class = $_POST['class'];
    $gamemode = $_POST['gamemode'];

    // mysql query to insert data
    $query = "INSERT INTO highscores (`player`, `highscore`, `date`, `map`, `class`, `gamemode`) VALUES ('$player','$highscore','$date','$map','$class','$gamemode')";
    
    $result = mysqli_query($conn, $query);

    // check if mysql query successful
    if($result){
        echo 'Data Inserted';
    }
    else{
        echo 'Data Not Inserted';
    }

    mysqli_close($conn);
}
?>
</div>
</body>
<!-- Footer -->
<footer>
  <h5>Powered by Caleb Wormald</h5>
  <p>&copy; 2023 Caleb Wormald</p>
</footer>

</html>