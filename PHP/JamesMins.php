<?php

// Database configuration
$servername = "dbase.cs.jhu.edu";
$username = "23fa_sshou2";
$password = "FvSwsoKs9l";
$dbname = "23fa_sshou2_db";

// Player and team IDs
$playerId = 2544; // LeBron James' Player ID
$cavaliersId = 1610612739; // Cavaliers Team ID
$heatId = 1610612748; // Heat Team ID

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$valid_password_hashes = [
    password_hash('LBJ', PASSWORD_DEFAULT),
    password_hash('OpenSesame', PASSWORD_DEFAULT),
    password_hash('GuessMe', PASSWORD_DEFAULT),
    password_hash('ImTheTA', PASSWORD_DEFAULT)
];
  
  // Retrieve SSN from POST request
$password = $_POST['password'];
  
$password_is_valid = false;
  
      // Check if the input password matches any valid password
foreach ($valid_password_hashes as $valid_hash) {
    if (password_verify($password, $valid_hash)) {
        $password_is_valid = true;
        break; // Exit the loop if a match is found
    }
}

if($password_is_valid == True) {
    // Prepare the stored procedure call
    $query = "CALL JamesMins(@totalMinutesCavaliers, @totalMinutesHeat)";
    $stmt = $conn->prepare($query);

    // Bind parameters to the query
    $stmt->bind_param($cavaliersId, $heatId);

    // Execute the stored procedure
    $stmt->execute();

    // Fetch the results of the stored procedure
    $result = $conn->query("SELECT @totalMinutesCavaliers, @totalMinutesHeat");

    // Display the results
    if ($result) {
        $row = $result->fetch_assoc();
        echo "Total minutes played by LeBron James for Cavaliers: " . $row['@totalMinutesCavaliers'] . " minutes<br>";
        echo "Total minutes played by LeBron James for Heat: " . $row['@totalMinutesHeat'] . " minutes<br>";
        echo "LeBron James, a polarizing figure in basketball, evokes a mix of love and hate among fans. His most notable achievement, 
        bringing the only NBA championship to Cleveland in 2016, cemented his status as a legend in the city. Despite some criticisms 
        and controversies surrounding him, LeBron's ongoing contributions to the sport keep him in the spotlight. He continues to make history, 
        not only through his exceptional skills on the court but also through his influence off it, shaping his legacy as one of the game's greatest players.";
    } else {
        echo "Failed to retrieve the total minutes.";
    }
} else {
    echo "You are not a fan of LBJ lol!";
}
// Close the statement
$stmt->close();

// Close the connection
$conn->close();

?>
