<?php
include '../config/koneksi.php';
include '../header.php';

if (isset($_POST['simpan'])) {
  $kode = $_POST['kode_barang'];
  $nama = $_POST['nama_barang'];
  $kategori = $_POST['kategori'];
  $stok = $_POST['stok'];
  $satuan = $_POST['satuan'];

  mysqli_query($conn, "INSERT INTO barang (kode_barang, nama_barang, kategori, stok, satuan) VALUES ('$kode', '$nama', '$kategori', '$stok', '$satuan')");
  header("Location: index.php");
}
?>

<div class="container mt-4">
  <h2>Tambah Barang</h2>
  <form method="POST">
    <div class="mb-3">
      <label>Kode Barang</label>
      <input type="text" name="kode_barang" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Nama Barang</label>
      <input type="text" name="nama_barang" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Kategori</label>
      <input type="text" name="kategori" class="form-control">
    </div>
    <div class="mb-3">
      <label>Stok</label>
      <input type="number" name="stok" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Satuan</label>
      <input type="text" name="satuan" class="form-control">
    </div>
    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
  </form>
</div>

<?php include '../footer.php'; ?>
