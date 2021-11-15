@extends('layout.master')

@section('contenu')

<div class="form-group"align="center">
    	<div class="header-search">
           <form  method="get" action="{{route('rechercheCoursEtudiant')}}">
           		<!-- <input type="text" name="cours_intitule" class="form-control m-input" placeholder="Indiquer le nom du cours que vous recherchez" />
           		<input type="submit" value="recherche" /> 
           		@csrf -->
           		<div class="form-group">
                    <label for="cours_intitule">Recherche (question 1.2.4)</label>
                    <input type="text" name="cours_intitule" placeholder="Indiquer le nom du cours que vous voulez rechercher" class="form-control" value="">
                </div>
				<input type="submit" value="recherche">
				@csrf
           </form>
       </div>
   </div>


<h1>Liste tous les cours dans votre formation.</h1>

<table border="2">
		<tr>
    		<th colspan="6">Liste tous les cours dans votre formation</th>
		</tr>
	<tr>
		<td>ID cours</td>
		<td>Intitule</td>
	
	</tr>	
		<div id=content>
        	<div class="block-center">
				@foreach ($cours as $cours)
					<tr>
						<td>{{$cours -> id}}</td> 
						<td>{{$cours -> intitule}}</td> 
							
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