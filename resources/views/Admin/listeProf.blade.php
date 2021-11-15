@extends('layout.master')

@section('contenu')
<table border="2">
		<tr>
    		<th colspan="6">Liste des profs</th>
		</tr>
	<tr>
		<td>ID prof</td>
		<td>login</td>
		<td>Associer des prof à un cours</td>	
	</tr>	
		<div id=content>
        	<div class="block-center">
				@foreach ($prof as $prof)
					<tr>
						<td>{{$prof -> id}}</td> 
						<td>{{$prof -> login}}</td> 
						<td><a href="{{route('associationCours', ['id'=> $prof->id])}}">Associer</a></td> 
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