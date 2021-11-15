<?php $__env->startSection('contenu'); ?>
<table border="2">
		<tr>
    		<th colspan="6">Liste des cours</th>
		</tr>
	<tr>
		<td>ID cours</td>
		<td>Intitule</td>
	</tr>	
		<div id=content>
        	<div class="block-center">

				<?php $__currentLoopData = $cours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($cours -> id); ?></td> 
						<td><?php echo e($cours -> intitule); ?></td> 
						<td><a href="<?php echo e(route('associerDefCours', ['id' => $prof->id, 'id_cours' =>$cours->id])); ?>">Associer avec ce cours</a></td>
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Admin/listeCoursAssocier.blade.php ENDPATH**/ ?>