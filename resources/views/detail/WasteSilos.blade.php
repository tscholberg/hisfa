@extends('layouts.basic-layout')

@section('page-title')
    Waste silos
@stop


@section('app-title')
    App page title
@stop

@section('app-content')

    <!-- Waste silos -->
    <div class="col-xs-12">
        <a class="card card-banner">
            <div class="card-body app-heading">
                <div class="app-title">
                    <div class="title"><span class="highlight">Waste Silo's</span></div>
                    <div class="description">
                        <ul class="silo-view waste">
                            @foreach($wastesilos as $key=>$wastesilo)
                                <li class="col-xs-12 col-sm-8 col-md-4 col-lg-2">
                                    <p class="silo">{{ $wastesilo->name }}</p>
                                    <div class="detail-empty">
                                        <div class="detail-filled yellow-silo"></div>
                                    </div>
                                    <!--<div class="full-bar">
                                        <div class="silo-bar-percent"
                                             style=" height: {{ $wastesilo->capacity_percent }}%; ">
                                        </div>
                                    </div>-->
                                    <p class="volume">{{ $wastesilo->capacity_percent }} %</p>
                                    <form enctype="multipart/form-data" action="/wastesilos/updatecapacity"
                                          method="POST">
                                        <input class="form-control" type="text" name="silo_capacity"
                                               value="{{ $wastesilo->capacity_percent }}"">
                                        <input type="hidden" name="silo_id" value="{{ $wastesilo->id }}">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input class="btn btn-success" type="submit" name="updateSilo"
                                               value="Update {{$wastesilo->name}}">

                                    </form>
                                    <form enctype="multipart/form-data" action="/wastesilos/delete" method="POST">
                                        <input type="hidden" name="silo_id" value="{{ $wastesilo->id }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input class="btn btn-danger" type="submit" name="deleteSilo"
                                               value="Delete {{$wastesilo->name}}">
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div><!-- ./description -->
                </div>
            </div>
        </a>
    </div><!-- ./END PRIME SILO VIEW -->

    <div class="col-xs-12 col-md-6 col-lg-4">
        <div class="card card-banner col-xs-12 add-silo">
            <div class="card-body app-heading">
                <div class="app-title">
                    <div class="title"><span class="highlight">Add Waste silo</span></div>
                </div>
            </div>
            <form enctype="multipart/form-data" action="/wastesilos/create" method="POST">
                <label for="silo_name">Name</label>
                <input class="form-control" type="text" name="silo_name">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input class="btn btn-success" type="submit" name="create" value="Create">
            </form>
        </div>
    </div>

    <div class="btn-floating" id="help-actions">
        <div class="btn-bg"></div>
        <a href="http://www.google.be" type="button" class="btn btn-default btn-toggle">
            <i class="icon fa fa-plus"></i>
            <span class="help-text">Add new waste silo</span>
        </a>
    </div>

@endsection