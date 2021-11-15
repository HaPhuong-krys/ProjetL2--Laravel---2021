<?php $__env->startSection('contenu'); ?>


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Page d'inscription</h3>
		</div>

		<div class="panel-body">
			<form action="<?php echo e(route('postChangeMDP')); ?>" method= "post">
                <div class="form-group">
                    <label for="ancien_mdp">Votre ancien mot de pass</label>
                    <input type="password" name="ancien_mdp" placeholder="ancien mot de pass" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="ancien_mdp">Entrez nouveau mot de pass</label>
                    <input type="password" name="nouveau_mdp" placeholder="nouveau mot de pass" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="confirm_mdp">Votre ancien mot de pass</label>
                    <input type="password" name="confirm_mdp" placeholder="confirmation votre mot de pass" class="form-control" value="">
                </div>

                 <input type="submit" value="Modifier">

            	<?php echo csrf_field(); ?>
            </form>

            <?php if($errors->any()): ?>
            <div class="error">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

		</div>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/changeMDPForm.blade.php ENDPATH**/ ?>