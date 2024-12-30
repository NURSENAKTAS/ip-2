<?php

namespace Database\Seeders;

use App\Models\Pages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $pages = ["Anasayfa","Kategoriler","Forumlar","Kayıt Ol / Giriş Yap"];
        $pagesSlug = ["/","#categories","/forum","/register"];
        foreach ($pages as $index => $page) {
            Pages::create([
                'page_name' => $page,
                'page_slug' => $pagesSlug[$index],
            ]);
        }
    }
}
