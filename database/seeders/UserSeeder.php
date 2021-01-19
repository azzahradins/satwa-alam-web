<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        // Delete jangan lupa supaya tidak double
        DB::table('users')->delete();
        // Update levels more than 1 records
        $levels = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'levels' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('12345678'),
                'levels' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Unauthorized User',
                'email' => 'guest@gmail.com',
                'password' => Hash::make('12345678'),
                'levels' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]];
        DB::table('users')->insert($levels);
    }
}
