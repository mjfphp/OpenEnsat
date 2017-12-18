@extends('layouts.app2')

@section('header')
    <!-- Header -->
    <header>

        <!-- Nav -->
        <nav id="nav" class="navbar">
            <div class="container">

                <div class="navbar-header">
                    <!-- Logo -->
                    <div class="logo-cnt">
                        <a href="{{ url('/') }}">
                            <span class="col-md-4 col-sm-4 col-xs-4"><img class="logo" src="{{asset('img/logo.png')}}" alt="logo"></span>
                            <span class="nom-bar-haut col-md-4">OpenEnsat</span>
                        </a>
                    </div>
                    <!-- /Logo -->

                    <!-- Collapse nav button -->
                    <div class="nav-collapse">
                        <span></span>
                    </div>
                    <!-- /Collapse nav button -->
                </div>

                <!--  Main navigation  -->
                <ul class="main-nav nav navbar-nav navbar-right">
                    @yield('nav','
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#portfolio">Cours</a></li>
                    <li><a href="#service">Forum</a></li>')
                </ul>
                <!-- /Main navigation -->

            </div>
        </nav>
        <!-- /Nav -->
    </header>
    <!-- /Header -->

@endsection
