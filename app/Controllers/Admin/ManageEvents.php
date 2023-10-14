<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use CodeIgniter\Files\File;

class ManageEvents extends BaseController
{
    protected $eventsModel;
    public function __construct()
    {
        $this->eventsModel = new \App\Models\EventsModel();
    }

    // MANAGEEVENTS
    public function index()
    {
        $eventsdb = $this->eventsModel->getEvent();
        $data = [
            'menu' => 'manage',
            'submenu' => 'manageevents',
            'events' => $eventsdb,
        ];
        return view('admin/manageevents/viewmanageevents.php', $data);
    }

    // TRY CREATE EVENT
    public function tryadd()
    {
        $eventsdb = $this->eventsModel->getEvent();

        session();
        $data = [
            'pageTitle' => 'Create New Event',
            'validation' => \Config\Services::validation(),
            'menu' => 'manage',
            'submenu' => 'manageevents',
            'events' => $eventsdb,
        ];
        return view('admin/manageevents/viewaddevent.php', $data);
    }

    public function store()
    {
        $eventsdb = $this->eventsModel->getEvent();
        // membuat validasi
        $validationRule = [
            'nama_event' => [
                'rules' => 'required|is_unique[events.nama_event]',
                'errors' => [
                    'is_unique' => '{field} event sudah terdaftar'
                ]
            ],
            'banner_event' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[banner_event]',
                    'is_image[banner_event]',
                    'mime_in[banner_event,image/jpg,image/jpeg,image/png,image/svg]',
                    'max_size[banner_event,1024]',
                ],
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 1 MB.',
                    'is_image' => 'Yang anda pilih bukan gambar.',
                    'mime_in' => 'Format gambar tidak diterima.'
                ]
            ],
        ];

        if (!$this->validate($validationRule)) {
            $data = [
                'errors' => $this->validator->getErrors(),
            ];

            return view('admin/manageevents/viewmanageevents.php', $data);
        }
        // get image
        $bannerEvent = $this->request->getFile('banner_event');
        $bannerName = $bannerEvent->getRandomName();

        // store the image
        $bannerEvent->move('assets/img/uploaded', $bannerName);

        $slug = url_title($this->request->getVar('nama_event'), '-', true);

        $this->eventsModel->save([
            'nama_event'         => $this->request->getVar('nama_event'),
            'slug' => $slug,
            'tanggal_event'         => $this->request->getVar('tanggal_event'),
            'banner_event'         => $bannerName,
            'deskripsi_event'         => $this->request->getVar('deskripsi_event'),
            'lokasi_event'         => $this->request->getVar('lokasi_event'),
            'events' => $eventsdb,
        ]);

        session()->setFlashdata('success', 'Event berhasil dibuat!');
        session()->setFlashdata('error', 'The action you requested is not allowed!');
        return $this->response->redirect(site_url('manage_events'));
    }
    //CREATE EVENT
    public function tambah()
    {
        $eventsdb = $this->eventsModel->getEvent();
        $data = [
            'title' => 'Form Tambah Event',
            'menu' => 'manage',
            'submenu' => 'manageevents',
            'events' => $eventsdb,
        ];
        return view('admin/manageevents/viewaddevent.php', $data);
    }
    public function save()
    {

        $validationRule = [
            'nama_event' => [
                'rules' => 'required|is_unique[events.nama_event]',
                'errors' => [
                    'is_unique' => '{field} event sudah terdaftar'
                ]
            ],
            'banner_event' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[banner_event]',
                    'is_image[banner_event]',
                    'mime_in[banner_event,image/jpg,image/jpeg,image/png,image/webp]',
                    'max_size[banner_event,1024]',
                ],
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 1 MB.',
                    'is_image' => 'Yang anda pilih bukan gambar.',
                    'mime_in' => 'Format gambar tidak diterima.'
                ]
            ],
        ];

        if (!$this->validate($validationRule)) {
            $data = [
                'errors' => $this->validator->getErrors(),
            ];

            // return redirect()->to('/manageevents')->withInput();
            return view('admin/manageevents/viewmanageevents.php', $data);
        }

        $img = $this->request->getFile('banner_event');

        if (!$img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $data = ['uploaded_fileinfo' => new File($filepath)];
            return view('admin/manageevents/viewmanageevents.php', $data);
        }

        $data = ['errors' => 'The file has been already moved.'];

        $slug = url_title($this->request->getVar('nama_event'), '-', true);
        $this->eventsModel->save([
            'nama_event' => $this->request->getVar('nama_event'),
            'slug' => $slug,
            'tanggal_event' => $this->request->getVar('tanggal_event'),
            'banner_event' => $this->request->getVar('banner_event'),
            'deskripsi_event' => $this->request->getVar('deskripsi_event'),
            'lokasi_event' => $this->request->getVar('lokasi_event'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/manageevents')->withInput();
        // return view('admin/manageevents/viewaddevent.php', $data);
    }

    // EDIT EVENT

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->eventsModel->getWhere(['id_event' => $id]);
            if ($query->resultID->num_rows > 0) {
                $db['event'] = $query->getRow();
                $data = [
                    'db' => $db,
                    'menu' => 'manage',
                    'submenu' => 'manageevents',
                ];
                return view('admin/manageevents/vieweditevent.php', $data);
            } else {
                throw \Codeigniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \Codeigniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    // READ EVENT
    public function detail()
    {
        $data = [
            'title' => 'Detail Event',
            'menu' => 'manage',
            'submenu' => 'manageevents',
            'event' => $this->eventsModel->getEvent()
        ];

        // jika data tidak ada
        if (empty($data['event'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Event tidak ditemukan.');
        }

        return view('admin/manageevents/viewdetail.php', $data);
    }

    // DELETE EVENT
    public function delete($id)
    {
        $this->eventsModel->delete($id);
        return redirect()->to('/manage_events');
    }
}
