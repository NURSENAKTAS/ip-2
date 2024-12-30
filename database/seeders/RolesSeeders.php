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
        $json = Storage::get("Seeders/".$filename.'.json');
        $decodedData = json_decode($json);
        if(json_last_error() !== JSON_ERROR_NONE) {
            throw new FileNotFoundException($filename);
        }
        return $decodedData;
    }
}
