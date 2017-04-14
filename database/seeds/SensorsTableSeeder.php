<?php

use Illuminate\Database\Seeder;
use Someline\Models\Foundation\Sensor;

class SensorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        DB::table('sensors')->truncate();
        Schema::enableForeignKeyConstraints();


        factory(Sensor::class, 100)->create();
    }
}
