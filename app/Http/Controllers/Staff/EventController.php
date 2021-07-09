<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index() 
    {
        return inertia('Staff/Event', [
            'events' => DB::table('events')->orderBy('event_date')->get(),
        ]);
    }
}
