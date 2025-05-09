<?= $this->include('layout/header') ?>

<h3>Tambah Data Peminjaman</h3>

<form action="<?= base_url('peminjaman/store') ?>" method="post">
  <div class="mb-3">
    <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
    <input type="text" class="form-control" name="nama_peminjam" required>
  </div>

  <div class="mb-3">
    <label for="judul_buku" class="form-label">Judul Buku</label>
    <input type="text" class="form-control" name="judul_buku" required>
  </div>

  <div class="mb-3">
    <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
    <input type="date" class="form-control" name="tanggal_pinjam" required>
  </div>

  <div class="mb-3">
    <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
    <input type="date" class="form-control" name="tanggal_kembali" required>
  </div>

  <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select class="form-select" name="status" required>
      <option value="Dipinjam">Dipinjam</option>
      <option value="Dikembalikan">Dikembalikan</option>
    </select>
  </div>

  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="<?= base_url('/') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->include('layout/footer') ?>
