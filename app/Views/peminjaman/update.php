<?= $this->include('layout/header') ?>

<h3>Edit Data Peminjaman</h3>

<form action="<?= base_url('peminjaman/update/' . $peminjaman['id']) ?>" method="post">
  <input type="hidden" name="_method" value="PUT">

  <div class="mb-3">
    <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
    <input type="text" class="form-control" name="nama_peminjam" value="<?= esc($peminjaman['nama_peminjam']) ?>" required>
  </div>

  <div class="mb-3">
    <label for="judul_buku" class="form-label">Judul Buku</label>
    <input type="text" class="form-control" name="judul_buku" value="<?= esc($peminjaman['judul_buku']) ?>" required>
  </div>

  <div class="mb-3">
    <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
    <input type="date" class="form-control" name="tanggal_pinjam" value="<?= esc($peminjaman['tanggal_pinjam']) ?>" required>
  </div>

  <div class="mb-3">
    <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
    <input type="date" class="form-control" name="tanggal_kembali" value="<?= esc($peminjaman['tanggal_kembali']) ?>" required>
  </div>

  <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select class="form-select" name="status" required>
      <option value="Dipinjam" <?= $peminjaman['status'] === 'Dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
      <option value="Dikembalikan" <?= $peminjaman['status'] === 'Dikembalikan' ? 'selected' : '' ?>>Dikembalikan</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
  <a href="<?= base_url('/') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->include('layout/footer') ?>
