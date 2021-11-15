<?php $__env->startSection('contenu'); ?>


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Modification la formation <?php echo e($formation->intitule); ?></h3>
		</div>

		<div class="panel-body">

			<form action="<?php echo e(route('modificationFormationAdmin', ['id_formation'=>$formation->id])); ?>" method= "post">

				<div class="form-group">
                    <label for="intitule">Nouveau Intitule</label>
                    <input type="text" name="intitule" placeholder="Donner un nouveau nom pour la formation" class="form-control" value="">
                </div>
				<input type="submit" value="Mettre à jours">
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Admin/modificationFormation.blade.php ENDPATH**/ ?>