<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "nama" => "Administrator",
            "email" => "admin@gmail.com",
            "password" => bcrypt("administrator"),
            "alamat" => "Bandung",
            "nomor_telepon" => "081214707142",
            "status" => "1",
            "role" => "admin"
        ]);

        User::create([
            "nama" => "Mohammad Ilham",
            "email" => "ilham@gmail.com",
            "password" => bcrypt("penyewa"),
            "alamat" => "Bandung",
            "nomor_telepon" => "081214707143",
            "nomor_sim" => "121892813",
            "status" => "1",
            "role" => "user"
        ]);
    }
}
