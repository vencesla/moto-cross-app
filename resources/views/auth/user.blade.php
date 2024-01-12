@extends('layouts.app')

@section('content')

    <div class="container">
        <section>
            <div class="container py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-md-9 col-lg-7 col-xl-5">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <div class="d-flex text-black">
                                    <div class="flex-shrink-0">
                                        @if ($user->image == null)
                                            <img src="{{ asset('img/profile.png') }}" alt="Generic placeholder image"
                                                class="img-fluid" style="width: 180px; border-radius: 10px;">
                                        @else
                                            <img src="{{ asset('storage/' . $user->image) }}"
                                                alt="Generic placeholder image" class="img-fluid"
                                                style="width: 180px; border-radius: 10px;">
                                        @endif
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1">Nom: {{ $user->name }}</h5>
                                        <p class="mb-2 pb-1" style="color: #2b2a2a;">Email: {{ $user->email }}</p>
                                        <div class="d-flex pt-1">
                                            <a href="{{ route('training.index') }}"
                                                class="btn btn-outline-primary me-1 flex-grow-1">trainings</a>
                                            <a href="{{ route('auth.profile', ['id' => $user->id]) }}"
                                                class="btn btn-primary flex-grow-1">Mettre à jour
                                                l'image</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
