@extends('layouts.basic-layout')

@section('page-title')
    Add user
@stop

@section('app-title')
    Create new user
@stop

@section('app-content')

    <div class="col-xs-12">
        <div class="card">
            <div class="card-body app-heading"></div>


            <!-- Change profile picture -->
            <div class="app-heading">
                <div class="section col-xs-12">

                    <div class="section-title">
                        <i class="icon fa fa-user" aria-hidden="true"></i>
                        General
                    </div>


                    <div class="input-group-inapp input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        <input type="text" id="name" name="name" class="form-control"
                               placeholder="Name" autofocus required>
                    </div>


                    <div class="input-group-inapp input-group input-group-mail">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            </span>
                        <input type="email" id="email" name="email" class="form-control "
                               placeholder="Email address">
                    </div>


                    <div class="input-group-inapp input-group">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                        <input type="password" id="new-password1" name="new-password1" class="form-control"
                               placeholder="Password for this user" required>
                    </div>


                    <div class="input-group-inapp input-group">
                            <span class="input-group-addon" id="basic-addon3">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                        <input type="password" id="new-password2" name="new-password2" class="form-control"
                               placeholder="Confirm password" required>
                    </div>


                </div>
            </div>


            <!-- Profile picture -->
            <div class="app-heading">
                <div class="section col-xs-12">
                    <div class="section-title">
                        <i class="icon fa fa-file-picture-o" aria-hidden="true"></i>
                        Profile picture
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="file" name="avatar" id="avatar" accept="image/png, image/jpeg, image/jpg"
                           class="upload-file">
                </div>
            </div>


            <!-- Permission -->
            <div class="app-heading">
                <div class="section col-xs-12">
                    <div class="section-title">
                        <i class="icon fa fa-superpowers" aria-hidden="true"></i>
                        App permissions
                    </div>


                    Give this user admin rights? (Warning: with great power comes great responsibility!)

                    <div class="checkbox">
                        <input type="checkbox" id="checkboxPrimeFull">
                        <label for="checkboxPrimeFull">
                            Make this user administrator
                        </label>
                    </div>

                    <!--What can this user see?

                    <div class="checkbox">
                        <input type="checkbox" id="checkboxPrimeFull">
                        <label for="checkboxPrimeFull">
                            View dashboard
                        </label>
                    </div>


                    <div class="checkbox">
                        <input type="checkbox" id="checkboxPrimeFull">
                        <label for="checkboxPrimeFull">
                            View stock
                        </label>
                    </div>


                    <div class="checkbox">
                        <input type="checkbox" id="checkboxPrimeFull">
                        <label for="checkboxPrimeFull">
                            View waste silos
                        </label>
                    </div>

                    <div class="checkbox">
                        <input type="checkbox" id="checkboxPrimeFull">
                        <label for="checkboxPrimeFull">
                            View material silos
                        </label>
                    </div>


                    What can this user modify?
                    <div class="checkbox">
                        <input type="checkbox" id="checkboxPrimeFull">
                        <label for="checkboxPrimeFull">
                            Manage stock
                        </label>
                    </div>


                    <div class="checkbox">
                        <input type="checkbox" id="checkboxPrimeFull">
                        <label for="checkboxPrimeFull">
                            Manage waste silos
                        </label>
                    </div>


                    <div class="checkbox">
                        <input type="checkbox" id="checkboxPrimeFull">
                        <label for="checkboxPrimeFull">
                            Manage material silos
                        </label>
                    </div>

                    <div class="checkbox">
                        <input type="checkbox" id="checkboxPrimeFull">
                        <label for="checkboxPrimeFull">
                            Manage users
                        </label>
                    </div>-->
                </div>

            </div>


            <div class="app-heading">
                <div class="section col-xs-12">

                    <div class="form-footer">
                        <input type="submit" class="btn btn-success btn-submit" value="Create account">
                        <a href="/users" style="margin-left: 20px;">Cancel registration</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
@stop