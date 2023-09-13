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
        return view('admin/manageevents/viewmanageevents.php', $data);
    }
    public function store()
    {
        if (!$this->validate([
            'banner_event' => [
                'rules' => 'uploaded[banner_event]|max_size[banner_event,1024]|is_image[banner_event]|mime_in[banner_event,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih Banner Event terlebih dahulu.',
                    'max_size' => 'Ukuran gambar maksimal 1MB.',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
        ])) {
            dd('berhasil');
            $slug = url_title($this->request->getVar('nama_event'), '-', true);
            // nama sama
            $data = [
                'id_event' => 'id_event',
                'nama_event' => 'nama_event',
                'slug' => $slug,
                // 'created_by' => 'id_event',
                'created_at' => date('Y-m-d'),
                'tanggal_event' => 'tanggal_event',
                'lokasi_event' => 'lokasi_event',
                'banner_event' => 'banner_event',
                'deskripsi_event' => 'deskripsi_event',
            ];
            $db      = \Config\Database::connect();
            $db->table('events')->insert($data);
            if ($db->affectedRows() > 0) {
                return redirect()->to(site_url('manage_events'))->with('success', 'Event berhasil ditambahkan');
            }
        }
    }
}
