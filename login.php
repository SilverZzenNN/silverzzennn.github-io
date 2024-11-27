<?php
session_start();
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM login WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        header('Location: edit.php');
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Login</title>
</head>
<body>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <div class="wrapper">
  <form method="POST" class="form">
    <h1 class="title">Login</h1>
    <div class="input-wrapper">
      <input type="text" id="username" name="username" placeholder="Enter your username">
      <i class="fa-solid fa-user"></i>
    </div>
    <div class="input-wrapper">
      <input type="password" id="password" name="password" placeholder="Enter your password">
      <i class="fa-solid fa-lock"></i>
    </div>
    <button class="submit">Submit</button>
    <p class="footer">
      Don't have and account
      <a href="#" class="link">Sign Up</a>
    </p>
  </form>
  <div class="banner">
    <h1>@Fachrurrazi</h1>
  </div>
</div>
</body>
</html>
