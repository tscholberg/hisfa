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
                    <div id="vue-primesilos" class="description">
                        <primesilos>

                        </primesilos>
                    </div><!-- ./description -->
                </div>
            </div>
        </div>
    </div><!-- ./END PRIME SILO VIEW -->


    <template id="primesilos-template">
        <ul class="silo-view prime">

            <li v-for="silo in primesilos" v-bind:silo="silo" class="col-xs-12 col-sm-8 col-md-4 col-lg-2">
                <p class="silo">@{{ silo.name }}</p>

                <div class="detail-empty">
                    <div class="detail-filled"></div>
                </div>

                <p class="volume @if($user->manage_prime_silos == 1) hidden @endif ">@{{ silo.capacity }}%</p>
                <p class="silo @if($user->manage_prime_silos == 1) hidden @endif ">@{{ silo.resource }}</p>


                @if($user->manage_prime_silos == 1)
                    <form id="silo-form">

                        <div class="input-group-inapp input-group form-control-capacity">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-percent" aria-hidden="true"></i>
                            </span>
                            <input type="number" name="silo_capacity" class="form-control"
                                   placeholder="Percentage"
                                   :value="silo.capacity" min="0" max="100">
                        </div>
                        <select class="form-control form-control-capacity" name="resource_id">
                            {{--<option value="{{$resource->id}}">{{$resource->name}}</option>--}}
                        </select>
                        <input type="hidden" name="silo_id" :value="silo.id" v-model="silo">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input class="btn btn-success" type="button" name="updateSilo"
                               :value="'Update ' + silo.name"
                               v-on:click="update">
                        <input class="btn btn-danger btn-delete" type="button" name="deleteSilo"
                        @click="delete(silo)"
                        :value="'Delete ' + silo.name"
                        :data-id="silo.id" :data-name="silo.name"
                        data-table="primesilos">
                    </form>
                @endif
            </li>
        </ul>
    </template>

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
        <script src="https://unpkg.com/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="/js/confirm-delete-user.js"></script>
        <script src="/js/vue-silos.js"></script>
@stop