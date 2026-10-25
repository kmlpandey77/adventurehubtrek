<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Kamal Pandey',
            'email' => 'kml.pandey77@gmail.com',
            // 'groups' => '100',
            'password' => bcrypt('53cr3T980@()*'),
        ]);
    }
}
