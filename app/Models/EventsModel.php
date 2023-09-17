<?php

namespace App\Models;

use CodeIgniter\Model;

class EventsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'events';
    protected $primaryKey       = 'id_event';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_event', 'tanggal_event', 'lokasi_event', 'banner_event', 'deskripsi_event', 'status_event'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getEvent($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
