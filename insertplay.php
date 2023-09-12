<?php

// php code to Insert data into mysql database from input text
if(isset($_POST['insert']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "Caleb";
    
    // get values form input text and number

    $player = $_POST['player'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    // connect to mysql database using mysqli

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // mysql query to insert data

    $query = "INSERT INTO `users`(`player`, `fname`, `lname`, 'email') VALUES ('$player',`$fname`, `$lname`, '$email)";
    
    $result = mysqli_query($connect,$query);
    
    // check if mysql query successful

    if($result){
        echo 'Data Inserted';
    }
    
    else{
        echo 'Data Not Inserted';
    }
    
    mysqli_free_result($result);
    mysqli_close($connect);
}

?>

<!DOCTYPE html>

<html>

<head>
<title>Asphalt 8 Airborne Speedrun</title>
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
<h2>Insert Players</h2>
    <form action="index.php" method="post">

        <label for="player">Player:</label><br>
        <input type="text" name="player" required placeholder="Player"><br><br>

        <label for="player">First Name:</label><br>
        <input type="text" name="fname" required placeholder="First Name"><br><br>

        <label for="player">Last Name:</label><br>
        <input type="text" name="lname" required placeholder="Last Name"><br><br>

        <label for="player">Email:</label><br>
        <input type="text" name="email" required placeholder="Email"><br><br>

        <input type="submit" name="insert" value="Add Data To Database">
    </form><br>

<!-- Footer -->
<footer>
  <h5>Powered by Caleb Wormald</h5>
</footer>
</body>

</html>
