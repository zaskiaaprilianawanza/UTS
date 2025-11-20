<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>

<h2>Form Login</h2>

<form method="post" action="login.php">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>

</body>
</html>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // login statis
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
<head><title>Login</title></head>
<body>

<h2>Form Login</h2>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post" action="login.php">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>

</body>
</html>
