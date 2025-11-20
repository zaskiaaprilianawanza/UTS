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
echo "<table border='1' cellpadding='8'>";
echo "<tr>
        <th>Kode</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
      </tr>";

foreach ($beli as $key => $index) {
    $item_total = $harga_barang[$index] * $jumlah[$key];
    $total[] = $item_total;
    $grandtotal += $item_total;

    echo "<tr>
            <td>{$kode_barang[$index]}</td>
            <td>{$nama_barang[$index]}</td>
            <td>{$harga_barang[$index]}</td>
            <td>{$jumlah[$key]}</td>
            <td>{$item_total}</td>
          </tr>";
}
echo "</table>";
echo "<h3>Total Belanja: Rp $grandtotal</h3>";
