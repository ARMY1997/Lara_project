<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'name' => $this->faker->name,
                'age' => $this->faker->realText($maxNbChars = 10),
                'reason_see' =>$this->faker->realText(),
                'assign' => $this->faker->realText(),
                'slug' => Str::random(5),
                'user_id'=>rand(1,5)
        ];
    }
}
