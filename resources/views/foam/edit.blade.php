@extends('layouts.base')

@section('content')
	<h1>Edit existing Foam-type</h1>

	<form action="" method="post">
		{{ csrf_field() }}
		<input type="text" id="name" name="name" value="{{ $typeFoam->name }}" />
		<input type="submit" name="save" value="update">
	</form>
	
@endsection