@extends('layouts.base')

@section('title') - À propos @stop

@section('addStyle')
<link href="css/alerts.css" rel="stylesheet" />
@stop

@section('addContent')

<div class="container" id="about">
	<div class="alert alert-info" role="alert">
		<strong>Ce site (couplé à l'application Android éponyme) est issu d'un projet étudiant et n'est probablement pas très fournis.</strong>
		<p>M.B. & G.P.</p>
	</div>
</div>

@stop