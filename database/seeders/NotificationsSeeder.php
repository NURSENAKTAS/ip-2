<?php

namespace Database\Seeders;

use App\Models\Notifications;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Nette\FileNotFoundException;

class NotificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json =$this->getJson('notifications');
        foreach ($json as $data) {
            Notifications::create([
                'content' => $data->content,
                'created_date' => $data->created_date,
                'user_id' => $data->user_id,
                'discussion_id' => $data->discussion_id,
                'like_id' => $data->like_id,
                'report_id' => $data->report_id,
                'comment_id' => $data->comment_id,
            ]);
        }
       // dd(Notifications::all());
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
