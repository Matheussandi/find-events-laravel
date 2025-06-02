<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $search = request('search');
        $perPage = 10;

        if ($search) {
            $events = Event::where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('location', 'like', '%' . $search . '%')
                ->paginate($perPage);
        } else {
            $events = Event::paginate($perPage);
        }

        return view('events.index', ['events' => $events, 'search' => $search]);
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
            'description' => 'nullable|string|max:1000',
            'location' => 'required|string|max:255',
            'is_public' => 'required|boolean',
            'organizer' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'items' => 'nullable|array',
        ]);

        $event = new Event();
        $event->title = $validated['title'];
        $event->date = $validated['date'];
        $event->is_public = $validated['is_public'];
        $event->description = $request->input('description', null);
        $event->organizer = $validated['organizer'] ?? null;
        $event->location = $validated['location'];
        $event->image = null;
        $event->items = $validated['items'] ?? [];

        // Armazenamento da imagem usando Storage facade
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('events', $request->file('image'));
            $event->image = $path;
        }

        // Associar o evento ao usuário autenticado, se houver
        if (Auth::check()) {
            $event->user_id = Auth::id();
        }

        $event->save();

        return redirect()->route('events.index')->with('success', 'Evento criado com sucesso.');
    }
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', ['event' => $event]);
    }
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        // Validação dos dados recebidos
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string|max:1000',
            'location' => 'required|string|max:255',
            'is_public' => 'required|boolean',
            'organizer' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'items' => 'nullable|array',
        ]);

        $event->title = $validated['title'];
        $event->date = $validated['date'];
        $event->is_public = $validated['is_public'];
        $event->description = $request->input('description', null);
        $event->organizer = $validated['organizer'] ?? null;
        $event->location = $validated['location'];
        $event->items = $validated['items'] ?? [];

        // Atualiza a imagem se necessário
        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $path = Storage::disk('public')->put('events', $request->file('image'));
            $event->image = $path;
        }

        $event->save();

        return redirect()->route('events.index')->with('success', 'Evento atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Evento excluído com sucesso.');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $events = Event::where('user_id', $user->id)->get();
        
        return view('events.dashboard', compact('events'));
    }
}
