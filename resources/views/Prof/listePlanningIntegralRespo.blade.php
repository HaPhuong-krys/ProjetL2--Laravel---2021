@extends('layout.master')

@section('contenu')
<h2>Affichage des séances par semaine (2.2.3)</h2>

<form  method="get" action="{{route('planningProfSemaineRespo')}}">
	<div>

		<label>Affichage des séances par semaine et des annnées (2.2.3)</label>
			<div class="xtlab-ctmenu-item">
				<select name="semaine">
    				@for($semaine = 1; $semaine <= 40; $semaine++)
    					<option value="{{$semaine}}">
							<td>Semaine : {{$semaine}}</td>
						</option>
					@endfor
   							
				</select>
			
				<select name="year">	
					@for($year = 2005; $year <= 2030; $year++)
						<option value="{{$year}}">
							<td>Année scolaire : {{$year}}</td>
						</option>
					@endfor
				</select>
			</div>
			
	</div>
	<input type="submit" value="recherche">
	@csrf
</form>


<h1>Planning des tous les cours donc je suis responsable (2.2.1).</h1>

<table border="2">
		<tr>
    		<th colspan="8">Liste de planning de tous les courS dont je suis responsable</th>
		</tr>
	<tr>
		<td>ID Planning </td>
		<td>ID Cours</td>
		<td>INTITULE</td>	
		<td>Date Debut</td>
		<td>Date Fin</td>
		<td>METTRE À JOUR VOTRE SÉANCE</td>	
		<td>SUPPRESSION</td>
		<td>Affichage du planning personnalisé par cours (2.2.2)</td>					
		
	</tr>	
		<div id=content>
        	<div class="block-center">
				@foreach ($planning as $planning)
					<tr>
						<td>{{$planning -> id}}</td> 
						<td>{{$planning -> cours_id}}</td> 
						<td>{{$planning -> intitule}}</td>
						<td>{{$planning -> date_debut}}</td>
						<td>{{$planning -> date_fin}}</td>
						<td><a href="{{route('misAjourForm', ['id_planning'=>$planning->id])}}">METTRE À JOUR VOTRE SÉANCE</a></td>
						<td><a href="{{route('suppressionSeance', ['id_planning'=>$planning->id])}}">SUPPRIMER</a></td>		
						<td><a href="{{route('planningProfCours', ['id_cours'=>$planning->cours_id])}}">Afficher</a></td>
					</tr>
				@endforeach
			</div>
		</div>
</table>


<h1>Planning des tous les cours donc je fais partie à enseigner (2.2.1).</h1>

<table border="2">
		<tr>
    		<th colspan="8">Liste de planning de tous les cours dont je suis enseignant</th>
		</tr>
	<tr>
		<td>ID Planning </td>
		<td>ID Cours</td>
		<td>INTITULE</td>	
		<td>Date Debut</td>
		<td>Date Fin</td>
		<td>METTRE À JOUR VOTRE SÉANCE</td>	
		<td>SUPPRESSION</td>
		<td>Affichage du planning personnalisé par cours (2.2.2)</td>					
		
	</tr>	
		<div id=content>
        	<div class="block-center">
				@foreach ($planningEnsei as $planningEnsei)
					<tr>
						<td>{{$planningEnsei -> id}}</td> 
						<td>{{$planningEnsei -> cours_id}}</td> 
						<td>{{$planningEnsei -> intitule}}</td>
						<td>{{$planningEnsei -> date_debut}}</td>
						<td>{{$planningEnsei -> date_fin}}</td>
						<td><a href="{{route('misAjourForm', ['id_planning'=>$planningEnsei->id])}}">METTRE À JOUR VOTRE SÉANCE</a></td>
						<td><a href="{{route('suppressionSeance', ['id_planning'=>$planningEnsei->id])}}">SUPPRIMER</a></td>		
						<td><a href="{{route('planningProfCours', ['id_cours'=>$planningEnsei->cours_id])}}">Afficher</a></td>
					</tr>
				@endforeach
			</div>
		</div>
</table>



@auth
		<a href="{{route('homeProf')}}">Retourner</a>
@endauth


@if( session()->has('etat'))
		<h1><p class="etat">{{session()->get('etat')}}</p></h1>
@endif
@endsection