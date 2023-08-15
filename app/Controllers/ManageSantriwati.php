<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ManageSantriwati extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'manage',
            'submenu' => 'managesantriwati'
        ];
        return view('manage/viewmanagesantriwati.php', $data);
    }
}