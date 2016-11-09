@extends('layouts.basic-layout')

@section('page-title')
    Edit profile
@stop

@section('app-title')
    Edit profile {{ $profiledata->name }}
@stop

@section('app-content')
    <div class="col-xs-12">
        <div class="card">
            <div class="card-body app-heading">
                <img class="profile-img" src="/img/profile-pictures/{{ $profiledata->avatar }}">
                <div class="app-title">
                    <div class="title"><span class="highlight">{{ $profiledata->name }}</span></div>
                    <div class="description">{{ $profiledata->admin == 1 ? 'Admin' : 'Standard user' }}</div>
                </div>
            </div>

        </div>
    </div>

    <!-- Profielfoto -->
    <!-- Naam -->
    <!-- Email -->
    <!-- Wachtwoord -->
    <!-- Wijzig wachtwoord -->
    <!-- Permissies -->

@stop
