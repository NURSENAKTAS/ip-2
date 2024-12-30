<?php

namespace Database\Seeders;

use App\Models\UserActivityLogs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Nette\FileNotFoundException;

class UserActivityLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData =$this->getJson('user_activity_logs');
        foreach($jsonData as $data)
        {
            UserActivityLogs::create([
                'activity_date' => $data->activity_date,
                'activity_type' => $data->activity_type,
                'user_id' => $data->user_id
            ]);
           //dd(UserActivityLogs::all());
        }
    }
    private function getJson(string $filename):array
    {
        $json =Storage::get("Seeders/".$filename.".json");
        $decodedData = json_decode($json);
        if(json_last_error() !== JSON_ERROR_NONE)
        {
            throw new FileNotFoundException($filename);
        }
        return $decodedData;
    }
}
