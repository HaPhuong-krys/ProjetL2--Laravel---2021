<?php $__env->startSection('contenu'); ?>

<div class="form-group"align="center">
    	<div class="header-search">
           <form  method="get" action="<?php echo e(route('rechercheCoursEtudiant')); ?>">
           		<!-- <input type="text" name="cours_intitule" class="form-control m-input" placeholder="Indiquer le nom du cours que vous recherchez" />
           		<input type="submit" value="recherche" /> 
           		<?php echo csrf_field(); ?> -->
           		<div class="form-group">
                    <label for="cours_intitule">Recherche (question 1.2.4)</label>
                    <input type="text" name="cours_intitule" placeholder="Indiquer le nom du cours que vous voulez rechercher" class="form-control" value="">
                </div>
				<input type="submit" value="recherche">
				<?php echo csrf_field(); ?>
           </form>
       </div>
   </div>


<h1>Liste tous les cours dans votre formation.</h1>

<table border="2">
		<tr>
    		<th colspan="6">Liste tous les cours dans votre formation</th>
		</tr>
	<tr>
		<td>ID cours</td>
		<td>Intitule</td>
	
	</tr>	
		<div id=content>
        	<div class="block-center">
				<?php $__currentLoopData = $cours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($cours -> id); ?></td> 
						<td><?php echo e($cours -> intitule); ?></td> 
							
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
</table>

<?php if(auth()->guard()->check()): ?>
		<a href="<?php echo e(route('homeEtudiant')); ?>">Retourner</a>
<?php endif; ?>


<?php if( session()->has('etat')): ?>
		<h1><p class="etat"><?php echo e(session()->get('etat')); ?></p></h1>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Etudiant/listeTousCours.blade.php ENDPATH**/ ?>