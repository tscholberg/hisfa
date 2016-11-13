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

            @if (count($errors) > 0 || session()->has('error'))
                <div class="app-heading">
                    <div class="section col-xs-12">
                        <span class="help-block alert alert-danger alert-profile">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <p class="feedback-title vet">Your profile settings have not been changed. Please check the
                                following errors:</p>
                            <ul>
                                @if(count($errors) > 0)
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                @endif

                                @if(session()->has('error'))
                                    <li>{{ session()->get('error') }}</li>
                                @endif
                            </ul>
                        </span>
                    </div>
                </div>
            @endif

            @if(session()->has('success'))
                <div class="app-heading">
                    <div class="col-xs-12">
                        <span class="help-block success alert alert-success alert-profile">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session()->get('success') }}</strong>
                        </span>
                    </div>
                </div>
                @endif


                        <!-- Change email preferences -->
                <div class="app-heading">
                    <div class="section col-xs-12">

                        <div class="section-title"><i class="icon fa fa-envelope-o" aria-hidden="true"></i> Email
                            settings
                        </div>

                        <form action="{{ url('/profile/update-email') }}" method="POST">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">

                            <div class="label-profile">Email address:</div>
                            <div class="input-group-inapp input-group input-group-mail {{ $errors->has('email') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            </span>
                                <input type="email" id="email" name="email" class="form-control"
                                       placeholder="Email address" value="{{ $user->email }}">
                            </div>

                            <div class="label-profile label-profile-notifications">Email notifications I want to
                                receive:
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="checkboxPrimeFull"
                                       name="checkboxPrimeFull" {{ $user->email_prime_silos_full == 1 ? 'Checked' : '' }}>
                                <label for="checkboxPrimeFull">
                                    Send me an email when prime silos are 90% full
                                </label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="checkboxWasteFull"
                                       name="checkboxWasteFull" {{ $user->email_waste_silos_full == 1 ? 'Checked' : '' }}>
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
                            <i class="icon fa fa-file-picture-o" aria-hidden="true"></i>
                            Change profile picture
                        </div>

                        <form action="{{ url('/profile/update-profile-picture') }}" method="POST"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <input type="file" name="avatar" id="avatar" accept="image/png, image/jpeg, image/jpg"
                                   class="upload-file {{ $errors->has('avatar') ? ' has-error' : '' }}">
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


                            <div class="input-group-inapp input-group {{ session()->has('error') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                                <input type="password" id="currentpassword" name="currentpassword" class="form-control "
                                       placeholder="Current password" required>

                            </div>


                            <div class="input-group-inapp input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                                <input type="password" id="password" name="password" class="form-control"
                                       placeholder="New password" required>
                            </div>


                            <div class="input-group-inapp input-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="basic-addon3">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                       class="form-control"
                                       placeholder="Confirm new password" required>
                            </div>


                            <input type="submit" class="btn btn-success btn-submit" value="Change my password">


                        </form>

                    </div>

                </div>


        </div>
    </div>


@stop
