<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Container\Attributes\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Nette\FileNotFoundException;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData =$this->getJson('tags');
        foreach ($jsonData as $data) {
            Tags::create([
                'tag_name' => $data->tag_name
            ]);
            //dd(Tags::all());
        }
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
