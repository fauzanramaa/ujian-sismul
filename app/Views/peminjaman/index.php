<?= $this->include('layout/header') ?>

<div class="container mt-4">
    <h3 class="mb-4">Daftar Peminjaman Buku</h3>

    <a href="<?= url_to('peminjaman.create') ?>" class="btn btn-primary mb-3">+ Tambah Peminjaman</a>

    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger">
            <?= session('error') ?>
        </div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($peminjaman)) : ?>
                <?php foreach ($peminjaman as $row) : ?>
                    <tr>
                        <td><?= esc($row['nama_peminjam']) ?></td>
                        <td><?= esc($row['judul_buku']) ?></td>
                        <td><?= esc($row['tanggal_pinjam']) ?></td>
                        <td><?= esc($row['tanggal_kembali']) ?></td>
                        <td>
                            <span class="badge 
                                <?= $row['status'] === 'Dikembalikan' ? 'bg-success' : 'bg-warning text-dark' ?>">
                                <?= esc($row['status']) ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?= url_to('peminjaman.edit', $row['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <form action="<?= url_to('peminjaman.delete', $row['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" class="text-center">Belum ada data peminjaman.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->include('layout/footer') ?>