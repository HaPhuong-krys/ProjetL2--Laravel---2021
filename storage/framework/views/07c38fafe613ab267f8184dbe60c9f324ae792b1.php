<?php $__env->startSection('contenu'); ?>
<h1>Planning du cours <?php echo e($coursPrecise->intitule); ?></h1>

<table border="2">
		<tr>
    		<th colspan="6">Liste de planning d'un cours <?php echo e($coursPrecise->intitule); ?> </th>
		</tr>
	<tr>
		<td>ID planning</td>			
		<td>INTITULE DU COURS</td>	
		<td>Date Debut</td>
		<td>Date Fin</td>		
	</tr>	
		<div id=content>
        	<div class="block-center">
				<?php $__currentLoopData = $planning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planning): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($planning->id); ?></td>	
						<td><?php echo e($planning->intitule); ?></td>
						<td><?php echo e($planning->date_debut); ?></td>
						<td><?php echo e($planning->date_fin); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
</table>

<?php if(auth()->guard()->check()): ?>
		<a href="<?php echo e(route('homeProf')); ?>">Retourner</a>
<?php endif; ?>


<?php if( session()->has('etat')): ?>
		<h1><p class="etat"><?php echo e(session()->get('etat')); ?></p></h1>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Prof/listePlanningCours.blade.php ENDPATH**/ ?>