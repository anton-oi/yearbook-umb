<?php

namespace App\Http\Controllers;

use App\MahasiswaCarouselItem;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $items = MahasiswaCarouselItem::all();
        
        return view('welcome', compact('items'));
    }
}
