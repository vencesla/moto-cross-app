{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="mt-4 text-center">Bienvenue sur le site de training des entrainements de
            <strong>motocross</strong>
        </h4>
        <div class="card-group mt-4">
            <div class="card">
                <img src="{{ asset('img\motcross.png') }}" class="card-img-top" style="width: 200px">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                        content. This content is a little bit longer.</p>
                    <p class="card-text">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

@stop
