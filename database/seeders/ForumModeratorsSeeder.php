<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ForumModeratorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Storage::get("Seeders/forum_moderators.json");
        $ForumModerators= json_decode($json,true);

        // Veriyi pivot tablosuna ekleme (role_forum tablosu)
        DB::table('forum_moderators')->insert($ForumModerators);
    }
}
