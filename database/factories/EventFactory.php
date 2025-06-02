<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'location' => $this->faker->city(),
            'is_public' => $this->faker->boolean(),
            'date' => $this->faker->dateTimeBetween('+1 days', '+1 year'),
            'organizer' => $this->faker->name(),
            'items' => $this->faker->randomElements([
                'Cadeira', 'Mesa', 'Projetor', 'Microfone', 'Água', 'Coffee Break'
            ], $this->faker->numberBetween(1, 4)),
            'user_id' => null, // será definido no seeder
        ];
    }
}
