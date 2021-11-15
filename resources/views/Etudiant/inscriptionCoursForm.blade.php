@extends('layout.master')

@section('contenu')
<h1>Inscription au cours </h1>

<table border="2">
		<tr>
    		<th colspan="6">Liste des cours dans votre formation (avec les cours hors de votre formation, vous ne pouvez pas voir ni faire l'inscription)</th>
		</tr>
	<tr>
		<td>ID cours</td>
		<td>Intitule</td>
	</tr>	
		<div id=content>
        	<div class="block-center">

				@foreach ($cours as $cours)
					<tr>
						<td>{{$cours -> id}}</td> 
						<td>{{$cours -> intitule}}</td>  
					</tr>
				@endforeach
			</div>
		</div>
</table>

<div class="panel-body">
	<div class="">
		<form role ="form" action="#" method= "POST">
				
			<div class="form-group">
				<label for="id">ID du cours</label>
				<input type="text" name="id" class="form-control" value="">
			</div>

			<div class="form-group">
				<label for="intitule">Nom du cours</label>
					<input type="text" name="intitule" class="form-control" value="">
			</div>

			<button type="submit" class="btn btn-primary pull-right">Inscrire
			</button>
			@csrf
		</form>
	</div>
</div>



	@if( session()->has('etat'))
		<p class="etat">{{session()->get('etat')}}</p>
	@endif

	@auth
		<a href="{{route('homeEtudiant')}}">Retourner</a>
	@endauth

@endsection