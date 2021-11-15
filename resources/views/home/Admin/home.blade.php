@extends('layout.master')

@section('contenu')
	@auth
		<h4>Bonjour {{Auth::user()->login}}</h4>
		<h4>Vous vous etes inscrit en tant que Admin</h4>
	@endauth

	@auth
		<h2><a href="{{route('logout')}}">Se deconnecter</a></h2>
	@endauth
	

	@auth	
		<h5><a href="{{route('listeUserNull')}}">Validation des utilisateurs</a></h5>

		<h5><a href="{{route('creationCoursForm')}}">Créer un cours</a></h5>
		<h5><a href="{{route('listeCoursAdmin')}}">Lister cours</a></h5>

		<h5><a href="{{route('ajouteFormation')}}">Créer une formation</a></h5>
		<h5><a href="{{route('listeFormation')}}">Lister formation</a></h5>

		<h5><a href="{{route('creationUserFormAdmin')}}">Creation un utilisateur</a></h5>
		<h5><a href="{{route('listeUser')}}">Lister tous les utilisateurs (question4.1.1.1) (pour 4.1.5 et 4.1.6)</a></h5>

		<h5><a href="{{route('listeProf')}}">Associer un prof à un cours (QUESTION 4.1.3 et 4.2.6)</a></h5>
		
	@endauth

	@auth
		<h2><a href="{{route('homeAdmin')}}">Retourner</a></h2>
	@endauth


	@if( session()->has('etat'))
		<h2><p class="etat">{{session()->get('etat')}}</p></h2>
	@endif

@endsection