<?php
    // for local device/database
    include("./includes/localconnect.php");
    // for school database
    include("./includes/connect.php");

    if(isset($_POST['delete']))
{
    // get values from input text
    $hDelete = $_POST['hDelete'];
    $uDelete = $_POST['uDelete'];

    // Initialize result variables
    $hresult = false;
    $uresult = false;

    // Delete by Highscore ID
    if (!empty($hDelete)) {
        $hquery = "DELETE FROM highscores WHERE idhighscores = '$hDelete'";
        $hresult = mysqli_query($conn, $hquery);
    }

    // Delete by Driver
    if (!empty($uDelete)) {
        $uquery = "DELETE FROM users WHERE player = '$uDelete'";
        $uresult = mysqli_query($conn, $uquery);
    }

    // Check if any deletion was successful
    if($hresult || $uresult){
        echo 'Data Deleted';
    }
    else{
        echo 'Data Not Deleted';
    }

        mysqli_close($conn);
    }
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
        <h2>Delete Highscores</h2>
        <form action="delete.php" method="post">

            <label for="hDelete">Delete Highscore:</label><br>
            <input type="text" id="hDelete" name="hDelete" placeholder="Delete Highscore by ID"><br><br>

            <label for="uDelete">Delete User:</label><br>
            <input type="text" id="uDelete" name="uDelete" placeholder="Delete User by Driver"><br><br>

            <input type="submit" name="delete" value="Delete Data From Database">

        </form>
    </div>
    
<!-- Footer -->
    <footer>
    <h5>Powered by Caleb Wormald</h5>
    <p>&copy; 2023 Caleb Wormald</p>
</footer>

</body>

</html>
