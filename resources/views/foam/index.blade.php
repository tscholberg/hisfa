@extends('layouts.base')

@section('content')
	<h1>Alle Foam-types</h1>
	<a href="/foam/add"><i class="fa fa-plus" aria-hidden="true"></i> toevoegen</a>
	
	<ul class="edit-list">
		@foreach($typeFoams as $foam)
			<li>
				{{ $foam->name }} 
				<span>
					<a href="/foam/{{$foam->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a href="{{ action('typeFoamController@destroy', $foam->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				</span>
			</li>
		@endforeach
	</ul>

@endsection