@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-4 text-center">Les codes <strong>INSEE</strong> de la ville de {{ $cities['cities'][0]['name'] }}</h2>
        <p>{{ $cities['cities'][1]['insee'] }}</p>
        <div class="row mt-4">
            @foreach ($cities['cities'] as $index => $city)
                <div class="col-sm-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="../img/france.gif" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">
                                Code Insee : {{ $city['insee'] }}
                            </p>
                            <a href="{{ route('insee.detail', ['insee' => $city['insee']]) }}"
                                class="btn btn-primary">Détails</a>
                        </div>
                    </div>
                </div>
            @endForeach
        </div>
    </div>
@stop
