<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'marwahsc121'; // Ganti dengan nama database Anda

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT id_atlet, nama_atlet, umur, email, kelas, nation FROM atlet";
$result = $conn->query($sql);

$atletData = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $atletData[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($atletData);
$conn->close();
?>
