@extends('layouts.basic-layout')

@section('page-title')
    Dashboard
@stop

@section('app-title')
    Dashboard
@stop

@section('app-content')


    @if($user->view_dashboard == 1)
        <!-- prime silo's -->
        <div class="col-xs-12 col-lg-8">
            <div class="primes">
                <h2>Prime silo's</h2>
                @foreach($primesilos as $key=>$primesilo)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <a href="/primesilos" class="card card-banner">
                            <div class="card-body">
                                <div class="silo-name">{{ $primesilo->name }}</div>

                                <div class="empty-silo">
                                    <div class="filled-silo"></div>
                                </div>

                                <div class="content">
                                    <div class="title">{{ $primesilo->resource->name }}</div>
                                    <div class="value">{{ $primesilo->capacity_percent }}<span class="sign"> %</span></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
            <div class="waste">
                <h2>Waste silo's</h2>
                <!-- Waste silo -->
                @foreach($wastesilos as $key=>$wastesilo)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <a href="/wastesilos" class="card card-banner">
                            <div class="card-body">
                                <div class="silo-name">{{ $wastesilo->name }}</div>

                                <div class="empty-silo">
                                    <div class="filled-silo"></div>
                                </div>

                                <div class="content">
                                    <div class="title">{{ $wastesilo->resource->name }}</div>
                                    <div class="value">{{ $wastesilo->capacity_percent }}<span class="sign"> %</span></div>
                                </div>
                                <!-- <p class="silo">{{ $primesilo->name }}</p> -->
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="clearfix"></div>
            </div><!-- ./waste -->
        </div><!-- ./primes -->

        <!-- resources -->
        <div class="col-xs-12 col-lg-4 resources">
            <h2>Resources</h2>
            @foreach($resources as $key=>$resource)
                <div class="col-xs-6">
                    <a href="/resources/{{$resource->id}}" class="card card-banner card-green-light resource-card">
                        <div class="card-body">
                            <div class="resource-img"
                                 style="background: url('img/resources/{{$resource->image}}') no-repeat;">
                            </div>
                            <div class="content">
                                <div class="title">{{ $resource->name }}</div>
                                <div class="value">{{ $resource->capacity }}<span class="sign"> ton</span></div>
                            </div>
                        <!-- <p class="silo">{{ $primesilo->name }}</p> -->
                        </div>
                    </a>
                </div>
            @endforeach
        </div><!-- ./resources -->

        @foreach($typeFoams as $typefoam)
            @if(!$typefoam->blocks->isEmpty())
                <div class="col-xs-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">{{ $typefoam->foamtype }}</div>
                        </div>
                        <div class="card-body no-padding">
                            <div class="table-responsive">
                                <table class="table card-table">
                                    <thead>
                                    <tr>
                                        <th>Length</th>
                                        <th>Units</th>
                                        <th>Cubic metres</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($typefoam->blocks as $block)
                                        <tr>
                                            <td>
                                                {{ $block->lengthFoam->length }} m
                                            </td>
                                            <td>
                                                {{ $block->units }}
                                            </td>
                                            <td>{{number_format($block->lengthFoam->length * 1.030 * 1.290 * $block->lengthFoam->length, 2, '.', ',')}} m³</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        @if($user->admin == 1)

            <a href="/logs">
                <div class="col-xs-12 col-lg-6">
                    <div class="card card-mini">
                        <div class="card-header">
                            Logs
                        </div>
                        <div class="card-body no-padding">
                            <div class="table-responsive">
                                <table class="table card-table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Action</th>
                                        <th>Description</th>
                                        <th>Date and time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($logs as $log)
                                        <tr>
                                            <td>{{ $log->user }}</td>
                                            <td>{{ $log->function }}</td>
                                            <td>{{ $log->description }}</td>
                                            <td>{{ $log->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

        @endif
    @else
        @include('errors.noaccess-dashboard')
    @endif

@stop