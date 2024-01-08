@extends('layouts.app')

@section('content')
<h1 class="text-center mt-4">Liste de trainings</h1>
<div class="container mt-5">
	<div class="col-md-12">
		@if(session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
		@endif
		<div class="row">
			@foreach($trainings as $training)
			<div class="col-md-4 mb-2">
				<div class="card" style="width: 18rem;">
					<img src="images/motcross.png" class="card-img-top" alt="..." style="height: 200px;">
					<div class="card-body">
						<p class="card-text">Course :{{ $training->name }}</p>
						<p class="card-text">Type : {{ $training->type }}</p>
						<p class="card-text">Nombre max :{{ $training->max_people }} persones</p>
						<p class="card-text">Personnes enregistrées : {{ $training->length }}</p>
						<div>
							<a href="{{ route('training.edit',['id' => $training->id]) }}" class="me-3"><i
									title="Editer" class="fa fa-pencil" aria-hidden="true"></i></a>
							<i data-bs-toggle="modal" data-bs-target="#exampleModal" style="color:red" title="Supprimer"
								class="fa fa-trash" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
			@endForeach
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Supression d'un training</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<h4>Voulez vous supprimer ce training ?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<a class="btn btn-danger" href="{{ route('training.delete', ['id' => $training->id]) }}">Confirmer</a>
			</div>
		</div>
	</div>
</div>
@stop