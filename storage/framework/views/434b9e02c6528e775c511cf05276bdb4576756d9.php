<?php $__env->startSection('nav'); ?>
	<li><a href="/forums">Froums</a></li>
	<li><a href="/welcome">Welcome</a></li>
	<li class="has-dropdown">
        <a><?php echo e(Auth::user()->name); ?></a>
        <ul class="dropdown">
          <li>
            <a
            href="<?php echo e(route('logout')); ?>"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"
            >Déconnexion</a>
          </li>
        </ul>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo e(csrf_field()); ?>

        </form>
      </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="blog" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<?php echo $__env->yieldContent('main-left'); ?>


				<!-- Aside -->
				<aside id="aside" class="col-md-3">

					<!-- Search -->
					<div class="widget">
						<div class="widget-search">
							<input class="search-input" type="text" placeholder="search">
							<button class="search-btn" type="button"><i class="fa fa-search"></i></button>
						</div>
					</div>
					<!-- /Search -->

					<!-- Category -->
					<div class="widget">
						<h3 class="title">Category</h3>
						<div class="widget-category">
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a href="/category/<?php echo e($categorie->id); ?>"><?php echo e($categorie->name); ?><span>(<?php echo e($categorie->courses()->count()); ?>)</span></a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
					<!-- /Category -->

					<!-- Posts sidebar -->
					<div class="widget">
						<h3 class="title">Cours Populaires</h3>
            <div class="widget-category">
              <?php $__currentLoopData = $coursp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a href="/course/<?php echo e(($cour->id)); ?>"><?php echo e($cour->title); ?></a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
					<!-- /Posts sidebar -->


				</aside>
				<!-- /Aside -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>