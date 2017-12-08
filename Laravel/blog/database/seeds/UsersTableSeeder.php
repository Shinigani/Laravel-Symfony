<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 's.gold@gmail.com',
            'password' => bcrypt( 'admin0000'),
        ]);
        factory(App\User::class,10)->create();
    }
}
