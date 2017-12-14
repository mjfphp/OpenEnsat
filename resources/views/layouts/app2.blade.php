<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')
     @show</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
    <link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

    <!-- Magnific Popup -->
    <link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body>


<header id="home">
    <!-- Background Image -->
@yield('header')

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
    @yield('w')

</header>

@yield('content')

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
                                <a href="#"><i class="fa fa-twitter"></i></a>
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
                        <img class="img-responsive img-circle" src="./img/team4.jpg" alt="">
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

<!-- Footer -->
<footer id="footer" class="sm-padding bg-dark">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <div class="col-md-12">

                <!-- footer logo -->
                <div class="footer-logo">
                    <a href="index.html"><h5 class="white-text">OpenEnsat</h5><img src="img/logo-alt.png" alt="logo"></a>
                </div>
                <!-- /footer logo -->

                <!-- footer follow -->
                <ul class="footer-follow">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
                <!-- /footer follow -->

                <!-- footer copyright -->
                <div class="footer-copyright">
                    <p>Copyright © 2017. All Rights Reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                </div>
                <!-- /footer copyright -->

            </div>

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</footer>
<!-- /Footer -->
<!-- jQuery Plugins -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="js/main.js"></script>

</body>

</html>

