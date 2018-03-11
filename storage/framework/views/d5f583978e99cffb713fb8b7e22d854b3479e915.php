<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title><?php echo $__env->yieldContent('title'); ?>
     <?php echo $__env->yieldSection(); ?></title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" />

    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.css')); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/owl.theme.default.css')); ?>" />

    <!-- Magnific Popup -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/magnific-popup.css')); ?>" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />
    <?php echo $__env->yieldContent('style'); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body>


<?php echo $__env->yieldContent('header'); ?>

<div class="mycnt">
  <?php echo $__env->yieldContent('content'); ?>


  <!-- Footer -->
  <footer id="footer" class="sm-padding bg-dark">

      <!-- Container -->
      <div class="container footer-cnt">

          <!-- Row -->
          <div class="footer col-md-offset-2">


                  <!-- footer logo -->
                  <div class="logo-cnt col-md-3 col-xs-4 col-sm-4">
                      <a href="index.html">
                        <span class="col-md-3 col-xs-3 col-sm-3">
                          <img class="logo" src="<?php echo e(asset('img/logo-alt.png')); ?>" alt="logo">
                        </span>
                        <span class="nom-bar-haut col-md-2 col-sm-2 white-text">OpenEnsat</span>
                      </a>



                  </div>
                  <!-- /footer logo -->

                  <!-- footer follow -->
                  <ul class="footer-follow col-md-4 col-xs-4">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                      <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                  </ul>
                  <!-- /footer follow -->

                  <!-- footer copyright -->
                  <div class="footer-copyright col-md-4 col-sm-4">
                      <p>Copyright © 2017. All Rights Reserved. Designed by <a href="https://colorlib.com" target="_blank">NAJIH DRISS <3</a></p>
                  </div>
                  <!-- /footer copyright -->

          </div>
          <!-- /Row -->

      </div>
      <!-- /Container -->

  </footer>
</div>
<!-- /Footer -->
<!-- jQuery Plugins -->

<script type="text/javascript" src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jquery.magnific-popup.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/main.js')); ?>"></script>
<?php echo $__env->yieldContent('js'); ?>
</body>

</html>
