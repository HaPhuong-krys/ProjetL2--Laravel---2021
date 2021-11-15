<?php $__env->startSection('contenu'); ?>
<h1>Inscription au cours </h1>

<table border="2">
		<tr>
    		<th colspan="6">Liste des cours dans votre formation (avec les cours hors de votre formation, vous ne pouvez pas voir ni faire l'inscription)</th>
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
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
</table>

<div class="panel-body">
	<div class="">
		<form role ="form" action="#" method= "POST">
				
			<div class="form-group">
				<label for="id">ID du cours</label>
				<input type="text" name="id" class="form-control" value="">
			</div>

			<div class="form-group">
				<label for="intitule">Nom du cours</label>
					<input type="text" name="intitule" class="form-control" value="">
			</div>

			<button type="submit" class="btn btn-primary pull-right">Inscrire
			</button>
			<?php echo csrf_field(); ?>
		</form>
	</div>
</div>



	<?php if( session()->has('etat')): ?>
		<p class="etat"><?php echo e(session()->get('etat')); ?></p>
	<?php endif; ?>

	<?php if(auth()->guard()->check()): ?>
		<a href="<?php echo e(route('homeEtudiant')); ?>">Retourner</a>
	<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Etudiant/inscriptionCoursForm.blade.php ENDPATH**/ ?>