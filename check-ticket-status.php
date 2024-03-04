<?php

// Koneksi ke database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "nama_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menerima kode tiket dari permintaan HTTP
$ticket_code = $_GET['ticket_code'];

// Query untuk mencari kode tiket dalam database
$sql = "SELECT * FROM ticket_status WHERE ticket_code = '$ticket_code'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Jika kode tiket ditemukan, kirim statusnya
    $row = $result->fetch_assoc();
    $status = $row['status'];
    echo "Status kode tiket $ticket_code: $status";
} else {
    // Jika kode tiket tidak ditemukan, kirim pesan error
    echo "Kode tiket $ticket_code tidak ditemukan";
}

$conn->close();
?>
