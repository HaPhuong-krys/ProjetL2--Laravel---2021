<?php $__env->startSection('contenu'); ?>
	
<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Page de connexion</h3>
		</div>

		<div class="panel-body">
			<div class="">
				<form role ="form" action="<?php echo e(route('login')); ?>" method= "POST">

					<div class="form-group">
						<label for="login">Login:</label>
						<input type="text" name="login" class="form-control" value="<?php echo e(old('login')); ?>">
					</div>

					<div class="form-group">
						<label for="mdp">Mot de pass:</label>
						<input type="password" name="mdp" class="form-control" value="">
					</div>

				
					<button type="submit" class="btn btn-primary pull-right">Se connecter </button>
				<?php echo csrf_field(); ?>
				</form>
			</div>
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/home/loginForm.blade.php ENDPATH**/ ?>