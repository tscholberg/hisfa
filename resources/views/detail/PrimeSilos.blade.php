@extends('layouts.basic-layout')

@section('page-title')
    Prime silos
@stop

@section('app-title')
    Prime silos
@stop

@section('app-content')

    <!-- Prime silos -->
    <div class="col-xs-12">
        <div class="card card-banner ">
            <div class="card-body app-heading">
                <div class="app-title">
                    <div class="title"><span class="highlight">Prime Silo's</span></div>
                    <div class="description">
                        <ul class="silo-view prime">
                            @foreach($primesilos as $key=>$primesilo)
                                <li class="col-xs-12 col-sm-8 col-md-4 col-lg-2">
                                    <p class="silo">{{ $primesilo->name }}</p>
                                    <div class="full-bar">
                                        <div class="silo-bar-percent"
                                             style=" height: {{ $primesilo->capacity_percent }}%; ">
                                        </div>
                                    </div>
                                    <p class="volume">{{ $primesilo->capacity_percent }} %</p>
                                    <p class="silo">{{ $primesilo->resource->name }}</p>
                                    <form enctype="multipart/form-data" action="/primesilos/updatecapacity"
                                          method="POST">
                                        <input class="form-control" type="text" name="silo_capacity"
                                               value="{{ $primesilo->capacity_percent }}">
                                        <select class="form-control" name="resource_id">
                                            @foreach($resources as $key=>$resource)
                                                <option value="{{$resource->id}}">{{$resource->name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="silo_id" value="{{ $primesilo->id }}">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input class="btn btn-success" type="submit" name="updateSilo"
                                               value="Update {{$primesilo->name}}">

                                    </form>
                                    <form enctype="multipart/form-data" action="/primesilos/delete" method="POST">
                                        <input type="hidden" name="silo_id" value="{{ $primesilo->id }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input class="btn btn-danger" type="submit" name="deleteSilo"
                                               value="Delete {{$primesilo->name}}">
                                    </form>
                                </li>

                            @endforeach
                        </ul>
                    </div><!-- ./description -->
                </div>
            </div>
        </div>
    </div><!-- ./END PRIME SILO VIEW -->

    <div class="col-xs-12 col-md-6 col-lg-4">
        <div class="card card-banner col-xs-12 add-silo">
            <div class="card-body app-heading">
                <div class="app-title">
                    <div class="title"><span class="highlight">Add Prime silo</span></div>
                </div>
            </div>
            <form enctype="multipart/form-data" action="/primesilos/create" method="POST">
                <label for="silo_name">Name</label>
                <input class="form-control" type="text" name="silo_name">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input class="btn btn-success" type="submit" name="create" value="Create">
            </form>
        </div>
    </div>

@stop