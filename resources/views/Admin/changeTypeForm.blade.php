@extends('layout.master')

@section('contenu')


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
            <h3>Vous pouvez choisir des type entre:</h3>
            <h2> "admin", "etudiant", "professeur" </h2>
         
            <h4>Veuillez donner des utilisateur ci-dessus un type pour qu'ils puissaient s'inscrire</h4>
            <h4>Si la formation si dessus est remplie avec une formtion_id, il s'agit une étudiant, veuiller donner la type "etudiant"</h4>
			<h5 class="panel-title">CHANGER TYPE DES UTILISATEUR</h5>
		</div>

		<div class="panel-body">
			<form action="{{route('changeType',['id'=>$users->id])}}" method= "post">
                <div class="form-group">
                    <label for="nouveau_type">DONNER UN TYPE POUR UTILISATEUR</label>
                    <input type="text" name="nouveau_type" placeholder="nouveau_type" class="form-control" value="">
                </div>

                
                 <input type="submit" value="Modifier">

            	@csrf
            </form>

            @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

		</div>

	</div>
</div>

@endsection