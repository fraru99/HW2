<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{url("css/tour.css")}}">
        <script src="{{url("js/tour.js")}}" defer></script>
        <title>Tour</title>
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
                <em>Vivete un'avventura indimenticabile</em><br>
                <p>-Alberghi sensazionali, treni e crociere fluviali in destinazioni uniche in tutto il mondo: 
                    create l'itinerario di viaggio perfetto per voi. Lasciatevi ispirare dai nostri itinerari consigliati e contattateci per 
                    organizzare il viaggio dei vostri sogni-</p>
            </h1>
        </header>

        <section id="continenti">
            <div class='shadow-box-r'>
                <div>
                    <h1>EUROPA</h1>
                    <p>Accomodatevi in una cabina vintage e lasciatevi trasportare in un'epoca affascinante mentre visitate Parigi, Berlino o Istanbul. 
                        Scoprite il ricco patrimonio irlandese e scozzese. Oppure partite da Venezia alla volta di Firenze e della Sicilia, per scoprire un 
                        lato dell'Italia che sfugge all'immaginazione.</p>
                        <a href="{{ url("europa") }}">Visualizza Pacchetti</a>
                </div>
                <img src="../foto/foto_continenti/europa.jpg" id="eu_img">
            </div>
            <div class='shadow-box-l'>
                <img src="../foto/foto_continenti/sud america.jpg" id="sud_img">
                <div>
                    <h1>SUD AMERICA</h1>
                    <p>Svegliatevi la mattina presto in un antico monastero nel cuore di Cuzco e partite per un'avventura in treno verso Machu Picchu. 
                        Oppure festeggiate nell'hotel più prestigioso di Rio, prima di esplorare le foreste pluviali di Iguassu. Il Sud America offre 
                        tantissime destinazioni meravigliose: quale sarà la vostra?</p>
                        <a href="{{ url("america") }}">Visualizza Pacchetti</a>
                </div>
            </div>
            <div class='shadow-box-r'>
                <div>
                    <h1>ASIA</h1>
                    <p>Pagode sacre, villaggi fluviali, mercati vivaci e ristoranti eccellenti fanno dell'Asia un continente avvolto da misteri che aspettano
                         solo di essere svelati. Non vediamo l'ora di guidarvi attraverso Myanmar, Laos, Cambogia, Tailandia e Indonesia</p>
                         <a href="{{ url("asia") }}">Visualizza Pacchetti</a>
                </div>
                <img src="../foto/foto_continenti/asia.jpg" id="asia_img">
            </div>
            <div class='shadow-box-l'>
                <img src="../foto/foto_continenti/africa.jpg" id="africa_img">
                <div>
                    <h1>AFRICA</h1>
                    <p>Osservate gli elefanti attraversare il delta dell'Okavango, in Botswana, e concedetevi una pausa rigenerante a Città del Capo.
                        Ammirate antichi disegni rupestri, ascoltate il suono delle aquile urlatrici, degustate vini locali rarissimi: l'Africa
                        riaccenderà i vostri sensi.</p>
                        <a href="{{ url("africa") }}">Visualizza Pacchetti</a>
                </div>
            </div>
        </section>

        <footer>
            <address>Cittadella Universitaria - Catania</address>
            <p>Francesco Russo (O46002304)</p>
        </footer>
    </body>
</htm>