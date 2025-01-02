<?php

namespace Database\Seeders;

use App\Models\Uploads;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Nette\FileNotFoundException;

class UploadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData =$this->getJson('uploads');
        foreach ($jsonData as $data) {
            Uploads::create([
                'user_id' => $data->user_id,
                'discussion_id' => $data->discussion_id,
                'file_path' => $data->file_path,
                'upload_date' => $data->upload_date
            ]);
        }
        //dd(Uploads::all());

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
