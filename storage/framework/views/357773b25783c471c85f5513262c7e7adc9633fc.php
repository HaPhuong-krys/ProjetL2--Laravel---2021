<?php $__env->startSection('contenu'); ?>

	<?php if(auth()->guard()->check()): ?>
		<h3>Bonjour <?php echo e(Auth::user()->login); ?></h3>
		<h3>Vous vous etes inscrit en tant que Professeur</h3>
	<?php endif; ?>

	<?php if(auth()->guard()->check()): ?>
		<h2><a href="<?php echo e(route('logout')); ?>">Se deconnecter</a></h2>
	<?php endif; ?>

	<?php if(auth()->guard()->check()): ?>
		<h5><a href="<?php echo e(route('listeCoursRespo')); ?>">Liste cours je suis responsable (2.1)</a></h5>
		<h5><a href="<?php echo e(route('planningProfIntegral')); ?>">Liste planning de tous les cours (afficher tous les cours meme les cours on est pas reponsable, pour comparer avec 2.2.1)</a></h5>
		<h5><a href="<?php echo e(route('planningProfIntegralRespo')); ?>">Liste planning des cours dont on est resposable (2.2.1)</a></h5>	



		<h5><a href="<?php echo e(route('creationSeanceForm')); ?>">Création d'un séance</a></h5>
	<?php endif; ?>

	<?php if(auth()->guard()->check()): ?>
		<h2><a href="<?php echo e(route('homeProf')); ?>">Retourner</a></h2>
	<?php endif; ?>

	<?php if( session()->has('etat')): ?>
		<h2><p class="etat"><?php echo e(session()->get('etat')); ?></p></h2>
	<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/home/Prof/home.blade.php ENDPATH**/ ?>