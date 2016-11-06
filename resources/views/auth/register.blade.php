@extends('layouts.empty-layout')

@section('page-title')
Register
@stop


@section('app-content')
    <div class="app app-default">

        <div class="app-container app-login">
            <div class="flex-center">
                <div class="app-header"></div>
                <div class="app-body">
                    <div class="app-block">
                        <div class="app-form">
                            <div class="form-header">
                                <div class="app-brand"><span class="highlight">Hisfa</span> register</div>
                            </div>

                            <div class="text-center">
                                Please contact an Hisfa admin to create an account for you.
                            </div>

                            <div class="form-footer">
                                <a href="{{ url('/login') }}">Login with an existing account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop