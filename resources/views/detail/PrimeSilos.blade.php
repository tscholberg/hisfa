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
        <a class="card card-banner ">
            <div class="card-body app-heading">
                <div class="app-title">
                    <div class="title"><span class="highlight">Prime Silo's</span></div>
                    <div class="description">
                        <ul class="silo-view prime">
                            @foreach($primesilos as $key=>$primesilo)
                                <li>
                                    <p class="silo">{{ $primesilo->name }}</p>
                                    <div class="full-bar" >
                                        <div class="silo-bar-percent"
                                             style=" height: {{ $primesilo->capacity_percent }}%; ">
                                        </div>
                                    </div>
                                    <p class="volume">{{ $primesilo->capacity_percent }} %</p>
                                    <form enctype="multipart/form-data" action="/primesilos/updatecapacity" method="POST">
                                        <input type="text" name="silo_capacity" value="{{ $primesilo->capacity_percent }}">
                                        <select name="resource_id">
                                            @foreach($resources as $key=>$resource)
                                                <option  value="{{$resource->id}}">{{$resource->name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="silo_id" value="{{ $primesilo->id }}">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="submit" name="updateSilo" value="Update {{$primesilo->name}}">

                                    </form>
                                    <p class="silo">{{ $primesilo->resource->name }}</p>
                                    <form enctype="multipart/form-data" action="/primesilos/delete" method="POST">
                                        <input type="hidden" name="silo_id" value="{{ $primesilo->id }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="submit" name="deleteSilo" value="Delete {{$primesilo->name}}">
                                    </form>
                                </li>

                            @endforeach
                        </ul>
                    </div><!-- ./description -->
                </div>
            </div>
        </a>
    </div><!-- ./END PRIME SILO VIEW -->

    <h1>Add Primesilo</h1>
    <form enctype="multipart/form-data" action="/primesilos/create" method="POST">
        <input type="text" name="silo_name">
        <div class="row">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" name="create" value="Create">
        </div>
    </form>

@stop