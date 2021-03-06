<?php

use Illuminate\Database\Seeder;
use App\Pernikahan;

class PernikahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pernikahan::truncate();
        $json = json_decode(file_get_contents('http://localhost:8000/json/pernikahan.json'));
        // $json = json_decode(file_get_contents('http://localhost/si-gereja/public/json/pernikahan.json'));
        
        foreach ($json as $j) {
            Pernikahan::create(array(
                'name1'  => $j->name1,
                'name2'  => $j->name2,
                'date'  => $j->date
            ));
        }
    }
}