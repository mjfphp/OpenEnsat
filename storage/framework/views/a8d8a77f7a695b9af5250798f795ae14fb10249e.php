<?php $__env->startSection('header'); ?>
    <!-- Header -->
    <header>

        <!-- Nav -->
        <nav id="nav" class="navbar">
            <div class="container">

                <div class="navbar-header">
                    <!-- Logo -->
                    <div class="logo-cnt">
                        <a href="<?php echo e(url('/')); ?>">
                            <span class="col-md-4 col-sm-4 col-xs-4">
                              <img class="logo" src="<?php echo e(asset('img/logo.png')); ?>" alt="logo">
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
                    <?php echo $__env->yieldContent('nav'); ?>
                </ul>
                <!-- /Main navigation -->

            </div>
        </nav>
        <!-- /Nav -->
    </header>
    <!-- /Header -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>