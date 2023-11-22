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
    <h2>Insert Player</h2>
    <form action="insertplay.php" method="post">
        
        <label for="player">Player:</label><br>
        <input type="text" id="player" name="player" required placeholder="Player"><br><br>

        <label for="fname">First Name:</label><br>
        <input type="text" id="fname" name="fname" required placeholder="First Name"><br><br>

        <label for="lname">Last Name:</label><br>
        <input type="text" id="lname" name="lname" required placeholder="Last Name"><br><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required placeholder="Email"><br><br>

        <input type="submit" name="insert" value="Add Data To Database">

    </form>
</div>
<!-- Footer -->
<footer>
  <h5>Powered by Caleb Wormald</h5>
  <p>&copy; 2023 Caleb Wormald</p>
</footer>
</body>
<?php
// Check if the form was submitted
if (isset($_POST['insert'])) {
    // Get values from the form
    $player = $_POST['player'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    // MySQL query to insert data
    $query = "INSERT INTO users (`player`, `fname`, `lname`, `email`) VALUES ('$player', '$fname', '$lname', '$email')";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check for errors
    if (!$result) {
        // Display error and description if query fails
        echo 'Error: ' . mysqli_error($conn);
    } else {
        // If successful, display a success message
        echo 'Data Inserted';
    }

    // Close the connection
    mysqli_close($conn);
}
?>
</html>