<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests\TicketFormRequest;
class TicketsController extends Controller
{
    
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
        $slug=number_format(random_int(10, 10000));
        $ticket=new Ticket(array(
     'title'=>$request->get('title'),
     'content'=>$request->get('content'),
     'slug'=>$slug
        ));
     $ticket->save();
     
     return redirect('/create')->with('status','Your ticket has been created successfully, its unique ID is: '.$slug);   
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets=Ticket::all();
        return view('tickets.index',['tickets'=>$tickets]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $ticket=Ticket::whereSlug($slug)->firstOrFail();
        return view('tickets.ticket',['ticket'=>$ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $ticket=Ticket::whereSlug($slug)->firstOrFail();
        return view('tickets.edit',['ticket'=>$ticket]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketFormRequest $request, $slug)
    {
       $ticket = Ticket::whereSlug($slug)->firstOrFail();
       $ticket->title = $request->get('title');
       $ticket->content = $request->get('content');
       if($request->get('status') != null) {$ticket->status = 0;
} else {$ticket->status = 1;}
$ticket->save();

return redirect(action('TicketsController@edit', $ticket->slug))->with('status', 'The ticket '.$slug.' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
         $ticket=Ticket::whereSlug($slug)->firstOrFail();
         $ticket->delete();
         return redirect('/tickets')->with('status', 'The ticket '.$slug.' has been deleted!');
    }
}
