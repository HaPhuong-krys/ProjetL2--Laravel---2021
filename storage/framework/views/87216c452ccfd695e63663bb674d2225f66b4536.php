<?php $__env->startSection('contenu'); ?>
	
<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Creation un utilisateur</h3>
		</div>

		<div class="panel-body">
			<div class="">
				<form role ="form" action="<?php echo e(route('creationUserAdmin')); ?>" method= "POST">
				
					<div class="form-group">
						<label for="login">Nom:*</label>
						<input type="text" name="nom" class="form-control" value="">
					</div>

					<div class="form-group">
						<label for="login">Prenom:*</label>
						<input type="text" name="prenom" class="form-control" value="">
					</div>

					<div class="form-group">
						<label for="login">Login:*</label>
						<input type="text" name="login" class="form-control" value="">
					</div>

					<div class="form-group">
						<label for="mdp">Mot de pass:*</label>
						<input type="password" name="mdp" class="form-control" value="">
					</div>

					<div class="form-group">
						<label>Confirmer votre mot de pass:*</label>
						<input type="password" class="form-control" name="mdp_confirmation">
					</div>

					<!-- <div class="form-group">
						<label>Si vous etes inscrit en tant qu'un(e) étudiant(e), veuillez remplir par une formation_id</label>
						<input type="text" class="form-control" name="formation_id">
					</div> -->

					<div>
						<label for="formation">Si un étudiant, il est nécessaire de lui donner une formation:</label>

						<select id="formation" name="formation_id">
							<option value="">
								<td>NULL</td>
							</option>	

    						<?php $__currentLoopData = $formation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    							<option value="<?php echo e($formation->id); ?>">
									<td><?php echo e($formation -> intitule); ?></td>
								</option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   							
						</select>
					</div>

					<div>
						<label for="type">Donner à l'utilisateur un type:*</label>
						<select id="type" name="type">
							<option value="admin">
								<td>admin</td>
							</option>

							<option value="professeur">
								<td>professeur</td>
							</option>	

							<option value="etudiant">
								<td>etudiant</td>
							</option>		

						</select>
					<div>
						
					</div>


 					
				
					<button type="submit" class="btn btn-primary pull-right">Créer
					</button>
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Admin/creationUserForm.blade.php ENDPATH**/ ?>