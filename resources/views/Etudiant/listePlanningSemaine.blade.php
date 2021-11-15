@extends('layout.master')

@section('contenu')
<h1>Planning des cours par semaine : {{$semaine}} en année : {{$year}}</h1>
<h3>La date entre {{$retOrdre['START']}} et {{$retOrdre['END']}} </h3>


<table border="2">
		<tr>
    		<th colspan="6">Liste de planning par semaine </th>
		</tr>
	<tr>
		<td>ID planning</td>			
		<td>INTITULE DU COURS</td>	
		<td>Date Debut</td>
		<td>Date Fin</td>		
	</tr>	
		<div id=content>
        	<div class="block-center">
				@foreach ($planning as $planning)
					<tr>
						<td>{{$planning->id}}</td>	
						<td>{{$planning->intitule}}</td>
						<td>{{$planning->date_debut}}</td>
						<td>{{$planning->date_fin}}</td>
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