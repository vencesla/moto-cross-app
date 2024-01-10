@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-4">La météo de la ville de {{ $weather['city']['insee'] }}</h2>
        <div class="row mt-4">
            @foreach ($weather['forecast'] as $day)
                <div class="col-sm-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="../img/soleil.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Température</h5>
                            <p class="card-text">{{ $day['datetime'] }} : {{ $day['tmin'] }} °c - {{ $day['tmax'] }}.
                            </p>
                            <a href="{{ route('weather.city') }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endForeach
        </div>
    </div>
@stop
