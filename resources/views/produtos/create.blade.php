@extends('layouts.main')

@section('title', 'Criar um produto')

@section('content')

<!-- O conteúdo vem aqui -->
<div id="product-create-container" class="col-md-6 offset-md-3">
	<h1>Anunciar um produto</h1>
	<form action="/produtos" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group mt-4">
			<label>Título do produto:</label>
			<input type="text" name="title" class="form-control" maxlength="22">
		</div>
		<div class="form-group mt-4">
			<label>Descrição do produto:</label>
			<textarea name="description" class="form-control"></textarea>
		</div>
		<div class="form-group mt-4">
			<label>Preço:</label>
			<input type="number" name="price" class="form-control">
		</div>
		<div class="form-group mt-4">
			<label>Imagem:</label>
			<input type="file" name="image" class="form-control-file">
		</div>

			<button type="submit" class="btn btn-secondary mt-4">Anunciar</button>
	</form>
</div>

@endsection