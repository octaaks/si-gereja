<?php

use Illuminate\Database\Seeder;
use App\Lingkungan;

class LingkunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Lingkungan::create([
            'nama_lingkungan' => 'Lingkungan 1'
        ]);
        
        Lingkungan::create([
            'nama_lingkungan' => 'Lingkungan 2'
        ]);
        
        Lingkungan::create([
            'nama_lingkungan' => 'Lingkungan 3'
        ]);
        
        Lingkungan::create([
            'nama_lingkungan' => 'Lingkungan 4'
        ]);
        
        Lingkungan::create([
            'nama_lingkungan' => 'Lingkungan 5'
        ]);

    }
}
