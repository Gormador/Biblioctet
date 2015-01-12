@extends('layouts.base')

@section('title') - NoBook! @stop

<script>
	setTimeout(function()
		{
			window.location ="{{URL::to('/')}}";
		}, 4500);
</script>

@section('addContent')

	{{ Alert::warning('Le livre que vous avez sélectionné n\'existe pas...'.'<br/>'.'Vous allez être redirigé vers la page d\'accueil.')}}

@stop