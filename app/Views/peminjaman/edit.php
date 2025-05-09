<?= $this->include('layout/header') ?>

<div class="container mt-4">
    <h3>Edit Data Peminjaman</h3>

    <!-- Tampilkan error validasi -->
    <?php if (session('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('peminjaman/update/' . $peminjaman['id']) ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">

        <div class="mb-3">
            <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
            <input type="text" class="form-control" name="nama_peminjam"
                   value="<?= old('nama_peminjam', esc($peminjaman['nama_peminjam'])) ?>" required>
        </div>

        <div class="mb-3">
            <label for="judul_buku" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" name="judul_buku"
                   value="<?= old('judul_buku', esc($peminjaman['judul_buku'])) ?>" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" name="tanggal_pinjam"
                   value="<?= old('tanggal_pinjam', esc($peminjaman['tanggal_pinjam'])) ?>" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" name="tanggal_kembali"
                   value="<?= old('tanggal_kembali', esc($peminjaman['tanggal_kembali'])) ?>" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" required>
                <option value="">-- Pilih Status --</option>
                <option value="Dipinjam" <?= old('status', $peminjaman['status']) === 'Dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                <option value="Dikembalikan" <?= old('status', $peminjaman['status']) === 'Dikembalikan' ? 'selected' : '' ?>>Dikembalikan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('peminjaman') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->include('layout/footer') ?>