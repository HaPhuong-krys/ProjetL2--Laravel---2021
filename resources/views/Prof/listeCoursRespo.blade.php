@extends('layout.master')

@section('contenu')
<table border="2">
	<h2>Les cours que le professeur est responsable</h2>		
		<tr>
    		<th colspan="6">Liste des cours auquels je suis responsable</th>
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

@if( session()->has('etat'))
		<p class="etat">{{session()->get('etat')}}</p>
@endif

@auth
		<a href="{{route('homeProf')}}">Retourner</a>
@endauth

@endsection