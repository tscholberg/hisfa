@extends('layouts.basic-layout')

@section('page-title')
    Profile settings
@stop

@section('app-title')
    Profile settings
@stop

@section('app-content')
    <div class="col-xs-12">
        <div class="card">
            <div class="card-body app-heading">
                <img class="profile-img" src="/img/profile-pictures/{{ $user->avatar }}">
                <div class="app-title">
                    <div class="title"><span class="highlight">{{ $user->name }}</span></div>
                    <div class="description">{{ $user->admin == 1 ? 'Admin' : 'Standard user' }}</div>
                </div>
            </div>


            <!-- Change email preferences -->
            <div class="app-heading">
                <div class="section col-xs-12">


                    @if(session()->has('success-email'))
                        <span class="help-block success alert alert-success alert-profile">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ session()->get('success-email') }}</strong>
                    </span>
                    @endif
                    @if(session()->has('error-password'))
                        <span class="help-block alert alert-danger alert-profile">

                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <strong>{{ session()->get('error-password') }}</strong>
                    </span>
                    @endif
                    @if(session()->has('success-password'))
                        <span class="help-block success alert alert-success alert-profile">
                                                    <a href="#" class="close" data-dismiss="alert"
                                                       aria-label="close">&times;</a>
                        <strong>{{ session()->get('success-password') }}</strong>
                    </span>
                    @endif
                    @if(session()->has('error-avatar'))
                        <span class="help-block alert alert-danger alert-profile">

                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <strong>{{ session()->get('error-avatar') }}</strong>
                    </span>
                    @endif
                    @if(session()->has('success-avatar'))
                        <span class="help-block success alert alert-success alert-profile">
                                                    <a href="#" class="close" data-dismiss="alert"
                                                       aria-label="close">&times;</a>

                        <strong>{{ session()->get('success-avatar') }}</strong>
                    </span>
                    @endif





                    <div class="section-title"><i class="icon fa fa-envelope-o" aria-hidden="true"></i> Email
                        settings
                    </div>

                    <form action="{{ url('/profile/update-email') }}" method="POST">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">

                        <div class="label-profile">Email address:</div>
                        <div class="input-group-inapp input-group input-group-mail">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            </span>
                            <input type="email" id="email" name="email" class="form-control "
                                   placeholder="Email address" value="{{ $user->email }}">
                        </div>

                        <div class="label-profile label-profile-notifications">Email notifications I want to receive:
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="checkboxPrimeFull">
                            <label for="checkboxPrimeFull">
                                Send me an email when prime silos are 90% full
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="checkboxWasteFull">
                            <label for="checkboxWasteFull">
                                Send me an email when waste silos are 90% full
                            </label>
                        </div>

                        <input type="submit" class="btn btn-success btn-submit btn-email-preferences"
                               value="Update email settings">

                    </form>

                </div>
            </div>

            <!-- Change profile picture -->
            <div class="app-heading">
                <div class="section col-xs-12">

                    <div class="section-title">
                        <i class="icon fa fa-user" aria-hidden="true"></i>
                        Change profile picture
                    </div>

                    <form action="{{ url('/profile/update-profile-picture') }}" method="POST"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="file" name="avatar" id="avatar" accept="image/png, image/jpeg, image/jpg"
                               class="upload-file {{ session()->has('error-avatar') ? 'has-error' : '' }}">
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


                    <form action="{{ url('/profile/update-password') }}" method="POST">

                        <input name="_token" type="hidden" value="{{ csrf_token() }}">


                        <div class="input-group-inapp input-group {{ session()->has('error-password') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                            <input type="password" id="current-password" name="current-password" class="form-control"
                                   placeholder="Current password" required>
                        </div>


                        <div class="input-group-inapp input-group {{ session()->has('error-password') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                            <input type="password" id="new-password1" name="new-password1" class="form-control"
                                   placeholder="New password" required>
                        </div>


                        <div class="input-group-inapp input-group {{ session()->has('error-password') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="basic-addon3">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                            <input type="password" id="new-password2" name="new-password2" class="form-control"
                                   placeholder="Confirm new password" required>
                        </div>


                        <input type="submit" class="btn btn-success btn-submit" value="Change my password">


                    </form>

                </div>

            </div>


        </div>
    </div>


@stop
