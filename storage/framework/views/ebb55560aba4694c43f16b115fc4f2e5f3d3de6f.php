<!DOCTYPE html>
<html>
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<title>Page d'inscription</title>	
     <!-- File Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> 
   
</head>


<body>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-md-offset-4 col-md-4">
			<h2>Page d'inscription</h2>
			<form role ="form" action="#" method= "POST">

				<div class="form-group">
					<label for="login">Nom:</label>
					<input type="text" name="nom" class="form-control" value="">
				</div>

				<div class="form-group">
					<label for="login">Prenom:</label>
					<input type="text" name="prenom" class="form-control" value="">
				</div>

				<div class="form-group">
					<label for="login">Login:</label>
					<input type="text" name="login" class="form-control" value="">
				</div>

				<div class="form-group">
					<label for="mdp">MOt de pass:</label>
					<input type="password" name="mdp" class="form-control" value="">
				</div>

				<div class="form-group">
					<label>Confirmer votre mot de pass</label>
					<input type="password" class="form-control" name="mdp_confirmation">
				</div>
				
				<button>
					<input type="submit" value="Registrer">
				</button>
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


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/inscriptionForm.blade.php ENDPATH**/ ?>