@extends('layout.master')

@section('contenu')

	<table border="2">
		<tr>
    		<th colspan="2">Liste des cours concernant par votre recherche (1.2.4)</th>
		</tr>
	<tr>
		<td>ID cours</td>
		<td>Intitule</td>
	</tr>	
		<div id=content>
        	<div class="block-center">
				@foreach($cours as $cours)
					<tr>
						<td>{{$cours -> id}}</td> 
						<td>{{$cours -> intitule}}</td>
					</tr>
				@endforeach
			</div>
		</div>
</table>

@if( session()->has('etat'))
		<p class="etat">{{session()->get('etat')}}</p>
@endif


@auth
		<a href="{{route('homeEtudiant')}}">Retourner</a>
@endauth

@endsection