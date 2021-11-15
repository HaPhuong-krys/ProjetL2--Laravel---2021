@extends('layout.master')

@section('contenu')


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Modification d'in cours</h3>
		</div>

		<div class="panel-body">

			<form action="{{route('modificationCoursAdmin', ['id_cours'=>$cours->id])}}" method= "post">

				<div class="form-group">
                    <label for="ancien_intitule">Intitule</label>
                    <input type="text" name="intitule" placeholder="Nom du cours" class="form-control" value="">
                </div>

                <div class="form-group">
                    <!-- <label for="id">ID du responsable du cours </label>
                    <input type="text" name="id" placeholder="ID du cresponsable" class="form-control" value=""> -->
                    <label for="id">Veuillez choisir un responsable du cours</label>

						<select id="pet-select" name="id">
    						@foreach ($user as $user)
    							<option value="{{$user->id}}">
									<td>{{$user -> login}}</td>
								</option>
							@endforeach
   							
						</select>
                </div>

                <div class="form-group">
                    <!-- <label for="idFormation">ID de la formation à laquelle ce cours appartien  </label>
                    <input type="text" name="idFormation" placeholder="ID de la foramtion " class="form-control" value=""> -->
                    <label for="idFormation">Veuillez choisir une formation à laquelle ce cours appartient</label>

						<select id="pet-select" name="idFormation">
    						@foreach ($formation as $formation)
    							<option value="{{$formation->id}}">
									<td>{{$formation -> intitule}}</td>
								</option>
							@endforeach
   							
						</select>
                </div>
				<input type="submit" value="Creer">
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