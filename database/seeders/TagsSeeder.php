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
        $json = Storage::get("Seeders/".$filename.".json");
        $decodedData = json_decode($json);
        if(json_last_error() !== JSON_ERROR_NONE) {
            throw new FileNotFoundException($filename);
        }
        return $decodedData;
    }
}
