@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-4 text-center">Le code <strong>INSEE</strong> : {{ $code_insee['city']['insee'] }}</h2>
        <div class="row mt-4">
            <div class="col-sm-4 mb-4">
                <div class="card bg-primary" style="width: 18rem;color:#fff;">
                    <div class="card-header">
                        Ville : {{ $code_insee['city']['name'] }}
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item  text-white">Code postal : {{ $code_insee['city']['cp'] }}</li>
                        <li class="list-group-item text-white">Longitude : {{ $code_insee['city']['longitude'] }}</li>
                        <li class="list-group-item  text-white">Latitude : {{ $code_insee['city']['latitude'] }}</li>
                        <li class="list-group-item  text-white">Altitude : {{ $code_insee['city']['altitude'] }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4 m-auto">
                <a href="{{ route('weather.city') }}" class="btn text-black btn-light">Sortir</a>
            </div>
        </div>
    </div>
@stop
