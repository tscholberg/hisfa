@extends('layouts.basic-layout')

@section('page-title')
    Prime silos
@stop

@section('app-title')
    App page title
@stop

@section('app-content')
    
    <h1>Prime Silo's</h1>
    
    @foreach($primesilos as $key=>$primesilo)
       
        <div class="silo" id="silo{{ $primesilo->id }}">
            <h2 class="">{{ $primesilo->name }}</h2>
            <h3>{{ $primesilo->capacity_percent }} %</h3>
            <form enctype="multipart/form-data" action="/primesilos/delete" method="POST">
                <input type="hidden" name="silo_id" value="{{ $primesilo->id }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" name="deleteSilo" value="Delete {{$primesilo->name}}">
            </form>
            <br>
        </div>

    @endforeach

    <h1>Add Primesilo</h1>
    <form enctype="multipart/form-data" action="/primesilos/create" method="POST">
        <input type="text" name="silo_name">
        <div class="row">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" name="create" value="Create">
        </div>
    </form>

@endsection