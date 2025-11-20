<?php
session_start();

// Jika belum login, redirect ke login
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // pastikan ini sesuai file login Anda
    exit;
}

// Data produk
$kode_barang  = ["001","002","003","004","005"];
$nama_barang  = ["Laptop","Mouse","Speaker","Tas Laptop","Mouse Pad"];
$harga_barang = [5000000,50000,100000,50000,35000];

// Logika pembelian random
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
    body {
      font-family: Arial, sans-serif;
      max-width: 800px;
      margin: 40px auto;
      padding: 20px;
      background: #f0f2f5;
      border-radius: 8px;
      box-shadow: 0 0 12px rgba(0,0,0,0.1);
    }
    h1 {
      text-align: center;
      color: #2c3e50;
    }
    .welcome {
      margin-bottom: 20px;
      font-size: 18px;
      color: #34495e;
      text-align: center;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: center;
      color: #2c3e50;
    }
    th {
      background-color: #3498db;
      color: white;
    }
    tfoot td {
      font-weight: bold;
      background-color: #ecf0f1;
    }
    .logout {
      display: block;
      margin: 25px auto 0;
      width: 120px;
      padding: 10px;
      background-color: #e74c3c;
      color: white;
      text-align: center;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
      transition: background-color 0.3s;
    }
    .logout:hover {
      background-color: #c0392b;
    }
    .discount-info {
      margin-top: 20px;
      font-size: 18px;
      color: #16a085;
      text-align: center;
    }
  </style>
</head>
<body>

<h1>-- POLGAN MART --</h1>

<div class
