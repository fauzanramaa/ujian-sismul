<?php

namespace App\Models;

use CodeIgniter\Model;

class M_peminjaman extends Model
{
    protected $table = 'pinjambuku';          // Nama tabel
    protected $primaryKey = 'id';             // Primary key

    protected $allowedFields = [
        'nama_peminjam',
        'judul_buku',
        'tanggal_pinjam',
        'tanggal_kembali'
    ];

    // Jika ingin menggunakan timestamp otomatis (created_at, updated_at)
    // protected $useTimestamps = true;

    /**
     * Ambil semua data atau data tertentu berdasarkan ID
     */
    public function read($id = null)
    {
        return $id === null
            ? $this->findAll()
            : $this->find($id);
    }

    /**
     * Tambah data baru
     */
    public function create(array $data)
    {
        return $this->insert($data);
    }

    /**
     * Ubah data berdasarkan ID
     */
    public function updateData($id, array $data)
    {
        return $this->update($id, $data);
    }

    /**
     * Hapus data berdasarkan ID
     */
    public function deleteData($id)
    {
        return $this->delete($id);
    }

    /**
     * Hapus semua data
     */
    public function deleteAllData()
    {
        return $this->builder()->emptyTable();
    }
}
