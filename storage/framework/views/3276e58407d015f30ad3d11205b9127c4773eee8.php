<?php $__env->startSection('contenu'); ?>
	<?php if(auth()->guard()->check()): ?>
		<h3>Bonjour <?php echo e(Auth::user()->login); ?></h3>
		<h3>Vous vous etes inscrit en tant que Etudiant</h3>
	<?php endif; ?>

	<?php if(auth()->guard()->check()): ?>
		<h2><a href="<?php echo e(route('logout')); ?>">Se deconnecter</a></h2>
	<?php endif; ?>

	<?php if(auth()->guard()->check()): ?>
		<h5><a href="<?php echo e(route('listeTousCours')); ?>">Liste tous les cours dans votre formation</a></h5>
		<h5><a href="<?php echo e(route('listeCoursInscrit')); ?>">Liste des cours auxquels je me suis inscrit</a></h5>
		<h5><a href="<?php echo e(route('inscriptionCoursEtuForm')); ?>">Inscrire au cours</a></h5>
		<h5><a href="<?php echo e(route('planningEtuIntegral')); ?>">Lister cours intégrale</a></h5>
		
	<?php endif; ?>

	<?php if(auth()->guard()->check()): ?>
		<h2><a href="<?php echo e(route('homeEtudiant')); ?>">Retourner</a></h2>
	<?php endif; ?>


	<?php if( session()->has('etat')): ?>
		<h1><p class="etat"><?php echo e(session()->get('etat')); ?></p></h1>
	<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/home/Etudiant/home.blade.php ENDPATH**/ ?>