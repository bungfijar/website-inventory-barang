<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['username'])) {
  header("Location: ../auth/login.php");
  exit;
}

$query = mysqli_query($conn, "SELECT * FROM barang ORDER BY nama_barang ASC");

?>

<!DOCTYPE html>
<html>
<head>
  <title>Laporan Stok Barang</title>
  <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../index.php">Inventory</a>
</nav>

<div class="container mt-4">
  <h2>Laporan Stok Barang</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Satuan</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($query)) : ?>
      <tr>
        <td><?= $row['kode_barang'] ?></td>
        <td><?= $row['nama_barang'] ?></td>
        <td><?= $row['kategori'] ?></td>
        <td><?= $row['stok'] ?></td>
        <td><?= $row['satuan'] ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <a href="cetak.php" class="btn btn-success">Cetak PDF</a>
  <a href="export_excel.php" class="btn btn-primary">Export Excel</a>
</div>

<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
