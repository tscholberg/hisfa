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
        <div class="col-xs-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{ $typefoam->foamtype }}</div>
                    <ul class="card-action">
                        <li>
                            <form action="/foam/delete" method="POST">
                                <input type="hidden" name="typeFoam_id" value="{{ $typefoam->id }}">
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
                                <th>Cubic metres</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($typefoam->blocks as $block)
                                <tr>
                                    <td>
                                        <div style="display: flex">
                                            <form action="/foam/deleteLength" method="POST">
                                                <input type="hidden" name="length_id" value="{{ $block->id }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-danger btn-delete" style="padding: 0 2px; outline: none; margin-right: 5px; background-color: transparent; border: none; box-shadow: none">
                                                    <i class="fa fa-trash" aria-hidden="true" style="color: #e54d42"></i>
                                                </button>
                                            </form>
                                            {{ $block->lengthFoam->length }} m
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: flex">
                                            <form action="/foam/decrement" method="POST">
                                                <input type="hidden" name="units_id" value="{{ $block->id }}">
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-danger" style="padding: 0 2px; outline: none; margin-right: 5px; background-color: transparent; border: none; box-shadow: none">
                                                    <i class="fa fa-minus-circle" aria-hidden="true" style="color: #e54d42"></i>
                                                </button>
                                            </form>
                                            {{ $block->units }}
                                            <form action="/foam/increment" method="POST">
                                                <input type="hidden" name="units_id" value="{{ $block->id }}">
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-success" style="padding: 0 2px; outline: none; margin-left: 5px; background-color: transparent; border: none; box-shadow: none">
                                                    <i class="fa fa-plus-circle" aria-hidden="true" style="color: #34c564"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>{{number_format($block->lengthFoam->length * 1.030 * 1.290 * $block->lengthFoam->length, 2, '.', ',')}} m³</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
                <li><a href="/foam/addType">Add foam type</a></li>
                <li><a href="/foam/addLength">Add foam length</a></li>
            </ul>
        </div>
    </div>
    @endif

@stop