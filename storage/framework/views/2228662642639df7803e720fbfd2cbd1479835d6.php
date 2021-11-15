<?php $__env->startSection('contenu'); ?>
<h2>Affichage des séances par semaine (2.2.3)</h2>

<form  method="get" action="<?php echo e(route('planningProfSemaine')); ?>">
	<div>

		<label>Affichage des séances par semaine et des annnées (2.2.3)</label>
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


<h1>Planning des tous les cours.</h1>

<table border="2">
		<tr>
    		<th colspan="8">Liste de planning de tous les cours</th>
		</tr>
	<tr>
		<td>ID Planning </td>
		<td>ID Cours</td>
		<td>INTITULE</td>	
		<td>Date Debut</td>
		<td>Date Fin</td>
		<td>METTRE À JOUR VOTRE SÉANCE</td>	
		<td>SUPPRESSION</td>
		<td>Affichage du planning personnalisé par cours (2.2.2)</td>					
		
	</tr>	
		<div id=content>
        	<div class="block-center">
				<?php $__currentLoopData = $planning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planning): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($planning -> id); ?></td> 
						<td><?php echo e($planning -> cours_id); ?></td> 
						<td><?php echo e($planning -> intitule); ?></td>
						<td><?php echo e($planning -> date_debut); ?></td>
						<td><?php echo e($planning -> date_fin); ?></td>
						<td><a href="<?php echo e(route('misAjourForm', ['id_planning'=>$planning->id])); ?>">METTRE À JOUR VOTRE SÉANCE</a></td>
						<td><a href="<?php echo e(route('suppressionSeance', ['id_planning'=>$planning->id])); ?>">SUPPRIMER</a></td>		
						<td><a href="<?php echo e(route('planningProfCours', ['id_cours'=>$planning->cours_id])); ?>">Afficher</a></td>
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Prof/listePlanningIntegral.blade.php ENDPATH**/ ?>