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
        $jsonPath = database_path('data/'.$filename.'.json');
        $prioritiesJson = file_get_contents($jsonPath);
        // JSON verisini çözümleyin, diziler olarak almak için ikinci parametreyi true yapın
        $decodedData = json_decode($prioritiesJson);
        if(json_last_error() !== JSON_ERROR_NONE) {
            throw new FileNotFoundException($filename);
        }
        return $decodedData;
    }
}
