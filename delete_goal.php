<?php
session_start(); // Start the session

$servername = "localhost";
$username = "FitPlus";
$password = "T24icnPT46C*54Od";
$dbname = "fitplus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the goal_id is provided via POST
if (isset($_POST['goal_id'])) {
    $goal_id = $_POST['goal_id'];

    // Prepare and bind the DELETE statement
    $stmt = $conn->prepare("DELETE FROM goalsettings WHERE id = ?");
    $stmt->bind_param("i", $goal_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Goal deleted successfully";
    } else {
        echo "Error deleting goal: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Goal ID not provided";
}

$conn->close();
?>
