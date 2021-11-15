<?php $__env->startSection('contenu'); ?>


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Modification de votre information</h3>
		</div>

		<div class="panel-body">

			<form action="<?php echo e(route('modification')); ?>" method= "post">

				<div class="form-group">
                    <label for="ancien_mdp">Nom</label>
                    <input type="text" name="nom" placeholder="Entree un nouveau nom" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input type="type" name="prenom" placeholder="Entree un nouveau prenom" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="login">Nouveau login</label>
                    <input type="text" name="login" placeholder="Entree un nouveau login" class="form-control" value="">
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/modificationInfoForm.blade.php ENDPATH**/ ?>