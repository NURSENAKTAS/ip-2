<?php

namespace Database\Seeders;

use App\Models\Reports;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Nette\FileNotFoundException;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class ReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json =$this->getJson('reports');
        foreach ($json as $data) {
            Reports::create([
                'report_reason'=> $data->report_reason,
                'report_date'=> $data->report_date,
                'user_id'=> $data->user_id,
                'comment_id'=> $data->comment_id,
                'discussion_id'=> $data->discussion_id
            ]);
        }
        //dd(Reports::all());
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
