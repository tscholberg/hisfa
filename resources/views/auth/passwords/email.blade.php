@extends('layouts.empty-layout')

@section('page-title')
    Reset password
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
                                <div class="app-brand"><span class="highlight">Hisfa</span> password reset</div>
                            </div>


                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form action="{{ url('/password/email') }}" method="POST" role="form">
                                {{ csrf_field() }}


                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif


                                <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </span>
                                    <input type="email" id="email" name="email" class="form-control" aria-describedby="basic-addon1" value="{{ old('email') }}" placeholder="Email address" required autofocus>



                                </div>




                                <!--<div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>-->



                                <div class="text-center">
                                    <input type="submit" class="btn btn-success btn-submit" value="Send password reset link">
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

