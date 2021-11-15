@extends('layout.master')

@section('contenu')


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Créer une formation</h3>
		</div>

		<div class="panel-body">

			<form action="{{route('ajouteFormation')}}" method= "post">

				<div class="form-group">
                    <label for="intitule">Intitule</label>
                    <input type="text" name="intitule" placeholder="Nom de la formation" class="form-control" value="">
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