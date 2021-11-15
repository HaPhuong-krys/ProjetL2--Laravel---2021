<?php $__env->startSection('contenu'); ?>

    <!-- <h3 align="center">Recherche un cours</h3><br />    -->
    <div class="form-group"align="center">
    	<div class="header-search">
           <form  method="get" action="<?php echo e(route('rechercheCours')); ?>">
           		<!-- <input type="text" name="cours_intitule" class="form-control m-input" placeholder="Indiquer le nom du cours que vous recherchez" />
           		<input type="submit" value="recherche" /> 
           		<?php echo csrf_field(); ?> -->
           		<div class="form-group">
                    <label for="cours_intitule">Recherche (question 4.2.2)</label>
                    <input type="text" name="cours_intitule" placeholder="Indiquer le nom du cours que vous recherchez" class="form-control" value="">
              </div>
              
				      <input type="submit" value="recherche">
				<?php echo csrf_field(); ?>
           </form>
       </div>
   </div>



<!-- <div align="center">
            <form action="search.php" method="get">
                Search: <input type="text" name="search" />
                <input type="submit" name="ok" value="search" />
            </form>
   </div> -->


<table border="2">
		<tr>
    		<th colspan="6">Liste des cours</th>
		</tr>
	<tr>
		<td>ID cours</td>
		<td>Intitule</td>
    <td>Modification d'un cours</td>
    <td>Suppression d'un cours</td>
	</tr>	
		<div id=content>
        	<div class="block-center">
				<?php $__currentLoopData = $cours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($cours -> id); ?></td> 
						<td><?php echo e($cours -> intitule); ?></td> 
            <td><a href="<?php echo e(route('modificationCoursFormAdmin', ['id_cours'=>$cours->id])); ?>">Modifier</a></td>
            <td><a href="<?php echo e(route('suppressionCoursAdmin', ['id_cours'=>$cours->id])); ?>">Supprimer</a></td>  
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
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/Admin/listeCours.blade.php ENDPATH**/ ?>