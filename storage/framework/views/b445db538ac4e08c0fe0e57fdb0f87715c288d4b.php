<?php $__env->startSection('contenu'); ?>
	<?php if(auth()->guard()->check()): ?>
		<h4>Bonjour <?php echo e(Auth::user()->login); ?></h4>
		<h4>Vous vous etes inscrit en tant que Admin</h4>
	<?php endif; ?>

	<?php if(auth()->guard()->check()): ?>
		<h2><a href="<?php echo e(route('logout')); ?>">Se deconnecter</a></h2>
	<?php endif; ?>
	

	<?php if(auth()->guard()->check()): ?>	
		<h5><a href="<?php echo e(route('listeUserNull')); ?>">Validation des utilisateurs</a></h5>

		<h5><a href="<?php echo e(route('creationCoursForm')); ?>">Créer un cours</a></h5>
		<h5><a href="<?php echo e(route('listeCoursAdmin')); ?>">Lister cours</a></h5>

		<h5><a href="<?php echo e(route('ajouteFormation')); ?>">Créer une formation</a></h5>
		<h5><a href="<?php echo e(route('listeFormation')); ?>">Lister formation</a></h5>

		<h5><a href="<?php echo e(route('creationUserFormAdmin')); ?>">Creation un utilisateur</a></h5>
		<h5><a href="<?php echo e(route('listeUser')); ?>">Lister tous les utilisateurs (question4.1.1.1) (pour 4.1.5 et 4.1.6)</a></h5>

		<h5><a href="<?php echo e(route('listeProf')); ?>">Associer un prof à un cours (QUESTION 4.1.3 et 4.2.6)</a></h5>
		
	<?php endif; ?>

	<?php if(auth()->guard()->check()): ?>
		<h2><a href="<?php echo e(route('homeAdmin')); ?>">Retourner</a></h2>
	<?php endif; ?>


	<?php if( session()->has('etat')): ?>
		<h2><p class="etat"><?php echo e(session()->get('etat')); ?></p></h2>
	<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/home/Admin/home.blade.php ENDPATH**/ ?>