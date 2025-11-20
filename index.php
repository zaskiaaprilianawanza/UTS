<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === 'admin' && $password === '1234') {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      border: 2px solid #ccc;
      border-radius: 10px;
      background: #f9f9f9;
    }
    h2 {
      text-align: center;
      color: #333;
    }
    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }
    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #aaa;
      border-radius: 4px;
      box-sizing: border-box;
    }
    button {
      margin-top: 20px;
      width: 100%;
      padding: 10px;
      background-color: #2d89ef;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #1b5fa7;
    }
    .error {
      color: red;
      margin-top: 10px;
      font-weight: bold;
      text-align: center;
    }
  </style>
</head>
<body>

<h2>Form Login</h2>

<?php if ($error): ?>
  <div class="error"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<form method="POST" autocomplete="off">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required autofocus>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>

  <button type="submit">Login</button>
</form>

</body>
</html>
