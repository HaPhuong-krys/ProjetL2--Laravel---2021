@extends('layout.master')

@section('contenu')

	<table border="2">
		<tr>
    		<th colspan="4">Liste des cours concernant par votre recherche</th>
		</tr>
	<tr>
		<td>ID cours</td>
		<td>Intitule</td>
		<td>Modification d'un cours</td>
    	<td>Suppression d'un cours</td>
	</tr>	
		<div id=content>
        	<div class="block-center">
				@foreach($cours as $cours)
					<tr>
						<td>{{$cours -> id}}</td> 
						<td>{{$cours -> intitule}}</td>
						<td><a href="{{route('modificationCoursFormAdmin', ['id_cours'=>$cours->id])}}">Modifier</a></td>
            			<td><a href="{{route('suppressionCoursAdmin', ['id_cours'=>$cours->id])}}">Supprimer</a></td>  
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