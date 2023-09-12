<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `highscores` WHERE CONCAT(`player`, `highscore`, `date`, `map`, 'class', 'gamemode') LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `highscores`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "Caleb");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
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
    <a href="searchhigh.php" class="button">Search Highscores</a>
    <a href="searchplay.php" class="button">Search Players</a>
    </div>
</nav>
<h2>Search Highscores</h2>
        <form action="searchhigh.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            <table>
                <tr>
                    <th>Player</th>
                    <th>Highscore</th>
                    <th>Date</th>
                    <th>Map</th>
                    <th>Class</th>
                    <th>Gamemode</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['player'];?></td>
                    <td><?php echo $row['highscore'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['map'];?></td>
                    <td><?php echo $row['class'];?></td>
                    <td><?php echo $row['gamemode'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form><br>

<!-- Footer -->
<footer1>
  <h5>Powered by Caleb Wormald</h5>
</footer1>
</body>
</html>