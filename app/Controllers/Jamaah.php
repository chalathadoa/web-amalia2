<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Jamaah extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'jamaah',
            'submenu' => ''
        ];
        return view('jamaah/viewjamaah.php', $data);
    }
}