@extends('layouts.basic-layout')

@section('page-title')
    Blocks
@stop

@section('app-title')
    Blocks
@stop

@section('app-content')

    @if(session()->has('success'))
        <div class="col-xs-12">
            <span class="help-block success alert alert-success alert-profile">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ session()->get('success') }}</strong>
            </span>
        </div>
    @endif

    <div class="card">

        <div class="app-heading">
            <div class="section col-xs-12">
                <div class="section-title">
                    <i class="icon fa fa-key" aria-hidden="true"></i>
                    Add foam type
                </div>
                <form action="/foam/addType" method="POST">
                    {{ csrf_field() }}
                    <div class="input-group-inapp input-group">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                        <input type="text" name="block_name" class="form-control" placeholder="New type" required autofocus>
                    </div>
                    <input type="submit" class="btn btn-success btn-submit" name="add" value="Add type">
                </form>
            </div>
        </div>

        <div class="app-heading">
            <div class="section col-xs-12">
                <div class="section-title">
                    <i class="icon fa fa-key" aria-hidden="true"></i>
                    Add block
                </div>
                <form action="/blocks/addBlock" method="POST">
                    {{ csrf_field() }}
                    <div class="input-group-inapp input-group">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                        <select class="form-control" name="block_type" required autofocus>
                        @foreach($typeFoams as $typeFoam)
                            <option value="{{ $typeFoam->id }}">{{ $typeFoam->foamtype }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="input-group-inapp input-group">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                        <input type="number" name="block_height" class="form-control" placeholder="Height" required autofocus>
                    </div>
                    <div class="input-group-inapp input-group">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                        <input type="number" name="block_length" class="form-control" placeholder="Length" required autofocus>
                    </div>
                    <div class="input-group-inapp input-group">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                        <input type="number" name="block_units" class="form-control" placeholder="Units" required autofocus>
                    </div>
                    <input type="submit" class="btn btn-success btn-submit" name="add" value="Add block">
                </form>
            </div>
        </div>

    </div>

    @foreach($blocks as $key=>$block)
        <div class="col-xs-4">
            <div class="card card-mini">
                <div class="card-header">
                    <div class="card-title">{{ $block->typefoam->foamtype }}</div>
                    <form action="/blocks/updateBlock/{{ $block->typefoam->id }}" method="POST" style="margin-right: 10px">
                        <input type="hidden" name="block_id" value="{{ $block->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" name="updateBlock" value="Update">
                    </form>
                    <form action="/foam/deleteType" method="POST">
                        <input type="hidden" name="block_id" value="{{ $block->id }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" name="deleteBlock" value="Delete">
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
                                @if ($block->length == 4000)
                                    <td>{{ $block->units }}</td>
                                @else
                                    <td>0</td>
                                @endif
                                @if ($block->length == 6000)
                                    <td>{{ $block->units }}</td>
                                @else
                                    <td>0</td>
                                @endif
                                @if ($block->length == 8000)
                                    <td>{{ $block->units }}</td>
                                @else
                                    <td>0</td>
                                @endif
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