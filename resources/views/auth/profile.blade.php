@extends('layouts.app')
@section('content')
    <section class="vh-100 bg-image-section">
        <div class="container h-100 mb-4">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-6">
                    <form action="{{ route('user.profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card  bg-info" style="border-radius: 15px;">
                            <div class="card-body">
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Photo de profile</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input type="file" name="image" class="form-control form-control-lg"
                                            accept="image/*" required />

                                    </div>
                                </div>
                                <div class="px-5 py-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Mettre à jour</button>
                                </div>
                    </form>

                </div>
            </div>

        </div>
        </div>
        </div>
    </section>
@stop
