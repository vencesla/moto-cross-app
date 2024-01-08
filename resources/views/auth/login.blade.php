{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')
@section('content')
<header>
    <style>
        #intro {
            background-image: url("img/bg.png");
            height: 100vh;
        }

        .navbar .nav-link {
            color: #fff !important;
        }
    </style>
    <!-- Navbar -->

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-md-8">
                        <form action="{{ route('login') }}" method="post" class="bg-white rounded shadow-5-strong p-5">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <input type="email" id="form1Example1" class="form-control" name="email" />
                                <label class="form-label" for="form1Example1" name="email">Addresse Email</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <input type="password" name="password" id="password" class="form-control"
                                    autocomplete="current-password" />
                                <label class="form-label" for="password">Mot de passe</label>
                            </div>

                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">

                                <div class="col text-center">
                                    <!-- Simple link -->
                                    <a href="#!">Mot de passe oublié?</a>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block" data-mdb-ripple-init>Se
                                connecter</button>
                            <div class="col text-center mt-4">
                                <!-- Simple link -->
                                <a href="{{ route('compte.create') }}">Crée un compte</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Background image -->
</header>
<!--Main Navigation-->
@stop