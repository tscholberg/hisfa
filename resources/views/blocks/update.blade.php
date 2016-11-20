@extends('layouts.basic-layout')

@section('page-title')
    Update block
@stop

@section('app-title')
    Update block
@stop

@section('app-content')

    @if(count($errors) > 0)
        <div class="app-heading">
            <div class="section col-xs-12">
                <span class="help-block alert alert-danger alert-profile">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <p class="feedback-title vet">The block is not updated. Please check the following errors:</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </span>
            </div>
        </div>
    @endif

    <div class="card">
        <div class="app-heading">
            <div class="section col-xs-12">
                <div class="section-title">
                    <i class="icon fa fa-key" aria-hidden="true"></i>
                    Update {{ $block->typefoam->foamtype }}
                </div>
                <form action="/blocks/update" method="POST">
                    {{ csrf_field() }}
                    <label class="col-md-2 control-label">Length</label>
                    <div class="input-group-inapp input-group{{ $errors->has('block_length') ? ' has-error' : '' }}">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                        <input type="number" name="block_length" class="form-control" value="{{ $block->length }}" required autofocus>
                    </div>
                    <label class="col-md-2 control-label">Units</label>
                    <div class="input-group-inapp input-group{{ $errors->has('block_units') ? ' has-error' : '' }}">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                        <input type="number" name="block_units" class="form-control" value="{{ $block->units }}" required autofocus>
                    </div>
                    <input type="hidden" name="block_id" value="{{ $block->id }}">
                    <input type="submit" class="btn btn-success btn-submit" value="Update" style="margin-right: 15px">
                    <a class="btn btn-danger btn-submit" href="{{ url('/blocks') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>

@stop