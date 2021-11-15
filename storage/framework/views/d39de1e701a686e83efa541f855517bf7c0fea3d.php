<?php $__env->startSection('contenu'); ?>

<table border="2">
		<tr>
    		<th colspan="7">Liste des User ayant type NULL</th>
		</tr>
	<tr>
		<td>ID </td>
		<td>NOM</td>
		<td>PRENOM</td>
		<td>LOGIN</td>
		<td>FORMATION_ID</td>
		<td>CHANGEMENT</td>
		<td>REFUSER DEMANDE</td>		
	</tr>	
		<div id=content>
        	<div class="block-center">
				<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($user->id); ?></td> 
						<td><?php echo e($user->nom); ?></td> 
						<td><?php echo e($user->prenom); ?></td>
						<td><?php echo e($user->login); ?></td>
						<td><?php echo e($user->formation_id); ?></td>
						<td><a href="<?php echo e(route('changeTypeForm',['id'=>$user->id])); ?>">changer type</a></td>
						<td><a href="<?php echo e(route('refuseType', ['id'=>$user->id])); ?>">Supprime utilisateur/Refuse demande</a></td>

					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
</table>

<?php if( session()->has('etat')): ?>
		<p class="etat"><?php echo e(session()->get('etat')); ?></p>
<?php endif; ?>

<?php if(auth()->guard()->check()): ?>
		<a href="<?php echo e(route('homeAdmin')); ?>">Retourner</a>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Admin/listeUserNull.blade.php ENDPATH**/ ?>