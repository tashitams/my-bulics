<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
Use App\Models\Event;
use App\Imports\EventsImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;


class EventController extends Controller
{
    public function index() 
    {
        return inertia('Admin/Event/Index', [
            'events' => DB::table('events')->orderBy('event_date')->paginate(10),
        ]);
    }


    public function store()
    {
        Event::create(
            Request::validate([
                'title' => 'required|max:150',
                'event_date' => 'required|date'
            ])
        );
        return redirect()->route('admin.events.index')->with('message', __('message.event.store'));
    }


    public function edit(Event $event)
    {
        return inertia('Admin/Event/Edit', [
            'event' => [
                'id' => $event->id,
                'title' => $event->title,
                'event_date' => $event->event_date,
            ],
        ]);
    }


    public function update(Event $event)
    {
         $event->update(
            Request::validate([
                'title' => 'required|max:150',
                'event_date' => 'required|date'
            ])
        );

        return redirect()->route('admin.events.index')->with('message', __('message.event.update'));
    }


    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('message', __('message.event.delete'));
    }


    public function uploadEvent()
    {
        Request::validate(['file' => 'required|max:1024|mimes:xlsx,xls']);
        
        Excel::import(new EventsImport, Request::file('file'));
        return back()->with('message', __('message.file.upload'));
    }
    
}
