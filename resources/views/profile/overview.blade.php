@extends('layouts.basic-layout')

@section('page-title')
    Profile
@stop

@section('app-title')
    Profile
@stop

@section('app-content')
    <div class="card">
        <div class="card-body app-heading">
            <div class="app-title">
                <div class="title"><span class="highlight">{{ Auth::user()->name }}</span></div>
                <div class="description">{{ Auth::user()->admin == 1 ? 'Admin' : 'Standard user' }}</div>
            </div>
        </div>


        <!-- Change profile picture -->
        <div class="app-heading">
            <div class="section col-xs-12 col-md-7">
                <div class="section-title">
                    <i class="icon fa fa-user" aria-hidden="true"></i>
                    Change profile picture
                </div>
                <img class="profile-img" src="img/profile-pictures/{{ Auth::user()->avatar }}">
            </div>
            <div class="col-md-5"></div>
        </div>


        <!-- Change password-->
        <div class="app-heading">
            <div class="section col-xs-12 col-md-7">
                <div class="section-title">
                    <i class="icon fa fa-key" aria-hidden="true"></i>
                    Change password
                </div>


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


                <form action="{{ url('/profile/change-password') }}" method="POST" role="form">

                    <input name="_token" type="hidden" value="{{ csrf_token() }}">



                    <div class="input-group-inapp input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                        <input type="password" id="current-password" name="current-password1" class="form-control"
                               placeholder="Current password" required>
                    </div>



                    <div class="input-group-inapp input-group">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                        <input type="password" id="new-password1" name="new-password1" class="form-control"
                               placeholder="New password" required>
                    </div>


                    <div class="input-group-inapp input-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="basic-addon3">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                        <input type="password" id="new-password2" name="new-password2" class="form-control"
                               placeholder="Retype new password" required>
                    </div>


                    <div>
                        <input type="submit" class="btn btn-success btn-submit" value="Change my password">
                    </div>


                </form>

            </div>

            <div class="col-md-5"></div>
        </div>


        <!-- Change email preferences -->
        <div class="app-heading">
            <div class="section col-xs-12 col-md-7">
                <div class="section-title"><i class="icon fa fa-envelope-o" aria-hidden="true"></i> Email preferences
                </div>
                    Email me when prime silos are 90% full<br>
                    Email me when waste silos are 90% full

            </div>

            <div class="col-md-5"></div>

        </div>

    </div>
@stop