<?php $__env->startSection('contenu'); ?>

	<table border="2">
		<tr>
    		<th colspan="4">Liste des cours concernant par votre recherche</th>
		</tr>
	<tr>
		<td>ID cours</td>
		<td>Intitule</td>
		<td>Modification d'un cours</td>
    	<td>Suppression d'un cours</td>
	</tr>	
		<div id=content>
        	<div class="block-center">
				<?php $__currentLoopData = $cours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($cours -> id); ?></td> 
						<td><?php echo e($cours -> intitule); ?></td>
						<td><a href="<?php echo e(route('modificationCoursFormAdmin', ['id_cours'=>$cours->id])); ?>">Modifier</a></td>
            			<td><a href="<?php echo e(route('suppressionCoursAdmin', ['id_cours'=>$cours->id])); ?>">Supprimer</a></td>  
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
</table>

<?php if( session()->has('etat')): ?>
		<p class="etat"><?php echo e(session()->get('etat')); ?></p>
<?php endif; ?>

<?php if(auth()->guard()->check()): ?>
		<a href="<?php echo e(route('homeAdmin')); ?>">Retourner</a>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Admin/rechercheIntitule.blade.php ENDPATH**/ ?>