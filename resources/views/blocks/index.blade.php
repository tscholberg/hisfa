@extends('layouts.basic-layout')

@section('page-title')
    Blocks
@stop

@section('app-title')
    Blocks
@stop

@section('app-content')

    <div class="card">

        <div class="card-body app-heading"></div>

        @if(session()->has('success'))
            <div class="app-heading">
                <div class="section col-xs-12">
                    <span class="help-block success alert alert-success alert-profile">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ session()->get('success') }}</strong>
                    </span>
                </div>
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="app-heading">
                <div class="section col-xs-12">
                    <span class="help-block alert alert-danger alert-profile">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p class="feedback-title vet">The foam type is not created. Please check the following errors:</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </span>
                </div>
            </div>
        @endif

        <div class="app-heading">

            <div class="section col-xs-12">
                <div class="section-title">
                    <i class="icon fa fa-cube" aria-hidden="true"></i>
                    Add foam type
                </div>
                <form action="/foam/addType" method="POST">
                    {{ csrf_field() }}
                    <div class="input-group-inapp input-group{{ $errors->has('block_name') ? ' has-error' : '' }}">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                        <input type="text" name="block_name" class="form-control" placeholder="New type" autofocus value="{{ old('block_name') }}">
                    </div>
                    <input type="submit" class="btn btn-success btn-submit" name="add" value="Add type">
                </form>
            </div>
        </div>

        <div class="app-heading">
            <div class="section col-xs-12">
                <div class="section-title">
                    <i class="icon fa fa-cube" aria-hidden="true"></i>
                    Add block
                </div>
                <form action="/blocks/addBlock" method="POST">
                    {{ csrf_field() }}
                    <label class="col-md-2 control-label">Foam type</label>
                    <div class="input-group-inapp input-group">
                        <select class="select2 select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="block_type" required autofocus>
                            @foreach($typeFoams as $typeFoam)
                                <option value="{{ $typeFoam->id }}">{{ $typeFoam->foamtype }}</option>
                            @endforeach
                        </select>
                        <span class="input-group-addon">Type</span>
                    </div>
                    <label class="col-md-2 control-label">Length (in meter)</label>
                    <div class="input-group-inapp input-group">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                        <input type="number" name="block_length" class="form-control" placeholder="Length" required autofocus>
                    </div>
                    <label class="col-md-2 control-label">Items</label>
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

        <div class="btn-floating" id="help-actions">
            <div class="btn-bg"></div>
            <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
                <i class="icon fa fa-plus"></i>
                <span class="help-text">Add items</span>
            </button>
            <div class="toggle-content">
                <ul class="actions">
                    <li><a href="#">Add block</a></li>
                    <li><a href="#">Add foam type</a></li>
                </ul>
            </div>
        </div>

@stop