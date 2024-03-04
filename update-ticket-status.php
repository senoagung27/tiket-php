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

// Menerima data dari permintaan HTTP
$ticket_code = $_POST['ticket_code'];
$new_status = $_POST['new_status'];

// Update status kode tiket dalam database
$sql = "UPDATE ticket_status SET status = '$new_status' WHERE ticket_code = '$ticket_code'";

if ($conn->query($sql) === TRUE) {
    echo "Status kode tiket $ticket_code berhasil diperbarui menjadi $new_status";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
