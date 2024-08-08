<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('event.index', compact('events'));
    }

    public function show($slug){
        $event = Event::where('slug', $slug)->firstOrFail();
        $event_suggests = Event::where('slug','!=', $slug)->latest()->limit(6)->get();
        return view('event.show', compact('event', 'event_suggests'));
    }
}
