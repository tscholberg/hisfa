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
            <form class="form-horizontal" action="/blocks/addBlock" method="POST">
                {{ csrf_field() }}
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
                        <button type="submit" class="btn btn-default" name="add">Add Block</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop