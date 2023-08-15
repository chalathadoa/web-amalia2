<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ManageEvents extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'manage',
            'submenu' => 'manageevents'
        ];
        return view('manage/viewmanageevents.php', $data);
    }
}