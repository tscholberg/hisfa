@extends('layouts.basic-layout')

@section('page-title')
    Update block
@stop

@section('app-title')
    Update block
@stop

@section('app-content')

    <div class="card">
        <div class="app-heading">
            <div class="section col-xs-12">
                <div class="section-title">
                    <i class="icon fa fa-key" aria-hidden="true"></i>
                    Update {{ $block->typefoam->foamtype }}
                </div>
                <form action="/blocks" method="POST">
                    {{ csrf_field() }}
                    <div class="input-group-inapp input-group">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                        <input type="number" name="block_height" class="form-control" value="{{ $block->height }}" required autofocus>
                    </div>
                    <div class="input-group-inapp input-group">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                        <input type="number" name="block_length" class="form-control" value="{{ $block->length }}" required autofocus>
                    </div>
                    <div class="input-group-inapp input-group">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                        <input type="number" name="block_units" class="form-control" value="{{ $block->units }}" required autofocus>
                    </div>
                    <input type="hidden" name="block_id" value="{{ $block->id }}">
                    <input type="submit" class="btn btn-success btn-submit" name="update" value="Update block">
                </form>
            </div>
        </div>
    </div>

@stop