<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{url("css/carrello.css")}}">
        <script src="{{url("js/carrello.js")}}" defer></script>
        <title>Carrello</title>
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
                    <a href="{{ url("logout") }}">LOGOUT</a>
                </div>
                <div id="mainbox">&#9776;</div>
                <div id="menu" class='sidemenu'>
                    <a href="{{ url("login") }}">-LOGIN</a>
                    <a href='{{ url("home") }}'>-HOME</a>
                    <a href="{{ url("treni") }}">-TRENI</a>
                    <a href="{{ url("tour") }}">-TOUR</a>
                    <a href="{{ url("infoViaggi") }}">-INFO META VIAGGI</a>
                    <a href="{{ url("logout") }}">-LOGOUT</a>
                    <a href="#" class='closebtn'>&times;</a>
                </div>
            </nav>
            <h1>
                <em>CARRELLO</em><br>
                <p>-I viaggi che hai scelto per le tue mete importanti-</p>
                <p>Cerca</p>
                <input type="text" id='barra-ricerca'>
            </h1>
        </header>

        <div class="popup center">
            <div class="icon">
                <img src="{{ url("foto/carrello/spunta_v.png")}}">
            </div>
            <div class="title">
              Success!!
            </div>
            <div class="description">
              L'articolo è stato rimosso con successo dal Carrello.
            </div>
            <div class="close">
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