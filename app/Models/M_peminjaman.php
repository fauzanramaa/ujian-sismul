<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peminjaman extends CI_Model {

    // CREATE: tambah data peminjaman baru
    public function create($data) {
        return $this->db->insert('pinjambuku', $data);
    }

    // READ: ambil semua data atau berdasarkan ID
    public function read($id = FALSE) {
        if ($id === FALSE) {
            return $this->db->get('pinjambuku')->result_array();
        } else {
            return $this->db->get_where('pinjambuku', ['id' => $id])->row_array();
        }
    }

    // UPDATE: ubah data berdasarkan ID
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('pinjambuku', $data);
    }

    // DELETE: hapus satu data berdasarkan ID
    public function delete($id) {
        return $this->db->delete('pinjambuku', ['id' => $id]);
    }

    // DELETE ALL: kosongkan seluruh isi tabel
    public function deleteAll() {
        return $this->db->empty_table('pinjambuku');
    }
}
?>
