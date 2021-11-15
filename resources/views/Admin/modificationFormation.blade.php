@extends('layout.master')

@section('contenu')


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Modification la formation {{$formation->intitule}}</h3>
		</div>

		<div class="panel-body">

			<form action="{{route('modificationFormationAdmin', ['id_formation'=>$formation->id])}}" method= "post">

				<div class="form-group">
                    <label for="intitule">Nouveau Intitule</label>
                    <input type="text" name="intitule" placeholder="Donner un nouveau nom pour la formation" class="form-control" value="">
                </div>
				<input type="submit" value="Mettre à jours">
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