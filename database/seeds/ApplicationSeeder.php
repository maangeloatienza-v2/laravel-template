<?php

namespace App;

use Illuminate\Database\Seeder;
use App\Application;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Application::class,1)->create();

    }
}
