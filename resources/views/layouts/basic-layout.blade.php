<!DOCTYPE html>
<html lang="en">
<head>
    @yield('page-title')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

</head>
<body>
<div class="app app-default">

    <aside class="app-sidebar" id="sidebar">
        <div class="sidebar-header">
            <a class="sidebar-brand" href="/"><span class="highlight">Hisfa</span> Admin</a>
            <button type="button" class="sidebar-toggle">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="sidebar-menu">
            <ul class="sidebar-nav">
                <li class="active">
                    <a href="/">
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
                    <a href="/prime-silos" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="fa fa-bolt" aria-hidden="true"></i>
                        </div>
                        <div class="title">Prime silos</div>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="/waste-silos" class="dropdown-toggle" data-toggle="dropdown">
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
                            <a class="navbar-brand" href="/"><span class="highlight">Hisfa</span> admin</a>
                        </li>
                        <li>
                            <button type="button" class="navbar-toggle">
                                <a href="/profile"><img class="profile-img" src="img/profile-pictures/default.png"></a>
                            </button>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left">
                        <li class="navbar-title">Dashboard</li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown notification warning">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="icon"><i class="fa fa-bell" aria-hidden="true"></i></div>
                                <div class="title">System notifications</div>
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
                            <a href="/profile" class="dropdown-toggle" data-toggle="dropdown">
                                <img class="profile-img" src="img/profile-pictures/default.png">
                                <div class="title">Profile</div>
                            </a>
                            <div class="dropdown-menu">
                                <div class="profile-info">
                                    <h4 class="username">Tom</h4>
                                </div>
                                <ul class="action">
                                    <li>
                                        <a href="/profile">
                                            Profile settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/logout">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hier komt pagina inhoud -->
        @yield('app-content')

    </div>
</div>
@extends('layouts.end-body-scripts')
</body>
</html>