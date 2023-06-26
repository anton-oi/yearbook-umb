<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        $events = Event::orderBy('created_at', 'desc')->paginate();
        return view('events.index', compact('events'));
    }

    public function show($id) {
        $event = Event::with(['Covers'])->findOrFail($id);
        return view('events.show', compact('event'));
    }
}
