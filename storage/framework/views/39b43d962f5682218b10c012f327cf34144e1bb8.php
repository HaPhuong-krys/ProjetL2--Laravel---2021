<?php $__env->startSection('contenu'); ?>
<h1>Liste des cours auxquels vous vous etes inscrit.</h1>

<table border="2">
		<tr>
    		<th colspan="6">Liste des cours inscrit(e).s</th>
		</tr>
	<tr>
		<td>ID cours</td>
		<td>Intitule</td>
		<td>Option</td>
		<td>Affichage du planning personnalisé par cours (1.3.2)</td>	
	</tr>	
		<div id=content>
        	<div class="block-center">
				<?php $__currentLoopData = $cours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($cours -> id); ?></td> 
						<td><?php echo e($cours -> intitule); ?></td> 
						<td><a href="<?php echo e(route('desinscriptionCours',['cours_id'=>$cours->id])); ?>">Désinscrire votre cours</a></td>
						<td><a href="<?php echo e(route('planningEtuCours', ['id_cours'=>$cours->id])); ?>">Afficher planning du cours</a></td>
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Etudiant/listeCoursInscrit.blade.php ENDPATH**/ ?>