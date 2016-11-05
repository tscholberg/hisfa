@extends('layouts.empty-layout')

@section('page-title')
    <title>Login</title>
@stop


@section('app-content')
    <div class="app app-default">

        <div class="app-container app-login">
            <div class="flex-center">
                <div class="app-header"></div>
                <div class="app-body">
                    <div class="loader-container text-center">
                        <div class="icon">
                            <div class="sk-folding-cube">
                                <div class="sk-cube1 sk-cube"></div>
                                <div class="sk-cube2 sk-cube"></div>
                                <div class="sk-cube4 sk-cube"></div>
                                <div class="sk-cube3 sk-cube"></div>
                            </div>
                        </div>
                        <div class="title">Logging in...</div>
                    </div>
                    <div class="app-block">
                        <div class="app-form">
                            <div class="form-header">
                                <div class="app-brand"><span class="highlight">Hisfa</span> register</div>
                            </div>

                            <div class="text-center">
                                Please contact an Hisfa admin to create an account for you.
                            </div>


                            </form>

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