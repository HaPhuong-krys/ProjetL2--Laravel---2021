<?php $__env->startSection('contenu'); ?>
<table border="2">
		<tr>
    		<th colspan="6">Liste des cours</th>
		</tr>
	<tr>
		<td>ID formation</td>
		<td>Intitule</td>
		<td>Modification d'une formation</td>	
		<td>Suppression d'une formation</td>
		
	</tr>	
		<div id=content>
        	<div class="block-center">
				<?php $__currentLoopData = $formation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($formation -> id); ?></td> 
						<td><?php echo e($formation -> intitule); ?></td>
						<td><a href="<?php echo e(route('modificationFormationFormAdmin',['id_formation'=>$formation->id])); ?>">Modifier</a></td>	
						<td><a href="<?php echo e(route('suppressionFormationAdmin',['id_formation'=>$formation->id])); ?>">Supprimer</a></td>
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Admin/listeFormation.blade.php ENDPATH**/ ?>