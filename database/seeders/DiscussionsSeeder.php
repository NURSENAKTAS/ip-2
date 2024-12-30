<?php

namespace Database\Seeders;

use App\Models\Discussions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Nette\FileNotFoundException;

class DiscussionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = $this->getJson('discussions');
        foreach ($jsonData as $data) {
            Discussions::create([
                'title' => $data->title,
                'slug' => $data->slug,
                'content' => $data->content,
                'created_date' => $data->created_date,
                'user_id' => $data->user_id,
                'forum_id' => $data->forum_id
            ]);
        }
        //dd(Discussions::all());
    }
    private function getJson(string $filename): array
    {
        $json= Storage::get("Seeders/".$filename.".json");
        $decodedData = json_decode($json);
        if(json_last_error() !== JSON_ERROR_NONE) {
            throw new FileNotFoundException($filename);
        }
        return $decodedData;
    }
}
