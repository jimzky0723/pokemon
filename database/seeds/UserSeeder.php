<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            'name' => 'JiMzKy',
            'server' => 33,
            'username' => 'anon',
            'password' => bcrypt('anon123'),
            'level' => 'admin'
        ]);
    }
}
