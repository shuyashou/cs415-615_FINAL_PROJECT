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
$stmt = $conn->prepare("CALL TeamPerformance(?, @ptsHome, @fgPctHome, @ftPctHome, @3PctHome, @ptsAway, @fgPctAway, @ftPctAway, @3PctAway)");
$stmt->bind_param('i', $teamId);


// Execute the stored procedure
$stmt->execute();

// Fetch results
$result = $conn->query("SELECT @ptsHome, @fgPctHome, @ftPctHome, @3PctHome, @ptsAway, @fgPctAway, @ftPctAway, @3PctAway");
$performance = $result->fetch_assoc();

echo "Home Performance:<br>";
echo "Average Points: " . $performance['@ptsHome'] . "<br>";
echo "Field Goal Percentage: " . $performance['@fgPctHome'] . "<br>";
echo "Free Throw Percentage: " . $performance['@ftPctHome'] . "<br>";
echo "Three-Point Percentage: " . $performance['@3PctHome'] . "<br>";

echo "<br>Away Performance:<br>";
echo "Average Points: " . $performance['@ptsAway'] . "<br>";
echo "Field Goal Percentage: " . $performance['@fgPctAway'] . "<br>";
echo "Free Throw Percentage: " . $performance['@ftPctAway'] . "<br>";
echo "Three-Point Percentage: " . $performance['@3PctAway'] . "<br>";

// Close statement and connection
$stmt->close();
$conn->close();

?>
