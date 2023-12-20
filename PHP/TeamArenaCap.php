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
$query = "CALL TeamArenaCap()";
$result = $conn->query($query);

echo "<h1>Teams Founded in 1946 with Arena Capacity > 18000</h1>";

if($result && $result->num_rows > 0){
    // Start the HTML table
    echo "<table border='1'>";
    echo "<tr><th>ABBREVIATION</th><th>NICKNAME</th><th>CITY</th><th>ARENA</th></tr>";

    // Fetch and display the results in table rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ABBREVIATION'] . "</td>";
        echo "<td>" . $row['NICKNAME'] . "</td>";
        echo "<td>" . $row['CITY'] . "</td>";
        echo "<td>" . $row['ARENA'] . "</td>";
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
