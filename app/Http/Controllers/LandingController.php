<?php

namespace App\Http\Controllers;

use App\Event;
use App\MahasiswaCarouselItem;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $items = MahasiswaCarouselItem::all();
        $events = Event::limit(2)->get();
        return view('welcome', compact('items', 'events'));
    }
}
