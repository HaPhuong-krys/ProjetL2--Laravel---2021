@extends('layout.master')

@section('contenu')

<div class="container">
	<div class="form-group"align="center">
    	<div class="header-search">
           <form  method="get" action="{{route('rechercheUser')}}">
           		<!-- <input type="text" name="cours_intitule" class="form-control m-input" placeholder="Indiquer le nom du cours que vous recherchez" />
           		<input type="submit" value="recherche" /> 
           		@csrf -->
           		<div class="form-group">
                    <label for="user">Recherche par nom, prenom ou login (question 4.1.1.3)</label>
                    <input type="text" name="user" placeholder="Indiquer le nom , prenom ou login que vous recherchez" class="form-control" value="">
              	</div>
              
				      <input type="submit" value="recherche">
				@csrf
           	</form>
       	</div>
   	</div>
   	
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">FILTRER PAR TYPE (4.1.1.2)<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="{{route('filtreAdmin')}}">ADMIN</a></li>
					<li><a href="{{route('filtreProf')}}">PROFESSEUR</a></li>
					<li><a href="{{route('filtreEtu')}}">ETUDIANT</a></li>
					
				</ul>
			</li>	 
		</ul>
	</div>


</div>


<table border="2">
		<tr>
    		<th colspan="8">Liste tous les utilisateurs</th>
		</tr>
	<tr>
		<td>ID </td>
		<td>Login</td>
		<td>Nom</td>
		<td>Prenom</td>	
		<td>Type</td>
		<td>Formation_id</td>
		<td>Modification des utilisateurs</td>
		<td>Suppressioni des utilisateurs</td>		
	</tr>	
		<div id=content>
        	<div class="block-center">
				@foreach ($user as $user)
					<tr>
						<td>{{$user -> id}}</td> 
						<td>{{$user -> login}}</td> 
						<td>{{$user -> nom}}</td>
						<td>{{$user -> prenom}}</td>
						<td>{{$user -> type}}</td>
						<td>{{$user -> formation_id}}</td>
						<td><a href="{{route('modificationUserFormAdmin',['user_id'=>$user->id])}}"> Modifier </a></td>
						<td><a href="{{route('suppressionUserAdmin', ['user_id'=>$user->id])}}"> Supprimer</a></td>
						
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