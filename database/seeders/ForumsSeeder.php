<?php

namespace Database\Seeders;

use App\Models\Forums;
use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Nette\FileNotFoundException;

class ForumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = $this->getJson('forums');
        foreach ($jsonData as $data)
        {
            Forums::create([
                'forum_name' => $data->forum_name,
                'description' => $data->description

            ]);
        }

    }

    private function getJson(string $filename): array
    {
        $json = Storage::get("Seeders/".$filename.".json");
        $decodedData = json_decode($json);
        if(json_last_error()!== JSON_ERROR_NONE)
        {
            throw new FileNotFoundException($filename);
        }
        return $decodedData;
    }
}
