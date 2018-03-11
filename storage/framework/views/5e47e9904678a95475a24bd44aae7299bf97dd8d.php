<?php $__env->startSection('main-left'); ?>
<main class="col-md-9">
<!-- DRIS 7AMD -->
    <?php $__currentLoopData = $cours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-md-4 col-xs-6 work">
              <img class="img-responsive" src="/storage/app/public/<?php echo e($cour->image); ?>" alt="<?php echo e($cour->title); ?>" />
              <div class="overlay"></div>
              <div class="work-content">
                  <span><h3><?php echo e($cour->title); ?></h3></span>
                  <div class="work-link">
                      <a href="/course/<?php echo e($cour->id); ?>}"><i class="fa fa-external-link"></i></a>
                      <a class="lightbox" href='<?php echo e($cour->image); ?>'><i class="fa fa-search"></i></a>
                  </div>
              </div>
          </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </main>
<?php $__env->stopSection(); ?>



<!--<p>your account is <?php echo e(auth()->user()->verified() ? 'Verified' : 'Not Verified'); ?></p>-->
<?php echo $__env->make('layouts.app4', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>