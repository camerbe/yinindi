@extends('beautymail::templates.widgets')
@section('content')

	@include('beautymail::templates.widgets.articleStart')

		<h4 class="secondary"><strong>Réinitialisez votre mot de passe</strong></h4>
		<p>cliquez ici {{$token}}</p>

	@include('beautymail::templates.widgets.articleEnd')


@stop
