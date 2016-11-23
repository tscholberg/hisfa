@extends('layouts.basic-layout')

@section('page-title')
    Manage users
@stop

@section('app-title')
    Manage users
    @stop

    @section('app-content')

            <!-- Quick edit action -->
    <a href="/users/create">
        <div class="btn-floating" id="help-actions">
            <div class="btn-bg"></div>
            <button type="button" class="btn btn-default btn-toggle">
                <i class="icon fa fa-plus"></i>
                <span class="help-text">Add new user</span>
            </button>
        </div>
    </a>

    @if(session()->has('success'))
        <div class="col-xs-12">
            <span class="help-block success alert alert-success alert-profile">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ session()->get('success') }}</strong>
            </span>
        </div>

    @endif

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
                        <th class="hidden-xs hidden-sm hidden-md">Email</th>
                        <th class="hidden-xs">Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td scope="row">
                                <img class="hidden-xs hidden-sm avatar-mini"
                                     src="/img/profile-pictures/{{$user->avatar}}">&nbsp;
                                <span>{{ $user->name }} @if(Auth::user()->id == $user->id) (me) @endif</span>
                            </td>
                            <td class="hidden-xs hidden-sm hidden-md"><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                            <td class="hidden-xs">{{ $user->admin == 1 ? 'Admin' : 'Standard user' }}</td>
                            <td><a href="/users/{{$user->id}}" class="btn-sm btn-success"><i
                                            class="icon fa fa-pencil" aria-hidden="true"></i><span class="hidden-xs hidden-sm">&nbsp;&nbsp;Edit user</span></a>
                            </td>
                            <td>@if($user->id != 1) <a href="#delete" class="btn-sm btn-danger btn-delete"
                                                       data-id="{{$user->id}}" data-name="{{$user->name}}" data-table="users"><i
                                            class="icon fa fa-trash" aria-hidden="true"></i><span class="hidden-xs hidden-sm">&nbsp;&nbsp;Delete user</span></a> @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @stop

    @section('custom-scripts')
            <!-- Delete confirm bootbox -->
    <script src="/js/confirm-delete-user.js"></script>
@stop