@extends('layouts.basic-layout')

@section('page-title')
    Waste silos
@stop


@section('app-title')
    App page title
@stop

@section('app-content')

        <!-- Prime silos -->
    <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">
        <a href="/primesilos" class="card card-banner card-green-light">
            <div class="card-body app-heading">
                <div class="app-title">
                    <div class="title"><span class="highlight">Waste Silo's</span></div>
                    <div class="description">
                        <ul class="silo-view waste">
                            @foreach($wastesilos as $key=>$wastesilo)
                                <li>
                                    <div class="full-bar" >
                                        <div class="silo-bar-percent"
                                             style=" height: {{ $wastesilo->capacity_percent }}%; ">
                                        </div>
                                    </div>
                                    <p class="volume">{{ $wastesilo->capacity_percent }} %</p>
                                    <p class="silo">{{ $wastesilo->name }}</p>
                                    <form enctype="multipart/form-data" action="/wastesilos/delete" method="POST">
                                        <input type="hidden" name="silo_id" value="{{ $wastesilo->id }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="submit" name="deleteSilo" value="Delete {{$wastesilo->name}}">
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div><!-- ./description -->
                </div>
            </div>
        </a>
    </div><!-- ./END PRIME SILO VIEW -->

    <h1>Add Wastesilo</h1>
    <form enctype="multipart/form-data" action="/wastesilos/create" method="POST">
        <input type="text" name="silo_name">
        <div class="row">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" name="create" value="Create">
        </div>
    </form>


@endsection