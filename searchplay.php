<?php
    //for local device/database
    include("./includes/localconnect.php");
    //for school database
    include("./includes/connect.php");

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users` WHERE CONCAT(`player`, `fname`, `lname`, `email`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `users`";
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
    <title>Search Players</title>
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
<h2>Search Players</h2>
        <form action="searchplay.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>Player</th>
                    <th>First Name</th>
                    <th>Last name</th>
                    <th>Email</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['player'];?></td>
                    <td><?php echo $row['fname'];?></td>
                    <td><?php echo $row['lname'];?></td>
                    <td><?php echo $row['email'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form><br>

<!-- Footer -->
<footer>
  <h5>Powered by Caleb Wormald</h5>
  <p>&copy; 2023 Caleb Wormald</p>
</footer>
    </body>
</html>