@extends('layouts.empty-layout')
@section('page-title')
    Login
@stop
@section('app-content')
    <div class="app app-default">
        <div class="app-container app-login">
            <div class="flex-center">
                <div class="app-header">

                </div>
                <div class="app-body">

                    <div class="app-block">
                        <div class="app-form">
                            <div class="form-header">
                                <div class="app-brand">
                                    <span class="highlight">Hisfa</span> Login
                                </div>
                            </div>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                                        <!-- Hier komt normaal login stuk, maar om een of andere gekke reden werkt dat niet-->
                                <form action="{{ url('/login') }}" method="POST">
                                    {{ csrf_field() }}

                                    <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <span class="input-group-addon">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email address" required autofocus/>
                                    </div>


                                    <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <span class="input-group-addon" id="basic-addon2">
                <i class="fa fa-key" aria-hidden="true"></i>
            </span>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required/>
                                    </div>


                                    <div class="text-center">
                                        <input type="submit" class="btn btn-success btn-submit" value="Login"/>
                                    </div>

                                </form>
                                <div class="form-footer">
                                    <a href="{{ url('/password/reset') }}">I forgot my password</a>
                                </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <form action="{{ url('/login') }}" method="POST">
        {{ csrf_field() }}

        <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <span class="input-group-addon">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email address" required autofocus/>
        </div>


        <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <span class="input-group-addon" id="basic-addon2">
                <i class="fa fa-key" aria-hidden="true"></i>
            </span>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required/>
        </div>


        <div class="text-center">
            <input type="submit" class="btn btn-success btn-submit" value="Login"/>
        </div>

    </form>

    <div class="form-footer">
        <a href="{{ url('/password/reset') }}">I forgot my password</a>
    </div>

@stop