@extends('layout.master')

@section('contenu')
	@auth
		<h3>Bonjour {{Auth::user()->login}}</h3>
		<h3>Vous vous etes inscrit en tant que Etudiant</h3>
	@endauth

	@auth
		<h2><a href="{{route('logout')}}">Se deconnecter</a></h2>
	@endauth

	@auth
		<h5><a href="{{route('listeTousCours')}}">Liste tous les cours dans votre formation</a></h5>
		<h5><a href="{{route('listeCoursInscrit')}}">Liste des cours auxquels je me suis inscrit</a></h5>
		<h5><a href="{{route('inscriptionCoursEtuForm')}}">Inscrire au cours</a></h5>
		<h5><a href="{{route('planningEtuIntegral')}}">Lister cours intégrale</a></h5>
		
	@endauth

	@auth
		<h2><a href="{{route('homeEtudiant')}}">Retourner</a></h2>
	@endauth


	@if( session()->has('etat'))
		<h1><p class="etat">{{session()->get('etat')}}</p></h1>
	@endif

@endsection