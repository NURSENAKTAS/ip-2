<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RoleForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // JSON dosyasını Storage diskinden okuma
        $json = Storage::get("Seeders/role_forum.json");
        $roleForums = json_decode($json,true);

        // Veriyi pivot tablosuna ekleme (role_forum tablosu)
        DB::table('role_forum')->insert($roleForums);
    }
}
