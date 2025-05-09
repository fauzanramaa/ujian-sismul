<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index(): string
    {
        // Pastikan file app/Views/peminjaman/index.php ada
        return view('peminjaman/index');
    }
}