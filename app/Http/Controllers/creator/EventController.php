<?php

namespace App\Http\Controllers\creator;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        //get all data from events table
        $events = Event::all(); // == SELECT * FROM
        $pages = 'event';
        return view('creator.event.index', compact('events', 'pages'));
    }

    public function create()
    {
        //display add / create form
        $pages = 'event';
        $users = User::all();
        return view('creator.event.create', compact('pages', 'users'));
    }

    public function store(Request $request)
    {
        //add new data
        Event::create($request->all());
        return redirect()->route('creator.event.index');
    }

    public function edit(Event $event)
    {
        //display edit form based on event id
        $pages = 'event';
        return view('creator.event.edit', compact('event', 'pages'));
    }



    public function update(Request $request, Event $event)
    {
        //update data from edit form
        $event->update($request->all());
        return redirect()->route('creator.event.index');
    }

    public function destroy(Event $event)
    {
        //delete data based on id
        $event->delete();
        return redirect()->back();
    }

    public function show($id)
    {
        $pages = 'event';
        $event = Event::findOrFail($id);

        $events = Event::all()->except($id)->pluck('id');
        $guestList = User::whereNotIn('id', function ($query)use($events){
            $query->select('user_id')->from('event_user')->whereNotIn('event_id', $events);
        })->where('role_id', 3)->get();

        return view('creator.event.detail', compact('pages', 'event', 'guestList'));
        //show data based on event id
    }

}
