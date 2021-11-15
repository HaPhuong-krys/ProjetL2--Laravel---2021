<?php $__env->startSection('contenu'); ?>

<h2>Affichage des séances par semaine (1.3.3)</h2>

<form  method="get" action="<?php echo e(route('planningEtuSemaine')); ?>">
	<div>

		<label>Affichage des séances par semaine et des annnées (1.3.3)</label>
			<div class="xtlab-ctmenu-item">
				<select name="semaine">
    				<?php for($semaine = 1; $semaine <= 40; $semaine++): ?>
    					<option value="<?php echo e($semaine); ?>">
							<td>Semaine : <?php echo e($semaine); ?></td>
						</option>
					<?php endfor; ?>
   							
				</select>
			
				<select name="year">	
					<?php for($year = 2005; $year <= 2030; $year++): ?>
						<option value="<?php echo e($year); ?>">
							<td>Année scolaire : <?php echo e($year); ?></td>
						</option>
					<?php endfor; ?>
				</select>
			</div>
			
	</div>
	<input type="submit" value="recherche">
	<?php echo csrf_field(); ?>
</form>



<h1>Planning des tous les cours auquels je me suis inscrit(e)s. (1.3.1)</h1>

<table border="2">
		<tr>
    		<th colspan="6">Liste des plannings de tous les cours</th>
		</tr>
	<tr>
		<td>ID Planning </td>
		<td>Intitule</td>
		<td>Date Debut</td>
		<td>Date Fin</td>				
		
	</tr>	
		<div id=content>
        	<div class="block-center">
				<?php $__currentLoopData = $cours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($cours -> id); ?></td> 
						<td><?php echo e($cours -> intitule); ?></td> 
						<td><?php echo e($cours -> date_debut); ?></td>
						<td><?php echo e($cours -> date_fin); ?></td>

					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
</table>

<?php if(auth()->guard()->check()): ?>
		<a href="<?php echo e(route('homeEtudiant')); ?>">Retourner</a>
<?php endif; ?>


<?php if( session()->has('etat')): ?>
		<h1><p class="etat"><?php echo e(session()->get('etat')); ?></p></h1>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Etudiant/listePlanningIntegral.blade.php ENDPATH**/ ?>