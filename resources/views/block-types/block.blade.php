@extends('layouts/basic-layout')

@section('app-content')

@foreach($blocks as $block)

<p>{{ $block->height }}</p>

@endforeach

@endsection