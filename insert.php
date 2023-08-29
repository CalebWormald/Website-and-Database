<!DOCTYPE html>
<html>
<head>
<title>Asphalt 8 Airborne Speedrun Insert</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css2.css">

</head>
<body>

<!-- Navbar (sit on top) -->
<nav>
  <a href="index.php">
    <img src="../logo.png" alt="Logo">
  </a>
  <!-- Float links to the right -->
    <div class="links">
      <a href="insert.php" class="button">Insert Speedrun</a>
      <a href="#about" class="button">About</a>
    </div>
</nav>

<header></header>

<!-- Page content -->
<h2>Insert Speedrun</h2>
<div class="content">
  <div class="box">
    <div class="gallery">
    <form>
      <label for="Username">Username:</label><br>
      <input type="text" id="Username" name="Username"><br><br>
      <label for="date">Date:</label><br>
      <input type="date" id="date" name="date"><br><br>
      <label for="highscore">Highscore:</label><br>
      <input type="number" id="highscore" name="highscore" step="0.001" min="0" max="1000"><br><br>
      <label for="gamemode">Gamemode:</label><br>

      <?php
        
        include('./includes/connect.php');
        $gquery = "SELECT DISTINCT gamemode FROM highscores";
        $result = mysqli_query($conn, $gquery);
        //var_dump($result);
        while ($row=mysqli_fetch_assoc($result)) {
        echo '<tr>
        <td><input class="button" type="radio" id="'.$row['gamemode'].'" name="gamemode" value="'.$row['gamemode'].'">
        <label for="class"><img src="Screenshots/'.$row['gamemode'].'.png" alt="'.$row['gamemode'].'"></label></td>
        </tr>';
        }?>
        <br>
        <?php
        $cquery = "SELECT DISTINCT class FROM highscores";
        $result = mysqli_query($conn, $cquery);
        //var_dump($result);
        while ($row=mysqli_fetch_assoc($result)) {
        echo '<tr>
        <td><input class="button" type="radio" id="'.$row['class'].'" name="class" value="'.$row['class'].'">
        <label for="class"><img src="Screenshots/Class'.$row['class'].'.png" alt="Class '.$row['class'].'"></label></td>
        </tr>';
        }?>
        <br>
        <?php
        include('./includes/connect.php');
        $mquery = "SELECT DISTINCT map FROM highscores";
        $result = mysqli_query($conn, $mquery);
        //var_dump($result);
        while ($row=mysqli_fetch_assoc($result)) {
        echo '<tr>
        <td><input class="button" type="radio" id="'.$row['map'].'" name="map" value="'.$row['map'].'">
        <label for="class"><img src="Screenshots/'.$row['map'].'.png" alt="'.$row['map'].'"></label></td>
        </tr>';
        }?><br>

        <br><br>
        <input type="submit" value="Submit">
        <?php
        //insert into database
        $player = $_GET['Username'];
        $highscore = $_GET['highscore'];
        $gamemode = $_GET['gamemode'];
        $class = $_GET['class'];
        $map = $_GET['map'];
        $date = $_GET['date'];

        $sql = "INSERT INTO `highscores` (`idhighscores`, `player`, `highscore`, `date`, `map`, `class`, `gamemode`) VALUES (NULL, \'$player\', \'$highscore\', \'$date\', \'$map\', \'$class\', \'$gamemode\');";

        $result= @mysqli_query ($conn, $query);
        ?>
      </form>
    </div> 
  </div>
</div>
<!-- Footer -->
<footer>
  <h5>Powered by Caleb Wormald</h5>
</footer> 
</body>
</html