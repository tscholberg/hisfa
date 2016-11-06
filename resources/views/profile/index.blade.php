@extends('layouts.basic-layout')

@section('page-title')
    Profile settings
@stop

@section('app-title')
    Profile settings
@stop

@section('app-content')
    <div class="card">
        <div class="card-body app-heading">
            <div class="app-title">
                <div class="title"><span class="highlight">{{ $user->name }}</span></div>
                <div class="description">{{ $user->admin == 1 ? 'Admin' : 'Standard user' }}</div>
            </div>
        </div>


        <!-- Change profile picture -->
        <div class="app-heading">
            <div class="section col-xs-12">
                <div class="section-title">
                    <i class="icon fa fa-user" aria-hidden="true"></i>
                    Change profile picture
                </div>
                @if(session()->has('error-avatar'))
                    <span class="help-block">
                        <strong>{{ session()->get('error-avatar') }}</strong>
                    </span>
                @endif
                @if(session()->has('success-avatar'))
                    <span class="help-block success">
                        <strong>{{ session()->get('success-avatar') }}</strong>
                    </span>
                @endif
                <form action="{{ url('/profile/update-profile-picture') }}" method="POST" enctype="multipart/form-data">
                    <img class="profile-img profile-img-profile" src="/img/profile-pictures/{{ Auth::user()->avatar }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="file" name="avatar" id="avatar" accept="image/png, image/jpeg, image/jpg" class="upload-file">
                    <input type="submit" class="btn btn-success btn-submit" value="Change profile picture">
                </form>
            </div>
        </div>


        <!-- Change password-->
        <div class="app-heading">
            <div class="section col-xs-12">
                <div class="section-title">
                    <i class="icon fa fa-key" aria-hidden="true"></i>
                    Change password
                </div>


                @if(session()->has('error-password'))
                    <span class="help-block">
                        <strong>{{ session()->get('error-password') }}</strong>
                    </span>
                @endif
                @if(session()->has('success-password'))
                    <span class="help-block success">
                        <strong>{{ session()->get('success-password') }}</strong>
                    </span>
                @endif

                <form action="{{ url('/profile/update-password') }}" method="POST">

                    <input name="_token" type="hidden" value="{{ csrf_token() }}">


                    <div class="input-group-inapp input-group">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                        <input type="password" id="current-password" name="current-password" class="form-control"
                               placeholder="Current password" required autofocus>
                    </div>


                    <div class="input-group-inapp input-group">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                        <input type="password" id="new-password1" name="new-password1" class="form-control"
                               placeholder="New password" required>
                    </div>


                    <div class="input-group-inapp input-group">
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

        </div>


        <!-- Change email preferences -->
        <div class="app-heading">
            <div class="section col-xs-12">
                <form action="">
                    <div class="section-title"><i class="icon fa fa-envelope-o" aria-hidden="true"></i> Email
                        preferences
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="checkboxPrimeFull">
                        <label for="checkboxPrimeFull">
                            Email me when prime silos are 90% full
                        </label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="checkboxWasteFull">
                        <label for="checkboxWasteFull">
                            Email me when waste silos are 90% full
                        </label>
                    </div>



                    <div>
                        <input type="submit" class="btn btn-success btn-submit" value="Update preferences">
                    </div>


                </form>

            </div>


        </div>

    </div>
@stop