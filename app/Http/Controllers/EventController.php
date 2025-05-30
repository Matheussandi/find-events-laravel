<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        // Logic to retrieve and display events
        return view('events.index', ['events' => $events]);
    }
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }

    public function create()
    {
        // Logic to show the form for creating a new event
        return view('events.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'is_public' => 'required|boolean',
            'organizer' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $event = new Event();
        $event->title = $validated['title'];
        $event->date = $validated['date'];
        $event->is_public = $validated['is_public'];
        $event->organizer = $validated['organizer'] ?? null;

        // Armazenamento da imagem usando Storage facade
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('events', $request->file('image'));
            $event->image = $path;
        }

        $event->save();

        return redirect()->route('events.index')->with('success', 'Evento criado com sucesso.');
    }
    public function edit($id)
    {
        // Logic to show the form for editing an existing event
        return view('events.edit', ['eventId' => $id]);
    }
    public function update(Request $request, $id)
    {
        // Logic to update an existing event
        // Validate and update the event data
        return redirect()->route('events.show', $id)->with('success', 'Event updated successfully.');
    }
}
