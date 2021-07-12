<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{url("css/treni.css")}}">
        <script src="{{url("js/treni.js")}}" defer></script>
        <title>Treni</title>
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
                    <a href="{{ url("tour") }}">TOUR</a>
                    <a href="{{ url("infoViaggi") }}">INFO META VIAGGI</a>
                    <a id="preferiti_nav">PREFERITI</a>
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
                    <a href="{{ url("tour") }}">-TOUR</a>
                    <a href="{{ url("infoViaggi") }}">-INFO META VIAGGI</a>
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
                <em>TRENI</em><br>
                <p>-I migliori viaggi dedicati al continente europeo-</p>
                <p>Cerca</p>
                <input type="text" id='barra-ricerca'>
            </h1>
        </header>

        <section id="preferiti" class='hiddden'></section>

        <article>
            <section id="treni"></section>
        </article>




        <footer>
            <address>Cittadella Universitaria - Catania</address>
            <p>Francesco Russo (O46002304)</p>
        </footer>
    </body>
</html>