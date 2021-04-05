<?php

namespace Database\Seeders;

use App\Models\Card;
use Database\Factories\CardFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Card::factory(10)->create();
    }
}