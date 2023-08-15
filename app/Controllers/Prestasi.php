<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Prestasi extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'laporansantriwati',
            'submenu' => 'prestasi'
        ];
        return view('laporan_santriwati/viewprestasi.php', $data);
    }
}