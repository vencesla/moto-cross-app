@extends('layouts.app')
@section('content')
<section class="vh-100 bg-image-section">
    <div class="container h-100 mb-4">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-6">
                <h1 class="text-white text-center mb-4">Création de compte</h1>
                @if ($errors->has('password'))
                <span>{{ $errors->first('name') }}</span>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">Nom</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input type="text" name="name" class="form-control form-control-lg"
                                        placeholder="Entrez votre nom" required />

                                </div>
                            </div>

                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">Adresse Email</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input type="email" name="email" class="form-control form-control-lg"
                                        placeholder="Entrez votre email" required />

                                </div>
                            </div>
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Mot de passe</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        placeholder="Entrer votre mot de passe" required />
                                </div>
                            </div>
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Confirmer le mot de passe</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input id="password_confirmation" type="password" name="password_confirmation"
                                        placeholder="Veillez confirmer votre mot de passe"
                                        class="form-control form-control-lg" required>
                                </div>
                            </div>
                            <hr class="mx-n3">

                            <div class="px-5 py-4">
                                <button type="submit" class="btn btn-primary btn-lg">Enregistrer</button>
                            </div>
                </form>

            </div>
        </div>

    </div>
    </div>
    </div>
</section>
@stop