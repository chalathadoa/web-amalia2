<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // 1 data
        // $data = [
        //     'nama_user' => 'administrator',
        //     'prodi' => 'informatika',
        //     'email_user' => 'adminamalia@gmail.com',
        //     'password_user' => password_hash('23455', PASSWORD_BCRYPT),
        //     'no_hp' => '123456789',
        //     'akses_user' => 1,
        //     'tanggal_lahir' => '12-02-2013',
        //     'tahun_masuk' => '2019',
        //     'alamat' => 'bumi'
        // ];
        // $this->db->table('users')->insert($data);

        // multi data
        $data = [
            [
                'nama_user' => 'pengajar',
                'prodi' => 'informatika',
                'email_user' => 'pengajaramalia@gmail.com',
                'password_user' => password_hash('pengajar', PASSWORD_BCRYPT),
                'no_hp' => '123456789',
                'akses_user' => 2,
                'tanggal_lahir' => '12-02-2013',
                'tahun_masuk' => '2019',
                'alamat' => 'bumi'
            ],
            [
                'nama_user' => 'santri',
                'prodi' => 'informatika',
                'email_user' => 'santriamalia@gmail.com',
                'password_user' => password_hash('santri', PASSWORD_BCRYPT),
                'no_hp' => '123456789',
                'akses_user' => 3,
                'tanggal_lahir' => '12-02-2013',
                'tahun_masuk' => '2019',
                'alamat' => 'bumi'
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
