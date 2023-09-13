<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AddEvent extends BaseController
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
        return view('admin/manageevents/viewaddevent.php', $data);
    }

    public function saveImage()
    {
    }
    public function store()
    {
        // validasi inputan
        if (!$this->validate([
            'nama_event' => [
                'rules' => 'required|is_unique[events.nama_event]',
                'errors' => [
                    'required' => '{field} event harus diisi.',
                    'is_unique' => '{field} event sudah ada.'
                ]
            ],
            'tanggal_event' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} event harus diisi.'
                ]
            ],
            'deskripsi_event' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} event harus diisi.'
                ]
            ],
            'lokasi_event' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} event harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(site_url('manage_events'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('nama_event'), '-', true);

        // nama sama
        // $data = [
        //     'id_event' => 'id_event',
        //     'nama_event' => 'nama_event',
        //     // 'created_by' => 'id_event',
        //     'created_at' => date('Y-m-d'),
        //     'tanggal_event' => 'tanggal_event',
        //     'lokasi_event' => 'lokasi_event',
        //     'banner_event' => 'banner_event',
        //     'deskripsi_event' => 'deskripsi_event',
        // ];
        // $db      = \Config\Database::connect();
        // $db->table('events')->insert($data);
        // if ($db->affectedRows() > 0) {
        //     return redirect()->to(site_url('manage_events'));
        // }
    }
}
