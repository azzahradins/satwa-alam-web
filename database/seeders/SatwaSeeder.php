<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatwaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Delete jangan lupa supaya tidak double
        DB::table('animals')->delete();
        // Update levels more than 1 records
        $animals = [
            [
                'id' => 1,
                'animals_name' => 'Kucing Domestik',
                'scientific_name' => 'Felis Catus',
                'habitat' => 'Darat',
                'created_at' => now(),
                'updated_at' => now(),
            ]];
        DB::table('animals')->insert($animals);

        // Delete jangan lupa supaya tidak double
        DB::table('posts')->delete();
        // Update levels more than 1 records
        $satwa = [
            [
                'id_animals' => 1,
                'type' => null,
                'photo' => 'upload/images',
                'lat' => '-3.4938',
                'lng' => '7.493801',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]];
        DB::table('posts')->insert($satwa);
    }
}
