<?php
// update-ticket-status.php

// Connect to database
$db_host = 'localhost'; // Change this to your database host
$db_user = 'root'; // Change this to your database username
$db_pass = 'password'; // Change this to your database password
$db_name = 'tickets'; // Change this to your database name
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get parameters from request
$event_id = $_POST['event_id'];
$ticket_code = $_POST['ticket_code'];
$status = $_POST['status'];

// Update ticket status in the database
$sql = "UPDATE tickets SET status = '$status' WHERE event_id = '$event_id' AND ticket_code = '$ticket_code'";
if ($conn->query($sql) === TRUE) {
    // Update successful
    $response = [
        'ticket_code' => $ticket_code,
        'status' => $status,
        'updated_at' => date('Y-m-d H:i:s')
    ];
    echo json_encode($response);
} else {
    // Update failed
    echo "Error updating record: " . $conn->error;
}

// Close database connection
$conn->close();
?>
