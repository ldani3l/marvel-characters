<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'resourceURI' => $this->faker->url(),
            'score' => rand(1,10),
            'comment' => $this->faker->text(),
            'nickname' => $this->faker->name(),
        ];
    }
}
