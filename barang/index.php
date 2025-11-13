<?php
include '../config/koneksi.php';
include '../header.php';

$query = mysqli_query($conn, "SELECT * FROM barang");
?>

<div class="container mt-4">
  <h2>Data Barang</h2>
  <a href="tambah.php" class="btn btn-primary mb-2">Tambah Barang</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Satuan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($data = mysqli_fetch_assoc($query)) : ?>
        <tr>
          <td><?= $data['kode_barang'] ?></td>
          <td><?= $data['nama_barang'] ?></td>
          <td><?= $data['kategori'] ?></td>
          <td><?= $data['stok'] ?></td>
          <td><?= $data['satuan'] ?></td>
          <td>
            <a href="edit.php?id=<?= $data['id_barang'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="hapus.php?id=<?= $data['id_barang'] ?>" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include '../footer.php'; ?>
