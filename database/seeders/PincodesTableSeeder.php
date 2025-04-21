<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class PincodesTableSeeder extends Seeder
{
    public function run()
    {
        $file = database_path('seeders/data/pincodes.csv');

        if (!file_exists($file)) {
            exit("CSV file not found at $file");
        }

        $csv = array_map('str_getcsv', file($file));
        $header = array_map('trim', array_shift($csv));

        foreach ($csv as $row) {
            $data = array_combine($header, $row);
            DB::table('pincodes')->insert([
                'pincode' => trim($data['pincode']),
                'city' => trim($data['city']),
                'state' => trim($data['state']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}