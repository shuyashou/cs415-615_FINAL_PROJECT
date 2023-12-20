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


$playerId = $_POST['playerId'];

// Prepare the call to the stored procedure
if ($stmt = $conn->prepare("CALL Check10Recent(?, @pname, @aMins, @aPTs, @aRebs, @aAsts)")) {
    $stmt->bind_param('i', $playerId);
    $stmt->execute();
    $stmt->close();

    // Fetch results
    $result = $conn->query("SELECT @pname, @aMins, @aPTs, @aRebs, @aAsts");
    $row = $result->fetch_assoc();

    // Start the HTML table
    echo "<table>";
    echo "<tr><th>Player</th><th>Avg Minutes</th><th>Avg Points</th><th>Avg Rebounds</th><th>Avg Assists</th></tr>";

    // Display the results in a table row
    echo "<tr>";
    echo "<td>" . $row['@pname'] . "</td>";
    echo "<td>" . $row['@aMins'] . "</td>";
    echo "<td>" . $row['@aPTs'] . "</td>";
    echo "<td>" . $row['@aRebs'] . "</td>";
    echo "<td>" . $row['@aAsts'] . "</td>";
    echo "</tr>";

    // End the HTML table
    echo "</table>";
} else {
    echo "Failed to execute stored procedure.";
}

$conn->close();
    ?>