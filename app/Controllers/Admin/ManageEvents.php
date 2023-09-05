<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ManageEvents extends BaseController
{
    public function index()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('events');
        $query   = $builder->get()->getResult();
        $data = [
            'menu' => 'manage',
            'submenu' => 'manageevents',
            'query' => $query,
        ];
        return view('admin/manage/viewmanageevents.php', $data);
    }
}