<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>

<h2>Selamat datang, <?php echo $_SESSION['username']; ?>!</h2>

<a href="logout.php">Logout</a>

</body>
</html>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard Penjualan</title></head>
<body>

<h1>-- POLGAN MART --</h1>
<h3>Selamat datang, <?php echo $_SESSION['username']; ?></h3>

<?php
$kode_barang  = ["001","002","003","004","005"];
$nama_barang  = ["Laptop","Mouse","Speaker","Tas Laptop","Mouse Pad"];
$harga_barang = [5000000,50000,100000,50000,35000];
?>

<a href="logout.php">Logout</a>

</body>
</html>
<?php
$beli = [];
$jumlah = [];
$total = [];
$grandtotal = 0;

for ($i = 0; $i < 5; $i++) {
    $idx = rand(0,4);
    $beli[] = $idx;
    $jumlah[] = rand(1,5);
}
?>
