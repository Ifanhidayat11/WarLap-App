<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $dataNewAdmin =[
            'nik'       =>'0928321321',
            'name'      =>'Kasino',
            'jeniskelamin'  =>'Laki-Laki',
            'alamat'        =>'wwwww',
            'notelpon'     =>'0863723212',
            'role'          =>'Admin',
            'email'         =>'Kasino@gmail.com',
            'password'      =>bcrypt('123')
        ];
        User::create($dataNewAdmin);
    }
}
