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
                        <div class="logo-cnt">
                            <a href="{{ url('/') }}">
                            <span class="col-md-4 col-sm-4 col-xs-4">
                              <img class="logo" src="img/logo.png" alt="logo">
                              <img class="logo-alt" src="img/logo-alt.png" alt="logo">
                            </span>
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
                        <li><a href="#portfolio">Cours Récents</a></li>
                        <li><a href="#service">Nos Services</a></li>
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
                                <div class="section-header text-center">
                                  <h1 class="white-text title">OpenEnsat</h1>
                                </div>
                                <p class="white-text">Nous vous présentons tous les cours dont vous aurez besoin pour devenir compétent dans tous domaine.</br>Notre site vous permettra de maitriser les sujets proposés que vous avez suivis.</p>

                                    <div class="top-right links">

                                        <a href="{{ url('/login') }}" class="a-login"><button class="white-btn">Login</button></a>
                                        <a href="{{ url('/register') }}" class="a-register"><button class="main-btn">Register</button></a>

                                    </div>
                            
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
                            <img class="img-responsive" src="./img/team1.jpg" alt="">
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
                            <img class="img-responsive" src="./img/team2.jpg" alt="">
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
                            <img class="img-responsive" src="./img/team3.jpg" alt="">
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
                            <img class="img-responsive" src="./img/team4.jpg" alt="">
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

    <!-- Cours Récents -->
    <div id="portfolio" class="section md-padding bg-grey">

        <!-- Container -->
        <div class="container">

            <!-- Row -->
            <div class="row">

                <!-- Section header -->
                <div class="section-header text-center">
                    <h2 class="title">Cours Récents</h2>
                </div>
                <!-- /Section header -->

                <!-- Work -->
                <div class="col-md-4 col-xs-6 work">
                    <img class="img-responsive" src="./img/work1.jpg" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><h3>Cours_name</h3></span>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-external-link"></i></a>
                            <a class="lightbox" href="./img/work1.jpg"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /Work -->

                <!-- Work -->
                <div class="col-md-4 col-xs-6 work">
                    <img class="img-responsive" src="./img/work2.jpg" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><h3>Cours_name</h3></span>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-external-link"></i></a>
                            <a class="lightbox" href="./img/work2.jpg"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /Work -->

                <!-- Work -->
                <div class="col-md-4 col-xs-6 work">
                    <img class="img-responsive" src="./img/work3.jpg" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span><h3>Cours_name</h3></span>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-external-link"></i></a>
                            <a class="lightbox" href="./img/work3.jpg"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /Work -->



            </div>
            <!-- /Row -->

        </div>
        <!-- /Container -->

    </div>
    <!-- /Cours Récents -->


    <!-- Why Choose Us -->
    <div id="service" class="section md-padding">

        <!-- Container -->
        <div class="container">

            <!-- Row -->
            <div class="row">

                <!-- why choose us content -->
                <div class="col-md-6">
                    <div class="section-header text-center">
                        <h2 class="title">Nos Services</h2>
                    </div>
                    <p>Notre site vous offre divers opportunités. Vous pouvez : </p>
                    <div class="feature">
                        <i class="fa fa-check"></i>
                        <p>Lire des cours bien expliqués, ou que vous soyez, sur votre pc, tablette ou telephone.</p>
                    </div>
                    <div class="feature">
                        <i class="fa fa-check"></i>
                        <p>Passer des quiz pour connaître votre niveau et votre avancement dans nos cours.</p>
                    </div>
                    <div class="feature">
                        <i class="fa fa-check"></i>
                        <p>Commentez nos cours , parler avec d'autres étudiants et trouver les réponses de vos question.</p>
                    </div>
                    <div class="feature">
                        <i class="fa fa-check"></i>
                        <p>Et même publier vos propres cours s'ils sont vérifiés.</p>
                    </div>
                </div>
                <!-- /why choose us content -->

                <!-- About slider -->
                <div class="col-md-6">
                    <div id="about-slider" class="owl-carousel owl-theme">
                        <img class="img-responsive" src="./img/about1.jpg" alt="">
                        <img class="img-responsive" src="./img/about2.jpg" alt="">
                        <img class="img-responsive" src="./img/about1.jpg" alt="">
                        <img class="img-responsive" src="./img/about2.jpg" alt="">
                    </div>
                </div>
                <!-- /About slider -->

            </div>
            <!-- /Row -->

        </div>
        <!-- /Container -->

    </div>
    <!-- /Why Choose Us -->

@endsection
