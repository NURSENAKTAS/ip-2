<?php

namespace Database\Seeders;

use App\Models\Comments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Nette\FileNotFoundException;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData =$this->getJson('comments');
        foreach ($jsonData as $data) {
            Comments::create([
                'user_id' => $data->user_id,
                'discussion_id' => $data->discussion_id,
                'comment_text' => $data->comment_text

            ]);
        }
        //dd(Comments::all());
    }

    private function getJson(string $filename): array
    {
        $json =Storage::get("Seeders/".$filename.".json");
        $decodedData = json_decode($json);
        if(json_last_error() !== JSON_ERROR_NONE) {
            throw new FileNotFoundException($filename);
        }
        return $decodedData;
    }
}
