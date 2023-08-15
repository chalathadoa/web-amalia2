<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ManageUsers extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'manage',
            'submenu' => 'manageusers'
        ];
        return view('manage/viewmanage_users', $data);
    }
}