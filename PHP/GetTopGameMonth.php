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
$result = $conn->query("CALL GetTopGameMonth()");

if ($result && $result->num_rows > 0) {
    // Start the HTML table
    // Fetch and display the result in a table row
    $row = $result->fetch_assoc();
    
    echo "The month with most number of games is Jan, with " . $row['Game_Per_Month'] . " games happened in this month on average each year. <br>";
    echo "That is " .$row['Game_Per_Day'] . " games on each day.";
    

} else {
    echo "No results found or an error occurred.";
}

// Close the connection
$conn->close();
?>