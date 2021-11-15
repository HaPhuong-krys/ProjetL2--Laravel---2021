<?php $__env->startSection('contenu'); ?>


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Créer un cours</h3>
		</div>

		<div class="panel-body">

			<form action="<?php echo e(route('creationCours')); ?>" method= "post">

				<div class="form-group">
                    <label for="ancien_intitule">Intitule</label>
                    <input type="text" name="intitule" placeholder="Nom du cours" class="form-control" value="">
                </div>

                <div class="form-group">
                    <!-- <label for="id">ID du responsable du cours </label>
                    <input type="text" name="id" placeholder="ID du cresponsable" class="form-control" value=""> -->
                    <label for="id">Veuillez choisir un responsable du cours</label>

						<select id="pet-select" name="id">
    						<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    							<option value="<?php echo e($user->id); ?>">
									<td><?php echo e($user -> login); ?></td>
								</option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   							
						</select>
                </div>

                <div class="form-group">
                    <!-- <label for="idFormation">ID de la formation à laquelle ce cours appartien  </label>
                    <input type="text" name="idFormation" placeholder="ID de la foramtion " class="form-control" value=""> -->
                    <label for="idFormation">Veuillez choisir une formation à laquelle ce cours appartient</label>

						<select id="pet-select" name="idFormation">
    						<?php $__currentLoopData = $formation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    							<option value="<?php echo e($formation->id); ?>">
									<td><?php echo e($formation -> intitule); ?></td>
								</option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   							
						</select>
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Admin/creationCoursForm.blade.php ENDPATH**/ ?>