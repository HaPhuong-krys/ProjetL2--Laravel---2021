@extends('layout.master')

@section('contenu')
	
<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Page de connexion</h3>
		</div>

		<div class="panel-body">
			<div class="">
				<form role ="form" action="{{route('login')}}" method= "POST">

					<div class="form-group">
						<label for="login">Login:</label>
						<input type="text" name="login" class="form-control" value="{{old('login')}}">
					</div>

					<div class="form-group">
						<label for="mdp">Mot de pass:</label>
						<input type="password" name="mdp" class="form-control" value="">
					</div>

				
					<button type="submit" class="btn btn-primary pull-right">Se connecter </button>
				@csrf
				</form>
			</div>
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