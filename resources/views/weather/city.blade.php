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
                            <form action="{{ route('weather.insee') }}" method="post"
                                class="bg-white rounded shadow-5-strong p-5">
                                @csrf
                                <!-- Email input -->
                                <div class="form-outline mb-4" data-mdb-input-init>
                                    <input type="text" id="form1Example1" class="form-control" name="city" />
                                    <label class="form-label" for="form1Example1" name="city">Veillez entrer le nom d'une
                                        ville</label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block" data-mdb-ripple-init>
                                    Valider</button>
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
