@extends('layout.master')

@section('contenu')
<h1>Liste des cours auxquels vous vous etes inscrit.</h1>

<table border="2">
		<tr>
    		<th colspan="6">Liste des cours inscrit(e).s</th>
		</tr>
	<tr>
		<td>ID cours</td>
		<td>Intitule</td>
		<td>Option</td>
		<td>Affichage du planning personnalisé par cours (1.3.2)</td>	
	</tr>	
		<div id=content>
        	<div class="block-center">
				@foreach ($cours as $cours)
					<tr>
						<td>{{$cours -> id}}</td> 
						<td>{{$cours -> intitule}}</td> 
						<td><a href="{{route('desinscriptionCours',['cours_id'=>$cours->id])}}">Désinscrire votre cours</a></td>
						<td><a href="{{route('planningEtuCours', ['id_cours'=>$cours->id])}}">Afficher planning du cours</a></td>
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