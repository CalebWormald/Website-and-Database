<?php
    // Include the appropriate connection file
    include("./includes/localconnect.php"); // For local device/database
    // include("./includes/connect.php"); // For school database

    if (isset($_POST['search'])) {
        $valueToSearch = $_POST['valueToSearch'];
        $query = "SELECT * FROM highscores WHERE 
        player LIKE '%$valueToSearch%' OR 
        highscore LIKE '%$valueToSearch%' OR 
        date LIKE '%$valueToSearch%' OR 
        map LIKE '%$valueToSearch%' OR 
        class LIKE '%$valueToSearch%' OR 
        gamemode LIKE '%$valueToSearch'";
        $search_result = mysqli_query($conn, $query);
    } else {
        $query = "SELECT * FROM highscores ORDER BY highscore ASC";
        $search_result = mysqli_query($conn, $query);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Highscores</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./main.css">
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
    
    <h2>Search Highscores</h2>
    <form action="searchhigh.php" method="post">
        <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
        <input type="submit" name="search" value="Filter"><br><br>
    </form>
    
    <table>
        <tr>
            <th>Player ID</th>
            <th>Player</th>
            <th>Highscore</th>
            <th>Date</th>
            <th>Map</th>
            <th>Class</th>
            <th>Gamemode</th>
        </tr>
        
        <?php while ($row = mysqli_fetch_array($search_result)) : ?>
            <tr>
                <td><?php echo $row['idhighscores'];?></td>
                <td><?php echo $row['player'];?></td>
                <td><?php echo $row['highscore'];?></td>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['map'];?></td>
                <td><?php echo $row['class'];?></td>
                <td><?php echo $row['gamemode'];?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>

    <!-- Footer -->
<!--<footer>
  <h5>Powered by Caleb Wormald<h5>
  <p>&copy; 2023 Caleb Wormald</p>
</footer>
</body>
</html>-->
