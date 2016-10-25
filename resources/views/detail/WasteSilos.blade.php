@extends('layouts/basic-layout')

@section('app-content')
    <h1>Waste Silo's</h1>
    @foreach($wastesilos as $key=>$wastesilo)
        <div class="silo" id="silo{{ $wastesilo->id }}">
            <h2 class="">{{ $wastesilo->name }}</h2>
            <h3>{{ $wastesilo->capacity_percent }} %</h3>
            <form enctype="multipart/form-data" action="/wastesilos/delete" method="POST">
                <input type="hidden" name="silo_id" value="{{ $wastesilo->id }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" name="deleteSilo" value="Delete {{$wastesilo->name}}">
            </form>
            </br>
        </div>

    @endforeach

    <h1>Add Wastesilo</h1>
    <form enctype="multipart/form-data" action="/wastesilos/create" method="POST">
        <input type="text" name="silo_name">
        <div class="row">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" name="create" value="Create">
        </div>
    </form>


@endsection