@extends('layouts.main')

@section('title', 'Editando: '. $product->title)

@section('content')

<!-- O conteúdo vem aqui -->
<div id="product-create-container" class="col-md-6 offset-md-3">
	<h1>Editando: {{ $product->title }}</h1>
	<form action="/produtos/update/{{ $product->id }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group mt-4">
			<label>Título do produto:</label>
			<input type="text" name="title" class="form-control" maxlength="22" value="{{ $product->title }}">
		</div>
		<div class="form-group mt-4">
			<label>Descrição do produto:</label>
			<textarea name="description" class="form-control">{{ $product->description }}</textarea>
		</div>
		<div class="form-group mt-4">
			<label>Preço:</label>
			<input type="number" name="price" class="form-control" value="{{ $product->price }}">
		</div>
		<div class="form-group mt-4">
			<label>Imagem:</label>
			<div class="img-list">
			<img src="/img/products/{{ $product->image }}" class="img-preview">
			</div>
			<input type="file" name="image" class="form-control-file">
		</div>

			<button type="submit" class="btn btn-secondary mt-4">Salvar</button>
	</form>
</div>

@endsection