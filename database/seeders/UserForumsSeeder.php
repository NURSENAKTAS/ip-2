<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserForumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // JSON dosyasını Storage diskinden okuma
        $json = Storage::get("Seeders/user_forums.json");
        $UserForums= json_decode($json,true);

        // Veriyi pivot tablosuna ekleme (role_forum tablosu)
        DB::table('user_forums')->insert($UserForums);
    }
}
