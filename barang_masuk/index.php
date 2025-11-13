<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['username'])) {
  header("Location: ../auth/login.php");
  exit;
}

$query = mysqli_query($conn, "
  SELECT bm.*, b.nama_barang 
  FROM barang_masuk bm 
  JOIN barang b ON bm.id_barang = b.id_barang
  ORDER BY bm.tanggal DESC
");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Barang Masuk</title>
  <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../index.php">Inventory</a>
</nav>

<div class="container mt-4">
  <h2>Data Barang Masuk</h2>
  <a href="tambah.php" class="btn btn-primary mb-2">Tambah Barang Masuk</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($query)) : ?>
        <tr>
          <td><?= $row['tanggal'] ?></td>
          <td><?= $row['nama_barang'] ?></td>
          <td><?= $row['jumlah'] ?></td>
          <td><?= $row['keterangan'] ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
