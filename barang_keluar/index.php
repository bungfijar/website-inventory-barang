<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['username'])) {
  header("Location: ../auth/login.php");
  exit;
}

$query = mysqli_query($conn, "
  SELECT bk.*, b.nama_barang 
  FROM barang_keluar bk 
  JOIN barang b ON bk.id_barang = b.id_barang
  ORDER BY bk.tanggal DESC
");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Barang Keluar</title>
  <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../index.php">Inventory</a>
</nav>

<div class="container mt-4">
  <h2>Data Barang Keluar</h2>
  <a href="tambah.php" class="btn btn-danger mb-2">Tambah Barang Keluar</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Tujuan</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($query)) : ?>
        <tr>
          <td><?= $row['tanggal'] ?></td>
          <td><?= $row['nama_barang'] ?></td>
          <td><?= $row['jumlah'] ?></td>
          <td><?= $row['tujuan'] ?></td>
          <td><?= $row['keterangan'] ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
