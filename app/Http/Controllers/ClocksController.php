<?php

namespace App\Http\Controllers;

use App\Clock;
use App\Http\Requests\SaveClockRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class ClocksController extends Controller
{
    public function create()
    {
        $ticketId = request()->get('ticket_id');
        return view('clock.create', compact('ticketId'));
    }

    public function store(SaveClockRequest $request)
    {
        $clock = Clock::create($request->all());
        $clock->save();
        return redirect($clock->ticket->path());
    }

    public function destroy($id)
    {
        /** @var Clock $clock */
        $clock = Clock::findOrFail($id);
        $ticket = $clock->ticket;
        $clock->delete();
        return redirect($ticket->path());
    }
}
