<?php $__env->startSection('contenu'); ?>


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
            <h3>Vous pouvez choisir des type entre:</h3>
            <h2> "admin", "etudiant", "professeur" </h2>
         
            <h4>Veuillez donner des utilisateur ci-dessus un type pour qu'ils puissaient s'inscrire</h4>
            <h4>Si la formation si dessus est remplie avec une formtion_id, il s'agit une étudiant, veuiller donner la type "etudiant"</h4>
			<h5 class="panel-title">CHANGER TYPE DES UTILISATEUR</h5>
		</div>

		<div class="panel-body">
			<form action="<?php echo e(route('changeType',['id'=>$users->id])); ?>" method= "post">
                <div class="form-group">
                    <label for="nouveau_type">DONNER UN TYPE POUR UTILISATEUR</label>
                    <input type="text" name="nouveau_type" placeholder="nouveau_type" class="form-control" value="">
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Admin/changeTypeForm.blade.php ENDPATH**/ ?>