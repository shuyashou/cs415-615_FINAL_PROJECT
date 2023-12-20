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

$stmt = $conn->prepare("CALL DiffPosFt(@GFTPCT, @FFTPCT, @CFTPCT)");


// Execute the stored procedure
$stmt->execute();

// Fetch results
$result = $conn->query("SELECT @GFTPCT, @FFTPCT, @CFTPCT");
$performance = $result->fetch_assoc();

echo "Average Guards (PG, SG) Free Throw Percentage: " . $performance['@GFTPCT'] . "<br>";
echo "Average Forwards (SF, PF) Free Throw Percentage: " . $performance['@FFTPCT'] . "<br>";
echo "Average Centers Free Throw Percentage: " . $performance['@CFTPCT'] . "<br>";

// Close statement and connection
$stmt->close();
$conn->close();

?>
