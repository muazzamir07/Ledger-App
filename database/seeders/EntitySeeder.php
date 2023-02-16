<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('entites')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'created_at' => '2019-12-02T20:01:00.283041Z', 
            'updated_at' => '2019-12-02T20:01:00.283041Z',

        ]);
    }
}
