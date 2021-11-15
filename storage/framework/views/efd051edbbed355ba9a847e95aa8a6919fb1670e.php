<?php $__env->startSection('contenu'); ?>

<div class="container">
	<div class="form-group"align="center">
    	<div class="header-search">
           <form  method="get" action="<?php echo e(route('rechercheUser')); ?>">
           		<!-- <input type="text" name="cours_intitule" class="form-control m-input" placeholder="Indiquer le nom du cours que vous recherchez" />
           		<input type="submit" value="recherche" /> 
           		<?php echo csrf_field(); ?> -->
           		<div class="form-group">
                    <label for="user">Recherche par nom, prenom ou login (question 4.1.1.3)</label>
                    <input type="text" name="user" placeholder="Indiquer le nom , prenom ou login que vous recherchez" class="form-control" value="">
              	</div>
              
				      <input type="submit" value="recherche">
				<?php echo csrf_field(); ?>
           	</form>
       	</div>
   	</div>
   	
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">FILTRER PAR TYPE (4.1.1.2)<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo e(route('filtreAdmin')); ?>">ADMIN</a></li>
					<li><a href="<?php echo e(route('filtreProf')); ?>">PROFESSEUR</a></li>
					<li><a href="<?php echo e(route('filtreEtu')); ?>">ETUDIANT</a></li>
					
				</ul>
			</li>	 
		</ul>
	</div>


</div>


<table border="2">
		<tr>
    		<th colspan="8">Liste tous les utilisateurs</th>
		</tr>
	<tr>
		<td>ID </td>
		<td>Login</td>
		<td>Nom</td>
		<td>Prenom</td>	
		<td>Type</td>
		<td>Formation_id</td>
		<td>Modification des utilisateurs</td>
		<td>Suppressioni des utilisateurs</td>		
	</tr>	
		<div id=content>
        	<div class="block-center">
				<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($user -> id); ?></td> 
						<td><?php echo e($user -> login); ?></td> 
						<td><?php echo e($user -> nom); ?></td>
						<td><?php echo e($user -> prenom); ?></td>
						<td><?php echo e($user -> type); ?></td>
						<td><?php echo e($user -> formation_id); ?></td>
						<td><a href="<?php echo e(route('modificationUserFormAdmin',['user_id'=>$user->id])); ?>"> Modifier </a></td>
						<td><a href="<?php echo e(route('suppressionUserAdmin', ['user_id'=>$user->id])); ?>"> Supprimer</a></td>
						
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Admin/listeUser.blade.php ENDPATH**/ ?>