@extends('layouts.empty-layout')

@section('page-title')
Access denied!
@stop


@section('app-content')
<div class="app app-default">
    <div class="app-container app-login">
        <div class="flex-center">
            <div class="app-header"></div>
            <div class="app-body">
                <div class="app-block">
                    <div class="app-form">
                        <div class="form-header">
                            <div class="app-brand"><span class="highlight">Access denied</span></div>
                        </div>

                        <div class="text-center">
                            You are not allowed to see the dashboard.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop