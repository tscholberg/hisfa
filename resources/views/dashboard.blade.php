    @extends('layouts.basic-layout')

@section('page-title')
    Dashboard
@stop

@section('app-title')
    Dashboard
@stop

@section('app-content')

    <!-- prime silo's -->
    <div class="col-xs-12 col-sm-8">
        <div class="primes">
            <h2>Prime silo's</h2>
            @foreach($primesilos as $key=>$primesilo)
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <a href="/primesilos" class="card card-banner card-green-light">
                        <div class="card-body">
                            <div class="silo-name">{{ $primesilo->name }}</div>

                            <div class="empty-silo">
                                <div class="filled-silo green-silo"></div>
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
                    <a href="/wastesilos" class="card card-banner card-yellow-light">
                        <div class="card-body">
                            <div class="silo-name">{{ $wastesilo->name }}</div>

                            <div class="empty-silo">
                                <div class="filled-silo yellow-silo"></div>
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
        
        <!-- Blocks -->
        <div class="col-xs-12">
            <div class="card card-mini">
                <div class="card-header">
                    <div class="card-title">Blocks</div>
                    <ul class="card-action">
                        <li><a href="/blocks">Types in stock</a></li>
                    </ul>
                </div>
                <div class="card-body no-padding table-responsive">
                    <table class="table card-table table-hover table-striped foam-type-home">
                        <thead>
                        <tr>
                            <th>Height</th>
                            <th>Type</th>
                            <th>Length</th>
                            <th>Units</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blocks as $block)
                            <tr>
                                <td>{{ $block->units }}</td>
                                <td>{{ $block->typefoam->foamtype }}</td>
                                <td>{{ $block->height }}</td>
                                <td>{{ $block->length }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- ./END BLOCKS VIEW -->
    </div><!-- ./primes -->



    <!-- resources -->
    <div class="col-xs-12 col-sm-4 resources">
        <h2>Resources</h2>
        @foreach($resources as $key=>$resource)
            <div class="col-xs-6">
                <a href="/resources/{{$resource->id}}" class="card card-banner card-green-light resource-card">
                    <div class="card-body">
                        <div class="resource-img" style="background: url('img/resources/{{$resource->image}}') no-repeat;">
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



    <!-- Foam types -->
    <div class="col-xs-12">
        <div class="card card-mini">
            <div class="card-header">
                <div class="card-title">Foam Types</div>
                <ul class="card-action">
                    <li><a href="/foam">Types in stock</a></li>
                </ul>
            </div>
            <div class="card-body no-padding table-responsive">
                <table class="table card-table table-hover table-striped foam-type-home">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Available sizes</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($typeFoams as $foam)
                        <tr>
                            <td><span class="badge badge-success badge-icon"><i class="fa fa-check"
                                                                                aria-hidden="true"></i><span>In stock</span></span>
                            </td>
                            <td>{{ $foam->foamtype }}</td>
                            <td class="right">10</td>
                            <td>8, 8, 8, 4, 4, 4, 3</td>
                            <!--
                            <td><span class="badge badge-warning badge-icon"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Running out</span></span></td>
                        <td><span class="badge badge-danger badge-icon"><i class="fa fa-times" aria-hidden="true"></i><span>Not available</span></span></td>
                            -->
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- ./END FOAM TYPES VIEW -->

    <div class="col-xs-12">
        <div class="card card-mini">
            <div class="card-header">
                <div class="card-title">History</div>
                <ul class="card-action">
                    <li><a href="">History</a></li>
                </ul>
            </div>
            <div class="card-body no-padding table-responsive">
                <table class="table card-table table-hover table-striped foam-type-home">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Function</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($logs as $log)
                        <tr>
                            <td>{{ $log->user }}</td>
                            <td>{{ $log->function }}</td>
                            <td>{{ $log->description }}</td>
                            <td>{{ $log->updated_at }}</td>
                            <!--
                            <td><span class="badge badge-warning badge-icon"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Running out</span></span></td>
                        <td><span class="badge badge-danger badge-icon"><i class="fa fa-times" aria-hidden="true"></i><span>Not available</span></span></td>
                            -->
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- ./END FOAM TYPES VIEW -->

@stop