@extends('layouts.app')

@section('title', 'CEPIRD - Center for Entrepreneurial Policy & Innovation')

@section('content')

    @include('landingSection.hero')

    @include('landingSection.about')

    @include('landingSection.focus-areas')

    @include('landingSection.vision')

    @include('landingSection.programs')

    @include('landingSection.founder')

    @include('landingSection.cta')

@endsection
