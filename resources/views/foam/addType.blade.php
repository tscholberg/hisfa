@extends('layouts.basic-layout')

@section('page-title')
    Add foam type
@stop

@section('app-title')
    Add foam type
@stop

@section('app-content')

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

    <div class="card">
        <div class="app-heading">
            <div class="section col-xs-12">
                <div class="section-title">
                    <i class="icon fa fa-cube" aria-hidden="true"></i>
                    Add foam type
                </div>
                <form action="/foam/addType" method="POST">
                    {{ csrf_field() }}
                    <label class="col-md-2 control-label">Foam type</label>
                    <div class="input-group-inapp input-group{{ $errors->has('foamType_name') ? ' has-error' : '' }}">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </span>
                        <input type="text" name="foamType_name" class="form-control" required autofocus>
                    </div>
                    <input type="submit" class="btn btn-success btn-submit" name="add" value="Add type" style="margin-right: 15px">
                    <a class="btn btn-danger btn-submit" href="{{ url('/blocks') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>

@stop