<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\announce>
 */
class AnnounceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

              
            'title' => $this->faker->sentence(6), 
            'content' => $this->faker->paragraph(3), 
            'status' => $this->faker->randomElement(['valid', 'fermée']), 
            'nb_place' => $this->faker->numberBetween(1, 100), 
            'description' => $this->faker->text(200),
            'date_debut' => $this->faker->date(), 
            'date_fin' => $this->faker->date(), 
            'heure_debut' => $this->faker->time(),
            'heure_fin' => $this->faker->time(), 
            'user_id' => User::factory(), 
        ];
    }
}
