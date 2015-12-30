<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TicketFormRequest;
use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        // return view('tickets.index', compact('tickets'));
        return view('tickets.index')->with('tickets', $tickets);
        // return view('tickets.index', ['tickets', $tickets];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketFormRequest $request)
    {
        $slug = uniqid();
        $ticket = new Ticket(
            [
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'slug' => $slug,
            ]);
        $ticket->save();

        return redirect('/contact')->with('status', 'Your ticket has been created! Its unique id is: '.$slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        try {
            $ticket = Ticket::whereSlug($slug)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            echo('ModelNotFoundException');
            // var_dump(get_class_methods($e)); // lists all available methods for exception object
            // var_dump($e);
        }
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
