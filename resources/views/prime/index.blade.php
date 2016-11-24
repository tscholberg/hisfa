@extends('layouts.basic-layout')

@section('page-title')
    Prime silos
@stop

@section('app-title')
    Prime silos
    @stop

    @section('app-content')

            <!-- Prime silos -->
    <div class="col-xs-12">
        <div class="card card-banner pointer-default">
            <div class="card-body app-heading">
                <div class="app-title">
                    <div class="description">
                        <ul class="silo-view prime">
                            @foreach($primesilos as $key=>$primesilo)
                                <li class="col-xs-12 col-sm-8 col-md-4 col-lg-2">
                                    <p class="silo">{{ $primesilo->name }}</p>

                                    <div class="detail-empty">
                                        <div class="detail-filled"></div>
                                    </div>

                                        <p class="volume @if($user->manage_prime_silos == 1) hidden @endif ">{{ $primesilo->capacity_percent }} %</p>
                                    <p class="silo @if($user->manage_prime_silos == 1) hidden @endif ">{{ $primesilo->resource->name }}</p>


                                    @if($user->manage_prime_silos == 1)
                                        <form enctype="multipart/form-data" action="/primesilos/updatecapacity"
                                              method="POST">


                                            <div class="input-group-inapp input-group form-control-capacity">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-percent" aria-hidden="true"></i>
                        </span>
                                                <input type="number" name="silo_capacity" class="form-control"
                                                       placeholder="Percentage"
                                                       value="{{ $primesilo->capacity_percent }}" min="0" max="100">
                                            </div>



                                            <select class="form-control form-control-capacity" name="resource_id">
                                                @foreach($resources as $key=>$resource)
                                                    <option value="{{$resource->id}}">{{$resource->name}}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="silo_id" value="{{ $primesilo->id }}">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input class="btn btn-success" type="submit" name="updateSilo"
                                                   value="Update {{$primesilo->name}}">
                                            <input class="btn btn-danger btn-delete" type="button" name="deleteSilo"
                                                   value="Delete {{$primesilo->name}}"
                                                   data-id="{{$primesilo->id}}" data-name="{{$primesilo->name}}"
                                                   data-table="primesilos">
                                        </form>



                                    @endif
                                </li>

                            @endforeach
                        </ul>
                    </div><!-- ./description -->
                </div>
            </div>
        </div>
    </div><!-- ./END PRIME SILO VIEW -->


    @if($user->manage_prime_silos == 1)
        <div class="btn-floating" id="help-actions">
            <div class="btn-bg"></div>
            <a href="/primesilos/add" type="button" class="btn btn-default btn-toggle">
                <i class="icon fa fa-plus"></i>
                <span class="help-text">Add new prime silo</span>
            </a>
        </div>
        @endif
        @stop

        @section('custom-scripts')
                <!-- Delete confirm bootbox -->
        <script src="/js/confirm-delete-user.js"></script>
@stop