<?php $__env->startSection('css'); ?>
 <link rel="stylesheet" href="<?php echo e(asset('css/error.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="erreur-cont">
	<div class="flex-cont">
		<h2><?php echo e($e->msg); ?></h2>

		<p><?php echo e($e->descp); ?></p>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>