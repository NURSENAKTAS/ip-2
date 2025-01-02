<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

class RolesSeeders extends Seeder
{

    public function run(): void
    {
        $jsonData = $this->getJson('roles');
        foreach ($jsonData as $data) {
            Roles::create([
                'role_name' => $data->role_name,
            ]);
        }

        //dd(Roles::all());
    }
    private function getJson(string $filename): array
    {
        $jsonPath = database_path('data/'.$filename.'.json');
        $prioritiesJson = file_get_contents($jsonPath);
        // JSON verisini çözümleyin, diziler olarak almak için ikinci parametreyi true yapın
        $decodedData = json_decode($prioritiesJson);
        if(json_last_error() !== JSON_ERROR_NONE) {
            throw new \Nette\FileNotFoundException($filename);
        }
        return $decodedData;
    }
}
