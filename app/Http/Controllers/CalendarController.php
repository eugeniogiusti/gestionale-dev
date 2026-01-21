<?php

namespace App\Http\Controllers;

use App\Services\CalendarService;
use App\Models\Client;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function __construct(
        protected CalendarService $calendarService
    ) {}

    /**
     * Display calendar view
     */
    public function index()
    {
        $clients = Client::orderBy('name')->get();

        return view('calendar.index', compact('clients'));
    }

    /**
     * Get calendar events (API endpoint for FullCalendar)
     */
    public function events(Request $request)
    {
        $filters = [
            'type' => $request->input('type', []),
            'client_id' => $request->input('client_id'),
            'status' => $request->input('status', []),
            'priority' => $request->input('priority', []),
        ];

        $events = $this->calendarService->getEvents(
            start: $request->input('start'),
            end: $request->input('end'),
            filters: $filters
        );

        return response()->json($events);
    }
}
