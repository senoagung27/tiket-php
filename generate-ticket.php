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

// Fungsi untuk menghasilkan karakter acak
function generateRandomString($length = 7) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Menerima input dari command line
if ($argc !== 3) {
    echo "Usage: php generate-ticket.php {event_id} {total_ticket}\n";
    exit(1);
}

$event_id = $argv[1];
$total_ticket = $argv[2];

// Membuat kode tiket
for ($i = 0; $i < $total_ticket; $i++) {
    $prefix = 'LCS' . str_pad($event_id, 2, '0', STR_PAD_LEFT);
    $random_code = generateRandomString();
    $ticket_code = $prefix . $random_code;

    // Simpan kode tiket ke dalam database
    $sql = "INSERT INTO ticket_status (ticket_code, status) VALUES ('$ticket_code', 'valid')";

    if ($conn->query($sql) === TRUE) {
        echo "Kode tiket $ticket_code berhasil disimpan.\n";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
