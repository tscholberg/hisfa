@extends('layouts.empty-layout')

@section('app-content')
    <div class="app app-default">

        <div class="app-container app-login">
            <div class="flex-center">
                <div class="app-header"></div>
                <div class="app-body">

                    <div class="app-block">
                        <div class="app-form">
                            <div class="form-header">
                                <div class="app-brand"><span class="highlight">Hisfa</span> reset password</div>
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
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif

                            <form action="{{ url('/password/reset') }}" method="POST" role="form">
                                {{ csrf_field() }}

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                    <span class="input-group-addon" id="basic-addonuser">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </span>
                                    <input type="email" id="email" name="email" class="form-control" aria-describedby="basic-addon1" value="{{ $email or old('email') }}" placeholder="Email address" required autofocus>

                                </div>



                                <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <span class="input-group-addon" id="basic-addon2">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                    </span>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="New password" aria-describedby="basic-addon2" required>

                                </div>


                                <div class="input-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <span class="input-group-addon" id="basic-addon2">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                    </span>
                                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirm new password" aria-describedby="basic-addon2" required>

                                </div>


                                <div class="text-center">
                                    <input type="submit" class="btn btn-success btn-submit" value="Login">
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
