<?php

namespace Database\Seeders;

use App\Models\User;
use Couchbase\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Nette\FileNotFoundException;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = $this ->getJson('users');
        foreach ($jsonData as $data)
        {
            User::create([
               'user_name' => $data->user_name,
                'email'=> $data->email,
                'email_verified' => $data->email_verified,
                'password'=> $data->password,
                'join_date' => $data->join_date,
                'is_active' => $data->is_active,
                'bio' => $data->bio,
                'avatar_url' => $data->avatar_url,
                'location' => $data->location,
                'website' => $data->website
            ]);
        }

    }

    private function getJson(string $filename): array
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
