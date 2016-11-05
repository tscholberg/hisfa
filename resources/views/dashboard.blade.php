@extends('layouts.basic-layout')

@section('page-title')
    <title>Dashboard</title>
@stop


@section('app-content')
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
                        <th>Lenght</th>
                        <th>Units</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- ./END BLOCKS VIEW -->

    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <a href="/primesilos" class="card card-banner card-green-light">
            <div class="card-body app-heading">
                <div class="app-title">
                    <div class="title"><span class="highlight">Prime Silo's</span></div>
                    <div class="description">
                        <ul class="silo-view prime">

                        </ul>
                    </div><!-- ./description -->
                </div>
            </div>
        </a>
    </div><!-- ./END PRIME SILO VIEW -->

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <a href="/wastesilos" class="card card-banner card-green-light">
            <div class="card-body app-heading">
                <div class="app-title">
                    <div class="title"><span class="highlight">Waste Silo's</span></div>
                    <div class="description">
                        <ul class="silo-view waste">

                        </ul>
                    </div><!-- ./description -->
                </div>
            </div>
        </a>
    </div><!-- ./END WASTE SILO VIEW -->

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

                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- ./END FOAM TYPES VIEW -->
@stop