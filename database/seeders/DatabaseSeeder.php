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
            'nik'       =>'123456',
            'name'      =>'Kresna Dermawan',
            'jeniskelamin'  =>'Laki-Laki',
            'alamat'        =>'Bantardawa',
            'notelpon'     =>'083872717302',
            'role'          =>'Admin',
            'email'         =>'kresna@gmail.com',
            'password'      =>bcrypt('1928')
        ];
        User::create($dataNewAdmin);
    }
}
