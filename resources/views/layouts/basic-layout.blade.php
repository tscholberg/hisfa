<?php
$route = Route::getCurrentRoute()->getPath();
$user = Auth::user();
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('page-title')</title>
    @include('layouts.basic-style')
</head>
<body>
<div class="app app-default">

    <aside class="app-sidebar" id="sidebar">
        <div class="sidebar-header">
            <a class="sidebar-brand" href="/dashboard"><span class="highlight">Hisfa</span> platform</a>
            <button type="button" class="sidebar-toggle">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="sidebar-menu">
            <ul class="sidebar-nav">
                @if($user->view_dashboard == 1)
                <li @if($route === '/' || $route === 'dashboard') class="active @endif">
                    <a href="/dashboard">
                        <div class="icon">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                        </div>
                        <div class="title">Dashboard</div>
                    </a>
                </li>
                @endif
                @if($user->view_stock == 1)
                <li class="dropdown @if($route === 'blocks') active @endif ">
                    <a href="/blocks">
                        <div class="icon">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                        </div>
                        <div class="title">Blocks</div>
                    </a>
                </li>
                    @endif
                <li class="dropdown @if($route === 'primesilos') active @endif ">
                    <a href="/primesilos">

                        <div class="icon">
                            <i class="fa fa-bolt" aria-hidden="true"></i>
                        </div>
                        <div class="title">Prime silos</div>
                    </a>
                </li>
                <li class="dropdown @if($route === 'wastesilos') active @endif ">
                    <a href="/wastesilos">
                        <div class="icon">
                            <i class="fa fa-recycle" aria-hidden="true"></i>
                        </div>
                        <div class="title">Waste silos</div>
                    </a>
                </li>
                <li class="dropdown @if($route === 'resources') active @endif ">
                    <a href="/resources">
                        <div class="icon">
                            <i class="fa fa-industry" aria-hidden="true"></i>
                        </div>
                        <div class="title">Resources</div>
                    </a>
                </li>
                <li class="dropdown @if($route === 'users') active @endif ">
                    <a href="/users">
                        <div class="icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="title">Users</div>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="app-container">
        <nav class="navbar navbar-default" id="navbar">


            <div class="container-fluid">
                <div class="navbar-collapse collapse in">
                    <ul class="nav navbar-nav navbar-mobile">
                        <li>
                            <button type="button" class="sidebar-toggle">
                                <i class="fa fa-bars"></i>
                            </button>
                        </li>
                        <li class="logo">
                            <a class="navbar-brand" href="/dashboard"><span class="highlight">Hisfa</span> platform</a>
                        </li>
                        <li>
                            <button type="button" class="navbar-toggle">
                                <img class="profile-img" src="/img/profile-pictures/{{ $user->avatar }}">
                            </button>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left">
                        <li class="navbar-title">@yield('app-title')</li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <!--<li class="dropdown notification warning">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="icon"><i class="fa fa-bell" aria-hidden="true"></i></div>
                                <div class="title">Notifications</div>
                                <div class="count">1</div>
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li class="dropdown-header">Notifications</li>
                                    <li>
                                        <a href="/notifications/id">
                                            <span class="badge badge-danger pull-right">1</span>
                                            <div class="message">
                                                <div class="content">
                                                    <div class="title">Title</div>
                                                    <div class="description">Example notification description</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <a href="/notifications">View All <i class="fa fa-angle-right"
                                                                             aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </li>-->

                        <li class="dropdown profile">
                            <a href="/profile">
                                <img class="profile-img" src="/img/profile-pictures/{{ $user->avatar }}">
                                <div class="title">Profile settings</div>
                            </a>
                            <div class="dropdown-menu">
                                <div class="profile-info">
                                    <h4 class="username">{{ $user->name }}</h4>
                                </div>
                                <ul class="action">
                                    <li>
                                        <a href="/profile">
                                            Profile settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"> </i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="col-lg-12">
                <!-- Hier komt pagina inhoud -->
                @yield('app-content')
            </div>
        </div>
    </div>


</div>
@include('layouts.end-body-scripts')
</body>
</html>