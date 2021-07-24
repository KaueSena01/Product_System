@extends('layouts.main')

@section('title', $product->title)

@section('content')
	
<div class="container-space">
	<div class="content-space">
		<div class="content-div-img">
			<img src="/img/products/{{ $product->image }}">
		</div>
		<div class="content-list">
			<h2>{{ $product->title }}</h2>
			<p id="description-space">{{ $product->description }}</p>

			<div class="justify-elements">
            <p><ion-icon name="cash-outline"></ion-icon> Preço: {{ $product->price }} Reais</p>
            </div>
            <div class="justify-elements">
            <p><ion-icon name="time-outline"></ion-icon> Data de anúncio: {{ date('d-m-Y', strtotime($product->created_at)) }}</p>
            </div>
            <div class="justify-elements">
            <p><ion-icon name="people-outline"></ion-icon> Anunciante: {{ $productOwner['name'] }}</p>
            </div>
            <div class="justify-elements">
            <p><ion-icon name="star-outline"></ion-icon> Estrelas: {{ count($product->users ) }}</p>
            </div>
          		
          		@if(!$hasUserStar)
          		<form method="POST" action="/produtos/favorite/{{ $product->id }}">
          			@csrf
            	<a href="/produtos/favorite/{{ $product->id }}" class="button-star"
            	onclick="event.preventDefault();
            	this.closest('form').submit();">
            	Marcar com uma estrela</a>
            	</form>
            	@else
            		<p class="already-joined-msg">Você marcou uma estrela nesse produto!</p>
            	@endif
		</div>

	</div>
</div>

@endsection()