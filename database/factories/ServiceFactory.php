<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //es una "receta" para generar datos de prueba, usando la librería Faker para generar datos aleatorios
        return [
            'name' => $this->faker->word(),
            'target' => $this->faker->url(),
            'last_status' => $this->faker->randomElement(['up', 'down']),
            'last_checked_at' => $this->faker->dateTimeBetween('-1 hour', 'now'),
        ];
    }
}
