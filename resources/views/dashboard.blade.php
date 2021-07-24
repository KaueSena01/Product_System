@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<!-- Dashboar -->
    <div class="content-dashboard">
        <div class="menu-left">
            <div class="menu-left-links">
                <div class="link-menu">
                <a href="#"><ion-icon name="people-outline"></ion-icon> Meus dados</a>
                </div>
                <div class="link-menu">
                <a href="#"><ion-icon name="arrow-forward-circle-outline"></ion-icon> Ver produtos</a>
                </div>
                <div class="link-menu">
                <a href="#"><ion-icon name="paper-plane-outline"></ion-icon> Anunciar</a>
                </div>
                <div class="link-menu">
                <a href="#"><ion-icon name="close-circle-outline"></ion-icon> Sair</a>
                </div>
            </div>
        </div>
        <div class="container-list-info">
            <div class="container-list-space">
                <p>Nome:</p>
                <div class="div-list-info">
                    @if(count($products) > 0)

                    <table class="table table-sm">

                    </table>

                    @else
                        <p>Você não anunciou nenhum produto ainda, <a href="/produtos/create">anuncair</a>.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection