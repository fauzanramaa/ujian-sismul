<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_peminjaman;

class Peminjaman extends BaseController
{
    protected $peminjamanModel;

    public function __construct()
    {
        $this->peminjamanModel = new M_peminjaman();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'peminjaman' => $this->peminjamanModel->read(),
            'title' => 'Daftar Peminjaman Buku'
        ];
        return view('peminjaman/index', $data);
    }

    public function create()
    {
        return view('peminjaman/create');
    }

    public function store()
    {
        // Validasi sederhana
        if (!$this->validate([
            'nama_peminjam' => 'required',
            'judul_buku' => 'required',
            'tanggal_pinjam' => 'required|valid_date',
            'tanggal_kembali' => 'required|valid_date',
            'status' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost([
            'nama_peminjam',
            'judul_buku',
            'tanggal_pinjam',
            'tanggal_kembali',
            'status'
        ]);

        $this->peminjamanModel->create($data);
        return redirect()->to('/peminjaman')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id = null)
    {
        if (!$id || !$peminjaman = $this->peminjamanModel->read($id)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan: $id");
        }

        return view('peminjaman/edit', ['peminjaman' => $peminjaman]);
    }

    public function update($id = null)
    {
        if (!$id) {
            return redirect()->to('/peminjaman')->with('error', 'ID tidak valid.');
        }

        if (!$this->validate([
            'nama_peminjam' => 'required',
            'judul_buku' => 'required',
            'tanggal_pinjam' => 'required|valid_date',
            'tanggal_kembali' => 'required|valid_date',
            'status' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost([
            'nama_peminjam',
            'judul_buku',
            'tanggal_pinjam',
            'tanggal_kembali',
            'status'
        ]);

        $this->peminjamanModel->updateData($id, $data);
        return redirect()->to('/peminjaman')->with('success', 'Data berhasil diupdate.');
    }

    public function delete($id = null)
    {
        if (!$id) {
            return redirect()->to('/peminjaman')->with('error', 'ID tidak valid.');
        }

        $this->peminjamanModel->deleteData($id);
        return redirect()->to('/peminjaman')->with('success', 'Data berhasil dihapus.');
    }

    public function deleteAll()
    {
        $this->peminjamanModel->deleteAllData();
        return redirect()->to('/peminjaman')->with('success', 'Semua data berhasil dihapus.');
    }
}
