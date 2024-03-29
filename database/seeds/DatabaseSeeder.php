<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LingkunganSeeder::class);
        $this->call(JemaatSeeder::class);
        $this->call(PernikahanSeeder::class);
    }
}
