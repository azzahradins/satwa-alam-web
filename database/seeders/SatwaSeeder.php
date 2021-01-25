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
                'species' => 'Mamalia',
                'featured_image' => 'upload/images1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'id' => 2,
                'animals_name' => 'Anjing Domestik',
                'scientific_name' => 'Felis Catus',
                'species' => 'Mamalia',
                'featured_image' => 'null',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'id' => 3,
                'animals_name' => 'Kerang Ajaib',
                'scientific_name' => 'Crassostrea gigas',
                'species' => 'Moluska',
                'featured_image' => 'null',
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
                'photo' => 'upload/images.jpg',
                'lat' => '-3.4938',
                'lng' => '7.493801',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'id_animals' => 1,
                'type' => 'Kucing Persia',
                'photo' => 'upload/images.jpg',
                'lat' => '-3.4938',
                'lng' => '7.493801',
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]];
        DB::table('posts')->insert($satwa);
    }
}
