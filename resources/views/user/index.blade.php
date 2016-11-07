@extends('layouts.basic-layout')

@section('page-title')
    Manage users
@stop

@section('app-title')
    Manage users
@stop

@section('app-content')

    <!-- Quick edit action -->
    <a href="/users/add">
        <div class="btn-floating" id="help-actions">
            <div class="btn-bg"></div>
            <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
                <i class="icon fa fa-plus"></i>
                <span class="help-text">Add new user</span>
            </button>
        </div>
    </a>

    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                List of Hisfa users
            </div>
            <div class="card-body no-padding">
                <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th class="hidden-xs hidden-sm">Email</th>
                        <th class="hidden-xs">Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img class="hidden-xs hidden-sm" src="/img/profile-pictures/{{$user->avatar}}" style="width: 25px; height: 25px; border-radius: 100%">&nbsp;
                                <span>{{ $user->name }} @if(Auth::user()->id == $user->id) (me) @endif</span>
                            </td>
                            <td class="hidden-xs hidden-sm"><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                            <td class="hidden-xs">{{ $user->admin == 1 ? 'Admin' : 'Standard user' }}</td>
                            <td><a href="/users/{{$user->id}}/edit" class="btn-sm btn-success"><i class="icon fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs">&nbsp;Edit user</span></a></td>
                            <td><a href="/users/{{$user->id}}/delete" class="btn-sm btn-danger"><i class="icon fa fa-trash" aria-hidden="true"></i><span class="hidden-xs">&nbsp;Delete user</span></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop