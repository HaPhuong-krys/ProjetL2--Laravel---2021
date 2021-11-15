@extends('layout.master')

@section('contenu')
<table border="2">
		<tr>
    		<th colspan="6">Liste des cours</th>
		</tr>
	<tr>
		<td>ID formation</td>
		<td>Intitule</td>
		<td>Modification d'une formation</td>	
		<td>Suppression d'une formation</td>
		
	</tr>	
		<div id=content>
        	<div class="block-center">
				@foreach ($formation as $formation)
					<tr>
						<td>{{$formation -> id}}</td> 
						<td>{{$formation -> intitule}}</td>
						<td><a href="{{route('modificationFormationFormAdmin',['id_formation'=>$formation->id])}}">Modifier</a></td>	
						<td><a href="{{route('suppressionFormationAdmin',['id_formation'=>$formation->id])}}">Supprimer</a></td>
					</tr>
				@endforeach
			</div>
		</div>
</table>

@if( session()->has('etat'))
		<p class="etat">{{session()->get('etat')}}</p>
@endif

@auth
		<a href="{{route('homeAdmin')}}">Retourner</a>
@endauth

@endsection