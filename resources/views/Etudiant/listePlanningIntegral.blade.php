@extends('layout.master')

@section('contenu')

<h2>Affichage des séances par semaine (1.3.3)</h2>

<form  method="get" action="{{route('planningEtuSemaine')}}">
	<div>

		<label>Affichage des séances par semaine et des annnées (1.3.3)</label>
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



<h1>Planning des tous les cours auquels je me suis inscrit(e)s. (1.3.1)</h1>

<table border="2">
		<tr>
    		<th colspan="6">Liste des plannings de tous les cours</th>
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