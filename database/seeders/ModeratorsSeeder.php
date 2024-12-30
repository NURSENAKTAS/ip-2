<?php

namespace Database\Seeders;

use App\Models\Moderators;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Nette\FileNotFoundException;

class ModeratorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData =$this->getJson('moderators');
        foreach ($jsonData as $data) {
        Moderators::create([
            'assigned_date' => $data -> assigned_date,
            'user_id' => $data -> user_id
        ]);
//dd(Moderators::all());
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
