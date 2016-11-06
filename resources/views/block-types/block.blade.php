@extends('layouts.basic-layout')

@section('page-title')
    Blocks
@stop

@section('app-content')

    <h1>Blocks</h1>

    @foreach($blocks as $block)

        <div class="block">
            <h3>Units: {{ $block->units }}</h3>
            <h3>Height: {{ $block->height }}</h3>
            <h3>Length: {{ $block->length }}</h3>
            <br>
        </div>

    @endforeach

@endsection