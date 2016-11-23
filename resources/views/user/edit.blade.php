@extends('layouts.basic-layout')

@section('page-title')
    Edit profile {{ $profiledata->name }}
@stop

@section('app-title')
    Edit profile
@stop

@section('app-content')

    <div class="col-xs-12">
        <div class="card">
            <div class="card-body app-heading"></div>


            @if (count($errors) > 0)
                <div class="app-heading">
                    <div class="section col-xs-12">
                <span class="help-block alert alert-danger alert-profile">

                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <p class="feedback-title vet">The user is not created. Please check the following errors:</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </span>
                    </div>
                </div>
            @endif
            <form action="{{ url('/users/' . $profiledata->id . '/edit') }}" method="POST" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">

                <!-- Default info -->
                <div class="app-heading">
                    <div class="section col-xs-12">

                        <div class="section-title">
                            <i class="icon fa fa-user" aria-hidden="true"></i>
                            General
                        </div>


                        <div class="input-group-inapp input-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <input type="text" id="name" name="name" class="form-control"
                                   placeholder="Name" autofocus value="{{ $errors->has('name') ? old('name') : $profiledata->name }}">
                        </div>


                        <div class="input-group-inapp input-group input-group-mail{{ $errors->has('email') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            </span>
                            <input type="email" id="email" name="email" class="form-control "
                                   placeholder="Email address" value="{{ $errors->has('email') ? old('email') : $profiledata->email }}">
                        </div>


                        <div class="input-group-inapp input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                            <input type="password" id="password" name="password" class="form-control"
                                   placeholder="New password for this user">
                        </div>


                        <div class="input-group-inapp input-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <span class="input-group-addon" id="basic-addon3">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="form-control"
                                   placeholder="Confirm new password">
                        </div>


                    </div>
                </div>


                <!-- Profile picture -->
                <div class="app-heading">
                    <div class="section col-xs-12 {{ $errors->has('avatar') ? ' has-error' : '' }}">
                        <div class="section-title">
                            <i class="icon fa fa-file-picture-o" aria-hidden="true"></i>
                            Profile picture
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="file" name="avatar" id="avatar" name="avatar" accept="image/png, image/jpeg, image/jpg"
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

                        <div class="group-elements">
                            <div class="checkbox">
                                <input type="checkbox" id="checkboxAdmin" name="checkboxAdmin"  {{ $profiledata->admin == 1 ? 'checked' : '' }}>
                                <label for="checkboxAdmin">
                                    Make this user administrator (all permissions will be checked)
                                </label>
                            </div>

                        </div>


                        <div class="group-elements">
                            <div class="group-elements-title">What can this user see?</div>

                            <div class="checkbox">
                                <input type="checkbox" id="checkboxViewDashboard" name="checkboxViewDashboard" class="checkalladmin permissionview" {{ $profiledata->view_dashboard == 1 ? 'checked' : '' }}>
                                <label for="checkboxViewDashboard">
                                    View dashboard
                                </label>
                            </div>


                            <div class="checkbox">
                                <input type="checkbox" id="checkboxViewStock" name="checkboxViewStock" class="checkalladmin permissionview" {{ $profiledata->view_stock == 1 ? 'checked' : '' }}>
                                <label for="checkboxViewStock">
                                    View stock
                                </label>
                            </div>


                            <div class="checkbox">
                                <input type="checkbox" id="checkboxViewWasteSilos" name="checkboxViewWasteSilos" class="checkalladmin permissionview" {{ $profiledata->view_waste_silos == 1 ? 'checked' : '' }}>
                                <label for="checkboxViewWasteSilos">
                                    View waste silos
                                </label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" id="checkboxViewMaterialSilos" name="checkboxViewMaterialSilos"
                                       class="checkalladmin permissionview" {{ $profiledata->view_prime_silos == 1 ? 'checked' : '' }}>
                                <label for="checkboxViewMaterialSilos">
                                    View material silos
                                </label>
                            </div>

                        </div>


                        <div class="group-elements">
                            <div class="group-elements-title">What can this user modify?</div>

                            <div class="checkbox">
                                <input type="checkbox" id="checkboxModifyStock" name="checkboxModifyStock" class="checkalladmin permissionmodify" {{ $profiledata->manage_stock == 1 ? 'checked' : '' }}>
                                <label for="checkboxModifyStock">
                                    Manage stock
                                </label>
                            </div>


                            <div class="checkbox">
                                <input type="checkbox" id="checkboxModifyWasteSilos" name="checkboxModifyWasteSilos" {{ $profiledata->manage_waste_silos == 1 ? 'checked' : '' }}
                                       class="checkalladmin permissionmodify">
                                <label for="checkboxModifyWasteSilos">
                                    Manage waste silos
                                </label>
                            </div>


                            <div class="checkbox">
                                <input type="checkbox" id="checkboxModifyMaterialSilos" name="checkboxModifyMaterialSilos" {{ $profiledata->manage_prime_silos == 1 ? 'checked' : '' }}
                                       class="checkalladmin permissionmodify">
                                <label for="checkboxModifyMaterialSilos">
                                    Manage material silos
                                </label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" id="checkboxModifyUsers" name="checkboxModifyUsers" class="checkalladmin permissionmodify" {{ $profiledata->manage_users == 1 ? 'checked' : '' }}>
                                <label for="checkboxModifyUsers">
                                    Manage users
                                </label>
                            </div>
                        </div>


                    </div>

                </div>


                <div class="app-heading">
                    <div class="section col-xs-12">
                        <div class="form-footer">
                            <input type="submit" class="btn btn-success" value="Create account">
                            <a href="/users" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>

@stop

@section('custom-scripts')
    <script src="/js/check-permissions.js"></script>
@stop