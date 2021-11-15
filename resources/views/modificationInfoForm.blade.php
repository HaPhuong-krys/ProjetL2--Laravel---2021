@extends('layout.master')

@section('contenu')


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Modification de votre information</h3>
		</div>

		<div class="panel-body">

			<form action="{{route('modification')}}" method= "post">

				<div class="form-group">
                    <label for="ancien_mdp">Nom</label>
                    <input type="text" name="nom" placeholder="Entree un nouveau nom" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input type="type" name="prenom" placeholder="Entree un nouveau prenom" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="login">Nouveau login</label>
                    <input type="text" name="login" placeholder="Entree un nouveau login" class="form-control" value="">
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