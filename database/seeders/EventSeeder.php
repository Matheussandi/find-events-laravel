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
        $users = \App\Models\User::all();
        if ($users->count() === 0) return;

        for ($i = 1; $i <= 30; $i++) {
            $creator = $users->random();
            $event = \App\Models\Event::factory()->create([
                'user_id' => $creator->id,
                'organizer' => $creator->name,
            ]);

            // Participantes aleatórios (exceto o criador)
            $participants = $users->where('id', '!=', $creator->id)->random(rand(0, 10))->pluck('id')->toArray();
            if (!empty($participants)) {
                $event->users()->attach($participants);
            }
        }
    }
}
