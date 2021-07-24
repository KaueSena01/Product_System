@extends('layouts.main')

@section('title', 'Produtcs Site')

@section('content')

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Anuncie seu produto</h1>
        <p class="lead text-muted">Seu produto será visto por todos os nossos usuários e eles poderam dar uma estrela no seu produto para que ele seja mais bem elencado.</p>


        <form method="GET" action="/">
          <div class="search-form">
            <input type="search" name="search" class="form-search-input" placeholder="Digite algo...">
            <button type="submit" class="form-search-button"><ion-icon name="search-outline"></ion-icon></button>
          </div>
        </form>

      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      @if($search)
        <h2 style="text-align: center; margin-bottom: 30px;">Pesquisando por: {{ $search }}</h2>
      @else

      @endif
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      		@foreach($products as $product)
        <div class="col">
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="content-img">
              	<img src="/img/products/{{ $product->image }}">
              </div>
             
                <div class="description-product">
                	<h2>{{ $product->title }}</h2>
                  <hr>
                </div>
                <div class="justify-elements">
                <p><ion-icon name="cash-outline"></ion-icon> Preço: {{ $product->price }} Reais</p>
                </div>
                <div class="justify-elements">
                <p><ion-icon name="time-outline"></ion-icon> Data de anúncio: {{ date('d-m-Y', strtotime($product->created_at)) }}</p>
                </div>
        
                <a href="/produtos/{{ $product->id }}" class="btn btn-success">Saber mais</a>
        
            </div>
          </div>
        </div>
        @endforeach()
        @if(count($products) == 0 && $search)
          <p>Não há nenhum produto com o nome de {{ $search }}! <a href="/">Voltar</a></p>
        @elseif(count($products) == 0)
          <p>Não há nenhum produto aqui!</p>
        @endif
      </div>
    </div>
  </div>

</main>

@endsection