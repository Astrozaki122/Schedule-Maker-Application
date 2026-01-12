<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        
        // Create userInfo if it doesn't exist
        if (!$user->userInfo) {
            $user->userInfo()->create([
                'username' => $user->name,
            ]);
        }
        
        $events = $user->userInfo->events;
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'location' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        
        // Create userInfo if it doesn't exist
        if (!$user->userInfo) {
            $user->userInfo()->create([
                'username' => $user->name,
            ]);
        }

        $user->userInfo->events()->create($request->only('title', 'description', 'start_time', 'end_time', 'location'));
        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    public function edit(Events $event) {
        return view('events.edit', compact('event'));
    }

    
    public function update(Request $request, Events $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'location' => 'required|string|max:255',
        ]);

        $event->update($request->only('title', 'description', 'start_time', 'end_time', 'location'));

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Events $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }
}
