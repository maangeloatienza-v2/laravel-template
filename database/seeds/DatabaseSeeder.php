<?php

namespace App;

use Illuminate\Database\Seeder;
use App\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call(ApplicationSeeder::class);



    }
}
