@extends('layout.master')

@section('contenu')


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Cration d'une séance</h3>
		</div>

		<div class="panel-body">

			<form action="{{route('creationSeance')}}" method= "post">

				<!-- <div class="form-group">
                    <label for="cours_id">ID DU COURS </label>
                    <input type="text" name="cours_id" placeholder="ID DU COURS" class="form-control" value="">
                </div>
 -->
                <div>
						<label for="">Choisir un cours</label>

						<select id="" name="cours_id">

    						@foreach ($cours as $cours)
    							<option value="{{$cours->id}}">
									<td>{{$cours -> intitule}}</td>
								</option>
							@endforeach
   							
						</select>
					</div>

                <div class="form-group">
                    <label for="date_debut">Choisir l'heure et jour début </label>
                    <input type="datetime-local" name="date_debut" placeholder="HEURE ET DATE DEBUT" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="date_fin">Choisir l'heure et jour fin </label>
                    <input type="datetime-local" name="date_fin" placeholder="HEURE ET DATE FIN" class="form-control" value="">
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