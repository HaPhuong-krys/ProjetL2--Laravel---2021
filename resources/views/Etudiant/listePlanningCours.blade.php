@extends('layout.master')

@section('contenu')
<h1>Planning précise du cours {{$coursPrecise->intitule}}.</h1>

<table border="2">
		<tr>
    		<th colspan="6">Liste des cours</th>
		</tr>
	<tr>
		<td>ID Planning </td>
		<td>Intitule</td>
		<td>Date Debut</td>
		<td>Date Fin</td>				
		
	</tr>	
		<div id=content>
        	<div class="block-center">
				@foreach ($cours as $cours)
					<tr>
						<td>{{$cours -> id}}</td> 
						<td>{{$cours -> intitule}}</td> 
						<td>{{$cours -> date_debut}}</td>
						<td>{{$cours -> date_fin}}</td>

					</tr>
				@endforeach
			</div>
		</div>
</table>

@auth
		<a href="{{route('homeEtudiant')}}">Retourner</a>
@endauth


@if( session()->has('etat'))
		<h1><p class="etat">{{session()->get('etat')}}</p></h1>
@endif
@endsection