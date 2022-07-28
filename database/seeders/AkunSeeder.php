<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [[
            'username' => 'admin',
            'name' => 'ini adalah admin',
            'email' => 'admin@example.com',
            'level' => 'admin',
            'password' => bcrypt('admin123'),
        ],
        [
            'username' => 'manager',
            'name' => 'ini adalah manager',
            'email' => 'manager@example.com',
            'level' => 'manager',
            'password' => bcrypt('manager123'),
        ],
        [
            'username' => 'pegawai',
            'name' => 'ini adalah pegawai',
            'email' => 'pegawai@example.com',
            'level' => 'pegawai',
            'password' => bcrypt('pegawai123'),
        ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
