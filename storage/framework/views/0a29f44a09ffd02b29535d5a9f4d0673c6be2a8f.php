<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default" role="naviagation">
			<div class="container-fluid">
				<div class="navbar-header">
					
					<a class="navbar-brand" href="#">Page d'acceuil</a>		
				</div>	

				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Votre compte <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo e(route('changeMDPForm')); ?>">Changement de votre mot de pass</a></li>
								<li><a href="<?php echo e(route('modificationForm')); ?>">Changement de votre information</a></li>
								<li><a href="#">Action3</a></li>
								<li><a href="#">Action4</a></li>
							</ul>
						</li>	 
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo e(route('inscriptionForm')); ?>"> S'inscrire</a></li>
						<li><a href="<?php echo e(route('loginForm')); ?>"> Se connecter</a></li>
						
					</ul>
				</div>
			</div>
		</nav>

		<div class="row">
			<div class="col-md-8">
				<?php echo $__env->yieldContent('contenu'); ?>
				
			</div>
		</div>

		<div>
			<?php if( session()->has('etat')): ?>
				<h1><p class="etat"><?php echo e(session()->get('etat')); ?></p></h1>
			<?php endif; ?>
		</div>

	</div>




<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html><?php /**PATH /home/haphuong/Documents/WEB/L2DOUBLE/projet/projetWeb/resources/views/layout/master.blade.php ENDPATH**/ ?>