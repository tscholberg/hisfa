@extends('layouts.basic-layout')

@section('page-title')
    Waste silos
@stop


@section('app-title')
    Waste silos
@stop

@section('app-content')

    <!-- Waste silos -->
    <div class="col-xs-12">
        <div class="card card-banner pointer-default">
            <div class="card-body app-heading">
                <div class="app-title">
                    <div class="description">
                        <ul class="silo-view waste">
                            @foreach($wastesilos as $key=>$wastesilo)
                                <li class="col-xs-12 col-sm-8 col-md-4 col-lg-2">
                                    <p class="silo">{{ $wastesilo->name }}</p>
                                    <div class="detail-empty">
                                        <div class="detail-filled"></div>
                                    </div>
                                    <p class="volume @if($user->manage_waste_silos == 1) hidden @endif ">{{ $wastesilo->capacity_percent }} %</p>

                                    @if($user->manage_waste_silos == 1)


                                        <form enctype="multipart/form-data" action="/wastesilos/updatecapacity"
                                          method="POST">


                                        <div class="input-group-inapp input-group form-control-capacity">

                                                <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-percent" aria-hidden="true"></i>
                        </span>

                                            <input type="number" name="silo_capacity" class="form-control"
                                                   placeholder="Percentage"
                                                   value="{{ $wastesilo->capacity_percent }}" min="0" max="100">


                                        </div>



                                        <input type="hidden" name="silo_id" value="{{ $wastesilo->id }}">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input class="btn btn-success" type="submit" name="updateSilo"
                                               value="Update {{$wastesilo->name}}">
                                        <input class="btn btn-danger btn-delete" type="button"
                                               name="deleteSilo" value="Delete {{$wastesilo->name}}"
                                               data-id="{{$wastesilo->id}}" data-name="{{$wastesilo->name}}" data-table="wastesilos">
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


    @if($user->manage_waste_silos == 1)
    <div class="btn-floating" id="help-actions">
        <div class="btn-bg"></div>
        <a href="/wastesilos/add" type="button" class="btn btn-default btn-toggle">
            <i class="icon fa fa-plus"></i>
            <span class="help-text">Add new waste silo</span>
        </a>
    </div>
    @endif

@endsection

@section('custom-scripts')
        <!-- Delete confirm bootbox -->
    <script src="/js/confirm-delete-user.js"></script>
    @stop