@extends('layout.master')

@section('contenu')

<h1>Bienvenue sur note site d'inscription</h1>
<h3>Voici votre liste de formation, veuillez choisir votre formation en remplissant la formation_id dans la forme d'inscription</h3>
<h3>Si vous vous etes inscrite en tant qu'un(e) étudiant(e)</h3>
<h3>Si non vous n'écrivez rien</h3>


<table border="2">
		<tr>
    		<th colspan="6">Liste des cours</th>
		</tr>
	<tr>
		<td>ID formation</td>
		<td>Intitule</td>
		
	</tr>	
		<div id=content>
        	<div class="block-center">
				@foreach ($formation as $formation)
					<tr>
						<td>{{$formation -> id}}</td> 
						<td>{{$formation -> intitule}}</td>
						
					</tr>
				@endforeach
			</div>
		</div>
</table>

@if( session()->has('etat'))
		<p class="etat">{{session()->get('etat')}}</p>
@endif

@endsection