@extends('layouts.basic-layout')

@section('page-title')
    Blocks
@stop

@section('app-title')
    Blocks
@stop

@section('app-content')

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

    @foreach($typeFoams as $typefoam)
        @if( !$typefoam->blocks->isEmpty() )
            <div class="col-xs-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{ $typefoam->foamtype }}</div>
                    <ul class="card-action">
                        <li style="float: left">
                            <form action="/blocks/update/TODO" method="POST" style="margin-right: 15px">
                                <input type="hidden" name="block_id" value="TODO">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-success" style="padding: 3px 8px; outline: none">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </form>
                        </li>
                        <li style="float: left">
                            <form action="/foam/delete" method="POST">
                                <input type="hidden" name="block_id" value="TODO">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger" style="padding: 3px 8px; outline: none">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="card-body no-padding">
                    <div class="table-responsive">
                        <table class="table card-table">
                            <thead>
                            <tr>
                                <th>Length</th>
                                <th>Units</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($typefoam->blocks as $block)
                                <tr>
                                    <td>{{ $block->lengthFoam->length }} m</td>
                                    <td>{{ $block->units }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>totaal</td>
                                <td>{{ $typefoam->blocks->sum("lengthFoam.length") }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endforeach

        @if(Auth::user()->manage_stock)
        <div class="btn-floating" id="help-actions">
            <div class="btn-bg"></div>
            <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
                <i class="icon fa fa-plus"></i>
                <span class="help-text">Add items</span>
            </button>
            <div class="toggle-content">
                <ul class="actions">
                    <li><a href="/blocks/add">Add block</a></li>
                    <li><a href="/foam/add">Add foam type</a></li>
                </ul>
            </div>
        </div>
        @endif

@stop