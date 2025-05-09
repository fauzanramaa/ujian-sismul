<?php

namespace App\Models;

use CodeIgniter\Model;

class M_peminjaman extends Model
{
    protected $table = 'pinjambuku';          
    protected $primaryKey = 'id';             

    protected $allowedFields = [
        'nama_peminjam',
        'judul_buku',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status'
    ];

    // public $useTimestamps = true;

    public function read($id = null)
    {
        return $id === null
            ? $this->findAll()
            : $this->find($id);
    }

    public function create(array $data)
    {
        return $this->insert($data);
    }

    public function updateData($id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteData($id)
    {
        return $this->delete($id);
    }

    public function deleteAllData()
    {
        return $this->truncate();
    }
}
