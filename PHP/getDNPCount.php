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
$result = $conn->query("CALL GetDNPCount()");

if ($result && $result->num_rows > 0) {
    // Start the HTML table
    echo "<table border='1'>";
    echo "<tr><th>TEAM_ABBREVIATION</th><th>DNP_Count</th></tr>";

    // Fetch and display the results in table rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['TEAM_ABBREVIATION'] . "</td>";
        echo "<td>" . $row['DNP_Count'] . "</td>";
        echo "</tr>";
    }

    // End the HTML table
    echo "</table>";
} else {
    echo "No results found or an error occurred.";
}

// Close the connection
$conn->close();

?>

