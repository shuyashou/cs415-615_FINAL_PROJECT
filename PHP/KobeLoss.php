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

$stmt = $conn->prepare("CALL KobeLoss(@tot, @los, @pct)");


// Execute the stored procedure
$stmt->execute();

// Fetch results
$result = $conn->query("SELECT @tot, @los, @pct");
$performance = $result->fetch_assoc();
echo "Since 09-10 season, the number of games Kobe Bryant played for longer than 40 minutes is " . $performance['@tot'] . "<br>";
echo "He lost " . $performance['@los'] . " of them<br> ";
echo "The percentage is: " . $performance['@pct'] . "%<br>";

// Close statement and connection
$stmt->close();
$conn->close();

?>