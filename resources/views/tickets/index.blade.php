@include('inc.header');
<div class="container">
  <div class="row">


<div class="container col-md-8 col-md-offset-2">
<div class="well well bs-component">


	<h2> Tickets </h2>
</div>
@if(session('status'))
  <div class="alert alert-success">
  	{{session('status')}}
  </div>
@endif

@if ($tickets->isEmpty())
<p> There is no ticket.</p>
@else
<table class="table">
<thead>
<tr>
<th>ID</th>
<th>Title</th>
<th>Status</th>
</tr>
</thead>
<tbody>
@foreach($tickets as $ticket)
<tr>
<td>{!! $ticket->id !!} </td>
<td>
	<a href="{!! action('TicketsController@show', $ticket->slug) !!}">{!! $ticket->title !!}</a>
</td>
<td>{!! $ticket->title !!}</td>
<td>{!! $ticket->status ? 'Pending' : 'Answered' !!}</td>
</tr>
@endforeach
</tbody>
</table>
@endif
     </div>
   </div>
</div>
@include('inc.footer');