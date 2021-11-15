<?php $__env->startSection('contenu'); ?>

<h1>Bienvenue sur note site d'inscription</h1>
<h3>Voici votre liste de formation, veuillez choisir votre formation en remplissant la formation_id dans la forme d'inscription</h3>
<h3>Si vous vous etes inscrite en tant qu'un(e) étudiant(e)</h3>
<h3>Si non vous n'écrivez rien</h3>


<table border="2">
		<tr>
    		<th colspan="6">Liste des cours</th>
		</tr>
	<tr>
		<td>ID formation</td>
		<td>Intitule</td>
		
	</tr>	
		<div id=content>
        	<div class="block-center">
				<?php $__currentLoopData = $formation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($formation -> id); ?></td> 
						<td><?php echo e($formation -> intitule); ?></td>
						
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
</table>

<?php if( session()->has('etat')): ?>
		<p class="etat"><?php echo e(session()->get('etat')); ?></p>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/layout/pageAccueil.blade.php ENDPATH**/ ?>