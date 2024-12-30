<?php

namespace Database\Seeders;

use App\Models\Likes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Nette\FileNotFoundException;

class LikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json=$this->getJson('likes');
        foreach ($json as $data) {
            Likes::create([
                'user_id' => $data->user_id,
                'discussion_id' => $data->discussion_id,
                'comment_id' => $data->comment_id
            ]);

        }
        //dd(Likes::all());
    }
    private function getJson(string $filename): array
    {
        $jsonData = Storage::get("Seeders/".$filename.".json");
        $decodedData = json_decode($jsonData);
        if(json_last_error() !== JSON_ERROR_NONE) {
            throw new FileNotFoundException($filename);
        }
        return $decodedData;
    }
}
