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
        if ($users->count() === 0) return;

        $bigEvents = rand(1, 5);
        $totalEvents = 30;

        for ($i = 1; $i <= $totalEvents; $i++) {
            $creator = $users->random();
            $event = Event::factory()->create([
                'user_id' => $creator->id,
                'organizer' => $creator->name,
            ]);

            if ($i <= $bigEvents) {
                // Evento grande: entre 101 e o máximo possível de participantes (exceto o criador)
                $max = $users->count() - 1;
                $qty = $max > 101 ? rand(101, $max) : $max;
                $participants = $max > 0 ? $users->where('id', '!=', $creator->id)->random($qty)->pluck('id')->toArray() : [];
            } else {
                // Evento normal: até 10 participantes (exceto o criador)
                $maxParticipants = min(10, $users->count() - 1);
                $participants = $maxParticipants > 0 ? $users->where('id', '!=', $creator->id)->random(rand(0, $maxParticipants))->pluck('id')->toArray() : [];
            }
            if (!empty($participants)) {
                $event->users()->attach($participants);
            }
        }
    }
}
