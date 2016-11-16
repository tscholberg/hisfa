@extends('layouts.basic-layout')

@section('page-title')
    Resources
@stop

@section('app-title')
    Resources
@stop

@section('app-content')

    <!-- Resources -->
    <div class="detail-resources">
        <!-- <h2>Resources</h2> -->
        @foreach($resources as $key=>$resource)
            <div class="col-md-3 col-xs-6">
                <a href="/resources/{{$resource->id}}" class="card card-banner card-green-light resource-card">
                    <div class="card-body">
                        <div class="resource-img" style="background: url('img/resource01.jpg') no-repeat;">
                            <div class="dark-filter"></div>
                        </div>
                        <div class="content">
                            <div class="title">{{ $resource->name }}</div>
                            <div class="value">{{ $resource->capacity }}<span class="sign"> ton</span></div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        <div class="clearfix"></div>
    </div>
@stop