<!DOCTYPE html>
<html>
<head>
<title>Asphalt 8 Airborne Speedrun Infected</title>
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
      <a href="index.html#about" class="button">About</a>
    </div>
</nav>

<!-- Header -->
<header>

</header>

<!-- Page content -->
<h2>Maps</h2>
<div class="content">
  <div class="box">
    <div class="gallery">
      <a target="_blank" href="Classic">
        <?php
        include('./includes/connect.php');
        $query = "SELECT DISTINCT map FROM highscores WHERE gamemode='Classic'";
        $result = mysqli_query($conn, $query);
        //var_dump($result);
        while ($row=mysqli_fetch_assoc($result)) {
        echo '<tr>
        <td><a target="_blank" href="speedrun.php"><img src="Screenshots/'.$row['map'].'.png" alt="'.$row['map'].'"></a></td>
        </tr>';
        }
        //echo 'done'
        ?>
      </a>
    </div> 
  </div>
</div>

<!-- Footer -->
<footer>
  <h5>Powered by Caleb Wormald</h5>
</footer>
</body>
</html>