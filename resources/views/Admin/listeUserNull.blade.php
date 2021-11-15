@extends('layout.master')

@section('contenu')

<table border="2">
		<tr>
    		<th colspan="7">Liste des User ayant type NULL</th>
		</tr>
	<tr>
		<td>ID </td>
		<td>NOM</td>
		<td>PRENOM</td>
		<td>LOGIN</td>
		<td>FORMATION_ID</td>
		<td>CHANGEMENT</td>
		<td>REFUSER DEMANDE</td>		
	</tr>	
		<div id=content>
        	<div class="block-center">
				@foreach ($users as $user)
					<tr>
						<td>{{$user->id}}</td> 
						<td>{{$user->nom}}</td> 
						<td>{{$user->prenom}}</td>
						<td>{{$user->login}}</td>
						<td>{{$user->formation_id}}</td>
						<td><a href="{{route('changeTypeForm',['id'=>$user->id])}}">changer type</a></td>
						<td><a href="{{route('refuseType', ['id'=>$user->id])}}">Supprime utilisateur/Refuse demande</a></td>

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