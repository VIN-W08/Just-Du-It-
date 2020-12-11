<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("shoes")->insert([
        [
            "id" => 1,
            "name" => "Air Jordan 1 Low",
            "description" => "Air Jordan 1 Low",
            "price" => 1429000,
            "image" => "Air Jordan 1 Low.jpg"
        ],
        [
            "id" => 2,
            "name" => "Air Jordan 1 Zoom Cmft",
            "description" => "Air Jordan 1 Zoom Cmft",
            "price" => 2099000,
            "image" => "Air Jordan 1 Zoom Cmft.jpg"
        ],
        [
            "id" => 3,
            "name" => "Jordan Zoom '92",
            "description" => "Jordan Zoom '92",
            "price" => 2279000,
            "image" => "Jordan Zoom '92.jpg"
        ],
        [
            "id" => 4,
            "name" => "Jordan Mars 270 Low",
            "description" => "Jordan Mars 270 Low",
            "price" => 2279000,
            "image" => "Jordan Mars 270 Low.jpg"
        ],
        [
            "id" => 5,
            "name" => "Jordan Air Zoom Renegade",
            "description" => "Jordan Air Zoom Renegade",
            "price" => 1979000,
            "image" => "Jordan Air Zoom Renegade.jpg"
        ],
        [
            "id" => 6,
            "name" => "Air Jordan 1 Low SE",
            "description" => "Air Jordan 1 Low SE",
            "price" =>  1649000,
            "image" => "Air Jordan 1 Low SE.jpg"
        ],
        [
            "id" => 7,
            "name" => "Jordan Air Cadence",
            "description" => "Jordan Air Cadence",
            "price" => 1649000,
            "image" => "Jordan Air Cadence.jpg"
        ],
        [
            "id" => 8,
            "name" => "Jordan Delta",
            "description" => "Jordan Delta",
            "price" => 1979000,
            "image" => "Jordan Delta.jpg"
        ],
        [
            "id" => 9,
            "name" => "Air Jordan OG",
            "description" => "Air Jordan OG",
            "price" => 2099000,
            "image" => "Air Jordan OG.jpg"
        ]
        ]);
    }
}
