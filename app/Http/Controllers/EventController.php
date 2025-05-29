<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display events
        return view('events.index');
    }
    public function show($id)
    {
        // Logic to retrieve and display a single event
        return view('events.show', ['eventId' => $id]);
    }
    public function create()
    {
        // Logic to show the form for creating a new event
        return view('events.create');
    }
    public function store(Request $request)
    {
        // Logic to store a new event
        // Validate and save the event data
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
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
