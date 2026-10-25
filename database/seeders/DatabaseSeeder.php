<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'password' => bcrypt(env('ADMIN_PASSWORD') ?: \Illuminate\Support\Str::password(20)),
        ]);
    }
}
