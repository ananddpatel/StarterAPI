@extends('layouts.app')

@section('content')

    @include('components.jumbotron')
    @include('components.tabs')
    @include('endpoints.blog')

    
    {{-- @include('components.footer') --}}
@endsection