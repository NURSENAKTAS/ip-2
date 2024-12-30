<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DiscussionModeratorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Storage::get("Seeders/discussion_moderators.json");
        $DiscussionModerators= json_decode($json,true);

        // Veriyi pivot tablosuna ekleme (role_forum tablosu)
        DB::table('discussion_moderators')->insert($DiscussionModerators);
    }
}
