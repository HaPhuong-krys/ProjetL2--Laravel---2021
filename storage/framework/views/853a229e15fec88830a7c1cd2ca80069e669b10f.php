<?php $__env->startSection('contenu'); ?>

	<h2>Vous n'etes pas responsable d'aucun cours</h2>

	<?php if(auth()->guard()->check()): ?>
		<a href="<?php echo e(route('homeProf')); ?>">Retourner</a>
	<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Prof/nonResponsable.blade.php ENDPATH**/ ?>