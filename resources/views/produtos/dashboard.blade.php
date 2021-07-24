@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<!-- Dashboar -->
    <div class="content-dashboard">
        <div class="menu-left">
            <div class="menu-left-links">
                <div class="link-menu">
                <a href="/"><ion-icon name="arrow-forward-circle-outline"></ion-icon> Ver produtos</a>
                </div>
                <div class="link-menu">
                <a href="/produtos/create"><ion-icon name="paper-plane-outline"></ion-icon> Anunciar</a>
                </div>
                <form method="POST" action="/logout">
                        @csrf
                        <div class="link-menu">
                        <a href="/logout" class="nav-link" style=""
                        onclick="event.preventDefault();
                        this.closest('form').submit();"><ion-icon name="close-circle-outline"></ion-icon> Sair</a>
                        </div>
                </form>
                
            </div>
            <div class="list-stars">
                <h4>Estrelas marcadas</h4>
                @foreach($productsAsStars as $product)
                    @if(count($productsAsStars) > 0)
                    <div class="list-stars-name">
                    <div class="name-product">
                    <p>{{ $product->title }}</p>
                    </div>
                    <form action="/produtos/leave/{{ $product->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><ion-icon name="close-outline"></ion-icon></button>
                    </form>
                    </div>
                    @else

                    @endif
                @endforeach
            </div>
        </div>
        <div class="container-list-info">
            <div class="container-list-space">
                <h4>Meus produtos</h4>
                <div class="div-list-info">
                    @if(count($products) > 0)
                    
                     <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Estrelas</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/produtos/{{ $product->id }}">{{ $product->title}}</a></td>
                            <td>{{ count($product->users) }}</td>
                            <td><div>
                            <a href="/produtos/edit/{{ $product->id }}"><button type="button" class="button button-editar"><ion-icon name="create-outline"></ion-icon> Editar</button></a> 
                            <form method="POST" action="/produtos/{{ $product->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button button-deletar"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                            </form>
                            </div>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @else
                    <p>Você não anunciou nenhum produto ainda, <a href="/produtos/create">anunciar</a>.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection