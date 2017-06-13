@extends('layouts.app')

@section('content')

	@include('components.jumbotron')

    
 	<tabs id="tabs">
		<tab name="Blog" :selected="true">
			@include('endpoints.blog')
		</tab>
		<tab name="People">
			@include('endpoints.people')
		</tab>
		<tab name="Comments">
			@include('endpoints.comment')
		</tab>
	</tabs>

	<endpoint-data></endpoint-data>

@endsection