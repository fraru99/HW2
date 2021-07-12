<html>
    <head>
        <title>Web Programming: UNICT</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{url("css/infoViaggi.css")}}">
        <script src="{{url("js/infoViaggi.js")}}" defer></script>
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
                    <a href="{{ url("tour") }}">-TOUR</a>
                    @if (session('id_utente') != null)
                        <a href="{{ url("logout") }}">-LOGOUT</a>
                        <a href="{{ url("carrello") }}" class="oggetti_carrello_mobile"> <img  class="carrello_nav" src="{{ url("foto/carrello/carrello_vuoto.png")}}"></a>
                    @else
                        <a href="{{ url("login") }}">-LOGIN</a>
                    @endif                     
                    <a href="#" class='closebtn'>&times;</a>
                  </div>
            </nav>

            <h1>
                <em>Cerca le destinazioni dei tuoi viaggi</em><br>
                <p>e scopri le informazioni necessarie per prepararti al meglio</p>
            </h1>

            <form>
                <input type="text" id="train">
                <input type="submit" id="submit" value='cerca'>
            </form>

        </header>


        <section id="ricerca1"></section>

        <section id="ricerca2"></section>

        <section id="ricerca3"></section>


        <footer>
            <address>Cittadella Universitaria - Catania</address>
            <p>Francesco Russo (O46002304)</p>
        </footer>

    </body>

</html>