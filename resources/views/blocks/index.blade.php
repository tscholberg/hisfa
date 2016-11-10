@extends('layouts.basic-layout')

@section('page-title')
    Blocks
@stop

@section('app-title')
    Blocks
@stop

@section('app-content')

    <div class="col-xs-12">
        <div class="col-xs-6">
            <h3>Add Type</h3>
            <form class="form-horizontal" action="/blocks/add" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputText1" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="block_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNumber1" class="col-sm-2 control-label">Height</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="block_height">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNumber2" class="col-sm-2 control-label">Length</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="block_length">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNumber3" class="col-sm-2 control-label">Units</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="block_units">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-default" name="add">Add Type</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @foreach($blocks as $key=>$block)
        <div class="col-xs-4">
            <div class="card card-mini">
                <div class="card-header">
                    <div class="card-title">{{ $block->typefoam->foamtype }}</div>
                    <form action="/blocks/delete" method="POST">
                        <input type="hidden" name="block_id" value="{{ $block->id }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" name="deleteBlock" value="Delete {{ $block->typefoam->foamtype }}">
                    </form>
                </div>
                <div class="card-body no-padding table-responsive">
                    <table class="table card-table table-hover table-striped foam-type-home">
                        <thead>
                            <tr>
                                <th>4m</th>
                                <th>6m</th>
                                <th>8m</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $block->units }}</td>
                                <td>{{ $block->units }}</td>
                                <td>{{ $block->units }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach

    <!--<div class="col-xs-12">
        <div class="card">
            <div class="card-header">Titel</div>
            <div class="card-body no-padding">
                <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>4m</th>
                            <th>6m</th>
                            <th>8m</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($blocks as $block)
                        <tr>
                            <td scope="row"><span>{{ $block->typefoam->foamtype }}</span></td>
                            <td scope="row"><span>{{ $block->units }}</span></td>
                            <td scope="row"><span>{{ $block->units }}</span></td>
                            <td scope="row"><span>{{ $block->units }}</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>-->

@stop