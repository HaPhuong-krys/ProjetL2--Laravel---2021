<?php $__env->startSection('contenu'); ?>


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Créer un cours</h3>
		</div>

		<div class="panel-body">

			<form action="<?php echo e(route('creationCours')); ?>" method= "post">

				<div class="form-group">
                    <label for="ancien_mdp">Intitule</label>
                    <input type="text" name="intitule" placeholder="Nom du cours" class="form-control" value="">
                </div>
				<input type="submit" value="Creer">
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/creationCoursForm.blade.php ENDPATH**/ ?>