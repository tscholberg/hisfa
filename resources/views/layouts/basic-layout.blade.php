<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('page-title')</title>
    @include('layouts.basic-style')
</head>
<body>
<div class="app app-default">

    <aside class="app-sidebar" id="sidebar">
        <div class="sidebar-header">
            <a class="sidebar-brand" href="/dashboard"><span class="highlight">Hisfa</span> production</a>
            <button type="button" class="sidebar-toggle">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="sidebar-menu">
            <ul class="sidebar-nav">
                <li class="active">
                    <a href="/dashboard">
                        <div class="icon">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                        </div>
                        <div class="title">Dashboard</div>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="/blocks">
                        <div class="icon">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                        </div>
                        <div class="title">Blocks</div>
                    </a>
                </li>
                <li class="dropdown ">
                    <a href="/primesilos">
                        {{--<a href="/primesilos" class="dropdown-toggle" data-toggle="dropdown">--}}

                        <div class="icon">
                            <i class="fa fa-bolt" aria-hidden="true"></i>
                        </div>
                        <div class="title">Prime silos</div>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="/wastesilos">
                        {{--<a href="/wastesilos" class="dropdown-toggle" data-toggle="dropdown">--}}

                        <div class="icon">
                            <i class="fa fa-recycle" aria-hidden="true"></i>
                        </div>
                        <div class="title">Waste silos</div>
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
                            <a class="navbar-brand" href="/dashboard"><span class="highlight">Hisfa</span> production</a>
                        </li>
                        <li>
                            <button type="button" class="navbar-toggle">
                                <img class="profile-img" src="img/profile-pictures/{{ Auth::user()->avatar }}">
                            </button>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left">
                        <li class="navbar-title"><h1>@yield('app-title')</h1></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown notification warning">
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
                                        <a href="/notifications">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown profile">
                            <a href="/profile">
                                <img class="profile-img" src="img/profile-pictures/{{ Auth::user()->avatar }}">
                                <div class="title">Profile settings</div>
                            </a>
                            <div class="dropdown-menu">
                                <div class="profile-info">
                                    <h4 class="username">{{ Auth::user()->name }}</h4>
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
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
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