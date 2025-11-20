<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$kode_barang  = ["001","002","003","004","005"];
$nama_barang  = ["Laptop","Mouse","Speaker","Tas Laptop","Mouse Pad"];
$harga_barang = [5000000,50000,100000,50000,35000];

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

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Penjualan</title>
<style>
body { font-family: Arial; max-width: 800px; margin: 40px auto; padding: 20px; background:#f0f2f5; }
h1 { text-align:center; color:#2c3e50; }
table { width:100%; border-collapse: collapse; margin-top:20px; background:white; }
th, td { border:1px solid #ddd; padding:10px; text-align:center; }
th { background:#3498db; color:white; }
tfoot td { font-weight:bold; background:#ecf0f1; }
a.logout { display:block; margin:20px auto; width:120px; text-align:center; padding:10px; background:#e74c3c; color:white; text-decoration:none; border-radius:5px; }
a.logout:hover { background:#c0392b; }
</style>
</head>
<body>

<h1>-- POLGAN MART --</h1>
<p>Selamat datang, <?php echo $_SESSION['username']; ?></p>

<table>
<tr>
<th>Kode Barang</th>
<th>Nama Barang</th>
<th>Harga</th>
<th>Jumlah</th>
<th>Total</th>
</tr>

<?php
foreach($beli as $key => $index){
    $item_total = $harga_barang[$index] * $jumlah[$key];
    $total[] = $item_total;
    $grandtotal += $item_total;
    echo "<tr>
            <td>{$kode_barang[$index]}</td>
            <td>{$nama_barang[$index]}</td>
            <td>".number_format($harga_barang[$index],0,",",".")."</td>
            <td>{$jumlah[$key]}</td>
            <td>".number_format($item_total,0,",",".")."</td>
          </tr>";
}

$diskon_rate = ($grandtotal < 50000) ? 0.05 : (($grandtotal <= 100000) ? 0.10 : 0.15);
$diskon = $grandtotal * $diskon_rate;
$total_akhir = $grandtotal - $diskon;
?>

<tfoot>
<tr>
<td colspan="4">Total Belanja</td>
<td><?php echo number_format($grandtotal,0,",","."); ?></td>
</tr>
<tr>
<td colspan="4">Diskon (<?php echo $diskon_rate*100; ?>%)</td>
<td><?php echo number_format($diskon,0,",","."); ?></td>
</tr>
<tr>
<td colspan="4">Total Setelah Diskon</td>
<td><?php echo number_format($total_akhir,0,",","."); ?></td>
</tr>
</tfoot>
</table>

<a href="logout2.php" class="logout">Logout</a>

</body>
</html>
