{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
@auth
<p>Bienvenue, {{ Auth::user()->name }}!</p>
@else
<p>Veuillez vous <a href="{{ route('login') }}">connecter</a>.</p>
@endauth
@stop