<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{url("css/pacchetti_asia.css")}}">
        <script src="{{url("js/pacchetti_asia.js")}}" defer></script>
        <title>Asia</title>
    </head>
    <body>
        <header>
            <div class="overlay"></div>
            
            <nav>
                <div id="logo">
                    Web Programming - HW2
                </div>
                <div id="links">
                    <a href='{{ url("home") }}'>HOME</a>
                    <a href="{{ url("treni") }}">TRENI</a>
                    <a href="{{ url("tour") }}">TOUR</a>
                    <a href="{{ url("infoViaggi") }}">INFO META VIAGGI</a>
                    @if (session('id_utente') != null)
                        <a href="{{ url("logout") }}">LOGOUT</a>
                        <a href="{{ url("carrello") }}" class="oggetti_carrello"> <img  class="carrello_nav" src="{{ url("foto/carrello/carrello_vuoto.png")}}"></a>
                    @else
                        <a href="{{ url("login") }}">LOGIN</a>
                    @endif
                </div>
                <div id="mainbox">&#9776;</div>
                <div id="menu" class='sidemenu'>
                    <a href='{{ url("home") }}'>-HOME</a>
                    <a href="{{ url("treni") }}">-TRENI</a>
                    <a href="{{ url("infoViaggi") }}">-INFO META VIAGGI</a>
                    <a href="{{ url("tour") }}">-TOUR</a>
                    @if (session('id_utente') != null)
                        <a href="{{ url("logout") }}">-LOGOUT</a>
                        <a href="{{ url("carrello") }}" class="oggetti_carrello_mobile"><img  class="carrello_nav" src="{{ url("foto/carrello/carrello_vuoto.png")}}"></a>
                    @else
                        <a href="{{ url("login") }}">-LOGIN</a>
                    @endif                    
                    <a href="#" class='closebtn'>&times;</a>
                </div>
            </nav>
            <h1>
                <em>ASIA</em><br>
                <p>-I migliori viaggi dedicati al continente asiatico-</p>
                <p>Cerca</p>
                <input type="text" id='barra-ricerca'>
            </h1>
        </header>

        <div class="popup center">
            <div class="icon">
                <img src="@if (session('id_utente') != null) {{ url("foto/carrello/spunta_v.png")}} @else {{ url("foto/carrello/spunta_X.png")}} @endif">
            </div>
            <div class="title">
              Success!!
            </div>
            <div class="description">
              L'articolo è stato aggiunto con successo al Carrello.
            </div>
            <div class="close">
                <a href="@if (session('id_utente') != null) {{ url("carrello") }} @else {{ url("login") }} @endif">Vai al carrello!</a>
                <p href="#" id='closebtn'>&times;</p>
            </div>
        </div>





        <article>
            <section id="pacchetti"></section>
        </article>




        <footer>
            <address>Cittadella Universitaria - Catania</address>
            <p>Francesco Russo (O46002304)</p>
        </footer>
    </body>
</html>