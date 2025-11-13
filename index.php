<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['username'])) {
  header("Location: auth/login.php");
  exit;
}

$q_barang = mysqli_query($conn, "SELECT COUNT(*) as total FROM barang");
$total_barang = mysqli_fetch_assoc($q_barang)['total']; 

$q_masuk = mysqli_query($conn, "SELECT SUM(jumlah) as total FROM barang_masuk");
$total_masuk = mysqli_fetch_assoc($q_masuk)['total'];

$q_keluar = mysqli_query($conn, "SELECT SUM(jumlah) as total FROM barang_keluar");
$total_keluar = mysqli_fetch_assoc($q_keluar)['total'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Inventory Barang</title>
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Inventory</a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="auth/logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-4">
  <h2>Dashboard</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="card text-white bg-primary mb-3">
        <div class="card-body">
          <h5 class="card-title">Total Barang</h5>
          <p class="card-text" style="font-size: 24px;"><?= $total_barang ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-white bg-success mb-3">
        <div class="card-body">
          <h5 class="card-title">Total Barang Masuk</h5>
          <p class="card-text" style="font-size: 24px;"><?= $total_masuk ? $total_masuk : 0 ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-white bg-danger mb-3">
        <div class="card-body">
          <h5 class="card-title">Total Barang Keluar</h5>
          <p class="card-text" style="font-size: 24px;"><?= $total_keluar ? $total_keluar : 0 ?></p>
        </div>
      </div>
    </div>
  </div>

  <a href="barang/index.php" class="btn btn-outline-primary">Kelola Barang</a>
  <a href="barang_masuk/index.php" class="btn btn-outline-success">Barang Masuk</a>
  <a href="barang_keluar/index.php" class="btn btn-outline-danger">Barang Keluar</a>
</div>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
