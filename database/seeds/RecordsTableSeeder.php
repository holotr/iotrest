<?php

use Illuminate\Database\Seeder;
use Someline\Models\Foundation\Record;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        DB::table('records')->truncate();
        Schema::enableForeignKeyConstraints();


        factory(Record::class, 1000)->create();
    }
}
