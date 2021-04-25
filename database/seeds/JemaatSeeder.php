<?php

use Illuminate\Database\Seeder;
use App\Jemaat;

class JemaatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $appUrl = env('APP_URL');
        Jemaat::truncate();
        $json = json_decode(file_get_contents('http://localhost:8000/json/jemaat.json'));
        // $json = json_decode(file_get_contents('http://localhost/si-gereja/public/json/jemaat.json'));
        
        foreach ($json as $j) {
            Jemaat::create(array(
                'no_kk'          => $j->no_kk,
                'nik'            => $j->nik,
                'head_of_family' => $j->head_of_family,
                'name'           => $j->name,
                'birthplace'     => $j->birthplace,
                'date_of_birth'  => $j->date_of_birth
            ));
        }
    }
}