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

$teamId = $_POST['teamId'];
$teamId = (int)$teamId;
$stmt = $conn->prepare("CALL StarterBench(?, @sMins, @bMins)");
$stmt->bind_param('i', $teamId);

// Execute the stored procedure
$stmt->execute();

// Fetch results
$result = $conn->query("SELECT @sMins, @bMins");
$performance = $result->fetch_assoc();

echo "Average Starter Minutes: " . $performance['@sMins'] . "<br>";
echo "Average Bench Minutes: " . $performance['@bMins'] . "<br>";

// Close statement and connection
$stmt->close();
$conn->close();

?>
