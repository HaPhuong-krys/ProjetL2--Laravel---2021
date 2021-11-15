@extends('layout.master')

@section('contenu')

    <!-- <h3 align="center">Recherche un cours</h3><br />    -->
    <div class="form-group"align="center">
    	<div class="header-search">
           <form  method="get" action="{{route('rechercheCours')}}">
           		<!-- <input type="text" name="cours_intitule" class="form-control m-input" placeholder="Indiquer le nom du cours que vous recherchez" />
           		<input type="submit" value="recherche" /> 
           		@csrf -->
           		<div class="form-group">
                    <label for="cours_intitule">Recherche (question 4.2.2)</label>
                    <input type="text" name="cours_intitule" placeholder="Indiquer le nom du cours que vous recherchez" class="form-control" value="">
              </div>
              
				      <input type="submit" value="recherche">
				@csrf
           </form>
       </div>
   </div>



<!-- <div align="center">
            <form action="search.php" method="get">
                Search: <input type="text" name="search" />
                <input type="submit" name="ok" value="search" />
            </form>
   </div> -->


<table border="2">
		<tr>
    		<th colspan="6">Liste des cours</th>
		</tr>
	<tr>
		<td>ID cours</td>
		<td>Intitule</td>
    <td>Modification d'un cours</td>
    <td>Suppression d'un cours</td>
	</tr>	
		<div id=content>
        	<div class="block-center">
				@foreach ($cours as $cours)
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