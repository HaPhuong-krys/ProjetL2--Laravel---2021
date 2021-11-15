@extends('layout.master')

@section('contenu')


<div class="panel panel-default">
	<div class="row-fluid">
		<div class="panel-heading">
			<h3 class="panel-title">Page d'inscription</h3>
		</div>

		<div class="panel-body">
			<form action="{{route('postChangeMDP')}}" method= "post">
                <div class="form-group">
                    <label for="ancien_mdp">Votre ancien mot de pass</label>
                    <input type="password" name="ancien_mdp" placeholder="ancien mot de pass" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="ancien_mdp">Entrez nouveau mot de pass</label>
                    <input type="password" name="nouveau_mdp" placeholder="nouveau mot de pass" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="confirm_mdp">Votre ancien mot de pass</label>
                    <input type="password" name="confirm_mdp" placeholder="confirmation votre mot de pass" class="form-control" value="">
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