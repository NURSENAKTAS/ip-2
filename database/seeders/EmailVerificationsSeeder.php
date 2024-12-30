<?php

namespace Database\Seeders;

use App\Models\EmailVerifications;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Nette\FileNotFoundException;

class EmailVerificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = $this->getJson('email_verifications');
        foreach ($jsonData as $data) {
            EmailVerifications::create([
                'verification_date' => $data->verification_date,
                'user_id' => $data->user_id
            ]);
            //dd(EmailVerifications::all());
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
