<?php

namespace Database\Seeders;

use App\Models\ForumSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Nette\FileNotFoundException;

class ForumSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = $this->getJson('forum_settings');
        foreach ($jsonData as $json) {
            ForumSettings::create([
                'setting_key' => $json->setting_key,
                'setting_value' => $json->setting_value,
                'forum_id' => $json->forum_id
            ]);
            //dd(ForumSettings::all());
        }
    }
    private function getJson(string $filename):array
    {
        $json = Storage::get("Seeders/".$filename.".json");
        $decodedData = json_decode($json);
        if(json_last_error() !== JSON_ERROR_NONE)
        {
            throw new FileNotFoundException($filename);
        }
        return $decodedData;
    }
}
