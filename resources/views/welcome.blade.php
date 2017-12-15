@extends('layouts.app2')

    @section('title')
        Welcome-OpenEnsat
    @endsection

    @section('header')
        <header id="home">
            <!-- Background Image -->
            <div class="bg-img" style="background-image: url('img/background1.jpg');">
                <div class="overlay"></div>
            </div>

        <!-- /Background Image -->

            <!-- Nav -->
            <!-- Nav -->
            <nav id="nav" class="navbar nav-transparent">
                <div class="container">

                    <div class="navbar-header">
                        <!-- Logo -->
                        <div class="navbar-brand">
                            <a href="index.html">
                        <span class="col-md-4"><img class="logo" src="img/logo.png" alt="logo">
                        <img class="logo-alt" src="img/logo-alt.png" alt="logo"></span>
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
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#portfolio">Cours</a></li>
                        <li><a href="#service">Forum</a></li>
                    </ul>
                    <!-- /Main navigation -->

                </div>
            </nav>
            <div class="home-wrapper">
                <div class="container">
                    <div class="row">

                        <!-- home content -->
                        <div class="col-md-10 col-md-offset-1">
                            <div class="home-content">
                                <img class="logo logo-middle" src="img/logo-alt.png" alt="logo">
                                <h1 class="white-text title">OpenEnsat</h1>
                                <p class="white-text">Nous vous présentons tous les cours dont vous aurez besoin pour devenir compétent dans tous domaine.</br>Notre site vous permettra de maitriser les sujets proposés que vous avez suivis.</p>
                                @if (Route::has('login'))
                                    <div class="top-right links">
                                        @if (Auth::check())
                                            <a href="{{ url('/home') }}">Home</a>
                                        @else
                                            <button class="white-btn"><a href="{{ url('/login') }}" class="a-login">Login</a></button>
                                            <button class="main-btn"><a href="{{ url('/register') }}" class="a-register">Register</a></button>
                                        @endif
                                    </div>
                            @endif
                            <!--<button class="white-btn">Get Started!</button>
                        <button class="main-btn">Learn more</button>-->
                            </div>
                        </div>
                        <!-- /home content -->

                    </div>
                </div>
            </div>

        </header>
    @endsection

@section('content')
    <!-- About -->
    <div id="about" class="section md-padding">

        <!-- Container -->
        <div class="container">

            <!-- Row -->
            <div class="row">

                <!-- Section header -->
                <div class="section-header text-center">
                    <h2 class="title">Bienvenue à OpenEnsat</h2>
                </div>
                <!-- /Section header -->

                <!-- about -->
                <div class="col-md-4">
                    <div class="about">
                        <i class="fa fa-cogs"></i>
                        <h3>Totalement utile</h3>
                        <p>Des cours interressants qui vous seront surement utiles un jour dans votre vie.</p>
                    </div>
                </div>
                <!-- /about -->

                <!-- about -->
                <div class="col-md-4">
                    <div class="about">
                        <i class="fa fa-magic"></i>
                        <h3>Fonctionnalités impressionnantes</h3>
                        <p>Possibilité de publier des cours, de lire des cours et même de tester vos connaissances.</p>
                    </div>
                </div>
                <!-- /about -->

                <!-- about -->
                <div class="col-md-4">
                    <div class="about">
                        <i class="fa fa-mobile"></i>
                        <h3>Ouvert à tous public et partout</h3>
                        <p>Vous n'avez qu'à vous inscrire et tout sera gratuit sur n'importe quel outil.</p>
                    </div>
                </div>
                <!-- /about -->

            </div>
            <!-- /Row -->

        </div>
        <!-- /Container -->

    </div>
    <!-- /About -->

    <!-- Team -->
    <div id="team" class="section md-padding">

        <!-- Container -->
        <div class="container">

            <!-- Row -->
            <div class="row">

                <!-- Section header -->
                <div class="section-header text-center">
                    <h2 class="title">Notre équipe</h2>
                </div>
                <!-- /Section header -->

                <!-- team -->
                <div class="col-sm-3">
                    <div class="team">
                        <div class="team-img">
                            <img class="img-responsive img-circle" src="./img/team1.jpg" alt="">
                            <div class="overlay">
                                <div class="team-social">
                                    <a href="https://www.facebook.com/bouchaala.zineb"><i class="fa fa-facebook"></i></a>
                                    <a href="https://plus.google.com/113316834389734244049?hl=fr"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3>Zineb Bouchaala</h3>
                            <span>Computer Science engineer</span>
                        </div>
                    </div>
                </div>
                <!-- /team -->

                <!-- team -->
                <div class="col-sm-3">
                    <div class="team">
                        <div class="team-img">
                            <img class="img-responsive img-circle" src="./img/team2.jpg" alt="">
                            <div class="overlay">
                                <div class="team-social">
                                    <a href="https://www.facebook.com/profile.php?id=100012412780050"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3>Mohamed Jamai</h3>
                            <span>Computer Science engineer</span>
                        </div>
                    </div>
                </div>
                <!-- /team -->

                <!-- team -->
                <div class="col-sm-3">
                    <div class="team">
                        <div class="team-img">
                            <img class="img-responsive img-circle" src="./img/team3.jpg" alt="">
                            <div class="overlay">
                                <div class="team-social">
                                    <a href="https://www.facebook.com/driss.najih.37"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3>Driss Najih</h3>
                            <span>Computer Science engineer</span>
                        </div>
                    </div>
                </div>
                <!-- /team -->

                <!-- team -->
                <div class="col-sm-3">
                    <div class="team">
                        <div class="team-img">
                            <img class="img-responsive " src="./img/team4.jpg" alt="">
                            <div class="overlay">
                                <div class="team-social">
                                    <a href="https://www.facebook.com/hamza.derraz.5"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3>Hamza Derraz</h3>
                            <span>Computer Science engineer</span>
                        </div>
                    </div>
                </div>
                <!-- /team -->

            </div>
            <!-- /Row -->

        </div>
        <!-- /Container -->

    </div>
    <!-- /Team -->
    @endsection