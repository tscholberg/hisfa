@extends('layouts.basic-layout')

@section('page-title')
    Add new waste silo
@stop


@section('app-title')
    Add new waste silo
@stop

@section('app-content')
    <div class="col-xs-12 col-md-6 col-lg-4">
        <div class="card card-banner col-xs-12 add-silo">
            <div class="card-body app-heading">
                <div class="app-title">
                    <div class="title"><span class="highlight">Add Waste silo</span></div>
                </div>
            </div>
            <form enctype="multipart/form-data" action="/wastesilos/create" method="POST">
                <label for="silo_name">Name</label>
                <input class="form-control" type="text" name="silo_name" autofocus>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input class="btn btn-success" type="submit" name="create" value="Create">
            </form>
        </div>
    </div>
@endsection