<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(LevelSeeder::class);
        $this->command->info('Level table seeded!');

        $this->call(UserSeeder::class);
        $this->command->info('User table seeded!');

        $this->call(SatwaSeeder::class);
        $this->command->info('All table seeded!');
    }
}
