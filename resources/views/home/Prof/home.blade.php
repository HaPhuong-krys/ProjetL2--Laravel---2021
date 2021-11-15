@extends('layout.master')

@section('contenu')

	@auth
		<h3>Bonjour {{Auth::user()->login}}</h3>
		<h3>Vous vous etes inscrit en tant que Professeur</h3>
	@endauth

	@auth
		<h2><a href="{{route('logout')}}">Se deconnecter</a></h2>
	@endauth

	@auth
		<h5><a href="{{route('listeCoursRespo')}}">Liste cours je suis responsable (2.1)</a></h5>
		<h5><a href="{{route('planningProfIntegral')}}">Liste planning de tous les cours (afficher tous les cours meme les cours on est pas reponsable, pour comparer avec 2.2.1)</a></h5>
		<h5><a href="{{route('planningProfIntegralRespo')}}">Liste planning des cours dont on est resposable (2.2.1)</a></h5>	



		<h5><a href="{{route('creationSeanceForm')}}">Création d'un séance</a></h5>
	@endauth

	@auth
		<h2><a href="{{route('homeProf')}}">Retourner</a></h2>
	@endauth

	@if( session()->has('etat'))
		<h2><p class="etat">{{session()->get('etat')}}</p></h2>
	@endif

@endsection