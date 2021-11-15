@extends('layout.master')

@section('contenu')


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Modification l'utilisateur login: {{$user->login}}, {{$user->nom}} {{$user->prenom}}</h3>
		</div>

		<div class="panel-body">

			<form role ="form" action="{{route('modificationUserAdmin', ['user_id'=>$user->id])}}" method= "POST">
				
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


					<!-- <div class="form-group">
						<label>Si vous etes inscrit en tant qu'un(e) étudiant(e), veuillez remplir par une formation_id</label>
						<input type="text" class="form-control" name="formation_id">
					</div> -->

					<div>
						<label for="formation">Modifier une formation si necessaire:</label>

						<select id="formation" name="formation_id">
							<option value="">
								<td>NULL</td>
							</option>	

    						@foreach ($formation as $formation)
    							<option value="{{$formation->id}}">
									<td>{{$formation -> intitule}}</td>
								</option>
							@endforeach
   							
						</select>
					</div>

					<div>
						<label for="type">Modifier un type:*</label>
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


 					
				
					<button type="submit" class="btn btn-primary pull-right">Modifier
					</button>
				@csrf
				</form>

		</div>
	</div>
</div>

	@if ($errors->any())
		<div class="error">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

@endsection