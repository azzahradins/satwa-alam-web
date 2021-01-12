<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Delete jangan lupa supaya tidak double
        DB::table('user_level')->delete();
        // Update levels more than 1 records
        $levels = [
            [
                'desc' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'desc' => 'Verified User',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'desc' => 'User',
                'created_at' => now(),
                'updated_at' => now(),
            ]];
        DB::table('user_level')->insert($levels);
    }
}
