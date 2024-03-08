<?php
// check-ticket.php

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
$event_id = $_GET['event_id'];
$ticket_code = $_GET['ticket_code'];

// Query database to check ticket status
$sql = "SELECT ticket_code, status FROM tickets WHERE event_id = '$event_id' AND ticket_code = '$ticket_code'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ticket found
    $row = $result->fetch_assoc();
    $response = [
        'ticket_code' => $row['ticket_code'],
        'status' => $row['status']
    ];
    echo json_encode($response);
} else {
    // Ticket not found
    echo "Ticket not found";
}

// Close database connection
$conn->close();
?>
