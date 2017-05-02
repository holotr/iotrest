<?php

use Illuminate\Database\Seeder;
use Someline\Models\Foundation\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        User::create([
//            'slid' => '1',
            'name' => "Tau'ri",
            'email' => 'tauri823@gmail.com',
            'password' => bcrypt('admin'),
            'remember_token' => str_random(10),
            'gender' => 'M',
            'birthday' => '1995-08-23',
            'country' => 'CN',
            'timezone' => 'Asia/Shanghai',
            'locale' => 'en',
            'username' => 'tauri',
            'phone_number' => '+1234567890',
            'status' => 1,
        ]);

        factory(User::class, 25)->create();
    }
}
