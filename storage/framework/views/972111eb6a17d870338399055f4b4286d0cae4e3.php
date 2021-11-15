<?php $__env->startSection('contenu'); ?>


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Mettre à jour votre séance</h3>
		</div>

		<div class="panel-body">

			<form action="<?php echo e(route('misAjour',['id_planning'=>$planning->id])); ?>" method= "post">

				<div class="form-group">
                    <label for="cours_id">ID DU COURS </label>
                    <input type="text" name="cours_id" placeholder="ID DU COURS" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="date_debut">Choisir l'heure et jour début </label>
                    <input type="datetime-local" name="date_debut" placeholder="HEURE ET DATE DEBUT" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="date_fin">Choisir l'heure et jour fin </label>
                    <input type="datetime-local" name="date_fin" placeholder="HEURE ET DATE FIN" class="form-control" value="">
                </div>

       			<input type="submit" value="Modifier">
				<?php echo csrf_field(); ?>
			</form>

		</div>
	</div>
</div>

	<?php if($errors->any()): ?>
		<div class="error">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
	<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Prof/misAjourSeanceForm.blade.php ENDPATH**/ ?>