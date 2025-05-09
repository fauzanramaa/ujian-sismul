<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use CodeIgniter\Controller;

class PeminjamanController extends Controller
{
    protected $peminjamanModel;

    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
    }

    public function index()
    {
        $data['peminjaman'] = $this->peminjamanModel->findAll();
        return view('peminjaman/index', $data);
    }

    public function create()
    {
        return view('peminjaman/create');
    }

    public function store()
    {
        $this->peminjamanModel->save([
            'nama_peminjam' => $this->request->getPost('nama_peminjam'),
            'judul_buku'    => $this->request->getPost('judul_buku'),
            'tanggal_pinjam'=> $this->request->getPost('tanggal_pinjam'),
            'tanggal_kembali'=> $this->request->getPost('tanggal_kembali'),
            'status'        => $this->request->getPost('status'),
        ]);

        return redirect()->to('/peminjaman');
    }

    public function edit($id)
    {
        $data['peminjaman'] = $this->peminjamanModel->find($id);
        return view('peminjaman/edit', $data);
    }

    public function update($id)
    {
        $this->peminjamanModel->update($id, [
            'nama_peminjam' => $this->request->getPost('nama_peminjam'),
            'judul_buku'    => $this->request->getPost('judul_buku'),
            'tanggal_pinjam'=> $this->request->getPost('tanggal_pinjam'),
            'tanggal_kembali'=> $this->request->getPost('tanggal_kembali'),
            'status'        => $this->request->getPost('status'),
        ]);

        return redirect()->to('/peminjaman');
    }

    public function delete($id)
    {
        $this->peminjamanModel->delete($id);
        return redirect()->to('/peminjaman');
    }
}
