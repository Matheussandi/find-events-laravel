<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        for ($i = 1; $i <= 10; $i++) {
            $event = Event::create([
                'title' => 'Evento Exemplo ' . $i,
                'description' => 'Descrição do evento exemplo ' . $i,
                'location' => 'Cidade ' . $i,
                'is_public' => rand(0, 1),
                'date' => now()->addDays($i),
                'organizer' => 'Organizador ' . $i,
                'items' => [
                    'item1' => 'Item 1 do evento ' . $i,
                    'item2' => 'Item 2 do evento ' . $i,
                    'item3' => 'Item 3 do evento ' . $i,
                ],
            ]);
            // Simula participantes aleatórios
            if (method_exists($event, 'users')) {
                $event->users()->attach($users->random(rand(1, 5))->pluck('id')->toArray());
            }
        }
    }
}
