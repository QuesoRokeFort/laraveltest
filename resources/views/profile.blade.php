@extends('layout')
@section ('title', 'Login')
@section('content')
@auth
{{auth()->user()}}
@endauth
@endsection