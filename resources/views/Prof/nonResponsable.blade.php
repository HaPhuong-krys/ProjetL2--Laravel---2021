@extends('layout.master')

@section('contenu')

	<h2>Vous n'etes pas responsable d'aucun cours</h2>

	@auth
		<a href="{{route('homeProf')}}">Retourner</a>
	@endauth
@endsection