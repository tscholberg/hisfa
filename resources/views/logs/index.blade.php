@extends('layouts.basic-layout')

@section('page-title')
    Logs
@stop

@section('app-title')
    Logs
    @stop

    @section('app-content')

            <!-- Prime silos -->
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                Detailed user logs
            </div>
            <div class="card-body no-padding">
                <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Action</th>
                        <th>Description</th>
                        <th>Date and time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($logs as $log)
                        <tr>
                            <td>{{ $log->user }}</td>
                            <td>{{ $log->function }}</td>
                            <td>{{ $log->description }}</td>
                            <td>{{ $log->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop