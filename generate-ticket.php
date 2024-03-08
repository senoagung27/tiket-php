<?php
// generate-ticket.php

// Function to generate random alphanumeric string
function generateRandomString($length = 7) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

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

// Get command line arguments
$event_id = $argv[1];
$total_tickets = $argv[2];

// Generate and insert tickets into the database
for ($i = 0; $i < $total_tickets; $i++) {
    $ticket_code = 'LCS' . str_pad($event_id, 2, '0', STR_PAD_LEFT) . generateRandomString();
    $sql = "INSERT INTO tickets (event_id, ticket_code, status) VALUES ('$event_id', '$ticket_code', 'available')";
    $conn->query($sql);
}

echo "Tickets generated successfully.\n";

// Close database connection
$conn->close();
?>
