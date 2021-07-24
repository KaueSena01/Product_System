<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Icons -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <link rel="stylesheet" type="text/css" href="/css/styles.css">
        <script src="/js/scripts.js"></script>

    </head>
    <body>
        <header style="background-color: #000000b5; border-bottom: 2px solid #c3c3c3;">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                  <a href="/" class="navbar-brand" style="color: white; margin: 2px 5px;">Logo</a>  
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link" style="color: white;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link" style="color: white;">Painel</a>
                    </li>
                    <li class="nav-item">
                        <a href="/produtos/create" class="nav-link" style="color: white;">Anunciar</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a href="/register" class="nav-link" style="color: white;">Cadastrar</a>
                    </li>
                    @endguest

                    @auth
                    <li class="nav-item">
                    <form method="POST" action="/logout">
                        @csrf
                        <a href="/logout" class="nav-link" style="color: white;"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">Sair</a>
                    </form>
                    </li>
                    @endauth
                </ul>
            </nav>
        </header>
        
            @if(session('msg'))
            <div class="alert-msg">
                <p id="alert-msg">{{ session('msg') }}</p>
            </div>
            @endif

        @yield('content') <!-- Determinando o conteudo-->
         <footer>
             <p><a href="">Produtos.com</a> &copy; 2021</p>
         </footer>
    </body>
</html>
