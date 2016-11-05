@extends('layouts.empty-layout')

@section('page-title')
    <title>Page not found</title>
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
                                <div class="app-brand"><span class="highlight">Page not found</span></div>
                            </div>

                            <div class="text-center">
                                Unfortunately, the requested page does not exist.
                            </div>

                            <div class="form-footer">
                                <a href="/dashboard">Return to the dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop