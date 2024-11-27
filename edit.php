<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

require_once 'connect.php';

// Proses update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_atlet = $_POST['id_atlet'];
    $nama = $_POST['nama_atlet'];
    $umur = $_POST['umur'];
    $email = $_POST['email'];
    $kelas = $_POST['kelas'];
    $nation = $_POST['nation'];

    $query = "UPDATE atlet SET nama_atlet = ?, umur = ?, email = ?, kelas = ?, nation = ? WHERE id_atlet = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sisssi', $nama, $umur, $email, $kelas, $nation, $id_atlet);

    if ($stmt->execute()) {
        $success = "Data berhasil diupdate!";
    } else {
        $error = "Terjadi kesalahan saat mengupdate data.";
    }
}

// Ambil data atlet
$query = "SELECT * FROM atlet";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Atlet</title>
</head>
<body>
    <h1>Edit Data Atlet</h1>
    <?php if (isset($success)) echo "<p style='color:green;'>$success</p>"; ?>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Atlet</th>
                <th>Umur</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>Nation</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <form method="POST">
                    <td><?= $row['id_atlet']; ?></td>
                    <td><input type="text" name="nama_atlet" value="<?= $row['nama_atlet']; ?>"></td>
                    <td><input type="number" name="umur" value="<?= $row['umur']; ?>"></td>
                    <td><input type="text" name="email" value="<?= $row['email']; ?>"></td>
                    <td><input type="text" name="kelas" value="<?= $row['kelas']; ?>"></td>
                    <td><input type="text" name="nation" value="<?= $row['nation']; ?>"></td>
                    <td>
                        <input type="hidden" name="id_atlet" value="<?= $row['id_atlet']; ?>">
                        <button type="submit">Update</button>
                    </td>
                </form>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
