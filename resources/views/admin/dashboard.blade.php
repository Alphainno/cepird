@extends('admin.layouts.app')

@section('title', 'Dashboard - Admin Panel')

@section('page-title', 'Dashboard Overview')

@section('content')

    @include('admin.sections.stats')

    @include('admin.sections.recent-activity')

@endsection
