<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DetailEvent extends BaseController
{
    public function __construct()
    {
        $this->eventsModel = new \App\Models\EventsModel();
    }
    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Event',
            'event' => $this->eventsModel->getEvent($slug)
        ];
        return view('admin/manageevents/viewdetail.php', $data);
    }
}
