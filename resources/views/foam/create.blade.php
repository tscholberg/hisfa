@extends('layouts.base')

@section('content')
	<h1>Create new Foam-type</h1>

	<form action="" method="post">
		{{ csrf_field() }}
		<input type="text" id="name" name="name" placeholder="Niew type" />
		<input type="submit" name="save" value="toevoegen">
	</form>
	
@endsection