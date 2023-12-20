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

$stmt = $conn->prepare("CALL LalWinsOverBos(@tot, @lawin)");


// Execute the stored procedure
$stmt->execute();

// Fetch results
$result = $conn->query("SELECT @tot, @lawin");
$performance = $result->fetch_assoc();

echo "As the one of the most famous rivalries of all time in NBA history, Boston Celtics and Los Angeles Lakers has faced " . $performance['@tot'] . " times including regular season and playoffs <br>";
echo "Lakers have a greater number of wins of " . $performance['@lawin'] . "<br>";
echo "They lost in 2008 finals but successfully revenged next year and won the NBA final championship.";

// Close statement and connection
$stmt->close();
$conn->close();

?>
