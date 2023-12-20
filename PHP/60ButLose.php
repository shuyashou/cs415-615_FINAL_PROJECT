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

$stmt = $conn->prepare("CALL 60ButLose(@num)");


// Execute the stored procedure
$stmt->execute();

// Fetch results
$result = $conn->query("SELECT @num");
$performance = $result->fetch_assoc();

echo "For the past 10 seasons, number of teams shot with over 60% field goal percentage but ended up losing the game is: " . $performance['@num'] . "<br>";


// Close statement and connection
$stmt->close();
$conn->close();

?>
