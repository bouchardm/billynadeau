<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\SaveTicketRequest;
use App\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;

class TicketsController extends Controller
{
    public function index()
    {
        $tickets = Ticket::latest()->paginate('10');
        return view('ticket.index', compact('tickets'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('ticket.create', compact('customers'));
    }

    public function store(SaveTicketRequest $request)
    {
        $ticket = Ticket::create($request->all());
        $ticket->save();
        return redirect("/bon/{$ticket->id}");
    }

    public function show($id)
    {
        $ticket = Ticket::with('clocks')->findOrFail($id);
        return view('ticket.show', compact('ticket'));
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $customers = Customer::all();
        return view('ticket.edit', compact('ticket', 'customers'));
    }

    public function update(SaveTicketRequest $request, $id)
    {
        /** @var Ticket $ticket */
        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());
        return redirect($ticket->path());
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return redirect('/bon');
    }
}
