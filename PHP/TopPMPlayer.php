<?php
// Database configuration
$servername = "dbase.cs.jhu.edu";
$username = "23fa_sshou2";
$password = "FvSwsoKs9l";
$dbname = "23fa_sshou2_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    // Prepare the call to the stored procedure
$result = $conn->query("CALL TopPMPlayer()");

if ($result && $result->num_rows > 0) {
    // Start the HTML table
    // Fetch and display the result in a table row
    $row = $result->fetch_assoc();
    
    
    echo "The player with greatest plus minus performance is " . $row['PLAYER_NAME'] . " with player id " . $row['PLAYER_ID'] . "<br>";
    echo "He got a plus minus of +" . $row['Max_PlusMinus'] . ", scoring " . $row['PTS'] . " points in " . $row['MIN'] . " minutes.<Br>";
    echo "With such dominant performance, he helped " . $row['TEAM_ABBREVIATION'] . " get a win that night.";

} else {
    echo "No results found or an error occurred.";
}

// Close the connection
$conn->close();
?>