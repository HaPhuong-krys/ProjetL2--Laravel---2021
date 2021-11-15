@extends('layout.master')

@section('contenu')


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Mettre à jour votre séance</h3>
		</div>

		<div class="panel-body">

			<form action="{{route('misAjour',['id_planning'=>$planning->id])}}" method= "post">

				<div class="form-group">
                    <label for="cours_id">ID DU COURS </label>
                    <input type="text" name="cours_id" placeholder="ID DU COURS" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="date_debut">Choisir l'heure et jour début </label>
                    <input type="datetime-local" name="date_debut" placeholder="HEURE ET DATE DEBUT" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="date_fin">Choisir l'heure et jour fin </label>
                    <input type="datetime-local" name="date_fin" placeholder="HEURE ET DATE FIN" class="form-control" value="">
                </div>

       			<input type="submit" value="Modifier">
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